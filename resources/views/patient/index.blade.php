@extends('layouts.app')

@section('content')
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Apellido</th>
	      <th scope="col">Tipo de sangre</th>
	      <th scope="col">Fecha de nacimiento</th>
	      <th scope="col">Telefono</th>
	      <th scope="col">Correo</th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($patients as $patient)
		  	<tr>
		      <th scope="row">{{$patient->id}}</th>
		      <td>{{$patient->user->name}}</td>
		      <td>{{$patient->user->last_name}}</td>
		      <td>{{$patient->blood_type}}</td>
		      <td>{{$patient->user->birthdate}}</td>
		      <td>{{$patient->user->phone_number}}</td>
		      <td>{{$patient->user->email}}</td>
		      <td>
		      	<i class="fas fa-edit"></i>
		      	<i class="fas fa-trash-alt"></i>
		      </td>
		    </tr>
	  	@endForeach
	  </tbody>
	</table>
@endsection