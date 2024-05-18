<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Egg;
use App\Http\Controllers\MessageController;

Route::post('/egg-size', [MessageController::class, 'receiveMessage']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/add', function (Request $request) {
    // Validate incoming data
    $validatedData = $request->validate([
        'peewee_count' => 'required|integer|min:0',
        'pullet_count' => 'required|integer|min:0',
        'small_count' => 'required|integer|min:0',
        'medium_count' => 'required|integer|min:0',
        'large_count' => 'required|integer|min:0',
        'extra_large_count' => 'required|integer|min:0',
        'jumbo_count' => 'required|integer|min:0',
        'crack_count' => 'required|integer|min:0',
    ]);

    // Set sorting_date to current date
    $validatedData['sorting_date'] = now();

    // Create a new Egg instance with the validated data
    $egg = new Egg();
    $egg->fill($validatedData);
    $egg->save();

    // Return success response
    return response()->json(['message' => 'Egg data added successfully', 'data' => $egg], 201);
});

Route::GET('/test', function (Request $request) {
    return "test";
});