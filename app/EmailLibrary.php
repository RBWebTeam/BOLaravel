<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailLibrary extends Model{
   
public function SendEmail($param){

//Initialize Information and Creadentials    	

$param['Host'] = env('MAIL_HOST');
$param['Username'] = env('MAIL_USERNAME');
$param['Password'] = env('MAIL_PASSWORD');
$param['Port'] = env('MAIL_PORT');
$param['SMTPSecure'] = 'tls';
$param['FromName'] = "Magicfinmart";

//Start Sending Email by assigning Information and Credentials 
$mail = new PHPMailer(true);

$mail->SMTPDebug = 0;                     //Enable SMTP debugging.                            

$mail->isSMTP();                          //Set PHPMailer to use SMTP.

$mail->Host = $param['Host'];             //Set SMTP host name

$mail->SMTPAuth = true;                   //Set this to true if SMTP host requires authentication to send email   

$mail->Username = $param['Username'];     //Provide username        
$mail->Password = $param['Password'];     //Provide password     
 
$mail->SMTPSecure = $param['SMTPSecure']; //If SMTP requires TLS encryption then set it                
$mail->Port = $param['Port'];             //Set TCP port to connect to                                            

$mail->From = $param['Username'];
$mail->FromName = $param['FromName'];

if(count($param['to_array']) !== 0){
   foreach($param['to_array'] as $key => $value){
      $mail->addAddress($value['email_id'], $value['person_name']);
   }
}

if(count($param['cc_array']) !== 0){
   foreach($param['cc_array'] as $key => $value){
      $mail->AddCC($value['email_id'], $value['person_name']);
   }
}

//$mail->AddBCC($param['Username'], $param['FromName']);

$mail->isHTML(true);

$mail->Subject = $param['Subject'];
$mail->Body = $param['Body'];
//$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) {
   // echo "Mailer Error: " . $mail->ErrorInfo;
   $response = array('email_status'=>'failed','email_Messege'=>'Email Sending Failed');
} else {
   $response = array('email_status'=>'success','email_Messege'=>'Email Sent Successfully');
}

return $response;
}

}