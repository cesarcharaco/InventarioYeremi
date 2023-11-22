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
        	'producto' => 'Bujia',
        	'descripcion' => '200 cc NGK',
        	'serial' => '101'
        ]);
        \DB::table('insumos_has_cantidades')->insert([
            'stock_min' => 100,
            'stock_max' => 150,
            'deposito' => 20,
            'local' => 25,
            'id_local' => 1,
            'id_insumo' => 1
        ]);

        \DB::table('insumos_has_cantidades')->insert([
            'stock_min' => 100,
            'stock_max' => 150,
            'deposito' => 20,
            'local' => 25,
            'id_local' => 2,
            'id_insumo' => 1
        ]);
        \DB::table('insumos')->insert([
            'producto' => 'Bateria',
            'descripcion' => 'XXX',
            'serial' => '102'

        ]);
        \DB::table('insumos_has_cantidades')->insert([
            'stock_min' => 100,
            'stock_max' => 150,
            'deposito' => 20,
            'local' => 25,
            'id_local' => 2,
            'id_insumo' => 2

        ]);
    }
}
