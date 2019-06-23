<?php
//this page is responsible for the main page 
require_once '../DatabaseAccess.php';
require_once '../display/header.php';
try	
{
  $sql = $sql = "SELECT * FROM users";
  $result = $DBcon->query($sql);
  if($row = $result->fetch() == false)
  {
    #
    require_once '../database/populateTables.php';
  }  
}
catch(PDOException $e)
{
  require_once '../database/createTables.php';
  require_once '../database/PopulateTable.php';
}
#--------------------------------------------------------
# 
#--------------------------------------------------------
require_once 'mainPage.php'; 
?>