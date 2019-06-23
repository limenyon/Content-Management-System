<?php
//this page is responsible for uploading files to the database
require_once '../DatabaseAccess.php';
require_once '../processes/redirect.php';
$title= $_POST['title'];
$fileName = $_POST['fileName'];
ini_set('date.timezone', 'Europe/London');
$date = date("Y-m-d H:i:s",time());

$sql = "INSERT IGNORE INTO siteFiles VALUES (NULL, '$date', '$title', '$fileName')";
$DBcon->exec($sql);

redirect('../display/listFiles.php');
?>