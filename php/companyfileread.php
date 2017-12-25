<?php

$FilePath = "companydetails/".$UserSearchedCompany."/".$UserSearchedCompany.".mvb";

$CompanyFile = fopen($FilePath, "r") or die("Unable to ".$UserSearchedCompany." file!");
// Output one line until end-of-file
while(!feof($CompanyFile)) {
  echo fgets($CompanyFile) . "<br>";
}

fclose($CompanyFile);
?>