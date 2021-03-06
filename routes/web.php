<?php

use App\Http\Controllers\RegisterStepTwoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



    Route::group(['middleware'=>['auth','verified']],function (){

        Route::group(['middleware'=>['registration_completed']],function (){
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
});

Route::get('register-step2',[RegisterStepTwoController::class,'create'])->name('registerStepTwoCreate');
    Route::post('register-step2',[RegisterStepTwoController::class,'store'])->name('registerStepTwoStore');

});
