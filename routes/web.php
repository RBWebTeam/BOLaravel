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
Route::get('health-packages','BookAppointmentController@health_packages');

Route::post('health-insurance-analysis','BookAppointmentController@health_insurance_analysis');
Route::get('order-summary','BookAppointmentController@order_summary');
Route::post('health-insurance-packages','BookAppointmentController@health_insurance_packages'); 
 //Shubham
Route::get('HealthAssure','HealthAssureController@gethealthassure');
Route::post('HealthAssureinsert','HealthAssureController@inserthealthtest');
Route::get('Health-Assure-Partner','HealthAssurePartnerController@getpartnerinfo');
Route::post('providerlist','HealthAssurePartnerController@providerlist');
Route::Post('Health-Assure-Partner','HealthAssurePartnerController@getproviderinfo');
Route::get('Success','HealthAssureController@Success');
Route::get('Failure','HealthAssureController@failure');
Route::get('getcitybypincode/{pincode}','HealthAssureController@getcity');
///Shubham

Route::get('/','LoginController@checklogin');
Route::post('admin-login','LoginController@login');
Route::group(['middleware' => ['CheckMidd']], function (){
 // city  state
Route::get('search-state','LoginController@search_state');
Route::get('search-city','LoginController@search_city');
// end city state

Route::get('dashboard','DashboardController@dashboard');

//Fba details
Route::get('fba-list','FbaController@fba_list');
Route::get('get-fba-list/{fdate}/{todate}','FbaController@get_fba_list');
Route::post('sales-update','FbaController@sales');
Route::post('loan-update','FbaController@loan');
Route::post('posp-update','FbaController@posp');

Route::get('getpaymentlink/{fbaid}','FbaController@getpaymentlink');
Route::get('getcustomerid/{fbaid}','FbaController@getcustomerid1');
Route::get('getloanid/{fbaid}','FbaController@getupdateloanid');

 Route::get('generatepaymentlink','generatepaylinkController@paylinkgenerate');
 Route::get('getpaylink/{fbaid}','generatepaylinkController@getnewpaylink');
 Route::post('generatepaymentlink','generatepaylinkController@sendpsms');
// -------------------------------------
 Route::get('getpaylinknew/{fbaid}','FbaController@paylinkget');
 Route::post('pmesgsend','FbaController@sendpaysms');
 Route::get('crmfbalist','crmfbalistController@crmlist');  
 Route::get('crmstatus/{FBAID}','crmfbalistController@statuscrm'); 
 Route::post('crmstatus','crmfbalistController@crminsert');
 Route::get('crmfbalist/{FBAID}','crmfbalistController@test');
//Route::get('crmstatus/{FBAID}','crmfbalistController@showcrmstatus');


//QuicK Lead start  
Route::get('quickleadassignmentshow','quickleadController@showlead');
  Route::get('quickleadassignment','quickleadController@quicklead');
  Route::post('quickleadcity','quickleadController@quickleadcity');
  Route::get('quickleadcity/{id}',array('as'=>'leadquick.ajax','uses'=>'quickleadController@quickleadcity'));

  Route::post('fbaquickleadcity','quickleadController@statecityfba'); 
  Route::post('fbaquickleadcitysave','quickleadController@Insertquicklead');  

  // Route::get('fba-list-posp-update/{fbaid}','FbaController@updatepospthroapi');

//User_mapping vikas Start   fbauserview
  	//Route::get('user_mapping','usermappingController@fbauserview');

	Route::get('user_mapping','usermappingController@fbauser');

Route::get('sales-code-update','salescodeController@updatesalescode');
Route::get('sales-code-update-get-fbaid/{salsecode}','salescodeController@selfcodefbaid');
Route::POST('sales-code-update-insert','salescodeController@insertsalescode');


//User_mapping vikas End






 // --------------------------------------
// vivek start
 
//******state_dropdown******
Route::get('state-dropdown','bankofferController@droup_state');
Route::POST('insert_state','bankofferController@state_demo');
Route::get('state_demo/{id}',array('as'=>'FSMRegister.ajax','uses'=>'bankofferController@get_state'));
Route::get('state_dropdown/{cityid}','bankofferController@get_cities');
Route::get('state_sub_dropdown/{cityid}','bankofferController@get_sub_cities');

/////////////shubham podp
Route::get('Fba-list-Update-posp/{id}','FbaController@UpdatePospno');


// export excel  
Route::get('export','FbaController@exportexcel');


// non fba-list start  

Route::get('load-non-fba-list','nonfbaController@nonfbalist');
Route::get('non-fba-list','nonfbaController@getnonfba');
Route::get('export-excel','nonfbaController@nonfbaexportexcel');
// non fba-list End

// Sales code update start
  

// Sales code update End
Route::get('sales-code-update','salescodeController@updatesalescode');
Route::get('sales-code-update-get-fbaid/{salsecode}','salescodeController@selfcodefbaid');
Route::POST('sales-code-update-insert','salescodeController@insertsalescode');



//city_droupdown
Route::get('city_dropdown','bankofferController@droup_city');
Route::get('state_dropdown_id/{cityid}','bankofferController@get_state_id');
//smstemplate
Route::get('sms_template','smslogController@smstemplate');
Route::post('insert_template','smslogController@insert_template_demo');
Route::get('view_templete_table','smslogController@template_demo');
Route::get('template_table_delete/{SMSTemplateId}','smslogController@templetedelete');
Route::get('edit_view_templete/{SMSTemplateId}','smslogController@table_edit');
Route::post('update_view_templete','smslogController@update_sms_table');
//Rm city
Route::get('rm_city_view','rmcitymappingController@rmcityview');
Route::get('rm_city_view','rmcitymappingController@getrmdataview');
Route::post('rm_city_view_edit','rmcitymappingController@table_view');
//fba
Route::get('fbamaster-edit','FbaController@fbamaster');
Route::get('fbaid-view','FbaController@getfbaid');
Route::post('update_fbamaster','FbaController@update_fba_table');



// Route::get('fba-list/{salescode}/{fbaid}',array('as'=>'fba-list.ajax','uses'=>'FbaController@salesupdate'));



Route::get('fba-list/{fbaid}/{value}/{flag}',array('as'=>'fba-list.ajax','uses'=>'FbaController@updateposp'));
Route::post('send-fba-sms','FbaController@sendsms');

// Route::get('fba-list/{fbaid}/{value}/{flag}',array('as'=>'fba-list.ajax','uses'=>'FbaController@updateposp'));
// Route::post('fba-list','FbaController@sendsms');
Route::post('fba-listdocument','FbaController@uploaddoc');
// salescode
Route::get('fba-list/{salescode}/{fbaid}',array('as'=>'fba-list.ajax','uses'=>'FbaController@salesupdate'));
// salescode
Route::get('sms_log','smslogController@getsmslog');
Route::get('sms_template','smslogController@smstemplateinsert');


//fba documents 
Route::get('Fba-document','fbadocumentsController@fbadocument');

Route::get('fba-blocklist','fbablocklistController@fbablocklist');
Route::get('fba-blocklist/{flag}/{value}',array('as'=>'fbablocklist.ajax','uses'=>'fbablocklistController@fbablockunblock'));
Route::get('lead-details','LeadDetailsController@lead_details1');
Route::get('register-form','RegisterFormController@register_form');

//FSM Details
Route::get('Fsm-Details','FsmDetailsController@FsmDetails');

/// shubham ///

Route::get('Rmfollowup','RMfollowupController@RMfollowup');
Route::post('Rmfollowup','RMfollowupController@insertrmfollowup');
Route::get('Rmfollowup/{fbaid}','RMfollowupController@gethistory');

Route::get('Product-followup','ProductfollowupController@getproductfollowup');
Route::get('Product-followup/{product_id}','ProductfollowupController@getproductinfo');
Route::Post('Product-followup','ProductfollowupController@insertproductfollowup');
Route::get('view-history-Product-followup/{Lead_id}','ProductfollowupController@getproducthistory');

Route::get('RaiseaTicket','RaiserTicketController@getraiserticket');
Route::get('RaiseaTicket/{CateCode}','RaiserTicketController@getsubcat');
Route::get('RaiseaTicketgetcal/{QuerID}','RaiserTicketController@getclassi');
Route::Post('RaiseaTicket','RaiserTicketController@inserraisertkt');
Route::get('RaiseaTicketgettoccmail/{Querid}','RaiserTicketController@gettoccmail');

Route::get('View-Raised-Ticket','ViewRaisedTicketController@getraisedticket');
Route::get('View-Raised-Ticket/{ticketid}','ViewRaisedTicketController@deleteticket');
 
Route::get('send-sms-rights','SendSmsRightsController@sendsmsview');
Route::get('send-sms-directsend/{userid}','SendSmsRightsController@isdirectsend');
Route::get('send-sms-needaproval/{userid}','SendSmsRightsController@isneedapproval');

Route::get('Approve-send-sms','SendSmsapprovalController@sendsmsview');

Route::get('Fba-profile/{fbaid}','FbaprofileController@fbaprofileview');




Route::post('Fba-profile-insert','FbaprofileController@Insertfbaprofile');
Route::get('Fba-profile-fbaprofile/{fbaid}','FbaprofileController@getfbaprofile');
Route::get('fba-profile-company-mapping/{profileid}','FbaprofileController@getfbaprofilecompanymapping');
Route::get('search-loan','SearchLoanController@SearchLoan');
Route::post('search-loan-apicall','SearchLoanController@SearchLoancallapi');

Route::get('quick-lead','quickleadController@quicklead_ql');
Route::Post('quick-lead','quickleadController@insertquickleadstatus');
Route::get('quick-lead/{leadid}','quickleadController@gethistory');

/*Route::get('quick-lead-assigned-fba','quickleadController@getAssignedFBAToUserQuickLead');

Route::get('assigned-fba-lead','quickleadController@assignedfbalead');*/

Route::get('assigned-fba-lead','quickleadController@assignedfbaleadnew');
Route::post('assigned-fba-lead-new','quickleadController@insertstatus');
Route::get('assigned-fba-lead-history/{fbaid}','quickleadController@gethistoryfba');

Route::get('Quick-lead-dashboard','quickleaddashboardController@getquicklead');
Route::get('edit_lead/{Leadid}','quickleadController@editlead');
Route::Post('quick-lead-edit','quickleadController@updatelead');
route::get('offlinecs','offlinecsController@getofflinecs');

route::get('get_state_offlinecs/{cityid}','offlinecsController@getstate');
Route::Post('offlinecs','offlinecsController@insertofflinecs');
Route::get('get_ERPID_offlinecs/{fbaid}','offlinecsController@geterpid');

route::get('offlinecsedit/{id}','offlinecsController@getofflinecsdataedit');

Route::post('saveofflinecs','offlinecsController@saveofflinecsdata');
Route::get('offlinecs-dashboard','OfflinecsDashboardController@getofflinecsdata');

Route::post('offlinecsupdate','offlinecsController@Updateofflinecs');
Route::post('offlinecsupdateandsendmail','offlinecsController@Updateofflinecsandsendmail');
Route::get('offlinecssendemail/{ID}','OfflinecsDashboardController@sendemail');
///shubham end ///
// avinash
 Route::get('ticket-module','TicketController@getticketdetails') ;
   // avinash




//////GOVINDF
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

 Route::get('send-notification-approve','SendNotificationController@SendnotificationApprove');

 Route::get('approve-notification','SendNotificationController@notificationApprove');

  Route::get('send-sms-log','SmslogController@getsendsmslog');


// -------------- avinash
Route::get('send-notification','SendNotificationController@getstate');
Route::post('send-notification/{flag}/{value}','SendNotificationController@getfbalistnotification');
Route::get('send-notification/{flag}/{value}',array('as'=>'send-notification.ajax','uses'=>'SendNotification@getpincode'));

Route::get('send-notification/{id}',array('as'=>'send-notification.ajax','uses'=>'SendNotificationController@getcity'));

Route::get('send-notificationfba/{flag}/{value}',array('as'=>'send-notification.ajax','uses'=>'SendNotificationController@getfba'));
Route::post('insertnotification','SendNotificationController@insertntf');

Route::post('send-notification-approve','SendNotificationController@insertntf');

Route::get('send-sms-register','SendSmsFilterController@SendSMSFilter');

Route::post('send-sms-filter','SendSmsFilterController@getfbafilter');

Route::post('send-sms-filter1','SendSmsFilterController@send_sms_save_filter');

Route::get('approvenotification/{msgid}/{value}','SendNotificationController@approvenotification');
route::get('sendnotificationnew', 'SendNotificationController@sendnotificationstate');


Route::get('insert','uploadfileController@imageupload');
Route::get('Fba-list-Update','FbaController@test');
Route::get('fbalist-document/{fbaid}','FbaController@getdoclistview');
route::post('send-notification-submit', 'SendNotificationController@sendnotificationsubmit');

// image test start
Route::get('viewimage','imagetestController@imageview');
Route::get('viewimage/{id}',array('as'=>'viewimage.ajax','uses'=>'imagetestController@geticity'));

// image test end



//route::get('sendnotificationnew', 'SendNotificationController@send-notificationstate');

Route::get('Fsm-Details','FsmDetailsController@FsmDetails');

Route::get('Payment-History','PaymentHistoryController@Payment_History');

Route::post('send-sms-detail','SendSMSController@getfbalist');


Route::get('uploadefile','uploadfileController@uplode');

 Route::post('file_uplode','uploadfileController@file_uploade');
Route::post('insertnotificationfile','uploadfileController@insertntfi');

 // Route::get('send-sms','SendSMSController@ViewSendSMSDetails');
 
Route::get('notification-save','SendNotificationController@sendsubmitnotification_s');

Route::get('approvenotification/{msgid}/{value}','SendNotificationController@approvenotification');
 //send sms
Route::get('send-notification','SendNotificationController@sendnotification');

//send sms

 Route::get('send-sms','SendSMSController@sendsmsrea');
 Route::get('send-sms-state','SendSMSController@sendsmsren');
 Route::post('send-sms-city','SendSMSController@sendsmscity');
Route::post('send-sms-save','SendSMSController@send_sms_save');
Route::post('send-sms-detail','SendSMSController@getfbalist');
Route::get('send-sms/{id}',array('as'=>'sendsms.ajax','uses'=>'SendSMSController@sendsmscity'));
Route::get('send-sms','SendSMSController@ViewSendSMSDetails');
 Route::get('send-sms-zone','SendSMSController@getsmszone');
// Route::get('send-sms','SendSMSController@sendsmsrea');
  Route::post(' send-sms-zonechange','SendSMSController@sendsmszoneid');
// Route::get('send-sms','SendSMSController@ViewSendSMSDetails');
// Route::post('send-sms-detail','SendSMSController@getfbalist');
 
Route::get('send-notification','SendNotificationController@sendnotification');
 //Otp Detail
Route::get('otp-details','OtpDetailsController@otp_details');
Route::get('log-out','LoginController@logout');
//genrate lead
Route::get('genrate-lead','genrateleadController@getlead');
// Bankoffer
Route::get('bankoffer','bankofferController@bank_offer');
Route::get('payment-history','PaymentHistoryController@payment_history');
Route::get('queries','QueriesController@queries');
Route::get('queries-health/{id}','QueriesController@query_details');
Route::get('queries-motor/{id}','QueriesController@query_motor');
Route::get('queries-two-wheeler/{id}','QueriesController@two_wheeler');
/*Book Appointment*/
Route::get('book-appointment','BookAppointmentController@book_appointment');
Route::get('backoffice-city-master','BookAppointmentController@backoffice_city_master');

/*Sales Material*/ 
Route::get('sales-material-upload','BookAppointmentController@sales_material_upload');
Route::post('sales-material-upload-submit','BookAppointmentController@sales_material_upload_submit');
Route::get('sales-material','BookAppointmentController@sales_material');
Route::post('sales-material-update','BookAppointmentController@sales_material_update');
Route::post('sales-material-delete','BookAppointmentController@sales_material_delete');

/*Heath Assure*/



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
Route::get('report-followup-history','RegionalManagerControllar@Regional_Manager_search');
Route::post('report-followup-history-save','RegionalManagerControllar@report_followup_history_save');

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
Route::get('lead-assign-list','LeadstatusController@lead_assgin_list');
Route::get('lead-assgin-list-get','LeadstatusController@lead_assgin_list_get');
 
});
/************
// END LEAD MANAGMENT
******************/ 



  /************
//  CRM
******************/
Route::group(['namespace'=>'crm'],function(){
Route::get('user-role','CrmController@user_role');
Route::get('crm-view-history','CrmController@crm_view_history'); 
Route::get('crm-disposition/{id}','CrmController@crm_disposition_fn'); 
Route::post('crm-disposition','CrmController@crm_disposition');
Route::get('crm-disposition-id','CrmController@crm_disposition_id'); 
Route::get('crm-followup/{fbamappinid}/{crmid}/{history_id}','CrmController@crm_followup'); 
Route::get('crm-followup-disposition','CrmController@followup_disposition_view'); 
Route::get('crm-followup-history','CrmController@followup_history'); 
Route::post('crm-followup-history','CrmController@followup_history_update'); 

Route::get('crm-new/{fbamappin_id}','CrmController@crm_new'); 

});

  /************
//  END CRM 
******************/


 /************
// Product Controller 
******************/
Route::get('product-authorized','ProductController@product_authorized');
Route::post('product-save','ProductController@product_save');
Route::post('send-sms-save','SendSMSController@send_sms_save');

 /************
// User Registration
******************/
Route::get('register-user','LoginController@register_user') ;
Route::get('register-update/{id}','LoginController@register_update') ;
Route::post('register-user-update','LoginController@register_user_update') ;
Route::get('register-user-list','LoginController@register_user_list') ;
Route::post('register-user','LoginController@registerinsert') ;
Route::post('register-user-save','LoginController@register_user_save');
/************
// End
******************/

/************
// Ticket-Request
******************/
Route::get('ticket-request','TicketController@ticket_request') ;
Route::Post('ticket-request-save','TicketController@ticket_request_save') ;
Route::get('ticket-request-user-list','TicketController@ticket_request_userlist') ;
Route::Post('ticket-user-comment','TicketController@ticket_user_comment') ;
Route::get('went-wrong','LoginController@went_wrong');


/************
// FBA Update
******************/

Route::get('fba-search','FbaDetailsController@fba_details_update');
Route::post('fba-search-id','FbaDetailsController@fba_search_id');
Route::post('fba-search-update','FbaDetailsController@fba_search_update');

});


Route::group(['namespace' => 'leadController' ], function() {
Route::get('marketing-leads','LeaduploadController@marketing_leads');  





// Vivek start

//******state_dropdown******
// Route::get('state_dropdown','bankofferController@droup_state');
// Route::POST('insert_state','bankofferController@state_demo');
// Route::get('state_demo/{id}',array('as'=>'FSMRegister.ajax','uses'=>'bankofferController@get_state'));
// Route::get('state_dropdown/{cityid}','bankofferController@get_cities');
// Route::get('state_sub_dropdown/{cityid}','bankofferController@get_sub_cities');


 


});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
