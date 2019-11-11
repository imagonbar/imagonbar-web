<?php
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
   //header("Content-Type: text/html;charset=utf-8");
   header("Content-Type: application/javascript");

   // Check for empty fields
   if(empty($_POST['name'])  		||
      empty($_POST['email']) 		||
      empty($_POST['phone']) 		||
      empty($_POST['subject'])   ||
      empty($_POST['message'])	||
      !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
      {
      	echo "No arguments Provided!";
         return false;
   }
   	
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];
  	
   // Create the email and send the message
   $to = 'imagonbar88@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
   $email_subject = "$subject";
   $email_body = "Nuevo correo vía web (web.imagonbar.com)\n\n\nNombre: $name\nEmail: $email\nTeléfono: $phone\nMensaje:$message";
   $headers = "From: $name $email\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
   $headers .= "Reply-To: $email";	
   mail($to,$email_subject,$email_body,$headers);
   return true;			
?>