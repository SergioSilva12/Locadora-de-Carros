<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Http\Requests\MarcaRequest;
use App\Repositories\MarcaRepository;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Marca::all();
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
    public function store(MarcaRequest $request)
    {
        $dados = $request->validated();

        if ($request->hasFile('imagem')) {
            $dados['imagem'] = $request->file('imagem')->store('imagens', 'public');
        }

        $marca = Marca::create($dados);

        return response()->json($marca, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        $marca = Marca::find(1);
        $marca->load('modelo');
         //ou usar so Marca
        return $marca;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarcaRequest $request, Marca $marca)
    {
        $dados = $request->validated();

        if ($request->hasFile('imagem')) {
            $dados['imagem'] = $request->file('imagem')->store('imagens', 'public');
        }

        $marca->update($dados);

        return $marca;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        if ($marca->imagem) {
            Storage::disk('public')->delete($marca->imagem);
        }
        $marca->delete();
        return 'marca removida com sucesso';
    }
}
