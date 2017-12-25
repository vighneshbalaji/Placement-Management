<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'plugin/phpmail/Exception.php';
require 'plugin/phpmail/PHPMailer.php';
require 'plugin/phpmail/SMTP.php';


	if( isset($_REQUEST["plaregregisterbtn"]) )
	{
		$tempinstituteid = "in".substr($_SESSION["UserId"],2);
		
		$q1 = "INSERT INTO `placementdetails`(`instituteid`,`companyid`, `SSLC`, `HSC`, `UG`, `arrear`, `jobinfo`, `date`) VALUES ('$tempinstituteid','$_REQUEST[plaregcompany]','$_REQUEST[plaregsslc]','$_REQUEST[plareghsc]','$_REQUEST[plaregug]','$_REQUEST[plaregarrear]','$_REQUEST[plaregjobinfo]','$_REQUEST[plaregdate]') ";
		
		if(! $db->query($q1) ) die("Unable to connect placement register form q1");
		
		$qr2 = "SELECT `companyname` FROM `company` WHERE `companyid` =  '$_REQUEST[plaregcompany]'";
	
		if(! $res2 = $db->query($qr2)) die("Unable To connect Placement details Register Query2 ");
			
		$rows2 = $res2->fetch_assoc();
		
		$companyname = $rows2["companyname"];
		
		$qr3 = "SELECT `auto_increment` as `id` from information_schema.tables WHERE TABLE_schema = 'placement' and TABLE_NAME = 'placementdetails'";

		if(! $res3 = $db->query($qr3)) die("Unable To placementdetails register Query3 ");
		
		$rows3 = $res3->fetch_assoc();
		
		$placementid = $rows3["id"] - 1;

		
		$date = $_REQUEST["plaregdate"];
		$placementinfo = $_REQUEST["plaregplacementinfo"];		
		$forregister = true;
				
		require("php/placementdetailfilewrite.php");
		
		/* Sent Notfication To all students */
		
		if(date("m") < 6)  $syear = date("Y")-3; else $syear = date("Y")-2;
		
		$syear = substr($syear,2);
		
		
		$qr4 = "SELECT s.`studentid` as `ID` ,s.`studentname` as `name` ,s.`email` as `email` FROM `student` as s
				INNER JOIN `placementdetails` as p 
				on s.`UG` >= p.`UG` and s.`SSLC` >= p.`SSLC` and s.`hsc` >= p.`HSC` and s.`arrear` LIKE IF(p.`arrear` <> 'y','n','_') and p.`placementid` = '$placementid'
				where s.`studentid` LIKE 's".substr($_SESSION["UserId"],2).$syear."%'";
				
		if(! $res4 = $db->query($qr4)) die("Unable To placementdetails register Query4 ");
		
		
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
				
				while($row4 = $res4->fetch_assoc())
				{
					$mail->addAddress($row4["email"],$row4["name"]);     // Add a recipient
				}
				//Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'Placement Drive';
				$mail->Body    = $placementtitleinfo."<br /><br />".str_replace("\n","<br />",$placementinfo);
				$mail->AltBody = $placementtitleinfo.$placementinfo;

				$mail->send();
			}
			catch (Exception $e) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
		
		$_SESSION["MsgFlag"] = true;
		header("Location:index.php?msg=plaregister");
	}

?>