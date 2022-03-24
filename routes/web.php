<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Faculties;

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

Route::view('/', 'index')->name('home');
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/faculties', Faculties::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});