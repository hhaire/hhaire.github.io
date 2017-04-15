<?php
session_start();
include_once "function.php";

/******************************************************
*
* download by username
*
*******************************************************/

$username=$_SESSION['username'];
$mediaID=$_REQUEST['id'];

//insert into upload table
//$insertDownload="insert into download(downloadid,username,mediaID) values(NULL,'$username','$mediaID')";
$queryresult = mysql_query($insertDownload)
	
?>


