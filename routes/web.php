<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('subject', 'SubjectController@index')->name('subject.index');
Route::get('subject/create', 'SubjectController@create')->name('subject.create');
Route::post('subject', 'SubjectController@store')->name('subject.store');
Route::get('subject/{subject}', 'SubjectController@show')->name('subject.show');
Route::get('subject/{subject}/edit', 'SubjectController@edit')->name('subject.edit');
Route::put('subject/{subject}', 'SubjectController@update')->name('subject.update');
Route::delete('subject/{subject}', 'SubjectController@destroy')->name('subject.destroy');
