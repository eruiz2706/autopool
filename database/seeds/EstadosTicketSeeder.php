<?php

use Illuminate\Database\Seeder;
use App\Models\EstadosTicket;

class EstadosTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadosTicket::create([
            'codigo' => 'PE',
            'descripcion' => 'pending',
            'color' => 'info'
        ]);

        EstadosTicket::create([
            'codigo' => 'PR',
            'descripcion' => 'in progress',
            'color' => 'warning'
        ]);

        EstadosTicket::create([
            'codigo' => 'CL',
            'descripcion' => 'closed',
            'color' => 'danger'
        ]);

        
    }
}
