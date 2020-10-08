<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuariosSeeder::class);
        $this->call(EstadosTicketSeeder::class);
        $this->call(DepositosTableSeeder::class);
        $this->call(PoolSeeder::class);

    }
}
