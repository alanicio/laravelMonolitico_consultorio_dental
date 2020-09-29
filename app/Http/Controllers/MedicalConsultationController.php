<?php

namespace App\Http\Controllers;

use App\Models\Medical_consultation;
use App\Models\Specialty;
use Illuminate\Http\Request;

class MedicalConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medical_consultations=Medical_consultation::all();
        return view('medical_consultation.index',['medical_consultations'=>$medical_consultations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewInjection=[
            'specialties'=>Specialty::all(),
            'method'=>'POST',
            'route'=>'medical_consultations.store',
            'routeParameter'=>null,
            'buttonText'=>'Guardar',
            'rfcRequired'=>null,
            'readOnly'=>null,
        ];
        return view('medical_consultation.form',$viewInjection);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medical_consultation=new Medical_consultation($request->all());
        $medical_consultation->specialty_id=$request->specialty;
        $medical_consultation->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medical_consultation  $medical_consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Medical_consultation $medical_consultation)
    {
        $viewInjection=[
            'medical_consultation'=>$medical_consultation,
            'method'=>'GET',
            'route'=>'medical_consultations.index',
            'routeParameter'=>null,
            'buttonText'=>'Volver',
            'rfcRequired'=>null,
            'readOnly'=>'readonly',
        ];
        return view('medical_consultation.form',$viewInjection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medical_consultation  $medical_consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Medical_consultation $medical_consultation)
    {
        $viewInjection=[
            'specialties'=>Specialty::all(),
            'medical_consultation'=>$medical_consultation,
            'method'=>'PUT',
            'route'=>'medical_consultations.update',
            'routeParameter'=>$medical_consultation->id,
            'buttonText'=>'Actualizar',
            'rfcRequired'=>null,
            'readOnly'=>null,
        ];
        return view('medical_consultation.form',$viewInjection);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medical_consultation  $medical_consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medical_consultation $medical_consultation)
    {
        $medical_consultation->specialty_id=$request->specialty;
        $medical_consultation->update($request->all());
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medical_consultation  $medical_consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medical_consultation $medical_consultation)
    {
        $medical_consultation->delete();
        return $this->index();
    }
}
