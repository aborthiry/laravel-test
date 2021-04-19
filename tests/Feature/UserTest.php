<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class UserTest extends TestCase
{
    public function testUserIsCreatedSuccessfully()
    {

        $payload = [
            'nombre' => 'Test',
            'apellido'  => 'Test',
            'email'      => 'test@gmail.com',
            'usuario' => 'usertest'
        ];

        $this->json('POST', 'api/users', $payload, ['Accept' => 'application/json'])
            ->assertStatus(201);
    }

    public function testUserIsDestroyed()
    {

        $user =
            [
                'nombre' => 'Test',
                'apellido'  => 'Test',
                'email'      => 'test@gmail.com',
                'usuario' => 'usertest'
            ];
        $user = User::create($user);


        $this->json('delete', "api/users/$user->id")
            ->assertStatus(204);
    }

    public function testUpdateUserReturnsCorrectData()
    {
        $user = User::create(
            [
                'nombre' => 'Test',
                'apellido'  => 'Test',
                'email'      => 'test@gmail.com',
                'usuario' => 'usertest'
            ]
        );


        $payload = [
            'nombre' => 'Update Test',
            'apellido'  => 'Update Test',
        ];

        $this->json('PUT', "api/users/$user->id", $payload, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson(
                [
                    'id'         => $user->id,
                    'nombre' => 'Update Test',
                    'apellido'  => 'Update Test',
                    'email'      => $user->email,
                    'usuario' => $user->usuario
                ]
            );
    }


    public function testUserIsShownCorrectly()
    {
        $user = User::create(
            [
                'nombre' => 'Test',
                'apellido'  => 'Test',
                'email'      => 'test@gmail.com',
                'usuario' => 'usertest'
            ]
        );


        $this->json('get', "api/users/$user->id")
            ->assertStatus(200)
            ->assertJson(
                [
                    'id'         => $user->id,
                    'nombre' => $user->nombre,
                    'apellido'  => $user->apellido,
                    'email'      => $user->email,
                    'usuario' => $user->usuario
                ]
            );
    }

    public function testUserListedSuccessfully()
    {
        $this->json('GET', 'api/users')
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    '*' => [
                        'id',
                        'nombre',
                        'apellido',
                        'email',
                        'usuario',
                        'created_at',
                        'updated_at'
                    ]
                ]
            );
    }
}
