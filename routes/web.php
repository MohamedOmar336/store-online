<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
Auth::routes();



Route::group(['middleware' => ['Localization']], function () {

    Route::get('/change-lang/{lang}', function ($lang) {
        App::setLocale($lang);
        \Illuminate\Support\Facades\Config::set('locale', $lang);
        \Illuminate\Support\Facades\Session::put('locale', $lang);
        return redirect()->back();
    })->name('change.lang');

    Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('home');
    Route::get('/about', [App\Http\Controllers\WebController::class, 'about'])->name('about');
    Route::get('/contact', [App\Http\Controllers\WebController::class, 'contact'])->name('contact');
    Route::get('/product', [App\Http\Controllers\WebController::class, 'product'])->name('product');

    Route::group(['middleware' => ['auth']], function () {

        Route::get('/dashboard', function () {
                return view('index');
        })->name('dashboard');
        
        Route::get('/profile', function () {
            return view('pages.admins.profile');
        })->name('admins.profile');
        
        Route::resource('products', ProductController::class);

    });

});

