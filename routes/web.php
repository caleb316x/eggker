<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EggController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    // Route::get('/', [EggController::class, 'index'])->name('dashboard');

    
    Route::get('/', [EggController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [EggController::class, 'dashboard'])->name('dashboard');
    Route::get('/harvests', [EggController::class, 'index'])->name('harvests');
    Route::get('/harvest/{id}', [EggController::class, 'show'])->name('harvest');
});

Route::get('/resources/assets/images/{filename}', function($filename){
    $path = resource_path() . '/assets/images/' . $filename;

    if(!File::exists($path)) {
        return response()->json(['message' => 'Image not found.'], 404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
