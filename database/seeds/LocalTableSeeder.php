<?php

use Illuminate\Database\Seeder;

class LocalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('local')->insert([
        	'nombre' => 'Guaribe',
            'estado' => 'Activo'
        ]);

        \DB::table('local')->insert([
        	'nombre' => 'El Valle',
            'estado' => 'Inactivo'
        ]);
    }
}
