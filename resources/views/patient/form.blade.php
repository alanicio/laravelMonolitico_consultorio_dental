@extends('layouts.user')

@section('modelFields')
	<div class="form-group col-md-2">
      <label for="blood_type">Tipo de sangre</label>
      <select id="blood_type" name="blood_type" class="form-control">
        <option selected>--blood type--</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
      </select>
    </div>

    <div class="form-group col-md-2">
      <label for="ailments">Padecimientos previos</label>
      <select id="ailments" name="ailments" class="form-control">
        <option selected>--</option>
        <option>...</option>
      </select>
    </div>
@endsection