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

Route::get('/', [HomeLandController::class,'index']);
Route::get('/buy', [HomeLandController::class,'buy']);
Route::get('/rent', [HomeLandController::class,'rent']);
Route::get('/properties/{property_type_id}', [HomeLandController::class,'properties']);
Route::get('/about', [HomeLandController::class,'about']);
Route::get('/contact', [HomeLandController::class,'contact']);
Route::get('/login', [HomeLandController::class,'login']);
Route::get('/register', [HomeLandController::class,'register']);
Route::get('/properties', [HomeLandController::class,'properties']);
