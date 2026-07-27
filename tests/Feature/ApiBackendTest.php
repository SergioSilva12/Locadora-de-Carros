<?php

namespace Tests\Feature;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ApiBackendTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_returns_a_jwt_token_for_valid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'teste@example.com',
            'password' => Hash::make('senha123'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'senha123',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['token']);
    }

    public function test_cliente_crud_endpoints_work_with_jwt_authentication(): void
    {
        $user = User::factory()->create();
        $token = auth('api')->login($user);

        $listResponse = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->getJson('/api/v1/cliente');

        $listResponse->assertStatus(200)
            ->assertJson([]);

        $storeResponse = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->postJson('/api/v1/cliente', ['nome' => 'Maria']);

        $storeResponse->assertStatus(201)
            ->assertJsonPath('nome', 'Maria');

        $this->assertDatabaseHas('clientes', ['nome' => 'Maria']);

        $cliente = Cliente::query()->where('nome', 'Maria')->firstOrFail();

        $showResponse = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->getJson('/api/v1/cliente/' . $cliente->id);

        $showResponse->assertStatus(200)
            ->assertJsonPath('nome', 'Maria');
    }
}
