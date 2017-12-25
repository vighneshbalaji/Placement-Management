<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'plugin/phpmail/Exception.php';
require 'plugin/phpmail/PHPMailer.php';
require 'plugin/phpmail/SMTP.php';


	$forgetpasswrdflg = 0;
	
	if(isset($_REQUEST["forgetpasswrdsubbtn"]))
	{	
		$q1 = "SELECT * FROM `student` WHERE `email` = '$_REQUEST[forgetpasswrdmailid]'";
		$q2 = "SELECT * FROM `institute` WHERE `email` = '$_REQUEST[forgetpasswrdmailid]'";
		$q3 = "SELECT * FROM `admin` WHERE `email` = '$_REQUEST[forgetpasswrdmailid]'";
		
		if(! ($res1 = $db->query($q1))) die("Unable to connect q1");
		if(! ($res2 = $db->query($q2))) die("Unable to connect q2");
		if(! ($res3 = $db->query($q3))) die("Unable to connect q3");
		
		if( ($res1->num_rows > 0) or ($res2->num_rows > 0) or ($res3->num_rows > 0))
		{
			$resetpasswrd = ranstring();
			
			if($res1->num_rows > 0)
			{
				$row = $res1->fetch_assoc();
				
				$usrid = $row["studentid"];
				$usrname = $row["studentname"];
			}
			else if($res2->num_rows > 0)
			{
				$row = $res2->fetch_assoc();
				
				$usrid = $row["instituteid"];
				$usrname = $row["institutename"];
			}
			else if($res3->num_rows > 0)
			{
				$row = $res3->fetch_assoc();
				
				$usrid = $row["adminid"];
				$usrname = $row["adminname"];
			}
			
			$q4 = "UPDATE `user` SET `password` = '$resetpasswrd' WHERE `userid` = '$row[studentid]'";
			if(! $db->query($q4) ) die("Unable to connect q4");
			
			$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
			try {
				//Server settings
				$mail->SMTPDebug = 0;                                 // Enable verbose debug output
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'vighneshbalaji.m';                 // SMTP username
				$mail->Password = 'vicky007';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				//Recipients
				$mail->setFrom('vighneshbalaji@gmail.com', 'KGCAS Admin');
				$mail->addAddress($_REQUEST["forgetpasswrdmailid"],$usrname);     // Add a recipient
				
				//Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'Reset Password';
				$mail->Body    = "Your Placement Site Password is reset<br />Username: <b>$usrname</b><br />Password: <b>$resetpasswrd</b>";
				$mail->AltBody = "Your Placement Site Password is reset  Username: $usrname  Password: $resetpasswrd";

				$mail->send();
			}
			catch (Exception $e) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
		
			$forgetpasswrdflg = 1;
		}
		else
		{
			$forgetpasswrdflg = -1;
		}		
		
	}
?>