<?php

	$studentdetailqr1 = "SELECT `studentname`,`mobileno`,`address`,`email` FROM `student` WHERE `studentid` = '$_SESSION[UserId]'";
	
	if(! $studentdetailres1 = $db->query($studentdetailqr1)) die("Unable To connect Student update detail from Student form query 1");
			
	$studentdetailrow1 = $studentdetailres1->fetch_assoc();
	
	

?>