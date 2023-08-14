<?php

use Illuminate\Database\Seeder;

class InsumosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('insumos')->insert([
        	'producto' => 'Tambores',
        	'descripcion' => 'Metal, 200 lts',
        	'serial' => 'TB234',
        	'modelo' => 'XYZ',
        	'marca' => 'WESTER',
        	'id_gerencia' => 1,
        	'ubicacion' => 'Almacen nro 2',
        	'existencia' => 220,
        	'in_almacen' => 200,
        	'out_almacen' => 20,
        	'disponibles' => 220,
            'entregados' => 0,
        	'usados' => 0,
            'inservible' => 0

        ]);

        \DB::table('insumos')->insert([
        	'producto' => 'Tambores',
        	'descripcion' => 'Plástico, 200 lts',
        	'serial' => 'TB244',
        	'modelo' => 'XYZ',
        	'marca' => 'WESTER',
        	'id_gerencia' => 1,
        	'ubicacion' => 'Almacen nro 1',
        	'existencia' => 220,
        	'in_almacen' => 200,
        	'out_almacen' => 20,
        	'disponibles' => 220,
            'entregados' => 10,
        	'usados' => 0,
            'inservible' => 0

        ]);

        \DB::table('insumos')->insert([
        	'producto' => 'Palas',
        	'descripcion' => 'Metal',
        	'serial' => 'PL234',
        	'modelo' => 'PLTX',
        	'marca' => 'WESTER',
        	'id_gerencia' => 2,
        	'ubicacion' => 'Almacen nro 2',
        	'existencia' => 300,
        	'in_almacen' => 300,
        	'out_almacen' => 0,
        	'disponibles' => 300,
            'entregados' => 0,
        	'usados' => 0,
            'inservible' => 0

        ]);

        \DB::table('insumos')->insert([
        	'producto' => 'Carretilla',
        	'descripcion' => 'Capacidad 100 kgs.',
        	'serial' => 'CT234',
        	'modelo' => 'CT456',
        	'marca' => 'WESTER',
        	'id_gerencia' => 2,
        	'ubicacion' => 'Almacen nro 2',
        	'existencia' => 200,
        	'in_almacen' => 200,
        	'out_almacen' => 0,
        	'disponibles' => 200,
            'entregados' => 20,
        	'usados' => 0,
            'inservible' => 0

        ]);
    }
}
