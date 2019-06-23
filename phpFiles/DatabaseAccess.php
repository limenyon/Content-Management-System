<?php
//this page is responsible for accessing the database in multiple pages
$DBhost = 'localhost';
$DBuser = 'Leon';
$DBpassword = 'Cilke';
$DBname = 'LeonDatabase';
try {
    $DBcon = new PDO("mysql: host=$DBhost; dbname=$DBname" ,$DBuser, $DBpassword);
    $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    die($ex->getMessage());
}    
?>