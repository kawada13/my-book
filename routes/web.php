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
    return view('welcome');
});

    // ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');




Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/', 'HomesController@index')->name('home');
    Route::get('/folders/{id}/books', 'BooksController@index')->name('books.index');
    
    Route::get('/folders/create', 'FoldersController@create')->name('folders.create');
    Route::post('/folders/create', 'FoldersController@store')->name('folders.store');
    
    Route::get('/folders/{id}/edit', 'FoldersController@edit')->name('folders.edit');
    Route::put('/folders/{id}/edit', 'FoldersController@update')->name('folders.update');
    
    Route::get('/folders/{id}/books/create', 'BooksController@create')->name('books.create');
    Route::post('/folders/{id}/books/search', 'SearchController@serch')->name('search.search');
    Route::post('/folders/{id}/books/create', 'BooksController@store')->name('books.store');
    
    Route::get('/folders/{id}/books/{book_id}/edit', 'BooksController@edit')->name('books.edit'); 
    Route::put('/folders/{id}/books/{book_id}/edit', 'BooksController@update')->name('books.update');
    
    Route::delete('/folders/{id}/books/{book_id}', 'BooksController@destroy')->name('books.destroy');
    
});
