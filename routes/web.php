<?php

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
    // return view('welcome');
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
    Route::middleware('hasProfile')->group(function(){
        Route::get('/wallet/transfer-success/{ref}', 'Dashboard@success');
        Route::get('/wallet/transfer-process', 'Dashboard@transfer');
        Route::post('/wallet/transfer-process', 'Dashboard@proceed');        
        Route::get('/wallet', 'Dashboard@index');        
        Route::get('/profile', 'ProfileController@index');
        Route::get('/history', 'HistoryController@index');
        Route::get('/lain-lain', 'LainnyaController@index');
        Route::get('/lain-lain/my-bill', 'LainnyaController@mybill');
        Route::get('/lain-lain/my-charity', 'LainnyaController@mycharity');
        Route::get('/lain-lain/my-ticket', 'LainnyaController@myticket');
    });    
    Route::post('/validate-profile', 'HomeController@storeNewProfile')->name('newProfile');
});
