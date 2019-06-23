<?php
//this page is responsible for the logging in proccess
require_once '../DatabaseAccess.php';
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
if (isset($_REQUEST['action']))
{
switch ($_REQUEST['action'])
{
case 'Log in':
if (isset($_POST['email']) and isset($_POST['password']))
{
$sql = "SELECT userId, accessLevel, firstName , lastName
FROM users
WHERE email='".$_POST['email'] ."'
AND password ='".$_POST['password'] ."'";
echo $sql."<br>";
$result = $DBcon->query($sql);
if($row = $result->fetch()){
session_start();
$_SESSION['userId'] = $row['userId'] ;
$_SESSION['accessLevel'] = $row['accessLevel'];
$_SESSION['firstName'] = $row['firstName'];
$_SESSION['lastName'] = $row['lastName'];
redirect('../logActivities/logActivities.php?activity=login_good');
}
else
{
redirect('../logActivities/logActivities.php?activity=login_bad');
echo "<br>Log-in failed<br>";
}
}
break;
case 'Logout':
session_start();
session_unset();
session_destroy();
redirect('home.php');
break;
case 'Cancel':
session_start();
session_unset();
session_destroy();
redirect('home.php');
break;
}
}
?>