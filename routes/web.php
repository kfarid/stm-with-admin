<?php

use App\Http\Controllers\ContactController;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::redirect('/login', 'login');


Auth::routes();



Route::prefix('admin_panel')->group( function () {
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
    Route::resource('setting', \App\Http\Controllers\Admin\BasicSettingController::class);
    Route::resource('slider', \App\Http\Controllers\Admin\SliderController::class);
    Route::get('adminsearch', [\App\Http\Controllers\Admin\SearchController::class,'search'])->name('adminsearch');
});


/*Route::controller(['Localization'])->prefix('/')->group(function (){*/
Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function(){
    /*Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);*/
    Route::get('/',[\App\Http\Controllers\FrontController::class,'index'])->name('index');
    Route::get('post/{slug_en}',[\App\Http\Controllers\FrontController::class,'second'])->name('second');
    Route::get('third/{slug_en}',[\App\Http\Controllers\FrontController::class,'third'])->name('third');
    Route::get('search',[\App\Http\Controllers\SearchController::class,'search'])->name('search');
    Route::get('contact',[ContactController::class,'contact'])->name('contact');
    Route::post('contact',[ContactController::class,'storeContact'])->name('contact.store');
});

Route::get('/', function () {
    return redirect('/'. App\Http\Middleware\LocaleMiddleware::$mainLanguage);
});

Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl();; //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {

        unset($segments[1]); //удаляем метку
    }

    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    array_splice($segments, 1, 0, $lang);

    //формируем полный URL
    $url = Request::root().implode("/", $segments);

    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url); //Перенаправляем назад на ту же страницу

})->name('setlocale');

