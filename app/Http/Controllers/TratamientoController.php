<?php

namespace App\Http\Controllers;

use App\Tratamiento;
use Illuminate\Http\Request;



class TratamientoController extends Controller
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


        $tratamientos = Tratamiento::all();

        return view('tratamientos/index')->with('tratamientos', $tratamientos);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tratamientos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'inicio' => 'required|date|after:now',
            'fin' => 'required|date|after:now',
            'observaciones' => 'required|max:255',
        ]);

        //
        $tratamiento = new Tratamiento($request->all());
        $tratamiento->save();

        // return redirect('especialidades');

        flash('Tratamiento creado correctamente');

        return redirect()->route('tratamientos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tratamiento = Tratamiento::find($id);

        return view('tratamientos/edit')->with('tratamiento', $tratamiento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'inicio' => 'required|date|after:now',
            'fin' => 'required|date|after:now',
            'observaciones' => 'required|max:255',
        ]);

        $tratamiento = Tratamiento::find($id);
        $tratamiento->fill($request->all());

        $tratamiento->save();

        flash('Tratamiento modificado correctamente');

        return redirect()->route('tratamientos.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tratamiento = Tratamiento::find($id);
        $tratamiento->delete();
        flash('Tratamiento borrado correctamente');

        return redirect()->route('tratamientos.index');
    }

    public function destroyAll()
    {
        Tratamiento::truncate();
        flash('Todas los tratamientos borrados correctamente');

        return redirect()->route('tratamientos.index');
    }
}
