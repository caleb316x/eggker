<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EggController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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
    Route::get('/cam', function () { return view('cam'); })->name('cam');
        
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

Route::get('/resources/assets/model/{filepath}', function($filepath){
    $path = resource_path() . '/assets/model/' . $filepath;

    if(!File::exists($path)) {
        return response()->json(['message' => 'File not found.'], 404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->where('filepath', '.*');
