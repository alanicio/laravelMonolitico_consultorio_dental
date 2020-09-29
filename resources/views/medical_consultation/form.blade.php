@extends('layouts.app')

@section('content')
	<link rel="stylesheet" href="{{ URL::asset('css/form.css') }}" />
	<div class="card">
		<form method="{{$method=='PUT'?'POST':$method}}" action="{{route($route,$routeParameter)}}">
			@csrf
			@method($method)
		  <div class="form-row">

		  	<div class="form-group col-md-2">
		      <label for="name">Nombre</label>
		      <input type="text" class="form-control" id="name" name="name" required="" {{$readOnly}}
		       value="{{isset($medical_consultation)?$medical_consultation->name:null}}">
		    </div>

			<div class="form-group col-md-2">
		      <label for="description">Descripción</label>
		      <textarea class="form-control" id="description" name="description" required="" {{$readOnly}}
		       >{{isset($medical_consultation)?$medical_consultation->description:null}}</textarea>
		    </div>	

		    <div class="form-group col-md-2">
				@if(!$readOnly)
				  <label for="specialty">Especialidad</label>
				  <select id="specialty" name="specialty" class="form-control" required="">
				    <option {{isset($medical_consultation)?null:'selected'}}>--escoja especialidad--</option>
				    @foreach($specialties as $specialty)
				    	<option value="{{$specialty->id}}" {{isset($medical_consultation)?$medical_consultation->specialty->id==$specialty->id?'selected':null:null}}>{{$specialty->name}}</option>
				    @endforeach
				  </select>
				@else
				  <label for="specialty">Especialidad</label>
				  <input type="text" class="form-control" id="specialty" name="specialty" readonly="" value="{{isset($medical_consultation)?$medical_consultation->specialty->name:null}}">
				@endif
			</div>				    

		  </div>
		  <button type="submit" class="btn btn-primary">{{$buttonText}}</button>
		</form>
	</div>
@endsection
	