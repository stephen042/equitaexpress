<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$msg = '';
$sitemail = "";
$sitename = "";
	if (isset($_POST['submit'])) {
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$message = trim($_POST['message']);

		if (!empty($name) && !empty($email) && !empty($message)) {
			require_once "PHPMailer/PHPMailer.php";
    		require_once 'PHPMailer/Exception.php';
    		$mail = new PHPMailer;
		    $mail->setFrom($sitemail);
		    $mail->FromName = $sitename;
		    $mail->addAddress("$sitemail");
		    $mail->isHTML(true);
		    $mail->Subject = "Contact Form";
		    $mail->Body = "<table>
		    	<tr> Name - </tr>
		    	<tr> ".$name." </tr><br><br>
		    	<tr> Email - </tr>
		    	<tr> ".$email." </tr><br><br>
		    	<tr> Message - </tr>
		    	<tr> ".$message." </tr><br><br>
		     </table>";
		    $send = $mail->send();
		    if ($send) {
		    	echo "<script>alert('Message has been sent'); window.location.href = 'contact.html' </script>";
		    	
		    }
		}
		
	}
?>