<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PropertiesAPIController;

use App\Models\Property;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/demo1', function () {
    return response()->json(['message' => 'Hello from Demo 1']);
});

Route::get('/properties',[PropertiesAPIController::class,'properties'])->name('api.properties');
Route::post('/contact_agent',[PropertiesAPIController::class,'saveContactAgent'])->name('api.contact_agent');
