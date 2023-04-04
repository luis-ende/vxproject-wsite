<?php

use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/vxproject-presentacion', function() {
    return view('pages.vxproject-presentacion');
})->name('vxproject-presentacion.show');

Route::get('/area-de-descargas', function() {
    return view('pages.descargas');
})->name('area-descargas.show');

Route::get('/blog', function() {
    $posts = Post::all();

    return view('pages.blog', compact('posts'));
})->name('blog.show');

Route::get('/blog/{post_slug}', function(string $postSlug) {
    $post = Post::where('slug', $postSlug)->firstOrFail();

    return view('pages.post', compact('post'));
})->name('blog.article.show');

Route::get('/servicios-ingenieria-estructural', function() {
    return view('pages.servicios');
})->name('servicios.show');

Route::get('/contacto', function() {
    return view('pages.contacto');
})->name('contacto.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
