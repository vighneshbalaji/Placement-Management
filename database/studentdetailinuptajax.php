<?php

	$studentid = $_REQUEST["studentid"];
	$details = "";

	if($studentid != "")
	{
		session_start();
		
		$db = new mysqli("localhost","root","","placement");
		
			if($db->connect_error > 0) die("Unable To connect Database");
			
		$qr1 = "SELECT studentname,SSLC,HSC,UG,arrear,address,mobileno,email FROM student WHERE studentid = '$studentid'";

		
		if(! $res1 = $db->query($qr1)) die("Unable To connect Student details Query1 ");
		
				
			$rows1 = $res1->fetch_assoc();
				
				$details = $rows1['studentname']."_";
				$details .= $rows1['SSLC']."_";
				$details .= $rows1['HSC']."_";
				$details .= $rows1['UG']."_";
				$details .= $rows1['arrear']."_";
				$details .= $rows1['address']."_";
				$details .= $rows1['mobileno']."_";
				
				
				if(file_exists("../profilephoto/".$studentid.".jpg"))
				{
					$details .= $rows1['email']."_";
					//$details .= substr(str_replace("\\","/",__DIR__),0,strripos(str_replace("\\","/",__DIR__),"/"))."/profilephoto/".$studentid.".jpg_"; Exisiting Path
					$details .= $studentid.".jpg";
				}
				else
				{
					$details .= $rows1['email'];
				}
						
	}

	echo $details;
	
?>