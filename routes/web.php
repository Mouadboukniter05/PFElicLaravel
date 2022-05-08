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
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return view('auth.login');
});




/* users */
////////////////////////////////////////////////////////////////////////


Route::get('/lost/users','UserController@index')->name('user.index');
Route::get('/lost/users/create','UserController@create')->name('user.create');
Route::post('/lost/users','UserController@store')->name('user.store');
Route::get('/lost/users/{id}/edit','UserController@edit')->name('user.edit');
Route::put('/lost/users/{id}','UserController@update')->name('user.update');
Route::delete('/lost/users/{id}','UserController@destroy')->name('user.delete');


//////////////////////////////////////////////////////////////////////




Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    /*--------------------------------- documents --------------------------------------------------*/

    Route::get('/lost/documents','DocumentController@index')->name('document.index');

    Route::get('/lost/documents/create','DocumentController@create')->name('document.create');

    Route::post('/lost/documents','DocumentController@store')->name('document.store');

    Route::get('/lost/documents/{id}/edit','DocumentController@edit')->name('document.edit');

    Route::put('/lost/documents/{id}','DocumentController@update')->name('document.update');

    Route::get('/lost/documents/delete/{id}','DocumentController@delete')->name('document.delete');

    Route::get('/lost/documents/chercher','DocumentController@recherche')->name('document.recherche');

    Route::get('/lost/documents/valide/{id}','DocumentController@valid')->name('document.valide');

    Route::get('/lost/documents/list/{cin}','DocumentController@list')->name('document.list');

    /*--------------------------------- documents --------------------------------------------------*/
    Route::get('/lost/users','UserController@index')->name('user.index');
    Route::get('/lost/users/create','UserController@create')->name('user.create');
    Route::post('/lost/users','UserController@store')->name('user.store');
    Route::get('/lost/users/{id}/edit','UserController@edit')->name('user.edit');
    Route::put('/lost/users/{id}','UserController@update')->name('user.update');
    Route::get('/lost/users/{id}','UserController@destroy')->name('user.delete');

});




