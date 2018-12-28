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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('test','UserController@data');
Route::post('sales-material','ApiController@sales_material');
Route::post('updat-fba-data','update_fba_dataController@update_fba_data');
Route::post('get-crm-role','getcrmroleController@crm_role');
Route::post('crm_disposition','getcrmroleController@get_crm_disposition');





