<?php
session_start();
if (empty($_SESSION['Csrf-token'])) {
    $_SESSION['Csrf-token'] = bin2hex(random_bytes(32));
}
header('Content-Type: application/json');

$headers = apache_request_headers();
if (isset($headers['CsrfToken'])) {
    if ($headers['CsrfToken'] !== $_SESSION['Csrf-token']) {
       
        exit(json_encode(['error' => 'Wrong CSRF token.']));
    }
} else {
    exit(json_encode(['error' => 'No CSRF token.']));
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* New aliases. */
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

/* Composer autoload.php file includes all installed libraries. */
require 'autoload.php';


function sanitize($data, $min, $max){
   $data = trim($data);
   $data = substr($data, $min, $max);
   $data = stripslashes(str_replace('/', '', $data));
   $data = str_replace('\\','', $data);
   $data = strip_tags($data);
   
   return $data;
}
$err = false;
$message = '';
$name= '';
$surname='';
$email='';
$reason='';
$subject='';
$fullname = '';

if(isset($_POST['name'])){
   $name = sanitize($_POST['name'], 0 , 255);
}
else{
   $err = true;
}

if(isset($_POST['surname'])){
   $surname = sanitize($_POST['surname'], 0, 255);
}
else {
   $surname = '';
}
if(isset($_POST['email'])){
   $email = sanitize($_POST['email'], 0, 255);
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $err = true;
      
   }        
}
else {
   $err = true;
}

if(isset($_POST['subject'])){
   $subject = sanitize($_POST['subject'], 0, 16384);
}
else {
   $err = true;
}

if(isset($_POST['reason']) && in_array($_POST['reason'], ["I'm interested in your products", "I have a question", "I have feedback for your products", "Other"]))
{
   $reason =sanitize($_POST['reason'], 0, 255);
}
else {
   $err = true;
}

$fullname = $name.' '.$surname;
/*server side validation goes here*/
if(!$err){
date_default_timezone_set('Etc/UTC');

/* Information from the XOAUTH2 configuration. */
/*!THESE ARE LIVE CREDENTIALS DO NOT POST THIS FILE ONLINE!*/
$google_email = getenv('google_email');
$oauth2_clientId = getenv('oauth2_clientId');
$oauth2_clientSecret = getenv('oauth2_clientSecret');
$oauth2_refreshToken = getenv('oauth2_refreshToken');

$mail = new PHPMailer(TRUE);

try{

    $mail->setFrom($google_email, 'Elixxirio');
    $mail->addAddress($google_email, 'Elixxirio');
    $mail->addReplyTo($email, $fullname);
    $mail->Subject = $reason;
    $mail->Body = $subject;
    $mail->isSMTP();
    $mail->Port = 587;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = 'tls';
    
    /* Google's SMTP */
    $mail->Host = 'smtp.gmail.com';
    
    /* Set AuthType to XOAUTH2. */
    $mail->AuthType = 'XOAUTH2';
    
    /* Create a new OAuth2 provider instance. */
    $provider = new Google(
       [
          'clientId' => $oauth2_clientId,
          'clientSecret' => $oauth2_clientSecret,
       ]
    );
    
    /* Pass the OAuth provider instance to PHPMailer. */
    $mail->setOAuth(
       new OAuth(
          [
             'provider' => $provider,
             'clientId' => $oauth2_clientId,
             'clientSecret' => $oauth2_clientSecret,
             'refreshToken' => $oauth2_refreshToken,
             'userName' => $google_email,
          ]
       )
    );
    
    /* Finally send the mail. */
    $mail->send();
    $message = 'Submission received';
    exit(json_encode(['error' => $message]));
    
 }
 catch (Exception $e)
 {
    //echo $e->errorMessage();
 }
 catch (\Exception $e)
 {
    //echo $e->getMessage();
 }
}
else {
   exit(json_encode(['error' => $message]));
}
 
