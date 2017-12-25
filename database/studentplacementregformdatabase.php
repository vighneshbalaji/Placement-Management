<?php
	
	$qr1 = "SELECT * FROM `studentplacementregister` WHERE `placementid` = '$_REQUEST[placementid]' AND `studentid` = '$_SESSION[UserId]'";
			if(! $res1 = $db->query($qr1)) die("Unable To connect  student placement form register form q1");

	if( isset($_REQUEST["stuplaregregisterbtn"]) )
	{
		if(($res1->num_rows) != 1)
		{
			
		$q2 = "INSERT INTO `studentplacementregister` (`placementid`, `studentid`, `resume`, `date`) VALUES ('$_REQUEST[stuplaregplacementid]','$_SESSION[UserId]','$_REQUEST[stuplaregresfile]','".date("Y-m-d")."') ";
		
		if(! $db->query($q2) ) die("Unable to connect student placement form register form q2");
		
		$_SESSION["MsgFlag"] = true;
		header("Location:index.php?msg=stuplaregister");
		
		}
	}
	else if( isset($_REQUEST["stuplaregupdatebtn"]) )
	{
		$q3 = "UPDATE `studentplacementregister` SET `resume` = '$_REQUEST[stuplaregresfile]', `date` = '".date("Y-m-d")."' WHERE `placementid` = '$_REQUEST[stuplaregplacementid]' and `studentid` = '$_SESSION[UserId]'";
		if(! $db->query($q3) ) die("Unable to connect student placement form register form q3");
		
		$_SESSION["MsgFlag"] = true;
		header("Location:index.php?msg=stuplaupdate");
	}

?>