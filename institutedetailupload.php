<?php
	session_start();
	
	require("database/connection.php");
	/* Institute Details Upload */
	require("database/institutedetailuploaddatabase.php");
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
<script src="js/jquery.easing.js" type="text/javascript"></script>
<script src="js/jqueryFileTree.js" type="text/javascript"></script>
<link href="css/jqueryFileTree.css" rel="stylesheet" type="text/css" media="screen" />

<!-- External CSS & JS -->
<link rel="stylesheet" href="css/placement.css" />
<script language="javascript">
$(document).ready(function(){
	 $('#fileTreeDemo').fileTree({ root: '<?php echo str_replace("\\","/",__DIR__); ?>/institutedetails/<?php echo "in".substr($_SESSION["UserId"],2)."/" ?>', script: 'php/jqueryFileTree.php' }, function(file) {
			var id = file.substring(0,file.indexOf("/"));
			var path = file.substring(file.indexOf("/")+1,file.length);
			
			$('#jqueryFileTree > li > a ').css('background-color','#ffffff');
			$('#'+id).css('background-color','#3367D6');
			$("#deletefilepath").val(path);
		});
});
</script>
<script src="js/placement.js"></script>

</head>
<body class="mainpage-body">

<?php require("sidenavpanel.php"); ?>

<!-- Alert Message -->
<?php require("alerts.php"); ?>

<?php
	if($institutedetailuploadflag)
	{
		echo "<script type='text/javascript'> alertBoxInStuUpdate('Institute detail upload successfully'); </script>";
		$institutedetailuploadflag = false;
	}
?>


<!-- This Div for Side Navigation -->
<div id="main" class="mainpage">

	<!-- Mainpage Navbar -->
	<?php require("navbar.php"); ?>
	
	<!-- Students Files Manage -->
	<?php require("institutedetailuploadpanel.php"); ?>
	
	
</div>
</body>
</html>