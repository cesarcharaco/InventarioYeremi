<?php

use Illuminate\Database\Seeder;

class SansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('sans')->insert([
            'codigo' => 'SAN 1',
            'descripcion' => 'MOTO',
            'fecha_inicio' => '27-08-2023',
            'fecha_fin' => '09-06-2024',
            'modalidad' => 'QUINCENAL',
            'monto_total' => 1050,
            'monto_cuota'=> 25]);

        DB::table('sans')->insert(['codigo' => 'SAN 2','descripcion' => 'MOTO','fecha_inicio' => '03-09-2023','fecha_fin' => '16-06-2024','modalidad' => 'QUINCENAL','monto_total' => 1050,'monto_cuota'=> 25]);

        DB::table('sans')->insert(['codigo' => 'SAN 3','descripcion' => 'MOTO','fecha_inicio' => '15-10-2023','fecha_fin' => '28-07-2024','modalidad' => 'QUINCENAL','monto_total' => 1050,'monto_cuota'=> 25]);

        DB::table('sans')->insert(['codigo' => 'SAN 4','descripcion' => 'MOTO','fecha_inicio' => '29-10-2023','fecha_fin' => '11-08-2024','modalidad' => 'QUINCENAL','monto_total' => 1050,'monto_cuota'=> 25]);

        DB::table('sans')->insert(['codigo' => 'SAN 1','descripcion' => 'ELECTRODOMÉSTICOS','fecha_inicio' => '17-09-2023','fecha_fin' => '04-02-2024','modalidad' => 'SEMANAL','monto_total' => 550,'monto_cuota'=> 25]);
    }
}
