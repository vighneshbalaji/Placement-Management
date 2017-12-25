



<?php

/* TO FIND LAST DATE OF A GIVEN MONTH

LAST_DAY(DATE)	
EX:
LAST_DAY(CURRENT_DATE)
 */
 
/*  echo date('Y-m-d', strtotime("+3 months"))  */
 
 $indicesServer = array('PHP_SELF', 
'argv', 
'argc', 
'GATEWAY_INTERFACE', 
'SERVER_ADDR', 
'SERVER_NAME', 
'SERVER_SOFTWARE', 
'SERVER_PROTOCOL', 
'REQUEST_METHOD', 
'REQUEST_TIME', 
'REQUEST_TIME_FLOAT', 
'QUERY_STRING', 
'DOCUMENT_ROOT', 
'HTTP_ACCEPT', 
'HTTP_ACCEPT_CHARSET', 
'HTTP_ACCEPT_ENCODING', 
'HTTP_ACCEPT_LANGUAGE', 
'HTTP_CONNECTION', 
'HTTP_HOST', 
'HTTP_REFERER', 
'HTTP_USER_AGENT', 
'HTTPS', 
'REMOTE_ADDR', 
'REMOTE_HOST', 
'REMOTE_PORT', 
'REMOTE_USER', 
'REDIRECT_REMOTE_USER', 
'SCRIPT_FILENAME', 
'SERVER_ADMIN', 
'SERVER_PORT', 
'SERVER_SIGNATURE', 
'PATH_TRANSLATED', 
'SCRIPT_NAME', 
'REQUEST_URI', 
'PHP_AUTH_DIGEST', 
'PHP_AUTH_USER', 
'PHP_AUTH_PW', 
'AUTH_TYPE', 
'PATH_INFO', 
'ORIG_PATH_INFO') ; 

echo '<table cellpadding="10">' ; 
foreach ($indicesServer as $arg) { 
    if (isset($_SERVER[$arg])) { 
        echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ; 
    } 
    else { 
        echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ; 
    } 
} 
echo '</table>' ; 

//echo __DIR__;

//echo str_replace("\\","/",__DIR__);

/* $studentid = "s115csb1";
if(file_exists("profilephoto/".$studentid.".jpg"))
	echo str_replace("\\","/",__DIR__)."/profilephoto/".$studentid.".jpg"."_";
 */
 
/*  if(date("m") < 6)  $syear = date("Y")-1; else $syear = date("Y");
 
 echo substr($syear,2);
 */
 
 echo str_replace("Hai","bye","Hai vighneshbalaji Hai",$replacecount);
 
 echo $replacecount;
 
 
 
 
 ?>
 