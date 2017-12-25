<?php

	if( isset($_REQUEST["uptupdatebtn"]) )
	{
		//echo $_REQUEST["studpfile"]["tmp_name"];
		$errors= array();
		$file_name = $_FILES["studpfile"]['name'];
		$file_tmp = $_FILES["studpfile"]['tmp_name'];
		$file_ext = pathinfo($file_name,PATHINFO_EXTENSION);
		 
		$expensions= array("jpg","jpeg");
		  
		   if(in_array($file_ext,$expensions)=== false){
			 $errors[] = "extension not allowed, please choose a JPEG or JPG file.";
		  }
		  
		  if(empty($errors)==true)
		  {
			 move_uploaded_file($file_tmp,"profilephoto/".$_REQUEST["uptstudentid"].substr($file_name,strripos($file_name,"."),strlen($file_name)));		
		  }
		
		$q1 = "UPDATE `student` SET `studentname` = '$_REQUEST[uptstudentname]', `SSLC`= '$_REQUEST[uptstudentsslc]',`HSC`= '$_REQUEST[uptstudenthsc]',`UG`= '$_REQUEST[uptstudentug]', `arrear`= '$_REQUEST[uptstudentarr]', `address`= '$_REQUEST[uptstudentaddress]', `email` = '$_REQUEST[uptstudentmail]',`mobileno`= '$_REQUEST[uptstudentmobno]' WHERE `studentid` = '$_REQUEST[uptstudentid]'";
		
		$q2 = "UPDATE `user` SET `username` = '$_REQUEST[uptstudentname]' WHERE `userid` = '$_REQUEST[uptstudentid]'";
		
		if(! $db->query($q1) ) die("Unable to connect update q1");
		
		if(! $db->query($q2) ) die("Unable to connect update q2");
		  
		
	}

?>