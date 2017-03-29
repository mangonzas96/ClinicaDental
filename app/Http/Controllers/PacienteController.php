<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Paciente;

class PacienteController extends Controller
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
        //
        $pacientes = Paciente::all();

        return view('pacientes/index', ['pacientes'=>$pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pacientes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'apellido' => 'required|max:255',
            'dni' => 'required|max:255',
            'telefono' => 'required|max:255',
            'email' => 'required|max:255',
            'direccion' => 'required|max:255',
            'seguro' => 'required|max:255',
            'infoGeneral' => 'required|max:255',
            'sesion_id' => 'required|exists:sesions,id',
            'tratamiento_id' => 'required|exists:tratamientos,id',
        ]);
        $user = new User($request->all());
        $user->save();

        $paciente = new Paciente($request->all());
        $paciente->save();

        flash('Paciente creado correctamente');

        return redirect()->route('pacientes.index');
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
        //
        $paciente = Paciente::find($id);

        return view('pacientes/edit',['paciente'=>$paciente]);
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
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'apellido' => 'required|max:255',
            'dni' => 'required|max:255',
            'telefono' => 'required|max:255',
            'email' => 'required|max:255',
            'direccion' => 'required|max:255',
            'seguro' => 'required|max:255',
            'infoGeneral' => 'required|max:255',
        ]);
        $user = new User($request->all());
        $user->save();

        $paciente = new Paciente($request->all());
        $paciente->save();

        flash('Paciente modificado correctamente');

        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $paciente = Paciente::find($id);
        $paciente->delete();
        flash('Paciente borrado correctamente');

        return redirect()->route('pacientes.index');
    }
}
