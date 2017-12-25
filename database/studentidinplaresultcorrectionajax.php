<?php
	
	$list = "";
	
	if( count($_REQUEST["studentrangevalue"]) > 0)
	{
		session_start();
		
		$db = new mysqli("localhost","root","","placement");
		
			if($db->connect_error > 0) die("Unable To connect Database");
			
		/* $qr1 = "SELECT s.`studentid`,s.`studentname` FROM `student` as s
				INNER JOIN `placementdetails` as p 
				on s.`UG` >= p.`UG` and s.`SSLC` >= p.`SSLC` and s.`hsc` >= p.`HSC` and s.`arrear` LIKE IF(p.`arrear` <> 'y','n','_') and p.`placementid` = '$_REQUEST[placementid]'
				where "; */
				
		$qr1 = "SELECT s.`studentid`, s.`studentname` FROM `student` as s
		INNER JOIN `placementdetails` as p on s.`UG` >= p.`UG` and s.`SSLC` >= p.`SSLC` and s.`hsc` >= p.`HSC` 
		and s.`arrear` LIKE IF(p.`arrear` <> 'y','n','_') and p.`placementid` = '$_REQUEST[placementid]'
		INNER JOIN `placementresult` as t on s.`studentid` = t.`studentid` and t.`placementid` = '$_REQUEST[placementid]'
		WHERE ";
		
		$whrclause = "";
		
		foreach ($_REQUEST["studentrangevalue"] as $studentrange){
			$whrclause .= "s.`studentid` LIKE '".$studentrange."%' OR ";
		}
		
		$whrclause = substr($whrclause,0,(strlen($whrclause)-4));
		
		$qr1 .= $whrclause;
		
		if(! $res1 = $db->query($qr1)) die("Unable To connect StudentID list Query1 ");
		
		if(($res1->num_rows) > 0){
		
			while($rows1 = $res1->fetch_assoc())
			{
				$list .= "<option value='$rows1[studentid]'>".strtoupper($rows1['studentid'])." - ".strtoupper($rows1["studentname"])."</option>";
			}
		}
	}
	
	echo $list;

?>