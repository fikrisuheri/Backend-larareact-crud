<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('people/all','PeopleController@getAllPeople');
Route::get('people/delete/{id}','PeopleController@delete');
Route::post('people/store','PeopleController@savePeople');
Route::post('people/update/{id}','PeopleController@edit');