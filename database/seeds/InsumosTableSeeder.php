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
        	'serial' => '101',
        	'stock_min' => 100,
        	'stock_max' => 150,
        	'deposito' => 20,
        	'local' => 25,
            'id_local' => 1

        ]);

        
    }
}
