<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $storeUserRequest): \Illuminate\Http\JsonResponse
    {

        $data = $storeUserRequest->validated();
        $user = new User();
        $user->cpf = $data['cpf'];
        $user->nome = $data['nome'];
        $user->data_nascimento = $data['data_nascimento'];
        $user->save();
        return response()->json(data: [
            'message' => "Usuário criado com sucesso!"
        ], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): \Illuminate\Http\JsonResponse
    {
        return response()->json(data: [$user], status: 200);
    }
}
