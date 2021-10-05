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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/cari', 'HomeController@cari')->name('cari');
Route::get('/create',function() {
    return view('create', ['name'=>'create']); });

Route::post('/addbook', 'BooksController@addBooks')->name('addbook');
Route::get('/detailsBook/{id}', 'BooksController@detailBook')->name('detailsBook');
Route::get('/infoBook/{id}', 'BooksController@detailToUpdate')->name('info');
Route::post('/update/{id}', 'BooksController@updateBook')->name('update');
Route::delete('/deleteBook/{book}','BooksController@deleteBook')->name('deletebook');


