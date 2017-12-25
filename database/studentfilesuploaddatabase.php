
<?php
   if(isset($_REQUEST['filebuttonupload'])){
      $errors= array();
      $file_name = $_FILES['sturesumefile']['name'];
      $file_tmp = $_FILES['sturesumefile']['tmp_name'];
      $file_ext = pathinfo($file_name,PATHINFO_EXTENSION);
	 
      $expensions= array("doc","docx","pdf");
      
       if(in_array($file_ext,$expensions)=== false){
         $errors[] = "extension not allowed, please choose a DOCX or PDF file.";
      }
	  
		if (file_exists("studentfiles/".$_SESSION["UserId"].'/'.$file_name)) {
			 $errors[] = "Sorry, file already exists.";
		}
      
      if(empty($errors)==true)
	  {
		 if (!file_exists('studentfiles/'.$_SESSION["UserId"].'/')) 
		 {
			mkdir('studentfiles/'.$_SESSION["UserId"].'/', 0777, true);
		 }
         move_uploaded_file($file_tmp,"studentfiles/".$_SESSION["UserId"].'/'.$file_name);
		 $_SESSION["MsgFlag"] = true;
         header("Location:index.php?msg=stufile");
      }
	  else
	  {
         echo "<script type='text/javascript'> alertBoxInStuUpdate('".$errors[0]."'); </script>";
      }
   }
    else if(isset($_REQUEST['filebuttondelete'])) // It is used for delete Resume file from file tree.
	{
		
		$path = $_REQUEST["deletefilepath"];
		
		if(($path == "") || (! unlink($path)))
			echo "<script type='text/javascript'> alertBoxInStuUpdate('Error delete file'); </script>";
		
	}
   
?>