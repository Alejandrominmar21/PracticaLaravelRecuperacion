<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actividad;
use App\Models\Tramo;

class TramoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tramo = new Tramo();

        $tramo->dia = "Lunes";
        $tramo->horainicio = "19:00";
        $tramo->horafin = "19:30";
        $tramo->actividad_id = 1;
        
        $tramo->save();

        $tramo2 = new Tramo();

        $tramo2->dia = "Martes";
        $tramo2->horainicio = "14:00";
        $tramo2->horafin = "14:30";
        $tramo2->actividad_id = 1;
        
        $tramo2->save();

        $tramo3 = new Tramo();

        $tramo3->dia = "Jueves";
        $tramo3->horainicio = "15:00";
        $tramo3->horafin = "15:30";
        $tramo3->actividad_id = 2;
        
        $tramo3->save();

        $tramo4 = new Tramo();

        $tramo4->dia = "Viernes";
        $tramo4->horainicio = "12:00";
        $tramo4->horafin = "13:30";
        $tramo4->actividad_id = 2;
        
        $tramo4->save();
    }
}
