<?php

namespace App\Http\Controllers;

use App\Gabinete;
use Illuminate\Http\Request;
use App\Sesion;
use App\Odontologo;
use App\Paciente;


class SesionController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesiones = Sesion::all();

        return view('sesiones/index',['citas'=>$sesiones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $odontologos = Odontologo::all()->pluck('full_name','id');

        $pacientes = Paciente::all()->pluck('full_name','id');

        $gabinetes = Gabinete::all()->pluck('full_name','id');


        return view('sesiones/create',['odontologos'=>$odontologos, 'pacientes'=>$pacientes , 'gabinetes'=>$gabinetes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'odontologo_id' => 'required|exists:medicos,id',
            'gabinete_id' => 'required|exists:gabinetes,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_hora' => 'required|date|after:now',

        ]);

        $sesion = new Sesion($request->all());
        $sesion->save();


        flash('Sesion creada correctamente');

        return redirect()->route('sesiones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $sesion = Sesion::find($id);

        $odontologos = Odontologo::all()->pluck('full_name','id');

        $pacientes = Paciente::all()->pluck('full_name','id');

        $gabinetes = Gabinete::all()->pluck('full_name','id');


        return view('sesiones/edit',['sesion'=> $sesion, 'odontologos'=>$odontologos, 'pacientes'=>$pacientes, 'gabinetes'=>$gabinetes ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'odontologo_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'gabinete_id' => 'required|exists:gabinetes,id',
            'fecha_hora' => 'required|date|after:now',

        ]);
        $sesion = Sesion::find($id);
        $sesion->fill($request->all());

        $sesion->save();

        flash('Sesion modificada correctamente');

        return redirect()->route('sesiones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sesion = Sesion::find($id);
        $sesion->delete();
        flash('Sesion borrada correctamente');

        return redirect()->route('sesiones.index');
    }
}
