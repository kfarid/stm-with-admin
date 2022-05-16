<?php

use App\Http\Controllers\ContactController;
use App\Http\Middleware\Localization;
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
    Route::resource('social', \App\Http\Controllers\Admin\SocialMediaController::class);
    Route::resource('google', \App\Http\Controllers\Admin\GoogleController::class);
});

/*
Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'contacts'])->name('contacts');
Route::post('/contacts', [App\Http\Controllers\ContactController::class, 'storeContact'])->name('contacts.store');
*/


Route::controller(['Localization'])->prefix('/')->group(function (){
    Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);
    /*    Route::get('theme/{theme}', [App\Http\Controllers\ThemeModeController::class, 'index']);*/
    Route::get('/',[\App\Http\Controllers\FrontController::class,'index'])->name('index');
    Route::get('second/{slug_en}',[\App\Http\Controllers\FrontController::class,'second'])->name('second');
    Route::get('third/{slug_en}',[\App\Http\Controllers\FrontController::class,'third'])->name('third');
    Route::get('contact',[ContactController::class,'contact'])->name('contact');
    Route::post('contact',[ContactController::class,'storeContact'])->name('contact.store');
});


