<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Materia;
use App\Models\Lista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $materias = Materia::where('user_id', $user->id)->paginate();
        $listas = Lista::where('user_id', $user->id)->paginate();

        $id = $user->id;

        $sqlLunes = 'SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Lunes\' ORDER BY hora_inicial';
        $horariosLunes = DB::select($sqlLunes);

        $horariosMartes = DB::select('SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Martes\' ORDER BY hora_inicial');
        $horariosMiercoles = DB::select('SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Miercoles\' ORDER BY hora_inicial');
        $horariosJueves = DB::select('SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Jueves\' ORDER BY hora_inicial');
        $horariosViernes = DB::select('SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Viernes\' ORDER BY hora_inicial');
        $horariosSabado = DB::select('SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Sabado\' ORDER BY hora_inicial');
        $horariosDomingo = DB::select('SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Domingo\' ORDER BY hora_inicial');

        return view('horario.index',
        compact('materias', 'listas', 'horariosLunes', 'horariosMartes', 'horariosMiercoles',
         'horariosJueves', 'horariosViernes', 'horariosSabado', 'horariosDomingo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $horario = new Horario();
        $horario->user_id = $user->id;

        $materias = Materia::where('user_id', $user->id)->paginate();

        $listas = Lista::where('user_id', $user->id)->paginate();

        return view('horario.create', compact('materias', 'listas', 'horario'));
    }

    public function getMateria($id)
    {
        $user = Auth::user();

        $materias = DB::select('SELECT * FROM materias WHERE user_id = ' . $user->id . ' AND id = ' . $id );

        return $materias;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Horario::$rules);
        $user = Auth::user();
        $materia = Materia::find($request['materia_id']);

        $request['materia_nombre'] = $materia->nombre;
        $request['materia_color'] = $materia->color;
        $request['user_id'] = $user->id;
        $request['hora_final'] = $request['hora_inicial'] + $request['duracion'];
        $horario = Horario::create($request->all());

        return redirect()->route('horario.index')
        ->with('success', 'Horario agregado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(Horario $horario)
    {
        $user = Auth::user();
        $materias = Materia::where('user_id', $user->id)->paginate();

        $listas = Lista::where('user_id', $user->id)->paginate();

        return view('horario.edit', compact('horario','listas', 'materias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horario $horario)
    {
        request()->validate(Horario::$rules);
        $request['hora_final'] = $request['hora_inicial'] + $request['duracion'];

        $horario->update($request->all());

        return redirect()->route('horario.index')
            ->with('success', 'Horario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horario = Horario::find($id)->delete();

        return redirect()->route('horario.index')
            ->with('success', 'Horario eliminado exitosamente');
    }
}
