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
    return view('index');
});





Route::post('admin-login','LoginController@login');
Route::get('register-user','LoginController@register_user');



Route::get('dashboard','DashboardController@dashboard');
Route::get('fba-list','FbaController@fba_list');
Route::get('lead-details','LeadDetailsController@lead_details1');
Route::get('register-form','RegisterFormController@register_form');
Route::get('otp-details','otpDetailsController@otp_details1');
Route::get('Fsm-Details','FsmDetailsController@FsmDetails');
 Route::get('send-notification','SendNotificationController@sendnotification');
