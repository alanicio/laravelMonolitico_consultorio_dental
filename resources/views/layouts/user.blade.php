@extends('layouts.app')

@section('content')
	<link rel="stylesheet" href="{{ URL::asset('css/form.css') }}" />
	<div class="card">
		<form method="{{$method}}">
		  <div class="form-row">

		  	<div class="form-group col-md-2">
		      <label for="name">Nombre</label>
		      <input type="text" class="form-control" id="name" name="name">
		    </div>

		    <div class="form-group col-md-2">
		      <label for="last_name">Apellidos</label>
		      <input type="text" class="form-control" id="last_name" name="last_name">
		    </div>

		    <div class="form-group col-md-2">
		      <label for="phone_number">Telefono</label>
		      <input type="text" class="form-control" id="phone_number" name="phone_number">
		    </div>

		    <div class="form-group col-md-2">
		      <label for="email">Email</label>
		      <input type="email" class="form-control" id="email" name="email">
		    </div>

		    <div class="form-group col-md-2">
		      <label for="birthdate">Fecha de nacimiento</label>
		      <input type="date" class="form-control" id="birthdate" name="birthdate">
		    </div>

		    <div class="form-group col-md-2">
		      <label for="password">Password</label>
		      <input type="password" class="form-control" id="password" name="password">
		    </div>

		    <div class="form-group col-md-2">
		      <label for="rfc">RFC</label>
		      <input type="text" class="form-control" id="rfc" name="rfc">
		    </div>
		    @yield('modelFields')
		  </div>
		  <button type="submit" class="btn btn-primary">Sign in</button>
		</form>
	</div>
@endsection
	