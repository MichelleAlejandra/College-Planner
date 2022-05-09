<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ListaController
 * @package App\Http\Controllers
 */
class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        $listas = Lista::where('user_id', $user->id)->paginate();

        return view('lista.index', compact('listas'))
            ->with('i', (request()->input('page', 1) - 1) * $listas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $listas = Lista::where('user_id', $user->id)->paginate();
        $lista = new Lista();
        return view('lista.create', compact('lista','listas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Lista::$rules);

        $user = Auth::user();

        $request['user_id'] = $user->id;

        $lista = Lista::create($request->all());

        return redirect()->route('listas.index')
            ->with('success', 'Lista creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lista = Lista::find($id);
        $user = Auth::user();

        $listas = Lista::where('user_id', $user->id)->paginate();

        return view('lista.show', compact('lista','listas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lista = Lista::find($id);
        $user = Auth::user();

        $listas = Lista::where('user_id', $user->id)->paginate();

        return view('lista.edit', compact('lista','listas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lista $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lista $lista)
    {
        request()->validate(Lista::$rules);

        $lista->update($request->all());

        return redirect()->route('listas.index')
            ->with('success', 'Lista updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lista = Lista::find($id)->delete();

        return redirect()->route('listas.index')
            ->with('success', 'Lista eliminado satisfactoriamente');
    }
}
