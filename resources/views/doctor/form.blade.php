@extends('layouts.user')

@section('modelFields')
	<div class="form-group col-md-2">
		<label for="profesional_license">Cedula profesional</label>
		<input type="text" class="form-control" id="profesional_license" name="profesional_license" required="" {{$readOnly}}
		 value="{{isset($doctor)?$doctor->profesional_license:null}}">
	</div>

	<div class="form-group col-md-2">
		@if(!$readOnly)
		  <label for="specialty">Especialidad</label>
		  <select id="specialty" name="specialty" class="form-control" required="">
		    <option {{isset($doctor)?null:'selected'}}>--escoja especialidad--</option>
		    @foreach($specialties as $specialty)
		    	<option value="{{$specialty->id}}" {{isset($doctor)?$doctor->specialty->id==$specialty->id?'selected':null:null}}>{{$specialty->name}}</option>
		    @endforeach
		  </select>
		@else
		  <label for="specialty">Especialidad</label>
		  <input type="text" class="form-control" id="specialty" name="specialty" readonly="" value="{{isset($doctor)?$doctor->specialty->name:null}}">
		@endif
	</div>
@endsection