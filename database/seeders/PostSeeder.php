<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = Post::create([
            'title' => 'Macro Para Dibujar En AutoCAD – Bloques',
            'resumen' => 'Crear una macro para insertar, girar y escalar un bloque ya previamente creado en su espacio de trabajo de AutoCAD es bastante fácil. ',
            'post_template' => 'macro-autocad-bloques',
            'slug' => 'macro-para-dibujar-en-autocad-bloques',
            'user_id' => 1,
        ]);
        $post->addMedia('public/images/articulos/Control-VBA-BLOQUES.png')
            ->preservingOriginal()
            ->toMediaCollection('images');

        $post = Post::create([
            'title' => 'Macro Para Iniciar Un Dibujo En AutoCAD',
            'resumen' => 'Crear una macro en Excel para llevar tus datos a AutoCAD y poder dibujarlos con un solo clic es posible. ',
            'post_template' => 'macro-iniciar-autocad',
            'slug' => 'macro-para-iniciar-un-dibujo-en-autocad',
            'user_id' => 1,
        ]);
        $post->addMedia('public/images/articulos/PORTADA-ART-INICIO.jpg')
            ->preservingOriginal()
            ->toMediaCollection('images');

        $post = Post::create([
            'title' => 'Macro Excel Para Dibujar En AutoCAD – Círculos',
            'resumen' => 'En esta ocasión les mostraremos como dibujar círculos a través de una macro en Excel.',
            'post_template' => 'macro-autocad-circulos',
            'slug' => 'macro-excel-para-dibujar-en-autocad-circulos',
            'user_id' => 1,
        ]);
        $post->addMedia('public/images/articulos/circulo.jpg')
            ->preservingOriginal()
            ->toMediaCollection('images');

        $post = Post::create([
            'title' => 'Macro Excel Para Dibujar En AutoCAD – Hatch',
            'resumen' => 'Veremos como colocar uno o varios HATCH en nuestros proyectos de AutoCAD a través de EXCEL con la ayuda de macros.',
            'post_template' => 'macro-autocad-hatch',
            'slug' => 'macro-excel-para-dibujar-en-autocad-hatch',
            'user_id' => 1,
        ]);
        $post->addMedia('public/images/articulos/Hatch.png')
            ->preservingOriginal()
            ->toMediaCollection('images');
    }
}
