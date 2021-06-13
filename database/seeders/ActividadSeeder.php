<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actividad;
use League\CommonMark\Cursor;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $actividad = new Actividad();

        $actividad->nombre = "Zumba";
        $actividad->descripcion = "Bailar";
        $actividad->aforo = 15;
        
        $actividad->save();

        $actividad2 = new Actividad();

        $actividad2->nombre = "Crossfit";
        $actividad2->descripcion = "Mezcla de ejercicios";
        $actividad2->aforo = 10;
        
        $actividad2->save();

        $actividad3 = new Actividad();

        $actividad3->nombre = "Boxeo";
        $actividad3->descripcion = "La gente se pelea";
        $actividad3->aforo = 20;
        
        $actividad3->save();

        $actividad4 = new Actividad();

        $actividad4->nombre = "Karate";
        $actividad4->descripcion = "Arte marcial";
        $actividad4->aforo = 20;
        
        $actividad4->save();

        $actividad5 = new Actividad();

        $actividad5->nombre = "Aerobic";
        $actividad5->descripcion = "Un tipo de gimnasia";
        $actividad5->aforo = 25;
        
        $actividad5->save();

        $actividad5 = new Actividad();

        $actividad5->nombre = "Ciclo";
        $actividad5->descripcion = "Cardio en una bicicleta estática";
        $actividad5->aforo = 25;
        
        $actividad5->save();
    }
}
