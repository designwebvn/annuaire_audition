<?php 
/* 
 Contact us file
 */ 

/* Validation errors array */
$errors = array();

/* Validation check */
 if(empty($_POST['name'])){
 	$errors[] = 'Name field  is required !';
 }


 if(empty($_POST['email'])){
 	$errors[] = 'Email field  is required !';
 }


 if(empty($_POST['msg'])){
 	$errors[] = 'Message field  is required !'; 
 }

/* Check if no errors */

 if(empty($errors[0])){

 	$name = $_POST['name']; // Full name
 	$email = $_POST['email']; // Sender email
 	$msg = $_POST['msg']; // email content
 	$intersted = $_POST['intrested']; // email content
 	$subject = " Title of email "; // email title ( Ex. Mail from my site )
 	$to = "Your_Email@Website.com"; // Owner email here ( who will receive the mails )


 	$sent = mail($to,$subject,$msg,"From:$email\n"); // sent email

 	/* check if email sent success */

 	if($sent)
 		echo 'Sent Success'; 
 	else
 		echo 'enable to send';
 }else{

 	/* return errors */ 

 	echo implode('<br />', $errors);
 }