<?php

	if( isset($_REQUEST["msg"]) && $_SESSION["MsgFlag"])
	{
		switch($_REQUEST["msg"])
		{
			case "sturegister":
				echo "<script type='text/javascript'> alertBoxInStuUpdate('<strong>Successfully</strong> students record registered'); </script>"; break;
			case "plaregister":
				echo "<script type='text/javascript'> alertBoxInStuUpdate('<strong>Successfully</strong> placement details Registered'); </script>"; break;
			case "stuplaregister":
				echo "<script type='text/javascript'> alertBoxInStuUpdate('<strong>Successfully</strong> placement form Registered'); </script>"; break;
			case "stuplaupdate":
				echo "<script type='text/javascript'> alertBoxInStuUpdate('<strong>Successfully</strong> placement form Updated'); </script>"; break;
			case "stufile":
				echo "<script type='text/javascript'> alertBoxInStuUpdate('<strong>Successfully</strong> Files Uploaded'); </script>"; break;
		}
		
		$_SESSION["MsgFlag"] = false;
	}


?>