<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Event::create(['courses_id' => 1, 'categories_id' => 1, 'tags_id' => 1,'title' => 'Investigacion sobre petroleo', 'start' => '2024-06-30 09:00:00','end' => '2024-06-30 09:00:00', 'status' => 1, 'description' => 'Investigar sobre el consumo de petroleo en costa rica', 'image' => 'placeholder-image.webp','percentage' => 15]);
        Event::create(['courses_id' => 1, 'categories_id' => 1, 'tags_id' => 2,'title' => 'Proyecto salario minimo', 'start' => '2024-07-05 10:00:00','end' => '2024-07-05 10:00:00', 'status' => 1, 'description' => 'Recopilar informacion sobre el salario minimo', 'image' => 'placeholder-image.webp','percentage' => 15]);
        
        Event::create(['courses_id' => 2, 'categories_id' => 1, 'tags_id' => 1,'title' => 'Challenge 2', 'start' => '2024-06-30 13:00:00','end' => '2024-06-30 16:00:00', 'status' => 1, 'description' => 'Realizar un ejercicio de programacion utiliando laravel', 'image' => 'placeholder-image.webp','percentage' => 15]);
        Event::create(['courses_id' => 2, 'categories_id' => 1, 'tags_id' => 2,'title' => 'Entrega 2da parte proyecto', 'start' => '2024-07-06 10:00:00','end' => '2024-07-07 10:00:00', 'status' => 1, 'description' => 'Entrega final del proyecto', 'image' => 'placeholder-image.webp','percentage' => 15]);

        Event::create(['courses_id' => 3, 'categories_id' => 1, 'tags_id' => 1,'title' => 'Practica Stop Motion', 'start' => '2024-07-02 09:00:00','end' => '2024-07-02 09:00:00', 'status' => 1, 'description' => 'Video stop motion de 30 segundos', 'image' => 'placeholder-image.webp','percentage' => 15]);
        Event::create(['courses_id' => 3, 'categories_id' => 1, 'tags_id' => 2,'title' => 'Grabacion en el estudio', 'start' => '2024-07-02 14:00:00','end' => '2024-07-02 19:00:00', 'status' => 1, 'description' => 'Grabacion de material para edicion', 'image' => 'placeholder-image.webp','percentage' => 15]);

        Event::create(['courses_id' => 4, 'categories_id' => 1, 'tags_id' => 1,'title' => 'Listening Practice', 'start' => '2024-07-09 09:00:00','end' => '2024-07-09 10:00:00', 'status' => 1, 'description' => 'Practica de listening', 'image' => 'placeholder-image.webp','percentage' => 15]);
        Event::create(['courses_id' => 4, 'categories_id' => 1, 'tags_id' => 2,'title' => 'Reading practice', 'start' => '2024-07-09 15:00:00','end' => '2024-07-09 16:00:00', 'status' => 1, 'description' => 'practica de reading', 'image' => 'placeholder-image.webp','percentage' => 15]);

        Event::create(['courses_id' => 5, 'categories_id' => 1, 'tags_id' => 1,'title' => 'Practica scrum', 'start' => '2024-07-10 08:30:00','end' => '2024-07-10 10:30:00', 'status' => 1, 'description' => 'Practica utilizando los fundamentos de scrum', 'image' => 'placeholder-image.webp','percentage' => 15]);
        Event::create(['courses_id' => 5, 'categories_id' => 1, 'tags_id' => 2,'title' => 'Testing usando selenium', 'start' => '2024-07-11 09:00:00','end' => '2024-07-11 11:00:00', 'status' => 1, 'description' => 'Realizar pruebas a una pagina usando selenium', 'image' => 'placeholder-image.webp','percentage' => 15]);

        Event::create(['courses_id' => 6, 'categories_id' => 1, 'tags_id' => 1,'title' => 'Practica cards', 'start' => '2024-07-10 14:00:00','end' => '2024-07-10 16:00:00', 'status' => 1, 'description' => 'Crear cards con lo aprendido en clase', 'image' => 'placeholder-image.webp','percentage' => 15]);
        Event::create(['courses_id' => 6, 'categories_id' => 1, 'tags_id' => 2,'title' => 'Practica landing', 'start' => '2024-07-15 09:00:00','end' => '2024-07-15 12:00:00', 'status' => 1, 'description' => 'Diseño de un landing page', 'image' => 'placeholder-image.webp','percentage' => 15]);

        Event::create(['courses_id' => 7, 'categories_id' => 1, 'tags_id' => 1,'title' => 'Practica registro de estudiantes', 'start' => '2024-07-11 08:00:00','end' => '2024-07-11 11:30:00', 'status' => 1, 'description' => 'Crear una interfaz para registrar estudiantes usando Java', 'image' => 'placeholder-image.webp','percentage' => 15]);
        Event::create(['courses_id' => 7, 'categories_id' => 1, 'tags_id' => 2,'title' => 'Examen final', 'start' => '2024-07-15 13:00:00','end' => '2024-07-15 16:50:00', 'status' => 1, 'description' => 'Examen final del curso, las intrucciones se entregaran al momento del examen', 'image' => 'placeholder-image.webp','percentage' => 15]);

        Event::create(['courses_id' => 8, 'categories_id' => 1, 'tags_id' => 1,'title' => 'Clase posicionamiento de elementos', 'start' => '2024-07-16 15:00:00','end' => '2024-07-16 19:00:00', 'status' => 1, 'description' => 'Clase sobre colocamiento de elementos en una pagina web', 'image' => 'placeholder-image.webp','percentage' => 15]);
        Event::create(['courses_id' => 8, 'categories_id' => 1, 'tags_id' => 2,'title' => 'Proyecto creacion de una aplicacion movil', 'start' => '2024-07-02 09:00:00','end' => '2024-07-08 09:00:00', 'status' => 1, 'description' => 'Crear el diseño de una aplicacion movil', 'image' => 'placeholder-image.webp','percentage' => 15]);

        Event::create(['courses_id' => 9, 'categories_id' => 1, 'tags_id' => 1,'title' => 'Clase MySql', 'start' => '2024-07-17 8:00:00','end' => '2024-07-17 11:50:00', 'status' => 1, 'description' => 'Clase en la que se hablar sobre que es MySql, sus usos y como instalarlo', 'image' => 'placeholder-image.webp','percentage' => 15]);
        Event::create(['courses_id' => 9, 'categories_id' => 1, 'tags_id' => 2,'title' => 'Proyecto final', 'start' => '2024-07-23 09:00:00','end' => '2024-07-27 09:00:00', 'status' => 1, 'description' => 'Crear una base de datos para el registro de partidos', 'image' => 'placeholder-image.webp','percentage' => 15]);

        Event::create(['courses_id' => 10, 'categories_id' => 1, 'tags_id' => 1,'title' => 'Dibujo de manos en 3 posiciones', 'start' => '2024-07-03 09:00:00','end' => '2024-07-04 09:00:00', 'status' => 1, 'description' => 'Dibujar manos', 'image' => 'placeholder-image.webp','percentage' => 15]);
        Event::create(['courses_id' => 10, 'categories_id' => 1, 'tags_id' => 2,'title' => 'Dibujo OC', 'start' => '2024-07-05 07:30:00','end' => '2024-07-05 10:30:00', 'status' => 1, 'description' => 'Dibujo de un personaje original', 'image' => 'placeholder-image.webp','percentage' => 15]);

    }
}
