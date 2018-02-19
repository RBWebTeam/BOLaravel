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

 Route::group(['middleware' => ['CheckMidd']], function (){

 

Route::get('register-user','LoginController@register_user');
Route::post('register-user','LoginController@registerinsert');
Route::get('register-user','LoginController@getsate');
Route::post('register-user-save','LoginController@register_user_save');

Route::get('dashboard','DashboardController@dashboard');

//Fba details
Route::get('fba-list','FbaController@fba_list');
Route::get('fba-list/{fbaid}/{value}/{flag}',array('as'=>'fba-list.ajax','uses'=>'FbaController@updateposp'));
Route::get('fba-blocklist','fbablocklistController@fbablocklist');
Route::get('fba-blocklist/{flag}/{value}',array('as'=>'fbablocklist.ajax','uses'=>'fbablocklistController@fbablockunblock'));
Route::get('lead-details','LeadDetailsController@lead_details1');
Route::get('register-form','RegisterFormController@register_form');

//FSM Details
Route::get('Fsm-Details','FsmDetailsController@FsmDetails');
Route::get('Fsm-Register','FsmRegisterController@getsate');
Route::get('Fsm-Register/{id}',array('as'=>'FSMRegister.ajax','uses'=>'FsmRegisterController@getcity'));
Route::get('Fsm-Register/{flag}/{value}',array('as'=>'FSMRegister.ajax','uses'=>'FsmRegisterController@getpincode'));
Route::post('Fsm-Register','FsmRegisterController@insertfsm');


 Route::get('send-notification','SendNotificationController@sendnotification');




 //send sms




 // Route::get('send-sms','SendSMSController@ViewSendSMSDetails');
 

Route::get('send-notification','SendNotificationController@sendnotification');
//send sms
Route::get('send-sms','SendSMSController@ViewSendSMSDetails');
// Route::get('send-sms','SendSMSController@sms_load');


 /*Route::get('send-sms','SendSMSController@ViewSendSMSDetails');
 Route::get('send-sms','SendSMSController@sms_load');*/

Route::get('send-notification','SendNotificationController@sendnotification');
//send sms
/*Route::get('send-sms','SendSMSController@ViewSendSMSDetails');*/



 //Otp Detail
 Route::get('otp-details','OtpDetailsController@otp_details');
 Route::get('log-out','LoginController@logout');

//genrate lead
 Route::get('genrate-lead','genrateleadController@getlead');




// Bankoffer

 Route::get('bankoffer','bankofferController@bank_offer');



Route::get('payment-history','PaymentHistoryController@payment_history');
 
Route::get('queries','QueriesController@queries');

/*Book Appointment*/
Route::get('book-appointment','BookAppointmentController@book_appointment');
 

/*Menu List*/ 
Route::get('menu-list','MenuController@menu_list');
Route::post('menu-add','MenuController@menu_add');
Route::get('menu-mapping','MenuController@mapping');
Route::post('menu-mapping-save','MenuController@menu_mapping_save');

  /************
//  LEAD  RM
******************/
Route::group(['namespace' => 'leadController',  ], function() {
Route::get('lead-up-load','LeaduploadController@lead_up_load');
Route::post('import-excel','LeaduploadController@importExcel');        
Route::post('lead-update','LeaduploadController@lead_update');          
Route::post('lead-interested','LeaduploadController@interested'); 
});


 });

 