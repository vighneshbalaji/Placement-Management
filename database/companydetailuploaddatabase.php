<?php
	$companydetailuploadflag = false;
   if(isset($_REQUEST['companydetailuploadfilebuttonupload'])){
      $errors= array();
      $file_name = $_FILES['companydetailuploadfile']['name'];
      $file_tmp = $_FILES['companydetailuploadfile']['tmp_name'];
      $file_ext = pathinfo($file_name,PATHINFO_EXTENSION);
	 
      $expensions= array("txt","mvb");
      
       if(in_array($file_ext,$expensions)=== false){
         $errors[] = "extension not allowed, please choose a DOCX or PDF file.";
      }
	  
      
      if(empty($errors)==true)
	  {
         move_uploaded_file($file_tmp,"companydetails/".$_REQUEST["companydetailuploadcompany"].'/'.$_REQUEST["companydetailuploadcompany"].".mvb");
		 $companydetailuploadflag = true;
		 
      }
	  else
	  {
         echo "<script type='text/javascript'> alertBoxInStuUpdate('".$errors[0]."'); </script>";
      }
   }
   else if(isset($_REQUEST['companydetailuploadfilebuttondelete'])) // It is used for delete Resume file from file tree.
	{
		
		$path = $_REQUEST["deletefilepath"];
		
		if(($path == "") || (! unlink($path)))
			echo "<script type='text/javascript'> alertBoxInStuUpdate('Error delete file'); </script>";
		
	}
    
   
?>