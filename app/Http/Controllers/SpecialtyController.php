<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties=Specialty::all();
        return view('specialty.index',['specialties'=>$specialties]);
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
            'route'=>'specialties.store',
            'routeParameter'=>null,
            'buttonText'=>'Guardar',
            'rfcRequired'=>null,
            'readOnly'=>null,
        ];
        return view('specialty.form',$viewInjection);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $specialty=new Specialty($request->all());
        $specialty->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        $viewInjection=[
            'specialty'=>$specialty,
            'method'=>'GET',
            'route'=>'specialties.index',
            'routeParameter'=>null,
            'buttonText'=>'Volver',
            'rfcRequired'=>null,
            'readOnly'=>'readonly',
        ];
        return view('specialty.form',$viewInjection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        $viewInjection=[
            'specialty'=>$specialty,
            'method'=>'PUT',
            'route'=>'specialties.update',
            'routeParameter'=>$specialty->id,
            'buttonText'=>'Actualizar',
            'rfcRequired'=>null,
            'readOnly'=>null,
        ];
        return view('specialty.form',$viewInjection);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialty $specialty)
    {
        $specialty->update($request->all());
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        return $this->index();
    }
}
