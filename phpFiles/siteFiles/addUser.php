<?php
//this page is responsible for adding a user to the database
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
if($_REQUEST['action'] =='Add user')
{
    require_once '../DatabaseAccess.php';
    $firstName= $_POST['firstName']; 
    $lastName= $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $accessLevel = $_POST['accessLevel'];
    $sql = "INSERT IGNORE INTO users VALUES (NULL,'$email','$password','$firstName','$lastName','$accessLevel')";
    $DBcon->exec($sql);
}
redirect("mainPage.php"); 

?>