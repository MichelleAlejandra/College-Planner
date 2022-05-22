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

        $horariosLunes = DB::select('SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Lunes\' ORDER BY hora_inicial');
        $horariosMartes = DB::select('SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Martes\' ORDER BY hora_inicial');
        $horariosMiercoles = DB::select('SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Miercoles\' ORDER BY hora_inicial');
        $horariosJueves = DB::select('SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Jueves\' ORDER BY hora_inicial');
        $horariosViernes = DB::select('SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Viernes\' ORDER BY hora_inicial');
        $horariosSabado = DB::select('SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Sabado\' ORDER BY hora_inicial');
        $horariosDomingo = DB::select('SELECT * FROM horarios WHERE user_id = ' . $id . ' AND dia_semana =  \'Domingo\' ORDER BY hora_inicial');

        return view(
            Config("constantes.horario_index"),
            compact(
                'materias',
                'listas',
                'horariosLunes',
                'horariosMartes',
                'horariosMiercoles',
                'horariosJueves',
                'horariosViernes',
                'horariosSabado',
                'horariosDomingo'
            )
        );
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
        $auxHoras = $materia->horas_registradas + $request['duracion'];

        if ($auxHoras > $materia->horas) {
            return redirect()->route('horario.create')
                ->with('error', 'La materia "' . $materia->nombre . '" solo tiene ' . $materia->horas .
                    ' horas semanales y ya se encuentran registradas ' . $materia->horas_registradas . ' horas');
        }

        $request['hora_final'] = $request['hora_inicial'] + $request['duracion'];
        $request['materia_nombre'] = $materia->nombre;
        $request['materia_color'] = $materia->color;
        $request['user_id'] = $user->id;

        $horasSeleccionadas = array();

        for ($i = $request['hora_inicial']; $i <= $request['hora_final']; $i++) {
            $horasSeleccionadas[] = $i;
        }

        $horarios = DB::select('SELECT * FROM horarios WHERE user_id = ' . $user->id . ' AND dia_semana = \'' . $request['dia_semana'] . '\'');

        foreach ($horarios as $h) {
            for ($i = $h->hora_inicial + 1; $i < $h->hora_final; $i++) {
                if (in_array($i, $horasSeleccionadas)) {
                    return redirect()->route('horario.create')
                        ->with('error', 'La materia "' . $h->materia_nombre . '" se encuentra dentro del horario seleccionado.');
                }
            }
        }
        $materia->horas_registradas = $auxHoras;
        $materia->save();
        $horario = Horario::create($request->all());

        return redirect()->route(Config("constantes.horario_index"))
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

        return view('horario.edit', compact('horario', 'listas', 'materias'));
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
        $user = Auth::user();
        $materia = Materia::find($request['materia_id']);
        request()->validate(Horario::$rules);

        $auxHoras = $materia->horas_registradas  - $horario->duracion + $request['duracion'];

        if ($auxHoras > $materia->horas) {
            return redirect()->route('horario.edit', $horario)
                ->with('error', 'La materia "' . $materia->nombre . '" solo tiene ' . $materia->horas .
                    ' horas semanales y ya se encuentran registradas ' . ($materia->horas_registradas  - $horario->duracion) . ' horas');
        }

        $request['hora_final'] = $request['hora_inicial'] + $request['duracion'];
        $request['materia_nombre'] = $materia->nombre;
        $request['materia_color'] = $materia->color;

        $horasSeleccionadas = array();

        for ($i = $request['hora_inicial']; $i <= $request['hora_final']; $i++) {
            $horasSeleccionadas[] = $i;
        }

        $horarios = DB::select('SELECT * FROM horarios WHERE user_id = ' . $user->id . ' AND dia_semana = \'' . $request['dia_semana'] . '\' AND NOT id = ' . $horario->id);

        foreach ($horarios as $h) {
            //              9               9 < 11
            for ($i = $h->hora_inicial + 1; $i < $h->hora_final; $i++) {
                if (in_array($i, $horasSeleccionadas)) {
                    return redirect()->route('horario.edit', $horario)
                        ->with('error', 'La materia "' . $h->materia_nombre . '" se encuentra dentro del horario seleccionado.');
                }
            }
        }
        $materia->horas_registradas = $auxHoras;
        $materia->save();
        $horario->update($request->all());

        return redirect()->route(Config("constantes.horario_index"))
            ->with('success', 'Horario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horario = Horario::find($id);
        $materia = Materia::find($horario->materia_id);

        $materia->horas_registradas = $materia->horas_registradas - $horario->duracion;

        $materia->save();
        $horario->delete();

        return redirect()->route(Config("constantes.horario_index"))
            ->with('success', 'Horario eliminado correctamente');
    }
}
