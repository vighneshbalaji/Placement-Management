<?php
	
	$resetpasswrdflag = 0;

	if(isset($_REQUEST["resetpasswrdsubbtn"]))
	{
		$q1 = "SELECT `password` FROM `user` WHERE `userid` = '$_SESSION[UserId]'";
		
		if(! ($res1 = $db->query($q1))) die("Unable to connect q1");
		
		$row1 = $res1->fetch_assoc();
		
		if($row1["password"] == $_REQUEST["resetpasswrdcurpasswrd"])
		{
			$q2 = "UPDATE `user` SET `password` = '$_REQUEST[resetpasswrdnewpasswrd]' WHERE `userid` = '$_SESSION[UserId]'";
			
			if(!  $db->query($q2)) die("Unable to connect q2");
			
			$resetpasswrdflag = 1;
		}
		else
			$resetpasswrdflag = -1;
		
		
	}

?>