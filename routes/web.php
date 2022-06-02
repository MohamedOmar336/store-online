<?php

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
Route::group(['middleware' => ['auth', 'Localization']], function () {

    Route::get('/change-lang/{lang}', function ($lang) {
        App::setLocale($lang);
        \Illuminate\Support\Facades\Config::set('locale', $lang);
        \Illuminate\Support\Facades\Session::put('locale', $lang);
        return redirect()->back();
    })->name('change.lang');
    
    Route::get('/', function () {
        return view('index');
    })->name('dashboard');
    
    Route::get('/profile', function () {
        return view('pages.admins.profile');
    })->name('admins.profile');
    
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
