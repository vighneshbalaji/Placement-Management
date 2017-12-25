<?php

	$plaresultflag = false;
	

	if( isset($_REQUEST["plaresultcorrectionsubbtn"]) )
	{
		$q1 = "DELETE FROM `placementresult` WHERE `placementid` = '$_REQUEST[plaresultcorrectionplacementid]' AND ";
		
		$whrclause = "";
		
		foreach($_REQUEST["plaresultcorrectionstudentid"] as $studentid)
		{
			$whrclause .= "`studentid` = '".$studentid."' OR ";
		}
		
		$whrclause = substr($whrclause,0,(strlen($whrclause)-4));
		
		$q1 .= $whrclause;	
		
		if(! $db->query($q1) ) die("Unable to connect update q1");
		
		$plaresultflag = true;
		
	}

?>