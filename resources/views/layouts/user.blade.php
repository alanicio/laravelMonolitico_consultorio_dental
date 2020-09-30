@extends('layouts.app')

@section('content')
	<link rel="stylesheet" href="{{ URL::asset('css/form.css') }}" />
	<div>
		<form method="{{$method=='PUT'?'POST':$method}}" action="{{route($route,$routeParameter)}}">
			@csrf
			@method($method)
		  <div class="form-row">

		  	<div class="form-group col-md-2">
		      <label for="name">Nombre</label>
		      <input type="text" class="form-control" id="name" name="name" required="" {{$readOnly}}
		       value="{{isset($user)?$user->name:null}}">
		    </div>

		    <div class="form-group col-md-2">
		      <label for="last_name">Apellidos</label>
		      <input type="text" class="form-control" id="last_name" name="last_name" required="" {{$readOnly}}
		      value="{{isset($user)?$user->last_name:null}}">
		    </div>

		    <div class="form-group col-md-2">
		      <label for="phone_number">Telefono</label>
		      <input type="text" class="form-control" id="phone_number" name="phone_number" required="" {{$readOnly}}
		      value="{{isset($user)?$user->phone_number:null}}">
		    </div>

		    <div class="form-group col-md-2">
		      <label for="email">Email</label>
		      <input type="email" class="form-control" id="email" name="email" required="" {{$readOnly}}
		      value="{{isset($user)?$user->email:null}}">
		    </div>

		    <div class="form-group col-md-2">
		      <label for="birthdate">Fecha de nacimiento</label>
		      <input type="date" class="form-control" id="birthdate" name="birthdate" required="" {{$readOnly}}
		      value="{{isset($user)?$user->birthdate:null}}">
		    </div>

		    @if(!$readOnly)
			    <div class="form-group col-md-2">
			      <label for="password">Password</label>
			      <input type="password" class="form-control" id="password" name="password" required="">
			    </div>
		    @endIf

		    <div class="form-group col-md-2">
		      <label for="rfc">RFC</label>
		      <input type="text" class="form-control" id="rfc" name="rfc" {{$rfcRequired}} {{$readOnly}}
		      value="{{isset($user)?$user->rfc:null}}">
		    </div>
		    @yield('modelFields')
		  </div>
		  <button type="submit" class="btn btn-primary">{{$buttonText}}</button>
		</form>
	</div>
@endsection
	