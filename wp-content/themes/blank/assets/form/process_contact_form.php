<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
require 'phpmailer/PHPMailer.php';

//Min length validation
function validateMinLength($length, $number){
	//if it's NOT valid
	if(strlen($length) < $number)
		return false;
	//if it's valid
	else
		return true;
}	

//Max length validation
function validateMaxLength($length, $number){
	//if it's NOT valid
	if(strlen($length) > $number)
		return false;
	//if it's valid
	else
		return true;
}	

//Email length validation
function validateEmail($email){		
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}    
	
//Phone length validation	
function validatePhone($phone){
	return preg_match("/^[0-9 -]{1,}$/", $phone);
}

$name				= filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email 				= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$phone				= filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
$company			= filter_var($_POST['company'], FILTER_SANITIZE_STRING);
$message			= filter_var($_POST['message'], FILTER_SANITIZE_STRING);

$err = array();

if(!validateMinLength($name, 2))$err[]='Whoops! You haven\'t entered your name!';
if(!validateMaxLength($name, 100))$err[]='Wait, is your name really over 100 characters?';

if(!validateMinLength($email, 2))$err[]='Your email appears to be suspiciously short or empty';
if(!validateMaxLength($email, 254))$err[]='Your email should be less than 254 characters';
if(validateMinLength($email, 2) && validateMaxLength($email, 254) && !validateEmail($email))$err[]='That email address appears to be invalid';  			

if(!validateMinLength($phone, 11))$err[]='Your phone number should be at least 11 numbers'; 			
if(!validateMaxLength($phone, 23))$err[]='Your phone number should be less than 23 numbers';
if(validateMaxLength($phone, 23) && validateMinLength($phone, 11) && !validatePhone($phone))$err[]='The phone field appears invalid. Numbers and Hyphens (-) only'; 			

if(!validateMinLength($message, 2))$err[]='Please enter your message';
if(!validateMaxLength($message, 100))$err[]='Your message/novel is too long!';

