<?php
	session_start();
	
	require("database/connection.php");
	require("database/studentplacementregformdatabase.php");
	
	if(isset($_REQUEST['placementid']))
			$placementid = $_REQUEST['placementid'];
	
	$chckvalidplaqr = "select `instituteid` from `placementdetails` where `instituteid` like '".$_SESSION["UserInstitute"]."%' and `placementid` = '$placementid'";
		if(! $chckvalidplares = $db->query($chckvalidplaqr)) die("Unable To connect  student placement form register form validation user query ");
	
	#if user belong institute and placement belong institute equal then this page shows results 
	#else it will shows error.
	if(($chckvalidplares->num_rows) >= 1) 
	{
		
	require("php/studentplacementformregdetail.php");

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
	 $('#StudentFilesTree').fileTree({ root: '<?php echo str_replace("\\","/",__DIR__); ?>/studentfiles/<?php echo $_SESSION["UserId"]; ?>/', script: 'php/jqueryFileTree.php' }, function(file) {
			var id = file.substring(0,file.indexOf("/"));
			var filename = file.substring(file.lastIndexOf("/")+1,file.length);
			
			$('#jqueryFileTree > li > a ').css('background-color','#ffffff');
			$('#'+id).css('background-color','#3367D6');
			$("#stuplaregresfile").val(filename);
			$("#stuplaregresfilename").text(filename);
			$("#stuplaregregisterbtn").prop("disabled",false);
			$("#stuplaregupdatebtn").prop("disabled",false);
			
		});
	$('#CompanyAppFilesTree').fileTree({ root: '<?php echo str_replace("\\","/",__DIR__); ?>/companydetails/<?php echo $placompanyrow["companyname"]; ?>/app/', script: 'php/jqueryFileTree.php' }, function(file) {
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
	
	<!-- Form For Register, Eligibity, Materials & Company Details -->
	<?php require("placementformregisterpanel.php"); ?>
	
</div>
</body>
</html>

<?php 
    }
	else
		echo "<h1>404 Not Found. Please Recheck Your Details. </h1>"
?>