<?php


	$value = $_REQUEST["studentrangevalue"].'%';
	$list = "";
	
	if($value != "")
	{
		session_start();
		
		$db = new mysqli("localhost","root","","placement");
		
			if($db->connect_error > 0) die("Unable To connect Database");
			
		$qr1 = "SELECT studentid FROM student WHERE studentid LIKE '$value'";
		
		if(! $res1 = $db->query($qr1)) die("Unable To connect StudentID list Query1 ");
		
		if(($res1->num_rows) > 0) $list = "<option value='' selected>Select One</option>";
		
			while($rows1 = $res1->fetch_assoc())
			{
				$list .= "<option value='$rows1[studentid]'>".strtoupper($rows1['studentid'])."</option>";
			}
			
	}

	echo $list;
	
?>