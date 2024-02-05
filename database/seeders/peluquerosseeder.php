<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class peluquerosseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('peluqueros')->insert([
            'nombre' => 'Juan',
            'apellidos' => 'Pérez Gómez',
            'especialidad' => 'Corte de Cabello',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peluqueros')->insert([
            'nombre' => 'María',
            'apellidos' => 'García López',
            'especialidad' => 'Coloración',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peluqueros')->insert([
            'nombre' => 'Carlos',
            'apellidos' => 'Rodríguez Martínez',
            'especialidad' => 'Peinados de Novia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
