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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->post('send', 'PaperController@SendMessage');
Route::group([
    'middleware' => 'api',
], function () {
    Route::get('faculties', 'FacultyController@index');
    Route::post('faculty', 'FacultyController@store');
    Route::put('faculty/{id}', 'FacultyController@update');
    Route::get('papers', 'PaperController@index');
    Route::get('createDB/{name}', 'PaperController@createDbFunc');
    Route::post('soketi', 'PaperController@soketi');
    Route::post('login', 'FacultyController@Authenticate');
    Route::post('register', 'FacultyController@Register');

});
// Broadcast::routes(['middleware' => ['auth:sanctum']]);

