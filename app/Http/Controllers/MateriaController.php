<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Materia;
use App\Models\Lista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //
        $materias = Materia::where('user_id', $user->id)->paginate();

        $listas = Lista::where('user_id', $user->id)->paginate();

        return view('materia.index', compact('materias','listas'))
            ->with('i', (request()->input('page', 1) - 1) * $materias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        $listas = Lista::where('user_id', $user->id)->paginate();
        $materia = new Materia();

        return view('materia.create', compact('materia','listas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Materia::$rules);

        $user = Auth::user();

        $request['user_id'] = $user->id;

        //horas total de clase
        $request['horas_total_clase'] = $request['horas'] * 16;
        //horas total de la materia
        $request['horas_total'] = $request['creditos'] * 48;
        //horas en total que tiene que dedicar a la materia independiente
        $request['horas_dedicar_total'] = $request['horas_total'] - $request['horas_total_clase'];
        //Horas semanales que debe dedicar independiente a la materia
        $request['horas_dedicar_semana'] = $request['horas_dedicar_total'] / 16;
        //Horas pendiente que debe dedicar a la materia
        $request['horas_pendientes_total'] = $request['horas_dedicar_total'];
        // Horas que debe dedicar a la semana
        $request['horas_pendientes'] = $request['horas_dedicar_semana'];
        //Horas que ya le dedico
        $request['horas_ejecutadas'] = 0;
        //Horas registradas en el horario
        $request['horas_registradas'] = 0;

        Materia::create($request->all());

        return redirect()->route('materias.index')
            ->with('success', 'Materia creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = Auth::user();
        $listas = Lista::where('user_id', $user->id)->paginate();
        $materia = Materia::find($id);

        return view('materia.show', compact('materia','listas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $listas = Lista::where('user_id', $user->id)->paginate();
        $materia = Materia::find($id);

        return view('materia.edit', compact('materia','listas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
        //
        request()->validate(Materia::$rules);

        $resultado = Actividad::where('materia_id', $materia->id)->get();
        $totalejecutada = 0;
        if ($resultado) {
            foreach ($resultado as $value) {
                $totalejecutada += $value->horas;

            }
        }

        //horas total de clase
        $request['horas_total_clase'] = $request['horas'] * 16;
        //horas total de la materia
        $request['horas_total'] = $request['creditos'] * 48;
        //horas en total que tiene que dedicar a la materia independiente
        $request['horas_dedicar_total'] = $request['horas_total'] - $request['horas_total_clase'];
        //Horas semanales que debe dedicar independiente a la materia
        $request['horas_dedicar_semana'] = $request['horas_dedicar_total'] / 16;
        //Horas pendiente que debe dedicar a la materia
        $request['horas_pendientes_total'] = $request['horas_dedicar_total'] - $totalejecutada;
        // Horas que debe dedicar a la semana
        $request['horas_pendientes'] = $request['horas_dedicar_semana'];
        //Horas que ya le dedico
        $request['horas_ejecutadas'] = $totalejecutada;
        //Horas registradas en el horario
        $request['horas_registradas'] = 0;

        $materia->update($request->all());

        return redirect()->route('materias.index')
            ->with('success', 'Materia actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Materia::find($id)->delete();

        return redirect()->route('materias.index')
            ->with('success', 'Materia eliminada satisfactoriamente');
    }
}
