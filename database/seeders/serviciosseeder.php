<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class serviciosseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('servicios')->insert([
            'nombre' => 'Corte de Cabello',
            'duracion' => 30,
            'precio' => 25.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('servicios')->insert([
            'nombre' => 'Coloración',
            'duracion' => 60,
            'precio' => 50.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('servicios')->insert([
            'nombre' => 'Peinado de Novia',
            'duracion' => 90,
            'precio' => 80.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('servicios')->insert([
            'nombre' => 'Tratamiento Capilar',
            'duracion' => 45,
            'precio' => 40.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('servicios')->insert([
            'nombre' => 'Alisado de Cabello',
            'duracion' => 120,
            'precio' => 100.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
