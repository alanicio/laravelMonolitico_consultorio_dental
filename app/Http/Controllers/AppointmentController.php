<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Medical_consultation;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments=Appointment::all();
        return view('appointment.index',['appointments'=>$appointments]);
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
            'route'=>'appointments.store',
            'routeParameter'=>null,
            'buttonText'=>'Guardar',
            'rfcRequired'=>null,
            'readOnly'=>null,
            'medical_consultations'=>Medical_consultation::all(),
            'patients'=>Patient::all(),
            'doctors'=>Doctor::all(),
        ];
        return view('appointment.form',$viewInjection);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment=new Appointment($request->all());
        $appointment->patient_id=$request->patient;
        $appointment->doctor_id=$request->doctor;
        $appointment->medical_consultation_id=$request->medical_consultation;
        $appointment->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        $viewInjection=[
            'appointment'=>$appointment,
            'method'=>'GET',
            'route'=>'appointments.index',
            'routeParameter'=>null,
            'buttonText'=>'Volver',
            'readOnly'=>'readonly',
        ];
        return view('appointment.form',$viewInjection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $viewInjection=[
            'appointment'=>$appointment,
            'user'=>$appointment->user,
            'method'=>'PUT',
            'route'=>'appointments.update',
            'routeParameter'=>$appointment->id,
            'buttonText'=>'Actualizar',
            'rfcRequired'=>null,
            'readOnly'=>null,
            'medical_consultations'=>Medical_consultation::all(),
            'patients'=>Patient::all(),
            'doctors'=>Doctor::all(),
        ];
        return view('appointment.form',$viewInjection);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $appointment->patient_id=$request->patient;
        $appointment->doctor_id=$request->doctor;
        $appointment->medical_consultation_id=$request->medical_consultation;
        $appointment->update($request->all());
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->user->delete();
        return $this->index();
    }
}
