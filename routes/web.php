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


Route::get('/test', function () {
    return view('test');
});


Route::post('admin-login','LoginController@login');

 Route::group(['middleware' => ['CheckMidd']], function (){

 

Route::get('register-user','LoginController@register_user') ;
Route::get('register-update/{id}','LoginController@register_update') ;
Route::post('register-user-update','LoginController@register_user_update') ;
Route::get('register-user-list','LoginController@register_user_list') ;

 // city  state
Route::get('search-state','LoginController@search_state');
Route::get('search-city','LoginController@search_city');

// end city state

Route::post('register-user','LoginController@registerinsert') ;
//Route::get('register-user','LoginController@register_user');
Route::post('register-user-save','LoginController@register_user_save');

Route::get('dashboard','DashboardController@dashboard');

//Fba details
Route::get('fba-list','FbaController@fba_list');
Route::get('get-fba-list','FbaController@get_fba_list');
Route::post('sales-update','FbaController@sales');
Route::post('loan-update','FbaController@loan');
Route::post('posp-update','FbaController@posp');


Route::get('fba-list/{fbaid}/{value}/{flag}',array('as'=>'fba-list.ajax','uses'=>'FbaController@updateposp'));
Route::post('fba-list','FbaController@sendsms');
Route::post('fba-listdocument','FbaController@uploaddoc');

//fba documents 
Route::get('Fba-document','fbadocumentsController@fbadocument');

Route::get('fba-blocklist','fbablocklistController@fbablocklist');
Route::get('fba-blocklist/{flag}/{value}',array('as'=>'fbablocklist.ajax','uses'=>'fbablocklistController@fbablockunblock'));
Route::get('lead-details','LeadDetailsController@lead_details1');
Route::get('register-form','RegisterFormController@register_form');

//FSM Details
Route::get('Fsm-Details','FsmDetailsController@FsmDetails');

/// shubham 

Route::get('Rmfollowup','RMfollowupController@RMfollowup');
Route::post('Rmfollowup','RMfollowupController@insertrmfollowup');
Route::get('Rmfollowup/{fbaid}','RMfollowupController@gethistory');

//////GOVIND
Route::get('Fsm-Details/{smid}','FsmDetailsController@fsmfbalist');
Route::get('FsmRegister/{smid}','FsmRegisterController@getfsmdetail');
Route::get('fba-list/{partnerid}','FbaController@getfbapartner');
Route::get('assignrm','AssignrmController@loadrm');
Route::get('assign-rm-load/{flag}/{value}','AssignrmController@loadfba');
Route::post('assign-rm-update','AssignrmController@updatefba');
///END
Route::get('Fsm-Register','FsmRegisterController@getsate');
Route::get('Fsm-Register/{id}',array('as'=>'FSMRegister.ajax','uses'=>'FsmRegisterController@getcity'));
Route::get('Fsm-Register/{flag}/{value}',array('as'=>'FSMRegister.ajax','uses'=>'FsmRegisterController@getpincode'));
Route::post('Fsm-Register','FsmRegisterController@insertfsm');


 Route::get('send-notification','SendNotificationController@sendnotification');

 Route::get('send-notification-approve','SendNotificationApproveController@SendnotificationApprove');


// -------------- avinash
Route::get('send-notification','SendNotificationController@getstate');
Route::post('send-notification/{flag}/{value}','SendNotificationController@getfbalistnotification');
Route::get('send-notification/{flag}/{value}',array('as'=>'send-notification.ajax','uses'=>'SendNotification@getpincode'));

Route::get('send-notification/{id}',array('as'=>'send-notification.ajax','uses'=>'SendNotificationController@getcity'));

Route::get('send-notificationfba/{flag}/{value}',array('as'=>'send-notification.ajax','uses'=>'SendNotificationController@getfba'));
Route::post('insertnotification','SendNotificationController@insertntf');

Route::get('approvenotification/{msgid}/{value}','SendNotificationApproveController@approvenotification');
 //send sms
Route::get('send-notification','SendNotificationController@sendnotification');




 // Route::get('send-sms','SendSMSController@ViewSendSMSDetails');
 

//send sms
Route::get('send-sms','SendSMSController@ViewSendSMSDetails');
// Route::get('send-sms','SendSMSController@sms_load');


 /*Route::get('send-sms','SendSMSController@ViewSendSMSDetails');
 Route::get('send-sms','SendSMSController@sms_load');*/

Route::get('send-notification','SendNotificationController@sendnotification');
//send sms
/*Route::get('send-sms','SendSMSController@ViewSendSMSDetails');*/

/// vikaas rm city
Route::get('rm_city_master','rmcitymappingController@rmcitymapping');
Route::get('rm_city_master','rmcitymappingController@getrm');
Route::get('rm_city_master/{state_id}','rmcitymappingController@getcity');
Route::post('rm_city_master','rmcitymappingController@rmcityinsert');

// Route::get('rm_city_master','rmcitymappingController@rmcityupdate');


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
Route::get('backoffice-city-master','BookAppointmentController@backoffice_city_master');

/*Sales Material*/ 
Route::get('sales-material-upload','BookAppointmentController@sales_material_upload');

Route::post('sales-material-upload-submit','BookAppointmentController@sales_material_upload_submit');
Route::get('sales-material','BookAppointmentController@sales_material');
Route::post('sales-material-update','BookAppointmentController@sales_material_update');


 
  /************
//  Menu List
******************/
Route::get('menu-list','MenuController@menu_list');
Route::post('menu-add','MenuController@menu_add');
Route::get('menu-mapping','MenuController@mapping');
Route::post('menu-mapping-save','MenuController@menu_mapping_save');
Route::get('menu-list-select','MenuController@menu_list_select');
Route::post('menu-list-add','MenuController@menu_list_add');
Route::get('menu-test','MenuController@menu_test');
Route::get('menu-group','MenuController@menu_group');
Route::post('menu-group-save','MenuController@menu_group_save');
Route::get('menu-group-select','MenuController@menu_group_select');

  /************
//  Regional manager
******************/
Route::group(['namespace' => 'RM',  ], function() {

Route::get('regional-manager','RegionalManagerControllar@regional_manager');

});
  /************
// LEAD MANAGMENT
******************/  
Route::group(['namespace' => 'leadController' ], function() {
Route::get('lead-up-load','LeaduploadController@lead_up_load');
Route::post('import-excel','LeaduploadController@importExcel');        
Route::post('lead-update','LeaduploadController@lead_update');          
Route::post('lead-interested','LeaduploadController@interested'); 
Route::post('lead-management-update','LeaduploadController@lead_management_update');
Route::get('lead-status','LeadstatusController@lead_status');
Route::get('followup-history','LeadstatusController@followup_history');
Route::get('lead-test','LeaduploadController@lead_test');  
Route::get('assign-task','LeadstatusController@assign_task');
Route::post('assign-task-save','LeadstatusController@assign_task_save');
Route::get('marketing-leads','LeaduploadController@marketing_leads');   
});
/************
// END LEAD MANAGMENT
******************/ 

 /************
// Product Controller 
******************/
Route::get('product-authorized','ProductController@product_authorized');
Route::post('product-save','ProductController@product_save');





});





});

 

