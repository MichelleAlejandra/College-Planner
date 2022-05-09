<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class TareaController
 * @package App\Http\Controllers
 */
class TareaController extends Controller
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

        $tareas = Tarea::where('lista_id', $id)->paginate();
        $listas = Lista::where('user_id', $user->id)->paginate();

        $lista = Lista::find($id);
        return view('tarea.index', compact('tareas', 'id', 'listas', 'lista'))
            ->with('i', (request()->input('page', 1) - 1) * $tareas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $tarea = new Tarea();
        $tarea->lista_id = $id;
        $user = Auth::user();
        $listas = Lista::where('user_id', $user->id)->paginate();
        $lista = Lista::find($id);

        return view('tarea.create', compact('tarea','listas', 'id', 'lista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();

        $request['user_id'] = $user->id;

        $tarea = Tarea::create($request->all());

        $user = Auth::user();
        $listas = Lista::where('user_id', $user->id)->paginate();

        $id = $tarea->lista_id;

        return redirect()->route('tareas.index', compact('id', 'listas'))
            ->with('success', 'Tarea creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea = Tarea::find($id);

        $user = Auth::user();
        $listas = Lista::where('user_id', $user->id)->paginate();

        $id = $tarea->lista_id;
        return view('tarea.show', compact('tarea', 'listas', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);

        $user = Auth::user();
        $listas = Lista::where('user_id', $user->id)->paginate();

        $id = $tarea->lista_id;

        return view('tarea.edit', compact('tarea', 'listas','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tarea $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        request()->validate(Tarea::$rules);

        $tarea->update($request->all());

        $user = Auth::user();
        $listas = Lista::where('user_id', $user->id)->paginate();

        $id = $tarea->lista_id;

        return redirect()->route('tareas.index', compact('listas','id'))
            ->with('success', 'Tarea updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tarea = Tarea::find($id);

        $id = $tarea->lista_id;

        $tarea->delete();

        $user = Auth::user();
        $listas = Lista::where('user_id', $user->id)->paginate();



        return redirect()->route('tareas.index', compact('listas','id'))
            ->with('success', 'Tarea eliminado satisfactoriamente');
    }
}
