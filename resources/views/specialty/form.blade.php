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
		       value="{{isset($specialty)?$specialty->name:null}}">
		    </div>

			<div class="form-group col-md-2">
		      <label for="description">Descripción</label>
		      <textarea class="form-control" id="description" name="description" required="" {{$readOnly}}
		       >{{isset($specialty)?$specialty->description:null}}</textarea>
		    </div>					    

		  </div>
		  <button type="submit" class="btn btn-primary">{{$buttonText}}</button>
		</form>
	</div>
@endsection
	