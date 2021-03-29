<?php

use Illuminate\Support\Facades\Route;
use  RealRashid\SweetAlert\Facades\Alert;

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
    return view('website.layouts.app');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::prefix('dashboard')->namespace('Admin')->group(function () {
        Route::get('/home', function () {
            return view('dashboard.index');
        })->name('dashboard.index');
        Route::get('/login','Auth\loginController@login')->name('user.login');
        Route::post('/postLogin','Auth\loginController@postLogin')->name('user.post.login');
        Route::post('/postLogout','Auth\loginController@postLogout')->name('user.logout');
        Route::get('portfolio','Auth\portfolioController@index')->name('user.portfolio');
        Route::post('portfolio','Auth\portfolioController@portfolioUpdate')->name('user.post.portfolio');
        Route::resource('admin','AdminController')->except(['create','show']);
        Route::resource('category','CategoryController')->except(['create','show']);

    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
