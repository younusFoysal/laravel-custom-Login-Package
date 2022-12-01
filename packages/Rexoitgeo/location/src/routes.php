<?php


use Illuminate\Support\Facades\Route;
use rexoitgeo\location\LocationController;
use App\Http\Controllers\Controller;




//
//Route::get('login', 'rexoitgeo\younusfoysal\LocationController@index')->name('login');
//Route::post('post-login', 'rexoitgeo\younusfoysal\LocationController@postLogin')->name('login.post');
//Route::get('registration', 'rexoitgeo\younusfoysal\LocationController@registration')->name('register');
//Route::post('post-registration', 'rexoitgeo\younusfoysal\LocationController@postRegistration')->name('register.post');
//Route::get('dashboard', 'rexoitgeo\younusfoysal\LocationController@dashboard');
//Route::get('logout', 'rexoitgeo\younusfoysal\LocationController@logout')->name('logout');




Route::get('login', [Rexoitgeo\Location\LocationController::class, 'index'])->name('login');
Route::post('post-login', [Rexoitgeo\Location\LocationController::class, 'postLogin'])->name('login.post');
Route::get('registration', [Rexoitgeo\Location\LocationController::class, 'registration'])->name('register');
Route::post('post-registration', [Rexoitgeo\Location\LocationController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [Rexoitgeo\Location\LocationController::class, 'dashboard']);
Route::get('logout', [Rexoitgeo\Location\LocationController::class, 'logout'])->name('logout');


