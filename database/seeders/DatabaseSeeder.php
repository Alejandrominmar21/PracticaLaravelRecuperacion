<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();

        $usuario->name = "Alejandro";
        $usuario->email = "Alejandro@gmail.com";
        $usuario->password = Hash::make("Pruebaprueba");
        
        $usuario->save();

        $usuario2 = new User();

        $usuario2->name = "Antonio";
        $usuario2->email = "Antoniop@gmail.com";
        $usuario2->password = Hash::make("Pruebaprueba");
        
        $usuario2->save();

        $usuario3 = new User();

        $usuario3->name = "Pablo";
        $usuario3->email = "Pablo@gmail.com";
        $usuario3->password = Hash::make("Pruebaprueba");
        
        $usuario3->save();

        $usuario4 = new User();

        $usuario4->name = "admin";
        $usuario4->email = "admin@gmail.com";
        $usuario4->password = Hash::make("Pruebaprueba");
        
        $usuario4->save();

        $usuario5 = new User();

        $usuario5->name = "paco";
        $usuario5->email = "paco@gmail.com";
        $usuario5->password = Hash::make("Pruebaprueba");
        
        $usuario5->save();



        $this->call(ActividadSeeder::class);
        $this->call(TramoSeeder::class);
    }
}
