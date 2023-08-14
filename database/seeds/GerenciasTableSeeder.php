<?php

use Illuminate\Database\Seeder;

class GerenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('gerencias')->insert([
            'gerencia' => 'NPI'
        ]);
        \DB::table('gerencias')->insert([
            'gerencia' => 'CHO'
        ]);


        \DB::table('areas')->insert([
            'id_gerencia' => 1,
        	'area' => 'EWS'
        ]);

        \DB::table('areas')->insert([
            'id_gerencia' => 1,
            'area' => 'Planta Cero/Desaladora & Acueducto'
        ]);

        \DB::table('areas')->insert([
            'id_gerencia' => 1,
            'area' => 'Agua y Tranque'
        ]);

        \DB::table('areas')->insert([
            'id_gerencia' => 2,
            'area' => 'Filtro-Puerto'
        ]);

        \DB::table('areas')->insert([
            'id_gerencia' => 2,
            'area' => 'ECT'
        ]);

        \DB::table('areas')->insert([
            'id_gerencia' => 2,
            'area' => 'Los Colorados'
        ]);
    }
}
