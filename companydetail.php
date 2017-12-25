<?php
	session_start();
	
	require("database/connection.php");
	require("database/login.php");
	
	#Search Condition & Match
	require("database/searchcondition.php");
	
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
	$('#CompanyAppFilesTree').fileTree({ root: '<?php echo str_replace("\\","/",__DIR__); ?>/companydetails/<?php echo strtolower($UserSearchedCompany); ?>/app/', script: 'php/jqueryFileTree.php' }, function(file) {
			var id = file.substring(0,file.indexOf("/"));
			var filepath = file.substring(file.indexOf("companydetails"),file.length);
			var filename = file.substring(file.lastIndexOf("/")+1,file.length);
			
			$('#jqueryFileTree > li > a ').css('background-color','#ffffff');
			$('#'+id).css('background-color','#3367D6');
			$("#appfilelink").attr("href",filepath);
			$("#appfilelink").attr("download",filename);
			$("#filebuttondownload").prop("disabled",false);
			
		});
});
</script>
<script src="js/placement.js"></script>

</head>
<body class="mainpage-body">

<?php require("sidenavpanel.php"); ?>

<!-- This Div for Side Navigation -->
<div id="main" class="mainpage">

	<!-- Mainpage Navbar -->
	<?php require("navbar.php"); ?>
	
	<!-- Company Details & Company Not Match -->
	<?php
	/* Company Details & Materials Panel */
	if($SearchFlag)
		require("companypanel.php"); 
	else
	{
		?>
		<div class="jumbotron">
			<h2><center>No Company is Matched.. Please try Again</center></h2>
		</div>
		<?php
	}
	
	?>
	
</div>
</body>
</html>