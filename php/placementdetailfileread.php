<?php



$PlacementDetailFile = fopen($PlacementDetailFilePath, "r") or die("Unable to ".$placementid." file!");
// Output one line until end-of-file
while(!feof($PlacementDetailFile)) {
	if($forread)
		$details .= fgets($PlacementDetailFile)."<br />";
	else
		$details .= fgets($PlacementDetailFile);
}

fclose($PlacementDetailFile);

?>