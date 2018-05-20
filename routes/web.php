<?php


Route::get('/', 'CatsController@index')->name('index');
Route::get('breeds', 'CatsController@breeds')->name('breeds');
Route::get('/statistics', 'CatsController@statistics')->name('statistics');