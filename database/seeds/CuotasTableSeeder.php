<?php

use Illuminate\Database\Seeder;

class CuotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$fechaInicio=strtotime("2023-10-29");
		$fechaFin=strtotime("2023-11-26");
		//Recorro las fechas y con la función strotime obtengo los lunes
		for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
		    //Sacar el dia de la semana con el modificador N de la funcion date
		    $dia = date('N', $i);
		    if($dia==7){
		        echo "Domingo. ". date ("Y-m-d", $i)."<br>";
		    }
		}
        /*DB::table('objetos')->insert([['objeto' => 'MOTO BERA SBR 2023'],['objeto' => 'AIRE ACONDICIONADO 12.000 VTU'],['objeto' => 'COCINA 8 HORNILLAS CON HORNO'],['objeto' => 'LAVADORA 7 KG'],['objeto' => 'LAVADORA 12 KG'],['objeto' => 'MOTO BERA SBR 2023'],['objeto' => 'PERCO DE 60 KG']]);*/
    }
}
