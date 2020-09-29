@extends('layouts.app')

@section('content')
	<link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />
	<script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Fecha agendad</th>
	      <th scope="col">Paciente</th>
	      <th scope="col">Doctor asignado</th>
	      <th scope="col">Tipo de consulta</th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($appointments as $appointment)
		  	<tr>
		      <th scope="row" onclick="redirectToShow(`{{route('appointments.show',$appointment->id)}}`)">
		      	{{$appointment->id}}
		      </th>
		      <td onclick="redirectToShow(`{{route('appointments.show',$appointment->id)}}`)">
		      	{{$appointment->date}}
		      </td>
		      <td onclick="redirectToShow(`{{route('appointments.show',$appointment->id)}}`)">
		      	{{$appointment->patient->user->name}} {{$appointment->patient->user->last_name}}
		      </td>
		      <td onclick="redirectToShow(`{{route('appointments.show',$appointment->id)}}`)">
		      	{{$appointment->doctor->user->name}} {{$appointment->doctor->user->last_name}}
		      </td>
		      <td onclick="redirectToShow(`{{route('appointments.show',$appointment->id)}}`)">
		      	{{$appointment->medical_consultation->name}}
		      </td>
		      <td>
		      	<div>
			      	<a class="dropdown-item" href="{{route('appointments.edit',$appointment->id)}}">
			      		<i class="fas fa-edit"></i>
			      	</a>
			    </div>
			    <div>
			      	<form action="{{route('appointments.destroy',$appointment->id)}}" method="POST">
			      		@csrf
			      		@method('DELETE')
			      		<button class="dropdown-item" type="submit">
			      			<i class="fas fa-trash-alt"></i>
			      		</button>
			      	</form>
			    </div>
			    <div>
			      	<a class="dropdown-item" href="{{route('appointments.show',$appointment->id)}}">
			      		<i class="fas fa-eye"></i>
			      	</a>
			    </div>
		      </td>
		    </tr>
	  	@endForeach
	  </tbody>
	</table>
@endsection