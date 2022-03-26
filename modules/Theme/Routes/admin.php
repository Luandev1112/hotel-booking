<?php
use \Illuminate\Support\Facades\Route;

Route::get('/', 'ThemeController@index')->name('theme.admin.index');
Route::post('active/{theme}', 'ThemeController@activate')->name('theme.admin.activate');
Route::get('upload', 'ThemeController@upload')->name('theme.admin.upload');
Route::post('upload_post', 'ThemeController@upload_post')->name('theme.admin.upload_post');
