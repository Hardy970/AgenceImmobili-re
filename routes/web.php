<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertiesController;

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;

Route::get('/',[HomeController::class,'index']);

Route::get('/login',[AuthController::class,'login'])->name('login')->middleware('guest');
    Route::post('/login',[AuthController::class,'doLogin']);
    Route::delete('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/biens',[PropertiesController::class,'index'])->name('property.index');
Route::get('/biens/{slug}-{property}',[PropertiesController::class,'show'])->name('property.show')->where([
    'slug'=>"[a-z0-9\-]+",
    'property' => "[0-9]+"
]);
Route::post('/biens/{property}/contact',[PropertiesController::class,'contact'])->name('property.contact')->where([
    'property'=>"[0-9]+"]
);


Route::prefix('admin')->name('admin.')->middleware('auth')->group(
    function(){
        Route::resource('property',PropertyController::class)->except('show');
        Route::resource('option',OptionController::class)->except('show');
    });

    


