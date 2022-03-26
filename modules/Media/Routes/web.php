<?php
use Illuminate\Support\Facades\Route;
//
Route::get('media/private/view','MediaController@privateFileView')->middleware('auth')->name('media.private.view');
Route::post('media/edit_image','MediaController@editImage')->name('media.edit.image');

// Media
Route::group(['prefix'=>'media'],function(){
    Route::get('/preview/{id}/{size?}','\Modules\Media\Controllers\MediaController@preview');//
    Route::post('/private/store','MediaController@privateFileStore')->name('media.private.store');//
});
Route::group(['middleware' => ['auth'],'prefix' => config('admin.admin_route_prefix')],function(){
    Route::post('/module/media/store','\Modules\Media\Admin\MediaController@store');
    Route::post('/module/media/getLists','\Modules\Media\Admin\MediaController@getLists');
    Route::post('/module/media/removeFiles','\Modules\Media\Admin\MediaController@removeFiles');
});
