<?php
//this page is responsible for resetting the user page
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
require_once '../createTables.php';
require_once '../PopulateTable.php';
redirect("mainPage.php"); 
?>