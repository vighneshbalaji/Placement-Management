<?php
		if( !( isset($_SESSION["LogFlg"]) ) )
			header("Location:index.php");
		
		$db = new mysqli("localhost","root","","placement");
		
		if($db->connect_error > 0) die("Unable To connect Database");
		
?>