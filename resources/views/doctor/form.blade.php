@extends('layouts.user')

@section('modelFields')
	<div class="form-group col-md-2">
    <label for="profesional_license">Cedula profesional</label>
    <input type="text" class="form-control" id="profesional_license" name="profesional_license" required="" {{$readOnly}}
     value="{{isset($doctor)?$doctor->profesional_license:null}}">
  </div>
@endsection