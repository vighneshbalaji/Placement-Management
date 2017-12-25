<?php
	$stustuupdateflag = false;
	
	if( isset($_REQUEST["uptstuupdatebtn"]) )
	{
		$q1 = "SELECT * FROM `student` WHERE (`email` = '$_REQUEST[uptstustudentmail]' or `mobileno` = '$_REQUEST[uptstustudentmobno]') and (`studentid` <> '$_SESSION[UserId]')";
		$q2 = "SELECT * FROM `institute` WHERE `email` = '$_REQUEST[uptstustudentmail]'";
		$q3 = "SELECT * FROM `admin` WHERE `email` = '$_REQUEST[uptstustudentmail]'";
		
		if(! ($res1 = $db->query($q1))) die("Unable to connect q1");
		if(! ($res2 = $db->query($q2))) die("Unable to connect q2");
		if(! ($res3 = $db->query($q3))) die("Unable to connect q3");
		
		if( ($res1->num_rows == 0) and ($res2->num_rows == 0) and ($res3->num_rows == 0))
		{
		
			$q4 = "UPDATE `student` SET `address`= '$_REQUEST[uptstustudentaddress]', `mobileno`= '$_REQUEST[uptstustudentmobno]', `email` = '$_REQUEST[uptstustudentmail]' WHERE `studentid` = '$_SESSION[UserId]'";
		
			if(! $db->query($q4) ) die("Unable to connect student update q1");
		
			$_SESSION["MsgFlag"] = true;
		
			header("Location:index.php?msg=stuupdate");
		}
		else
		{
			$stustuupdateflag = true;
		}
		
	}

?>