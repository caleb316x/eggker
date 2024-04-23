<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/process-data', function (Request $request) {
    // Parse the incoming form data
    $name = $request->input('name');
    $age = $request->input('age');
    
    // Validate incoming data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer|min:0',
    ]);

    // Here, you can process the data as needed
    // For now, just return the received data
    return response()->json(['data' => $validatedData]);
});

Route::GET('/test', function (Request $request) {
    return "test";
});