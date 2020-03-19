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
Route::namespace('Api')->group(function () {
    Route::post('/students', 'StudentController@all');
    
    Route::post('/students/ages', 'StudentController@getAge');

    Route::post('/students/ages/{age}', 'StudentController@getForAge');
    Route::post('/students/gender/{gender}', 'StudentController@getForGender');
    Route::post('/students/name/{name}', 'StudentController@getForName');
    
    Route::post('/students/filter', 'StudentController@filter');
});
