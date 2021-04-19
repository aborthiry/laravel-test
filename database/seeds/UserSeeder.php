<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            User::create([
                'nombre' => Str::random(20),
                'apellido' => Str::random(10),
                'email' => Str::random(15).'@gmail.com',
                'usuario' => Str::random(10),
            ]);
        }
    }
}
