<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Deposito;

class DepositosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Deposito::create([
            'monto' => '1500',
            'idconfirmacion' => '546546asdsd54',
            'id_user' => '1'
        ]);

        Deposito::create([
            'monto' => '100',
            'idconfirmacion' => '96588sd65456a',
            'id_user' => '1'
        ]);

        Deposito::create([
            'monto' => '3500',
            'idconfirmacion' => '748545adree6545',
            'id_user' => '0'
        ]);
    }
}
 