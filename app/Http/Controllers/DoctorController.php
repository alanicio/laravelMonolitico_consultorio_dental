<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors=Doctor::all();
        return view('doctor.index',['doctors'=>$doctors]);
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
            'route'=>'doctors.store',
            'routeParameter'=>null,
            'buttonText'=>'Guardar',
            'rfcRequired'=>null,
            'readOnly'=>null,
            'specialties'=>Specialty::all(),
        ];
        return view('doctor.form',$viewInjection);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor=new Doctor($request->all());
        $doctor->user_id=User::create($request->all())->id;
        $doctor->specialty_id=$request->specialty;
        $doctor->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        $viewInjection=[
            'doctor'=>$doctor,
            'user'=>$doctor->user,
            'method'=>'GET',
            'route'=>'doctors.index',
            'routeParameter'=>null,
            'buttonText'=>'Volver',
            'rfcRequired'=>null,
            'readOnly'=>'readonly',
        ];
        return view('doctor.form',$viewInjection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $viewInjection=[
            'doctor'=>$doctor,
            'user'=>$doctor->user,
            'method'=>'PUT',
            'route'=>'doctors.update',
            'routeParameter'=>$doctor->id,
            'buttonText'=>'Actualizar',
            'rfcRequired'=>null,
            'readOnly'=>null,
            'specialties'=>Specialty::all(),
        ];
        return view('doctor.form',$viewInjection);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $doctor->user->update($request->all());
        $doctor->update($request->all());
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return $this->index();
    }
}
