<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payeer = '123456';
        User::create([
            'username' => 'Administrador',
            'payeer' => $payeer,
            'email' => 'admin@gmail.com',
            'password' => Hash::make($payeer),
            'rol' => 'admin'
        ]);

        $payeer = '1'; 
        User::create([
            'username' => 'Eduardo Ruiz',
            'payeer' => $payeer,
            'email' => 'eruiz2706@gmail.com',
            'password' => Hash::make($payeer),
            'rol' => 'cliente'
        ]);
    }
}
