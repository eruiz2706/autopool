<?php

use Illuminate\Database\Seeder;
use App\Models\Pool;

class PoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pool::create([
            'valor' => 100,
            'color' => 'primary',
            'cantidad_pool' => 3,
            'id_pool' => 2,
            'secuencia_pool' => 1,
            'secuencia_retiro' => 4
        ]);

        Pool::create([
            'valor' => 200,
            'color' => 'success',
            'cantidad_pool' => 3,
            'id_pool' => 2,
            'secuencia_pool' => 1,
            'secuencia_retiro' => 4
        ]);

        Pool::create([
            'valor' => 500,
            'color' => 'info',
            'cantidad_pool' => 3,
            'id_pool' => 2,
            'secuencia_pool' => 1,
            'secuencia_retiro' => 4
        ]);

        Pool::create([
            'valor' => 1200,
            'color' => 'warning',
            'cantidad_pool' => 3,
            'id_pool' => 2,
            'secuencia_pool' => 1,
            'secuencia_retiro' => 4
        ]);

        Pool::create([
            'valor' => 3000,
            'color' => 'primary',
            'cantidad_pool' => 3,
            'id_pool' => 2,
            'secuencia_pool' => 1,
            'secuencia_retiro' => 4
        ]);

        Pool::create([
            'valor' => 8000,
            'color' => 'success',
            'cantidad_pool' => 3,
            'id_pool' => 2,
            'secuencia_pool' => 1,
            'secuencia_retiro' => 4
        ]);

        Pool::create([
            'valor' => 20000,
            'color' => 'info',
            'cantidad_pool' => 3,
            'id_pool' => 2,
            'secuencia_pool' => 1,
            'secuencia_retiro' => 4
        ]);
    }
}
