<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{user}', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //user route
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/{user}/edit',[UserController::class,'edit']);
    Route::get('/user/{user}/detail',[UserController::class,'show']);
    Route::post('/user/{user}/update',[UserController::class,'update'])->name('user.update');
    Route::get('/user/{user}/delete', [UserController::class, 'destroy']);

    //blog route
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::post('/blog/create',[BlogController::class,'store'])->name('post_create');
    Route::get('/blog/{blog}/edit',[BlogController::class,'edit'])->name('blog.edit');
    Route::post('/blog/{blog}/edit',[BlogController::class,'update'])->name('blog.update');
    Route::get('/blog/{blog}/delete',[BlogController::class,'destroy'])->name('blog.delete');
    Route::get('/blog/{blog}/detail',[BlogController::class,'detail'])->name('blog.detail');

});

require __DIR__.'/auth.php';
