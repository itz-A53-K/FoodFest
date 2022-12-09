<?php 
		   $generator = "1357902468";
  
		   // Iterate for n-times and pick a single character
		   // from generator and append it to $result
			 
		   // Login for generating a random character from generator
		   //     ---generate a random number
		   //     ---take modulus of same with length of generator (say i)
		   //     ---append the character at place (i) from generator to result
		 
		   $result = "";
		 
		   for ($i = 1; $i <= 4; $i++) {
			   $result .= substr($generator, (rand()%(strlen($generator))), 1);
		   }
		
		   //otp_gen_END


		if(isset($_POST['sendmail'])) {
			require 'PHPMailerAutoload.php';
			//require 'credential.php';

			$mail = new PHPMailer;

			$mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'tls://smtp.gmail.com';                  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'gokuui720@gmail.com';                 // SMTP username
			$mail->Password = 'bshvdcsqcvcysoqs';                           // SMTP password
			
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'Dsmart Tutorials');
			$mail->addAddress($_POST['email']);     // Add a recipient or address we want to sent to

			// $mail->addReplyTo(EMAIL);
			// print_r($_FILES['file']); exit;
			// for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
			// 	$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
			// }
			// $mail->isHTML(true);                                  // Set email format to HTML

			// $mail->Subject = $_POST['subject'];
			$mail->Body    = $result;
			// $mail->AltBody = $_POST['message'];

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
		}


		
	 ?>