<?php

namespace App\Http\Controllers;

use App\Gabinete;
use Illuminate\Http\Request;



class GabineteController extends Controller
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


        $gabinetes = Gabinete::all();

        return view('gabinetes/index')->with('gabinetes', $gabinetes);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gabinetes/create');
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

            'especificaciones' => 'required|max:255',
        ]);

        //
        $gabinete = new Gabinete($request->all());
        $gabinete->save();

        // return redirect('especialidades');

        flash('Gabinete creado correctamente');

        return redirect()->route('gabinetes.index');
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

        $gabinete = Gabinete::find($id);

        return view('gabinetes/edit')->with('gabinete', $gabinete);
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

            'especificaciones' => 'required|max:255',
        ]);

        $gabinete = Gabinete::find($id);
        $gabinete->fill($request->all());

        $gabinete->save();

        flash('Gabinete modificado correctamente');

        return redirect()->route('gabinetes.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gabinete = Gabinete::find($id);
        $gabinete->delete();
        flash('Gabinete borrado correctamente');

        return redirect()->route('gabinetes.index');
    }

    public function destroyAll()
    {
        Tratamiento::truncate();
        flash('Todos los gabinetes borrados correctamente');

        return redirect()->route('gabinetes.index');
    }
}
