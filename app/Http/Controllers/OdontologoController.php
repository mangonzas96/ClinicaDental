<?php

namespace App\Http\Controllers;

use App\Odontologo;
use App\User;
use Illuminate\Http\Request;

class OdontologoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $odontologos = Odontologo::all();

        return view('odontologos/index', ['odontologos'=>$odontologos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::find('user_id');
        return view('odontologos/create',['users'=>$user]);
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
            'name' => 'required|max:255',
            'apellido' => 'required|max:255',
            'dni' => 'required|max:255',
            'telefono' => 'required|max:255',
            'email' => 'required|max:255',
            'direccion' => 'required|max:255',
            'especialidad' => 'required|max:255',
            'sueldo' => 'required|max:255',
        ]);

        $odontologo = new Odontologo($request->all());
        $odontologo->save();

        flash('Odontologo creado correctamente');

        return redirect()->route('odontologos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('odontologo.profile', ['odontologo' => User::findOrFail($id)]);
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
        $odontologo = Odontologo::find($id);

        return view('odontologos/edit',['odontologo'=>$odontologo]);
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
            'especialidad' => 'required|max:255',
            'sueldo' => 'required|max:255',
        ]);

        $odontologo = Odontologo::find($id);
        $odontologo->fill($request->all());

        $odontologo->save();

        flash('Odontologo actualizado correctamente');

        return redirect()->route('odontologos.index');
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
        $odontologo = Odontologo::find($id);
        $odontologo->delete();
        flash('Odontologo borrado correctamente');

        return redirect()->route('odontologos.index');
    }
}
