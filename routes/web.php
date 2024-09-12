<?php

//url para entrar na pasta
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProdutosController;


Route::get('/', function () {
    return view('admin_layo');
});

Route::get(
        '/categoria', 
        [CategoriaController::class, 'index']
    )->name('categoria');

Route::get('/produtos', [ProdutosController::class, 'index']);
Route::get('/produtos/criar', [ProdutosController::class, 'novo']);






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
