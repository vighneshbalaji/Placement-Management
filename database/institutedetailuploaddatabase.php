<?php
	$institutedetailuploadflag = false;
   if(isset($_REQUEST['institutedetailuploadfilebuttonupload'])){
      $errors= array();
      $file_name = $_FILES['institutedetailuploadfile']['name'];
      $file_tmp = $_FILES['institutedetailuploadfile']['tmp_name'];
      $file_ext = pathinfo($file_name,PATHINFO_EXTENSION);
	 
      $expensions= array("txt","mvb");
      
       if(in_array($file_ext,$expensions)=== false){
         $errors[] = "extension not allowed, please choose a Txt or mvb file.";
      }
	  
      
      if(empty($errors)==true)
	  {
         move_uploaded_file($file_tmp,"institutedetails/".$_REQUEST["institutedetailuploadinstituteid"].'/'.$_REQUEST["institutedetailuploadinstituteid"].".mvb");
		 $institutedetailuploadflag = true;
		 
      }
	  else
	  {
         echo "<script type='text/javascript'> alertBoxInStuUpdate('".$errors[0]."'); </script>";
      }
   }
   else if(isset($_REQUEST['institutedetailuploadfilebuttondelete'])) // It is used for delete Resume file from file tree.
	{
		
		$path = $_REQUEST["deletefilepath"];
		
		if(($path == "") || (! unlink($path)))
			echo "<script type='text/javascript'> alertBoxInStuUpdate('Error delete file'); </script>";
		
	}
    
   
?>