<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPropiedadSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipos_propiedades')->insert([
            ['nombre' => 'Casa'],
            ['nombre' => 'Departamento'],
            ['nombre' => 'Terreno'],
            ['nombre' => 'Oficina'],
            ['nombre' => 'Cochera'],
            ['nombre' => 'Galpón'],
            ['nombre' => 'Local/Locales'],
        ]);
    }
}
