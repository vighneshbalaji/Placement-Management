<?php

	$rmvflag = false;
	
	if( isset($_REQUEST["plaremovermvbtn"]))
	{
		
		$q2 = "DELETE FROM `studentplacementregister` WHERE `placementid` = '$_REQUEST[plaremoveplacementid]'";
		
		if(! $db->query($q2) ) die("Unable to connect update q2");
		
		$q3 = "DELETE FROM `placementresult` WHERE `placementid` = '$_REQUEST[plaremoveplacementid]'";
		
		if(! $db->query($q3) ) die("Unable to connect update q3");
		
		$q1 = "DELETE FROM `placementdetails` WHERE `placementid` = '$_REQUEST[plaremoveplacementid]'";
		
		if(! $db->query($q1) ) die("Unable to connect update q1");		
		
		
		$path = substr(str_replace("\\","/",__DIR__),0,strripos(str_replace("\\","/",__DIR__),"/"))."/placementdetails/".$_REQUEST["plaremoveplacementid"].".mvb";
		
		if(($path == "") || (! unlink($path)))
			$rmvflag = true;
	}

?>