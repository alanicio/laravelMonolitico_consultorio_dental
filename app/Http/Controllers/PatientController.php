<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients=Patient::all();
        return view('patient.index',['patients'=>$patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewInjection=[
            'method'=>'POST',
            'route'=>'patients.store',
            'routeParameter'=>null,
            'buttonText'=>'Guardar',
            'rfcRequired'=>null,
            'readOnly'=>null,
        ];
        return view('patient.form',$viewInjection);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient=new Patient($request->all());
        $patient->user_id=User::create($request->all())->id;
        $patient->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $viewInjection=[
            'patient'=>$patient,
            'method'=>'GET',
            'route'=>'patients.index',
            'routeParameter'=>null,
            'buttonText'=>'Volver',
            'rfcRequired'=>null,
            'readOnly'=>'readonly',
        ];
        return view('patient.form',$viewInjection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $viewInjection=[
            'patient'=>$patient,
            'method'=>'PUT',
            'route'=>'patients.update',
            'routeParameter'=>$patient->id,
            'buttonText'=>'Actualizar',
            'rfcRequired'=>null,
            'readOnly'=>null,
        ];
        return view('patient.form',$viewInjection);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $patient->user->update($request->all());
        $patient->update($request->all());
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return $this->index();
    }
}
