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
//listado de cubos

Route::group(['prefix' => 'cubes'],function(){
	Route::get('list',[
	'uses' 	=> 'CubesController@index',
	'as'  	=> 'cubes.list'
	]);

	Route::get('create',[
		'uses' => 'CubesController@create',
		'as'   => 'cubes.create'
	]);

	Route::post('store',[
		'uses' => 'CubesController@store',
		'as'   => 'cubes.store'
	]);

	Route::get('update/{id}',[
		'uses' => 'CubesController@update',
		'as'   => 'cubes.update'
	]);
	
	Route::put('processUpdate/{id}',[
		'uses' => 'CubesController@processUpdate',
		'as'   => 'cubes.processUpdate'
	]);

	Route::get('query/{id}',[
		'uses' => 'CubesController@query',
		'as' 	=> 'cubes.query'
	]);

	Route::post('processQuery/{id}',[
		'uses' => 'CubesController@processQuery',
		'as' 	=> 'cubes.processQuery'
		]);
});
