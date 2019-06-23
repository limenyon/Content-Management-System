<?php
//this page is responsible for deleting a user from the database
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
require_once '../DatabaseAccess.php';
$userId = $_GET['user'];
$sql = "DELETE FROM users WHERE userId = ".$userId;
$DBcon->exec($sql);

redirect("mainPage.php"); 

?>