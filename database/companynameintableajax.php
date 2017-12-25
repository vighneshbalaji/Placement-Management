<?php
	
	if(isset($_REQUEST["companyname"]))
	{
		$companyname = $_REQUEST["companyname"];
		$companyflag = false;
		
		$db = new mysqli("localhost","root","","placement");
		
		if($db->connect_error > 0) die("Unable To connect Database");

		$companieslistqr = "select `companyname` from `company`";
		
		if(! $companieslistres = $db->query($companieslistqr))
			die("Unable To connect placement registration form Query 1 ");
		
			while($companieslistrow = $companieslistres->fetch_assoc())
			{
				if($companyname == $companieslistrow["companyname"])
				{
					$companyflag = true;
					break;
				}
			}
		
		echo $companyflag;
		
	}
?>