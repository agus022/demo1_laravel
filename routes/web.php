<?php
use App\Http\Controllers\SiteController;
use App\Http\Controllers\HomeLandController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/user/{id}', function (string $id) { //valor obligatorio
    return 'User: '.$id;
});

Route::get('/hello/{name?}', function (string $name = "PEPE") { //valor NO obligatorio y por default pone PEPE
    return 'Hello user: '.$name.', welcome to Laravel';
});
Route::get('/services', [SiteController::class,'services']);

Route::get('/', [HomeLandController::class,'index'])->name('home');
Route::get('/property_details/{property_id}', [HomeLandController::class,'property_details'])->name('property_details');
Route::get('/buy', [HomeLandController::class,'buy'])->name('buy');
Route::get('/rent', [HomeLandController::class,'rent'])->name('rent');
Route::get('/properties/{property_type_id}', [HomeLandController::class,'properties'])->name('property_listing_type');
Route::get('/about', [HomeLandController::class,'about'])->name('about');
Route::get('/contact', [HomeLandController::class,'contact'])->name('contact');
Route::get('/login', [HomeLandController::class,'login'])->name('login');
Route::get('/register', [HomeLandController::class,'register'])->name('register');
Route::get('/properties', [HomeLandController::class,'properties'])->name('properties');

