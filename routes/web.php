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

Route::controller(PageController::class)->group(function () {
  
  Route::get('/',       'home')->name('home');
  Route::get('blog',    'blog')->name('blog');
  Route::get('blog/{post:slug}', 'post')->name('post');

});

Route::view('/', 'welcome')->name('home');
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::view('/faculties', 'index');  
    Route::view('/careers', 'index-career');
    Route::view('/subjects', 'index-subject');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
