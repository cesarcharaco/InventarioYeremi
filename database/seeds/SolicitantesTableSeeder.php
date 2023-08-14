<?php

use Illuminate\Database\Seeder;

class SolicitantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('solicitantes')->insert([
        	'nombres' => 'Martin Garrido',
        	'rut' => '12345667',
        	'email' => 'martingarrigo@licancabur.cl',
        	'telefono' => '829792379273'
        ]);

        \DB::table('solicitantes')->insert([
        	'nombres' => 'Jose Albornoz',
        	'rut' => '12345699',
        	'email' => 'josealbornoz@licancabur.cl',
        	'telefono' => '934938934839'
        ]);

        \DB::table('solicitantes')->insert([
        	'nombres' => 'Carlos Villagrand',
        	'rut' => '12345333',
        	'email' => 'carlosvillagrand@licancabur.cl',
        	'telefono' => '837273827382'
        ]);

        \DB::table('solicitantes')->insert([
        	'nombres' => 'Brayan Oconner',
        	'rut' => '12347777',
        	'email' => 'brayanoconner@licancabur.cl',
        	'telefono' => '283782738233'
        ]);

        \DB::table('solicitantes')->insert([
        	'nombres' => 'Tony Stark',
        	'rut' => '123438383',
        	'email' => 'tonystark@licancabur.cl',
        	'telefono' => '923829832933'
        ]);

        \DB::table('solicitantes')->insert([
        	'nombres' => 'Bruce Wayne',
        	'rut' => '123433222',
        	'email' => 'brucewayne@licancabur.cl',
        	'telefono' => '212121323233'
        ]);
    }
}
