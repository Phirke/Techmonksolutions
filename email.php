<?php
    $success = '';
    $errors='';
    // $succe = 'Form is successfully submitted'; //email subject 

    //  $name = $_POST['name'];
    //  $email = $_POST['email'];
    
    //  $message = $_POST['message'];

	$name = $_POST['name'];
    $email = $_POST['email']; 
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $mailmessage = '
		<h3 align="center">Techmonk Contact Details</h3>
		<table border="1" width="100%" cellpadding="5" cellspacing="5">
			<tr>
				<td width="30%">Name</td>
				<td width="70%">'.$_POST["name"].'</td>
			</tr>
			<tr>
				<td width="30%">Email Address</td>
				<td width="70%">'.$_POST["email"].'</td>
			</tr>
			<tr>
				<td width="30%">Phone</td>
				<td width="70%">'.$_POST["phone"].'</td>
			</tr>
			<tr>
				<td width="30%">Subject</td>
				<td width="70%">'.$_POST["subject"].'</td>
			</tr>
			<tr>
				<td width="30%">Message</td>
				<td width="70%">'.$_POST["message"].'</td>
			</tr>
			 
		</table>
	';
// mail body

    
	//error_reporting(1);
	use PHPMailer\PHPMailer;
    use PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
	//Load Composer's autoloader
	
	//Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer\PHPMailer();
	
	try {
			//Server settings
			$mail->SMTPDebug = false;                      //Enable verbose debug output
			$mail->isSMTP();      
			                                    //Send using SMTP
			$mail->Host       =	'mail.techmonksolutions.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   =  true;                                   //Enable SMTP authentication
			$mail->Username   = 'admin@techmonksolutions.com';                     //SMTP username
			$mail->Password   = 'admin@techmonk2022';                               //SMTP password
			$mail->SMTPSecure = "TLS";         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587;  
			$mail->SMTPAutoTLS = false;                                  //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		
			//$content = "{$data}";
		
			$mail->IsHTML(true);
			$mail->AddAddress("tejas@techmonksolutions.com"); //sendto 
			$mail->SetFrom($email); // from this address
// 			$mail->SetSubject($subject);
			$mail->AddCC("tejas@techmonksolutions.com");
			$mail->Subject = $subject;
			$mail->Body = $mailmessage;
			
       
		if($mail->send()){
		    $_POST = array();
		    $success = 'Message has been sent';
		    header('Location: success.php');
		}else{
		    header('Location: error.php');
		}
	} catch (Exception $e) {
		$errors = 'Message could not be sent.';
	}
	

	echo $success;

?>