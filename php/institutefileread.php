<?php

$FilePath = "institutedetails/".$tempinstituteid."/".$tempinstituteid.".mvb";

$InstituteFile = fopen($FilePath, "r") or die("Unable to ".$tempinstituteid." file!");
// Output one line until end-of-file
while(!feof($InstituteFile)) {
  echo fgets($InstituteFile) . "<br>";
}

fclose($InstituteFile);
?>