<?php

use Illuminate\Database\Seeder;

class PrestamosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('prestamos')->insert([
        	'id_solicitante' => 1,
        	'id_insumo' => 1,
            'fecha_prestamo' => '2020-02-01',
            'cantidad' => 10
        ]);
        \DB::table('prestamos')->insert([
        	'id_solicitante' => 2,
        	'id_insumo' => 1,
            'fecha_prestamo' => '2020-02-01',
            'cantidad' => 10
        ]);
        \DB::table('prestamos')->insert([
        	'id_solicitante' => 1,
        	'id_insumo' => 2,
            'fecha_prestamo' => '2020-02-04',
            'cantidad' => 10
        ]);
        \DB::table('prestamos')->insert([
        	'id_solicitante' => 4,
        	'id_insumo' => 2,
            'fecha_prestamo' => '2020-02-08',
            'cantidad' => 10
        ]);
        \DB::table('prestamos')->insert([
        	'id_solicitante' => 1,
        	'id_insumo' => 4,
        	'tipo' => 'Entregar',
            'fecha_prestamo' => '2020-02-04',
            'status' => 'No Aplica',
            'cantidad' => 10
        ]);
        \DB::table('prestamos')->insert([
        	'id_solicitante' => 2,
        	'id_insumo' => 4,
        	'tipo' => 'Entregar',
            'fecha_prestamo' => '2020-02-06',
            'status' => 'No Aplica',
            'cantidad' => 10
        ]);
        \DB::table('prestamos')->insert([
        	'id_solicitante' => 6,
        	'id_insumo' => 4,
        	'tipo' => 'Entregar',
            'fecha_prestamo' => '2020-02-01',
            'status' => 'No Aplica',
            'cantidad' => 10
        ]);
        \DB::table('prestamos')->insert([
        	'id_solicitante' => 5,
        	'id_insumo' => 2,
        	'tipo' => 'Entregar',
            'fecha_prestamo' => '2020-02-010',
            'status' => 'No Aplica',
            'cantidad' => 10
        ]);
    }
}
