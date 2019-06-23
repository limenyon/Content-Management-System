<?php
//this page is responsible updating the user in the database
session_start();
function redirect($url) 
{
    if (!headers_sent()) 
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] .
        dirname($_SERVER['PHP_SELF']) . '/' . $url);
    } 
    else 
    {
        die('Could not redirect; Headers already sent (output).');
    } 
}
if($_REQUEST['action'] =='Update user')
{
  require_once '../DatabaseAccess.php';
  $firstName= $_POST['firstName']; 
  $lastName= $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $accessLevel = $_POST['accessLevel'];

  $userId = $_GET['user'];

  $sql = "UPDATE users ".
      "SET firstName ='" . $firstName."', 
      lastName ='" .$lastName."', 
      email ='". $email."', 
      password ='". $password."', 
      accessLevel ='". $accessLevel."' 
      WHERE userId = ".$userId; 

  $DBcon->exec($sql);
}
redirect("mainPage.php");
?>