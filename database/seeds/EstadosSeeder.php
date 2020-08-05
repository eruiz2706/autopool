<?php

use Illuminate\Database\Seeder;
use App\Models\Estados;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estados::create([
            'tipo' => 'ticket',
            'codigo' => 'PE',
            'descripcion' => 'pending',
            'color' => 'info'
        ]);

        Estados::create([
            'tipo' => 'ticket',
            'codigo' => 'PR',
            'descripcion' => 'in progress',
            'color' => 'warning'
        ]);

        Estados::create([
            'tipo' => 'ticket',
            'codigo' => 'PR',
            'descripcion' => 'closed',
            'color' => 'danger'
        ]);

        
    }
}
