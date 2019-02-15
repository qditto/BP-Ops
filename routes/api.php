<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/user', 'API\UserController@getUser');
    Route::post('/clients', 'API\ClientController@store');
    Route::get('/clients', 'API\ClientController@index');
    Route::get('clients/create', 'API\ClientController@create');
    Route::get('field-groups', 'API\FieldGroupController@index');
    Route::get('product-categories', 'API\ProductCategoryController@index');
    Route::get('/clients/{client}', 'API\ClientController@view');
    Route::get('/clients/{client}/edit', 'API\ClientController@edit');
    Route::patch('/clients/{client}', 'API\ClientController@update');
    Route::get('/client-products/{clientProduct}', 'API\ClientProductController@edit');
    Route::patch('client-products/{clientProduct}', 'API\ClientProductController@updateCustomFields');
    Route::get('definitions/{definition}/edit', 'API\DefinitionController@edit');
    Route::patch('definitions/{definition}', 'API\DefinitionController@update');
});
