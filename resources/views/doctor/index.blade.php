@extends('layouts.app')

@section('content')
	<link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />
	<script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Apellido</th>
	      <th scope="col">Especialidad</th>
	      <th scope="col">Fecha de nacimiento</th>
	      <th scope="col">Telefono</th>
	      <th scope="col">Correo</th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($doctors as $doctor)
		  	<tr>
		      <th scope="row" onclick="redirectToShow(`{{route('doctors.show',$doctor->id)}}`)">{{$doctor->id}}</th>
		      <td onclick="redirectToShow(`{{route('doctors.show',$doctor->id)}}`)">{{$doctor->user->name}}</td>
		      <td onclick="redirectToShow(`{{route('doctors.show',$doctor->id)}}`)">{{$doctor->user->last_name}}</td>
		      <td onclick="redirectToShow(`{{route('doctors.show',$doctor->id)}}`)">{{$doctor->specialty->name}}</td>
		      <td onclick="redirectToShow(`{{route('doctors.show',$doctor->id)}}`)">{{$doctor->user->birthdate}}</td>
		      <td onclick="redirectToShow(`{{route('doctors.show',$doctor->id)}}`)">{{$doctor->user->phone_number}}</td>
		      <td onclick="redirectToShow(`{{route('doctors.show',$doctor->id)}}`)">{{$doctor->user->email}}</td>
		      <td>
		      	<div>
			      	<a class="dropdown-item" href="{{route('doctors.edit',$doctor->id)}}">
			      		<i class="fas fa-edit"></i>
			      	</a>
			    </div>
			    <div>
			      	<form action="{{route('doctors.destroy',$doctor->id)}}" method="POST">
			      		@csrf
			      		@method('DELETE')
			      		<button class="dropdown-item" type="submit">
			      			<i class="fas fa-trash-alt"></i>
			      		</button>
			      	</form>
			    </div>
			    <div>
			      	<a class="dropdown-item" href="{{route('doctors.show',$doctor->id)}}">
			      		<i class="fas fa-eye"></i>
			      	</a>
			    </div>
		      </td>
		    </tr>
	  	@endForeach
	  </tbody>
	</table>
@endsection