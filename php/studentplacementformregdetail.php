<?php
		$plaplacementdetailqr = "SELECT `companyid`,`SSLC`,`HSC`,`UG`,`arrear`,`jobinfo`,`date` FROM `placementdetails` WHERE `status` = 1 and `placementid` = '$placementid'";
		
		if(! $plaplacementdetailres = $db->query($plaplacementdetailqr)) die("Unable To connect placement form register form Query 1 ");
		
		$plaplacementdetailrow = $plaplacementdetailres->fetch_assoc();
		
		$placompanyqr = "SELECT `companyname` FROM `company` WHERE companyid = '$plaplacementdetailrow[companyid]'";
		
		if(! $placompanyres = $db->query($placompanyqr)) die("Unable To connect placement form register Query 2 ");
			
		$placompanyrow = $placompanyres->fetch_assoc();
		
		$plastudentdetailqr1 = "SELECT `studentname`,`SSLC`,`HSC`,`UG`,`arrear`,`mobileno` FROM `student` WHERE `studentid` = '$_SESSION[UserId]'";
		
		if(! $plastudentdetailres1 = $db->query($plastudentdetailqr1)) die("Unable To connect placement form register form Query 3 ");
		
		$plastudentdetailrow1 = $plastudentdetailres1->fetch_assoc();
		
		/* $plastudentdetailqr2 = "SELECT `email` FROM `user` WHERE `userid` = '$_SESSION[UserId]'";
		
		if(! $plastudentdetailres2 = $db->query($plastudentdetailqr2)) die("Unable To connect placement form register form Query 4 ");
		
		$plastudentdetailrow2 = $plastudentdetailres2->fetch_assoc(); */
		
		$details = "";
		
		$PlacementDetailFilePath = "placementdetails/".$placementid.".mvb";
		$forread = true;
		
		require("php/placementdetailfileread.php");
?>