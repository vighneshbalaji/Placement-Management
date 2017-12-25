<?php
	$appmaterialflag = false;
   if(isset($_REQUEST['appmaterialfilebuttonupload'])){
      $errors= array();
      $file_name = $_FILES['appmaterialfile']['name'];
      $file_tmp = $_FILES['appmaterialfile']['tmp_name'];
      $file_ext = pathinfo($file_name,PATHINFO_EXTENSION);
	 
      $expensions= array("doc","docx","pdf","txt");
      
       if(in_array($file_ext,$expensions)=== false){
         $errors[] = "extension not allowed, please choose a DOCX or PDF file.";
      }
	  
		if (file_exists("companydetails/".$_REQUEST["appmaterialcompany"].'/app/'.$file_name)) {
			 $errors[] = "Sorry, file already exists.";
		}
      
      if(empty($errors)==true)
	  {
         move_uploaded_file($file_tmp,"companydetails/".$_REQUEST["appmaterialcompany"].'/app/'.$file_name);
		 $appmaterialflag = true;
		 
      }
	  else
	  {
         echo "<script type='text/javascript'> alertBoxInStuUpdate('".$errors[0]."'); </script>";
      }
   }
   else if(isset($_REQUEST['appmaterialfilebuttondelete'])) // It is used for delete Resume file from file tree.
	{
		
		$path = $_REQUEST["deletefilepath"];
		
		if(($path == "") || (! unlink($path)))
			echo "<script type='text/javascript'> alertBoxInStuUpdate('Error delete file'); </script>";
		
	}
    
   
?>