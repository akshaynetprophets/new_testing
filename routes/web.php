<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostSeedController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Concurrency;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// Post Route with cache optimization
Route::middleware('auth:web')->controller(PostController::class)->group(function(){
    Route::get('posts','index')->name('post.list');
});


//Queue functionality
Route::get('post-seed',PostSeedController::class);


// Concurrency Routes
Route::get('/concurrency',function(){
   try {
    Concurrency::run([
        fn () => User::count(),
        fn () => Post::count(),
        fn () => Post::count(),
        fn () => Post::count(),
    ]);
   } catch (\Throwable $th) {
    dd($th->getMessage());
   }
   // dd($userCount);
});