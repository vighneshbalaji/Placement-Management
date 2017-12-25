<?php
	session_start();
	
	require("database/connection.php");
	require("database/companyregisterdatabase.php");
	

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
<script src="js/placement-ajax.js"></script>
<script src="js/placement.js"></script>


</head>
<body class="mainpage-body">

<?php require("sidenavpanel.php"); ?>

<!-- Alert Message -->
<?php require("alerts.php"); ?>

<?php
	if($companydetailuploadflag)
	{
		echo "<script type='text/javascript'> alertBoxInStuUpdate('Successfully Company registered'); </script>";
		$companydetailuploadflag = false;
	}
?>


<!-- This Div for Side Navigation -->
<div id="main" class="mainpage">

	<!-- Mainpage Navbar -->
	<?php require("navbar.php"); ?>
	
	<!-- Student Registration Panel -->
	<?php require("companyregisterpanel.php"); ?>
	
</div>


</body>
</html>
