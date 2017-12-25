<?php

	$placementid = $_REQUEST["placementid"];
	$details = "";
	
	if($placementid != "")
	{
		$db = new mysqli("localhost","root","","placement");
		
		if($db->connect_error > 0) die("Unable To connect Database");
			
		$qr1 = "SELECT `companyid`,`SSLC`,`HSC`,`UG`,`arrear`,`jobinfo`,`date` FROM `placementdetails` WHERE `placementid` = '$placementid'";
		
		if(! $res1 = $db->query($qr1)) die("Unable To connect Placement details Query1 ");
		
		$rows1 = $res1->fetch_assoc();
		
		$details = $rows1['companyid']."_";
		$details .= $rows1['SSLC']."_";
		$details .= $rows1['HSC']."_";
		$details .= $rows1['UG']."_";
		$details .= $rows1['arrear']."_";
		$details .= $rows1['jobinfo']."_";
		$details .= $rows1['date']."_";	
		
		$PlacementDetailFilePath = "../placementdetails/".$placementid.".mvb";
		$forread = false;

		require("../php/placementdetailfileread.php");
		
	}
	
	echo $details;

?>
