<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarroRequest;
use App\Http\Requests\UpdateCarroRequest;
use App\Models\Carro;
use Illuminate\Http\JsonResponse;

class CarroController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Carro::query()->latest()->get());
    }

    public function store(StoreCarroRequest $request): JsonResponse
    {
        $carro = Carro::create($request->validated());

        return response()->json($carro, 201);
    }

    public function show(Carro $carro): JsonResponse
    {
        return response()->json($carro);
    }

    public function update(UpdateCarroRequest $request, Carro $carro): JsonResponse
    {
        $carro->update($request->validated());

        return response()->json($carro);
    }

    public function destroy(Carro $carro): JsonResponse
    {
        $carro->delete();

        return response()->json(['message' => 'Carro removido com sucesso']);
    }
}
