<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\loginController;
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
})->name('welcome');






Route::group([
  'prefix'  => 'dashboard',
  'as' => 'dashboard.',
], function(){

  Route::get('/',[DashboardController::class,'index'])
          ->name('index');

  Route::get('/create',[DashboardController::class,'create'])
          ->name('create');

  Route::post('/create/new',[DashboardController::class,'store'])
          ->name('store');

  Route::get('/edit/{link}',[DashboardController::class,'edit'])
          ->name('edit');

  Route::put('/update/{link}',[DashboardController::class,'update'])
          ->name('update');
  Route::delete('/{link}/delete',[DashboardController::class,'destroy'])
          ->name('delete');
});

Route::get('/{id}',[DashboardController::class,'redirection'])
        ->name('dashboard.redirection');
