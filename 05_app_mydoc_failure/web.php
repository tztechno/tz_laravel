<?php

Route::get('/', 'FileController@index');
Route::get('/file/{filename}', 'FileController@showFile');
