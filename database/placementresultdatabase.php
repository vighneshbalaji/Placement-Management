<?php

	$plaresultflag = false;
	$plaresultexistingstudentid = "";
	$count = 0;
	$existingstudentcount = 0;

	if( isset($_REQUEST["plaresultuptsubbtn"]) )
	{
		$q1 = "INSERT INTO `placementresult` (`placementid`,`studentid`) VALUES ";
		
		$valclause = "";
		
		foreach($_REQUEST["plaresultuptstudentid"] as $studentid)
		{
			$q2 = "SELECT * FROM `placementresult` WHERE `studentid` = '$studentid' AND `placementid` = '$_REQUEST[plaresultuptplacementid]'";
			
			if(! $res1 = $db->query($q2)) die("Unable To connect Placement result studentid query 2 ");
			
				if(($res1->num_rows) != 1)
					$valclause .= "('$_REQUEST[plaresultuptplacementid]','$studentid'), ";
				else
				{
					$plaresultexistingstudentid .= $studentid." ";
					$existingstudentcount++;
				}
				
			$count++;
		}
		
		$valclause = substr($valclause,0,(strlen($valclause)-2));
		
		$q1 .= $valclause;	
		
		if($count != $existingstudentcount)
			if(! $db->query($q1) ) die("Unable to connect update q1");
		
		$plaresultflag = true;
		
	}

?>