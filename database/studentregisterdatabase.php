<?php

	if( isset($_REQUEST["regregisterbtn"]) )
	{
		$tempinstituteid = substr($_SESSION["UserId"],2);
		
		$stupreid = "s".$tempinstituteid.substr($_REQUEST["byearofjoin"],2,2).$_REQUEST["bdepartment"].$_REQUEST["bsection"];
		
		$qr1 = "SELECT * FROM user WHERE userid LIKE '$stupreid%'";
			if(! $res1 = $db->query($qr1)) die("Unable To connect Registration Query 1");		
			
		$startid = $res1->num_rows;
		
		$values1 = "";
		$values2 = "";
		
		for($i = ($startid + 1); $i <= ( $_REQUEST["bnstudents"] + $startid ); $i++)
		{
			$stuid = $stupreid.$i;
			
			$stumail = $stuid."@gmail.com";
			$values1 .= "('$stuid','st','$stuid','$stuid')";
			$values2 .= "('$stuid','$stuid','$stumail')";
			if($i < ( $_REQUEST["bnstudents"] + $startid ))
			{
				$values1 .= ", ";
				$values2 .= ", ";
			}
			
		}
		
		$qr2 = "INSERT INTO user (userid, usertype, username, password) VALUES ".$values1;
			if(! $db->query($qr2)) die("Unable To connect Registration Query 2");
		
		$qr3 = "INSERT INTO student (studentid, studentname, email) VALUES ".$values2;
			if(! $db->query($qr3)) die("Unable To connect Registration Query 3");
			
		/* $qr4 = "ALTER TABLE `user` DROP `id`; ALTER TABLE `user` ADD `id` int NOT NULL UNIQUE AUTO_INCREMENT FIRST;";
			if(! $db->query($qr4)) die("Unable To connect Registration Query 4");
			
		$qr5 = "ALTER TABLE `student` DROP `id`; ALTER TABLE `student` ADD `id` int NOT NULL UNIQUE AUTO_INCREMENT FIRST;";
			if(! $db->query($qr5)) die("Unable To connect Registration Query 5"); */
		
		$_SESSION["MsgFlag"] = true;
		header("Location:index.php?msg=sturegister");
	}

?>