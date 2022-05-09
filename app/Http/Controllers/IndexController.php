<?php

namespace App\Http\Controllers;

use App\Models\Index;
use App\Models\Materia;
use App\Models\Lista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $materias = Materia::where('user_id', $user->id)->get();
        $totalCreditos = 0;
        $totalHorasEstudio = 0;
        $totalHorasEstudiadas = 0;
        $totalHorasPendientes = 0;
        $horasIndependiente = 0;

        if ($materias) {
            foreach ($materias as $value) {
                $totalCreditos += $value->creditos;
                $totalHorasEstudio += $value->horas_total;
                $totalHorasEstudiadas += $value->horas_ejecutadas;
                $totalHorasPendientes += $value->horas_pendientes_total;
                $horasIndependiente += $value->horas_dedicar_total;
            }
        }

        $listas = Lista::where('user_id', $user->id)->paginate();

        return view('Index.index', compact('listas'), compact('totalCreditos', 'totalHorasEstudio', 'totalHorasEstudiadas', 'totalHorasPendientes', 'horasIndependiente'))
        ->with('i', (request()->input('page', 1) - 1) * $listas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show(Index $index)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit(Index $index)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Index $index)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy(Index $index)
    {
        //
    }
}
