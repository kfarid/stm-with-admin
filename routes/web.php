<?php

use Illuminate\Support\Facades\Auth;
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

Route::redirect('/login', 'login');
Route::get('home',function () {
    return view('home');
});

Auth::routes();



Route::middleware(['roles:admin'])->prefix('admin_panel')->group( function () {
    Route::get('/',[\App\Http\Controllers\Admin\HomeController::class,'index'])->name('homeAdmin');
    Route::resource('homepage', \App\Http\Controllers\Admin\HomePageController::class);
    Route::resource('secondpage', \App\Http\Controllers\Admin\SecondController::class);
    Route::resource('thirdpage', \App\Http\Controllers\Admin\ThirdController::class);
    Route::resource('panel', \App\Http\Controllers\Admin\PanelController::class);
    Route::resource('card', \App\Http\Controllers\Admin\CardController::class);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('contact', \App\Http\Controllers\Admin\ContactController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
});


/*Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contactForm'])->name('contact-form');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact-form.store');



Route::prefix('/')->group(function (){
    Route::get('/',[\App\Http\Controllers\Admin\PageController::class,'index'])->name('index');
    Route::get('show/{slug}',[\App\Http\Controllers\Admin\PageController::class,'show'])->name('show');
});*/


