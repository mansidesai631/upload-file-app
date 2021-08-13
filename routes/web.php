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

Auth::routes();

//routh for upload and list button
Route::get('/getMyFiles', 'FileUploadController@getAllFiles')->name('myfiles');
Route::get('/uploadFile', 'FileUploadController@index')->name('uploadFile');


Route::get('/home', 'HomeController@index')->name('home');

Route::post('/upload', 'FileUploadController@upload')->middleware('size')->name('upload');
Route::get('download/{code}', 'FileUploadController@downloadFile');
Route::get('delete/{code}', 'FileUploadController@deleteFile');
Route::get('/getFileInfo/{code}', 'FileUploadController@fileInfo')->name('info');
