@extends('layouts.user')

@section('modelFields')
	<div class="form-group col-md-2">
    @if(!$readOnly)
      <label for="blood_type">Tipo de sangre</label>
      <select id="blood_type" name="blood_type" class="form-control" value="">
        <option {{isset($patient)?null:'selected'}}>--blood type--</option>
        <option value="A+" {{isset($patient)?$patient->blood_type=='A+'?'selected':null:null}}>A+</option>
        <option value="A-" {{isset($patient)?$patient->blood_type=='A-'?'selected':null:null}}>A-</option>
        <option value="B+" {{isset($patient)?$patient->blood_type=='B+'?'selected':null:null}}>B+</option>
        <option value="B-" {{isset($patient)?$patient->blood_type=='B-'?'selected':null:null}}>B-</option>
        <option value="O+" {{isset($patient)?$patient->blood_type=='O+'?'selected':null:null}}>O+</option>
        <option value="O-" {{isset($patient)?$patient->blood_type=='O-'?'selected':null:null}}>O-</option>
        <option value="AB+" {{isset($patient)?$patient->blood_type=='AB+'?'selected':null:null}}>AB+</option>
        <option value="AB-" {{isset($patient)?$patient->blood_type=='AB-'?'selected':null:null}}>AB-</option>
      </select>
    @else
      <label for="last_name">Tipo de sangre</label>
      <input type="text" class="form-control" id="blood_type" name="blood_type" readonly="" value="{{isset($patient)?$patient->blood_type:null}}">
    @endif
  </div>

  <div class="form-group col-md-2">
    <label for="ailments">Padecimientos previos</label>
    <select id="ailments" name="ailments" class="form-control">
      <option selected>--</option>
      <option>...</option>
    </select>
  </div>
@endsection