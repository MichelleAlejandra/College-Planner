<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Materia;
use App\Models\Lista;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $user = Auth::user();

        $actividades = Actividad::where('materia_id', $id)->paginate();

        $materia = Materia::find($id);

        $listas = Lista::where('user_id', $user->id)->paginate();


        return view('actividad.index', compact('actividades', 'id', 'materia', 'listas'))
            ->with('i', (request()->input('page', 1) - 1) * $actividades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $user = Auth::user();

        $listas = Lista::where('user_id', $user->id)->paginate();
        $actividad = new Actividad();
        $actividad->materia_id = $id;
        return view('actividad.create', compact('actividad', 'listas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Actividad::$rules);

        $actividad = Actividad::create($request->all());

        $materia = Materia::find($actividad->materia_id);

        $materia->horas_pendientes_total = $materia->horas_pendientes_total - $actividad->horas;
        $materia->horas_ejecutadas = $materia->horas_ejecutadas + $actividad->horas;
        $materia->save();

        return redirect()->route('actividades.index', $actividad->materia_id)
            ->with('success', 'Actividad creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $actividad = Actividad::find($id);

        $user = Auth::user();

        $listas = Lista::where('user_id', $user->id)->paginate();

        return view('actividad.show', compact('actividad', 'listas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividad = Actividad::find($id);

        $user = Auth::user();

        $listas = Lista::where('user_id', $user->id)->paginate();

        return view('actividad.edit', compact('actividad', 'listas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividad $actividad)
    {
        //
        request()->validate(Actividad::$rules);

        $actividad->update($request->all());

        $materia = Materia::find($actividad->materia_id);

        $materia->horas_pendientes_total = $materia->horas_pendientes_total - $actividad->horas;
        $materia->horas_ejecutadas = $materia->horas_ejecutadas + $actividad->horas;
        $materia->save();

        return redirect()->route('actividades.index', $actividad->materia_id)
            ->with('success', 'Actividad actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $actividad = Actividad::find($id);
        $materia_id = $actividad->materia_id;
        $actividad->delete();

        return redirect()->route('actividades.index', $materia_id)
            ->with('success', 'Actividad eliminado satisfactoriamente');
    }
}
