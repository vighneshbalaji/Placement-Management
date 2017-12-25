<?php 

if(isset($_REQUEST["usrchstr"]))
{
	$SearchFlag = false;
	$UserSearchedCompany = $_REQUEST["usrchstr"];
	
	$searchqr1 = "SELECT * FROM company WHERE companyname = '$UserSearchedCompany'";
		if(! $searchres1 = $db->query($searchqr1)) die("Unable To connect Search Query 1 ");
	
	if($searchres1->num_rows < 1){
		$SearchFlag = false;
	}
	else{
		$SearchFlag = true;
	}
		
}
else{
	$SearchFlag = false;
}

?>