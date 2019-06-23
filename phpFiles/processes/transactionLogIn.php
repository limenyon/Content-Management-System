<?php
//this page is responsible for logging login transactions for the log
require_once '../DatabaseAccess.php';
require_once 'redirect.php';
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
                redirect("../logActivities/logActivities.php?activity=login_success");
            }
            else
            {                 
                redirect("../logActivities/logActivities.php?activity=login_failure");
            }
        }
        break;
    case 'Logout':
        session_start();
        session_unset();
        session_destroy();
        redirect('../log-in/home.php');
        break;
    case 'Cancel':
        session_start();
        session_unset();
        session_destroy();
        redirect('../log-in/home.php');
        break;
}
}
?>