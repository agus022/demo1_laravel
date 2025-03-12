<?php
use App\Http\Controllers\SiteController;
use App\Http\Controllers\HomeLandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPorpertiesController;
use App\Http\Controllers\EmployeesController;


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
Route::match(['get','post'], '/property_details/{property_id}', [HomeLandController::class,'property_details'])->name('property_details');
Route::get('/buy', [HomeLandController::class,'buy'])->name('buy');
Route::get('/rent', [HomeLandController::class,'rent'])->name('rent');
Route::get('/about', [HomeLandController::class,'about'])->name('about');
Route::get('/login', [HomeLandController::class,'login'])->name('login');
Route::get('/register', [HomeLandController::class,'register'])->name('register');
Route::get('/list_view', [HomeLandController::class,'index_list'])->name('list_view');

Route::post('/property/{property_id}/review',[HomeLandController::class,'review'])->name('property_details_review');
Route::get('/properties/{property_listing_type_id}', [HomeLandController::class,'properties_listing_type'])->name('properties_listing_type');
Route::match(['get','post'],'/contact', [HomeLandController::class,'contact'])->name('contact');

Route::get('/admin/properties', [AdminPorpertiesController::class,'index'])->name('index_admin_properties');
Route::get('/admin/employees', [EmployeesController::class,'index'])->name('index_admin_employees');
Route::get('/admin/employees_fetch', [EmployeesController::class,'employees_fetch'])->name('index_admin_employees_fetch');
