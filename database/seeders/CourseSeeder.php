<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::create(['name' => 'SEMINARIO DE REALIDAD NACIONAL II', 'description' => 'Curso de seminario de realidad nacional II']);
        Course::create(['name' => 'DESARROLLO DE APLICACIONES INTERACTIVAS II', 'description' => 'Curso de progra']);
        Course::create(['name' => 'MANIPULACIÓN DE AUDIO Y VIDEO', 'description' => 'Curso de edicion']);
        Course::create(['name' => 'LECTURA EN INGLÉS PARA INFORMÁTICA', 'description' => 'Curso de ingles']);
        Course::create(['name' => 'INGENIERÍA DE APLICACIONES INTERACTIVAS', 'description' => 'Curso de organizacion de proyectos']);
        Course::create(['name' => 'DISEÑO DE SITIOS WEB', 'description' => 'Curso de diseño']);
    }
}
