<?php

$venue = substr($placementinfo,strpos($placementinfo,"Venue:")+6,(strpos($placementinfo,"\n",strpos($placementinfo,"\n")+3) - (strpos($placementinfo,"Venue:")+6))-1);
	
$placementtitleinfo = $companyname." Placement Drive on ".date("F jS, Y",strtotime($date))." ".$venue.PHP_EOL.PHP_EOL;

$PlacementDetailFilePath = "placementdetails/".$placementid.".mvb";

$PlacementDetailFile = fopen($PlacementDetailFilePath, "w") or die("Unable to ".$placementid." file!");

if($forregister)
fwrite($PlacementDetailFile,$placementtitleinfo);

fwrite($PlacementDetailFile,$placementinfo);

//fwrite($PlacementDetailFile,"About ".$companyname.PHP_EOL); For PHP_EOL

fclose($PlacementDetailFile);
?>