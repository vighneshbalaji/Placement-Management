<?php

session_start();

	if( !( isset($_SESSION["LogFlg"]) ) )
	{
		$_SESSION["LogFlg"] = 0;
		$_SESSION["UserType"] = "";
		$_SESSION["UserName"] = "";
		$_SESSION["UserId"] = "";
		$_SESSION["MsgFlag"] = false;
		$_SESSION["UserInstitute"] = "in";
		date_default_timezone_set('Asia/Kolkata');
	}
	

require("database/connection.php");
require("database/login.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Placement Details - AICTE</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1.0, maximum-scale=1, user-scalable=no">

<!-- Bootstrap & jQuery (js,css) -->

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- External CSS & JS -->
<link rel="stylesheet" href="css/placement.css" />
<script src="js/placement.js"></script>

</head>
<body class="mainpage-body">

<?php require("sidenavpanel.php"); ?>

<!-- Alert Message -->
<?php require("alertsmsginindex.php"); ?>
<?php require("alerts.php"); ?>
	

<!-- This Div for Side Navigation -->
<div id="main" class="mainpage">

	<!-- Mainpage Navbar -->
	<?php require("navbar.php"); ?>
	
	<!-- Main Page Off Campus & On Campus Details -->
	<?php
	// if student logged in placement panel will display
	if( ($_SESSION["LogFlg"] == 1) && (($_SESSION["UserType"] == "st") || ($_SESSION["UserType"] == "in") || ($_SESSION["UserType"] == "ad")) )
		require("placementpanel.php"); 	
	else
		require("institutepanel.php");
	?>
</div>



</body>
</html>