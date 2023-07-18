<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [\App\Http\Controllers\HomepageController::class, 'index'])
        ->name('homepage');

Route::get('/vxproject-ingenieria-estructural', [\App\Http\Controllers\PresentacionController::class, 'index'])
        ->name('vxproject-presentacion.show');

Route::get('/descargas', function() {
    return redirect()->route('blog.article.show', ['post_slug' => 'descargas']);
})->name('area-descargas.show');

Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.show');

Route::get('/blog/{post_slug}', [\App\Http\Controllers\PostController::class, 'blogPostShow'])
    ->name('blog.article.show');

Route::get('revisar-comentario/{access_token}', [\App\Http\Controllers\CommentsController::class, 'review'])
    ->name('comment.review');
Route::post('revisar-comentario/update', [\App\Http\Controllers\CommentsController::class, 'commentApproval'])
    ->name('comment.status.update');

Route::post('/comments', [\App\Http\Controllers\CommentsController::class, 'store'])
    ->middleware(['honey'])
    ->name('comments.store');

Route::get('/servicios-ingenieria-estructural', [\App\Http\Controllers\ServiciosController::class, 'index'])
    ->name('servicios.show');

Route::get('/contacto', [\App\Http\Controllers\ContactoController::class, 'show'])->name('contacto.show');
Route::post('/contacto/form', [\App\Http\Controllers\ContactoController::class, 'store'])
    ->middleware(['honey'])
    ->name('contacto.form.store');

Route::get('/codigos-disenio', [\App\Http\Controllers\CodigosDisenioController::class, 'index'])
    ->name('codigos-disenio.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// REDIRECTS

Route::get('/2021/04/07/macro-excel-para-dibujar-en-autocad-circulos', function() {
    return redirect()->route('blog.article.show', ['macro-excel-para-dibujar-en-autocad-circulos']);
});

Route::get('/2021/05/05/macro-excel-para-dibujar-en-autocad-hatch', function() {
    return redirect()->route('blog.article.show', ['macro-excel-para-dibujar-en-autocad-hatch']);
});

Route::get('/2021/03/27/macro-para-iniciar-un-dibujo-en-autocad', function() {
    return redirect()->route('blog.article.show', ['macro-para-iniciar-un-dibujo-en-autocad']);
});

Route::get('/2021/03/19/macro-para-dibujar-en-autocad-bloques', function() {
    return redirect()->route('blog.article.show', ['macro-para-dibujar-en-autocad-bloques']);
});

Route::get('/2021/03/26/vxproject-ingenieria-estructural', function() {
    return redirect()->route('vxproject-presentacion.show');
});

Route::get('/2021/03/26/vxproject-ingenieria-estructural', function() {
    return redirect()->route('vxproject-presentacion.show');
});

Route::get('/2021/03/14/descargas', function() {
    return redirect()->route('area-descargas.show');
});

require __DIR__.'/auth.php';
