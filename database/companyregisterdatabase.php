<?php

$companydetailuploadflag = false;

	if(isset($_REQUEST["companyregregisterbtn"]))
	{
		
		$qr1 = "SELECT * FROM `company`";
			if(! $res1 = $db->query($qr1)) die("Unable To connect Registration Query 1");		
			
		$companyid = ($res1->num_rows)+1;
		
		$qr2 = "INSERT INTO `company` (`companyid`,`companyname`) VALUES ('$companyid','$_REQUEST[companyregcompanyname]')";
		
		if(! $db->query($qr2)) die("Unable To connect Registration Query 2");		
				
				
		if (!file_exists('companydetails/'.$_REQUEST["companyregcompanyname"].'/')) 
		 {
			mkdir('companydetails/'.$_REQUEST["companyregcompanyname"].'/', 0777, true);
			mkdir('companydetails/'.$_REQUEST["companyregcompanyname"].'/app/', 0777, true);
		 }
		
		$errors1 = array();
		$file_name1 = $_FILES['companyregcompanylogofile']['name'];
		$file_tmp1 = $_FILES['companyregcompanylogofile']['tmp_name'];
		$file_ext1 = pathinfo($file_name1,PATHINFO_EXTENSION);
	 
		$expensions1= array("png");
      
       if(in_array($file_ext1,$expensions1)=== false){
         $errors1[] = "extension not allowed, please choose a Png file.";
		$companydetailuploadflag = false;
	   }
      
      if(empty($errors1)==true)
	  {
         move_uploaded_file($file_tmp1,'companydetails/'.$_REQUEST["companyregcompanyname"].'/'.$_REQUEST["companyregcompanyname"].".png");
		 $companydetailuploadflag = true;
		 
      }
	  
		$errors2 = array();
		$file_name2 = $_FILES['companyregcompanydetailfile']['name'];
		$file_tmp2 = $_FILES['companyregcompanydetailfile']['tmp_name'];
		$file_ext2 = pathinfo($file_name2,PATHINFO_EXTENSION);
	 
		$expensions2= array("txt","mvb");
      
       if(in_array($file_ext2,$expensions2)=== false){
         $errors2[] = "extension not allowed, please choose a txt or mvb file.";
		$companydetailuploadflag = false;
	   }
      
      if(empty($errors2)==true)
	  {
         move_uploaded_file($file_tmp2,'companydetails/'.$_REQUEST["companyregcompanyname"].'/'.$_REQUEST["companyregcompanyname"].".mvb");
		 $companydetailuploadflag = true;
		 
      }
	
	
	}

?>