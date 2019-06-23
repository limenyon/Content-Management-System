<?php
//this page is responsible for logging and displaying the error log
require_once '../processes/redirect.php';
session_start();
$activityType = $_GET['activity'];
ini_set('date.timezone', 'Europe/London');
$dated = date("l j F Y, H:i:s",time());
$activityLog = fopen("systemActivities.txt" , "a") or die("Couldn't open systemActivities.txt for writing!");
$text = "Activity type: ". $activityType . ": " . $dated. " - by user id: " . $_SESSION['userId']." IP: " . $_SERVER["HTTP_X_FORWARDED_FOR"] ."\n"; 
fwrite($activityLog, $text) or die("Couldn't write values to file!");
fclose($activityLog);
if(substr($activityType, 0, 4) == 'logi')
{
    if (isset($_SESSION['userId']))
    {
        redirect('../log-in/home.php');
    }
    else
    {
        redirect('../log-in/home.php');
    }
}
    elseif (substr($activityType, 0, 4) == 'file') 
    {
        if (isset($_SESSION['userId']))
        {
            $destinationFile = $_GET['fileId']; 
            $fileToOpen = $_GET['action']; 
            $fileAction = $_GET['activity'];   
            header("Location: ../fileManipulation/".$fileToOpen.".php?file=".$destinationFile); 
        }
        else
        {
            redirect('../log-in/home.php');
        }
    }
        elseif (substr($activityType, 0, 4) == 'user')
        {
            if (isset($_SESSION['userId']))
            {  
              if ($_SESSION['accessLevel'] == 1)
              {
                $targetUser = $_GET['user']; 
                $fileToOpen = $_GET['fileName']; 
                header("Location: ../siteFiles/".$fileToOpen.".php?user=".$targetUser); 
              }
              else
              {
                $targetUser = $_GET['user']; 
                $fileToOpen = $_GET['fileName']; 
                header("Location: ../display/listFiles.php"); 
              }
            }
            else
            {
                redirect('../log-in/home.php');
            }
        }
?>