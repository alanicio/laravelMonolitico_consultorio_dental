@extends('layouts.app')

@section('content')
	<link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />
	<script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Descripción</th>
	      <th scope="col">Area de especialidad</th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($medical_consultations as $medical_consultation)
		  	<tr>
		      <th scope="row" onclick="redirectToShow(`{{route('medical_consultations.show',$medical_consultation->id)}}`)">{{$medical_consultation->id}}</th>
		      <td onclick="redirectToShow(`{{route('medical_consultations.show',$medical_consultation->id)}}`)">{{$medical_consultation->name}}</td>
		      <td onclick="redirectToShow(`{{route('medical_consultations.show',$medical_consultation->id)}}`)">{{$medical_consultation->description}}</td>
		      <td onclick="redirectToShow(`{{route('medical_consultations.show',$medical_consultation->id)}}`)">{{$medical_consultation->specialty->name}}</td>
		      <td>
		      	<div>
			      	<a class="dropdown-item" href="{{route('medical_consultations.edit',$medical_consultation->id)}}">
			      		<i class="fas fa-edit"></i>
			      	</a>
			    </div>
			    <div>
			      	<form action="{{route('medical_consultations.destroy',$medical_consultation->id)}}" method="POST">
			      		@csrf
			      		@method('DELETE')
			      		<button class="dropdown-item" type="submit">
			      			<i class="fas fa-trash-alt"></i>
			      		</button>
			      	</form>
			    </div>
			    <div>
			      	<a class="dropdown-item" href="{{route('medical_consultations.show',$medical_consultation->id)}}">
			      		<i class="fas fa-eye"></i>
			      	</a>
			    </div>
		      </td>
		    </tr>
	  	@endForeach
	  </tbody>
	</table>
@endsection