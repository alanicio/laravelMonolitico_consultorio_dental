@extends('layouts.app')

@section('content')
	<link rel="stylesheet" href="{{ URL::asset('css/form.css') }}" />
	<div>
		<form method="{{$method=='PUT'?'POST':$method}}" action="{{route($route,$routeParameter)}}">
			@csrf
			@method($method)
		  <div class="form-row">

		  	<div class="form-group col-md-2">
		      <label for="date">Fecha de cita</label>
		      <input type="date" class="form-control" id="date" name="date" required="" {{$readOnly}}
		       value="{{isset($appointment)?$appointment->date:null}}">
		    </div>

		    <div class="form-group col-md-2">
				@if(!$readOnly)
				  <label for="patient">Paciente</label>
				  <select id="patient" name="patient" class="form-control" required="">
				    <option {{isset($appointment)?null:'selected'}}>--seleccionar paciente--</option>
				    @foreach($patients as $patient)
				    	<option value="{{$patient->id}}" {{isset($appointment)?$appointment->patient->id==$patient->id?'selected':null:null}}>
				    		{{$patient->user->name}} {{$patient->user->last_name}}
				    	</option>
				    @endforeach
				  </select>
				@else
				  <label for="patient">Paciente</label>
				  <input type="text" class="form-control" id="patient" name="patient" readonly="" value="{{isset($appointment)?$appointment->patient->user->name.' '.$appointment->patient->user->last_name:null}}">
				@endif
			</div>

		    <div class="form-group col-md-2">
				@if(!$readOnly)
				  <label for="medical_consultation">Consulta medica</label>
				  <select id="medical_consultation" name="medical_consultation" class="form-control" required="">
				    <option {{isset($appointment)?null:'selected'}} value="">--escoja consulta medica--</option>
				    @foreach($medical_consultations as $medical_consultation)
				    	<option value="{{$medical_consultation->id}}" {{isset($appointment)?$appointment->medical_consultation->id==$medical_consultation->id?'selected':null:null}}>{{$medical_consultation->name}}</option>
				    @endforeach
				  </select>
				@else
				  <label for="medical_consultation">Consulta medica</label>
				  <input type="text" class="form-control" id="medical_consultation" name="medical_consultation" readonly="" value="{{isset($appointment)?$appointment->medical_consultation->name:null}}">
				@endif
			</div>

			<div class="form-group col-md-2">
				@if(!$readOnly)
				  <label for="doctor">Doctor asignado</label>
				  <select id="doctor" name="doctor" class="form-control" required="" {{!isset($appointment)?'disabled=""':null}}>
				    <option {{isset($appointment)?null:'selected'}}>--asignar doctor--</option>
				    @isset($appointment)
					    @foreach($doctors as $doctor)
					    	@if($doctor->specialty_id==$appointment->medical_consultation->specialty_id)
						    	<option value="{{$doctor->id}}" {{isset($appointment)?$appointment->doctor->id==$doctor->id?'selected':null:null}}>
						    		{{$doctor->user->name}} {{$doctor->user->last_name}}
						    	</option>
						    @endif
					    @endforeach
					@endisset
				  </select>
				@else
				  <label for="doctor">doctor asignado</label>
				  <input type="text" class="form-control" id="doctor" name="doctor" readonly="" value="{{isset($appointment)?$appointment->doctor->user->name.' '.$appointment->doctor->user->last_name:null}}">
				@endif
			</div>			

		  </div>
		  <button type="submit" class="btn btn-primary">{{$buttonText}}</button>
		</form>
	</div>
	@isset($doctors)
		<script type="text/javascript">
			var doctors={!! json_encode($doctors->toArray()) !!}
			var medical_consultations={!! json_encode($medical_consultations->toArray()) !!}
		</script>
		<script type="text/javascript" src="{{ URL::asset('js/appointmentForm.js') }}"></script>
	@endif
@endsection
	