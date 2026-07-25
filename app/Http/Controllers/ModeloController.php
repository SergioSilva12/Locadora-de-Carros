<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModeloRequest;
use App\Models\Modelo;
use Illuminate\Support\Facades\Storage;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modelo = Modelo::all();
        return $modelo;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModeloRequest $request)
    {
        $dados = $request->validated();

        if ($request->hasFile('imagem')) {
            $dados['imagem'] = $request->file('imagem')->store('imagens/modelos', 'public');
        }

        $modelo = Modelo::create($dados);

        return response()->json($modelo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelo $modelo)
    {

        $modelo->load('marca'); //ou usar so Marca
        return $modelo;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelo $modelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModeloRequest $request, Modelo $modelo)
    {
        $dados = $request->validated();

        if ($request->hasFile('imagem')) {
            $dados['imagem'] = $request->file('imagem')->store('imagens/modelos', 'public');
        }

        $modelo->update($dados);

        return $modelo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelo $modelo)
    {
        if ($modelo->imagem) {
            Storage::disk('public')->delete($modelo->imagem);
        }
        $modelo->delete();
        return 'O modelo foi removido com sucesso';
    }
}
