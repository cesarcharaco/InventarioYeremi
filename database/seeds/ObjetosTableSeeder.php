<?php

use Illuminate\Database\Seeder;

class ObjetosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objetos')->insert([['objeto' => 'MOTO BERA SBR 2023'],['objeto' => 'AIRE ACONDICIONADO 12.000 VTU'],['objeto' => 'COCINA 8 HORNILLAS CON HORNO'],['objeto' => 'LAVADORA 7 KG'],['objeto' => 'LAVADORA 12 KG'],['objeto' => 'MOTO BERA SBR 2023'],['objeto' => 'PERCO DE 60 KG']]);
    }
}
