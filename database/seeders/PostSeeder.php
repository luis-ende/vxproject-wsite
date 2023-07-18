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
            'title' => 'Descargas',
            'resumen' => 'En este apartado podrás descargar la información que trabajamos en los videos tutoriales.',
            'post_template' => 'descargas',
            'slug' => 'descargas',
            'seo_keywords' => 'torres de telecomunicación,ingeniería estructural,tutoriales,descargas',
            'user_id' => 1,
            'secuencia' => 0,
        ]);
        $post->addMedia('public/images/articulos/DESCARGAS-VX.jpg')
            ->preservingOriginal()
            ->toMediaCollection('images');

        $post = Post::create([
            'title' => 'Macro para dibujar en AutoCAD – Bloques',
            'resumen' => 'Crear una macro para insertar, girar y escalar un bloque ya previamente creado en su espacio de trabajo de AutoCAD es bastante fácil. ',
            'post_template' => 'macro-autocad-bloques',
            'slug' => 'macro-para-dibujar-en-autocad-bloques',
            'seo_keywords' => 'torres de telecomunicación,ingeniería estructural,dibujo autocad,bloques',
            'user_id' => 1,
            'secuencia' => 2,
        ]);
        $post->addMedia('public/images/articulos/Control-VBA-BLOQUES.png')
            ->preservingOriginal()
            ->toMediaCollection('images');

        $post = Post::create([
            'title' => 'Macro para iniciar un dibujo en AutoCAD',
            'resumen' => 'Crear una macro en Excel para llevar tus datos a AutoCAD y poder dibujarlos con un solo clic es posible. ',
            'post_template' => 'macro-iniciar-autocad',
            'slug' => 'macro-para-iniciar-un-dibujo-en-autocad',
            'seo_keywords' => 'torres de telecomunicación,ingeniería estructural,dibujo autocad,macro excel',
            'user_id' => 1,
            'secuencia' => 4,
        ]);
        $post->addMedia('public/images/articulos/PORTADA-ART-INICIO.jpg')
            ->preservingOriginal()
            ->toMediaCollection('images');

        $post = Post::create([
            'title' => 'Macro Excel para dibujar en AutoCAD – Círculos',
            'resumen' => 'En esta ocasión les mostraremos como dibujar círculos a través de una macro en Excel.',
            'post_template' => 'macro-autocad-circulos',
            'slug' => 'macro-excel-para-dibujar-en-autocad-circulos',
            'seo_keywords' => 'torres de telecomunicación,ingeniería estructural,dibujo autocad,círculos',
            'user_id' => 1,
            'secuencia' => 3,
        ]);
        $post->addMedia('public/images/articulos/circulo.jpg')
            ->preservingOriginal()
            ->toMediaCollection('images');

        $post = Post::create([
            'title' => 'Macro Excel para dibujar en AutoCAD – Hatch',
            'resumen' => 'Veremos como colocar uno o varios HATCH en nuestros proyectos de AutoCAD a través de EXCEL con la ayuda de macros.',
            'post_template' => 'macro-autocad-hatch',
            'slug' => 'macro-excel-para-dibujar-en-autocad-hatch',
            'seo_keywords' => 'torres de telecomunicación,ingeniería estructural,dibujo autocad,hatch',
            'user_id' => 1,
            'secuencia' => 1,
        ]);
        $post->addMedia('public/images/articulos/Hatch.png')
            ->preservingOriginal()
            ->toMediaCollection('images');

        $post = Post::create([
            'title' => 'Pre diseño de cimentación de radiobase en suelo/roca - Field',
            'resumen' => 'FIELD es una herramienta que recopila información de diseños de torres y cimentaciones de telecomunicaciones propuestos a lo largo de la república mexicana.',
            'post_template' => 'vxfield-articulo',
            'slug' => 'vxfield-herramienta',
            'seo_keywords' => 'torres de telecomunicación,ingeniería estructural,herramientas,aplicación,vxfield,field,cimentaciones',
            'user_id' => 2,
            'secuencia' => 1,
        ]);
        $post->addMedia('public/images/articulos/VXPFIELD.jpg')
             ->preservingOriginal()
            ->toMediaCollection('images');
    }
}
