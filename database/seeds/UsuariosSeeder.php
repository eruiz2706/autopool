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

        $payeer = '2'; 
        User::create([
            'username' => 'Usuario '.$payeer,
            'payeer' => $payeer,
            'email' => "usuario$payeer@gmail.com",
            'password' => Hash::make($payeer),
            'rol' => 'cliente',
            'referido_id' => 2
        ]);

        $payeer = '3'; 
        User::create([
            'username' => 'Usuario '.$payeer,
            'payeer' => $payeer,
            'email' => "usuario$payeer@gmail.com",
            'password' => Hash::make($payeer),
            'rol' => 'cliente',
            'referido_id' => 3
        ]);

        $payeer = '4'; 
        User::create([
            'username' => 'Usuario '.$payeer,
            'payeer' => $payeer,
            'email' => "usuario$payeer@gmail.com",
            'password' => Hash::make($payeer),
            'rol' => 'cliente',
            'referido_id' => 4
        ]);

        $payeer = '5'; 
        User::create([
            'username' => 'Usuario '.$payeer,
            'payeer' => $payeer,
            'email' => "usuario$payeer@gmail.com",
            'password' => Hash::make($payeer),
            'rol' => 'cliente',
            'referido_id' => 5
        ]);

        $payeer = '6'; 
        User::create([
            'username' => 'Usuario '.$payeer,
            'payeer' => $payeer,
            'email' => "usuario$payeer@gmail.com",
            'password' => Hash::make($payeer),
            'rol' => 'cliente',
            'referido_id' => 6
        ]);
    }
}