if(count($err)){
	foreach($err as $error){
	echo $error."<br>";	
	}
	exit();
}
else
{

	$body='<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="background-color:#f1f1f1;">
		<tr>
			<td align="center" valign="top">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:750px;margin:auto;">
					<tr bgcolor="#6C648B">
						<td valign="top">
							<table border="0" cellpadding="50" cellspacing="0" width="100%" style="text-align:center;color:#FFF;">
								<tr>
									<td>
										<h1 style="font-family: Arial, Helvetica, sans-serif;font-weight:200;font-size:28px;margin:0;">Website Message Received from '.$name.'</h1>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr bgcolor="#585173">
						<td valign="top">
							<table border="0" cellpadding="10" cellspacing="0" width="100%" style="text-align:left;color:#FFF;">
								<tr>
									<td>
										<p style="font-family: Arial, Helvetica, sans-serif;font-size:14px;line-height:16px;color:#FFF;font-weight:700;margin:0 0 0 15px;">'. date("l d, Y").'</p>
									</td>								
								</tr>
							</table>
						</td>
					</tr>					
					<tr bgcolor="#FFFFFF">
						<td valign="top">
							<table border="0" cellpadding="25" cellspacing="0" width="100%" style="margin:0 0 25px 0;font-family: Arial, Helvetica, sans-serif;font-size:14px;line-height:16px;color:#443429;">
								<tr>
									<td>
									<p style="font-family: Arial, Helvetica, sans-serif;font-size:14px;line-height:16px;color:#443429;font-weight:700;margin-bottom:5px;">User Details:</p>
									<p style="font-family: Arial, Helvetica, sans-serif;color:#443429;margin:0;">
										Name: '.$name.'<br>
										Email: '.$email.'<br>
										Telephone: '.$phone.'
									</p>
									<hr style="margin:25px 50px;height:2px;border:0;background:#f1f1f1;">
									<p style="font-family: Arial, Helvetica, sans-serif;font-size:14px;line-height:16px;color:#443429;font-weight:700;margin-bottom:5px;">Message Details:</p>
									<p style="font-family: Arial, Helvetica, sans-serif;color:#443429;margin:0;">'.$message.'</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr bgcolor="#6C648B">
						<td valign="top">
							<table border="0" cellpadding="25" cellspacing="0" width="100%" style="font-family:Arial; color:#FFF; font-size:15px;line-height:18px;text-align:center;">
								<tr>
									<td>
										<p style="margin:0;">This email was sent from the contact form on the Ridgewood Community Centre website.</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

	<p style="text-align:center">The recorded IP is '.$_SERVER['REMOTE_ADDR'].'</p>';


	$emailFrom = 'noreply@ridgewoodcommunitycentre.org.uk';
	$emailTo = 'david@peak.agency';

	$mail = new PHPMailer;
	$mail->IsMail();
	$mail->CharSet = 'UTF-8';
	$mail->setFrom($emailFrom);
	$mail->addAddress($emailTo);
	$mail->isHTML(true); 
	$mail->Subject = 'Website Enquiry from '.$name;
	$mail->msgHTML($body);	

	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		exit;
	} else {
	
	$body='<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="background-color:#f1f1f1;">
		<tr>
			<td align="center" valign="top">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:750px;margin:auto;">
					<tr bgcolor="#6C648B">
						<td valign="top">
							<table border="0" cellpadding="50" cellspacing="0" width="100%" style="text-align:center;color:#FFF;">
								<tr>
									<td>
										<h1 style="font-family: Arial, Helvetica, sans-serif;font-weight:200;font-size:28px;margin:0;">Website Email Confirmation</h1>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr bgcolor="#585173">
						<td valign="top">
							<table border="0" cellpadding="10" cellspacing="0" width="100%" style="text-align:left;color:#FFF;">
								<tr>
									<td>
										<p style="font-family: Arial, Helvetica, sans-serif;font-size:14px;line-height:16px;color:#FFF;font-weight:700;margin:0 0 0 15px;">'. date("l d, Y").'</p>
									</td>								
								</tr>
							</table>
						</td>
					</tr>					
					<tr bgcolor="#FFFFFF">
						<td valign="top">
							<table border="0" cellpadding="25" cellspacing="0" width="100%" style="margin:0 0 25px 0;font-family: Arial, Helvetica, sans-serif;font-size:14px;line-height:16px;color:#443429;">
								<tr>
									<td>
									<p style="font-family: Arial, Helvetica, sans-serif;font-size:14px;line-height:16px;color:#443429;font-weight:700;margin-bottom:25px;">Thank you '.$name.', your message has been successfully sent.</p>
									<p style="font-family: Arial, Helvetica, sans-serif;font-size:14px;line-height:16px;color:#443429;font-weight:700;margin-bottom:5px;">User Details:</p>
									<p style="font-family: Arial, Helvetica, sans-serif;color:#443429;margin:0;">
										Name: '.$name.'<br>
										Email: '.$email.'<br>
										Telephone: '.$phone.'
									</p>
									<hr style="margin:25px 50px;height:2px;border:0;background:#f1f1f1;">
									<p style="font-family: Arial, Helvetica, sans-serif;font-size:14px;line-height:16px;color:#443429;font-weight:700;margin-bottom:5px;">Message Details:</p>
									<p style="font-family: Arial, Helvetica, sans-serif;color:#443429;margin:0;">'.$message.'</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr bgcolor="#6C648B">
						<td valign="top">
							<table border="0" cellpadding="25" cellspacing="0" width="100%" style="font-family:Arial; color:#FFF; font-size:15px;line-height:18px;text-align:center;">
								<tr>
									<td>
										<p style="margin:0;">This email was sent from the contact form on the Ridgewood Community Centre website.</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

	<p style="text-align:center">The recorded IP is '.$_SERVER['REMOTE_ADDR'].'</p>';

	$mail = new PHPMailer;
	$mail->IsMail();
	$mail->CharSet = 'UTF-8';
	$mail->setFrom($emailFrom);
	$mail->addAddress($email);
	$mail->isHTML(true); 
	$mail->Subject = 'Website Email Confirmation';
	$mail->msgHTML($body);	

	if(!$mail->send()){
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
			echo "success";
		}
	}
}
?>