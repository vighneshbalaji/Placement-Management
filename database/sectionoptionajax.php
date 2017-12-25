<?php

	

	$value = $_REQUEST["departmentvalue"];
	$list = "";
	
	if($value != "")
	{
		$list = "<option value='' selected>Select One</option>";
		session_start();
		
		$db = new mysqli("localhost","root","","placement");
		
			if($db->connect_error > 0) die("Unable To connect Database");
		
		$tempinstituteid = "in".substr($_SESSION["UserId"],2);
		
		$qr1 = "SELECT sections FROM departmentinfo WHERE instituteid = '$tempinstituteid' AND departmentname = '$value'";
			if(! $res1 = $db->query($qr1)) die("Unable To connect Section list Query1 ");
			
		if(($res1->num_rows) < 1) die("No Such Sections Found in institute");
		else
		{
			$rows1 = $res1->fetch_assoc();
			
			for($i = 0; $i < $rows1["sections"]; $i++)			
			{
				$list .= "<option value='".chr(97+$i)."'>".chr(65+$i)."</option>";
			}
		}
			
	}

	echo $list;


?>