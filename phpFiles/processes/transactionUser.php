<?php
//this page is responsible for user transactions being logged into the log
require_once '../DatabaseAccess.php';
session_start();
$userId = $_GET['user'];
$requestType = $_GET['action'];
if (isset($_SESSION['userId'])) 
{
    switch ($requestType) 
    {    
        case 'update':
             if($_SESSION['accessLevel']<3)
            {
                $fileToOpen = "updateUserForm";
                $activityToReport = "user_update_accessed";
            }  
            break;
         case 'add':
            if($_SESSION['accessLevel']<3)
                {
                    $fileToOpen = "addUserForm";
                    $activityToReport = "user_add_accessed";
                }   
            break;
         case 'delete':
            if($_SESSION['accessLevel']<3)
                {
                    $fileToOpen = "deleteUser";
                    $activityToReport = "user_delete_accessed";
                }   
            break;
         case 'view':
            if($_SESSION['accessLevel']==1)
            {
                $fileToOpen = "usersPage";
                $activityToReport = "user_view_accessed";
            } 
            else
            {
                $fileToOpen = "usersPage";
                $activityToReport = "user_access_blocked";
            }        
            break;
         default:
        
                $fileToOpen = "usersPage";
                $activityToReport = "user_access_blocked";
            break;
    } 
    header("Location: ../logActivities/logActivities.php".
           "?activity=".$activityToReport.
           "&user=".$userId.
           "&fileName=".$fileToOpen);}
else
{
   header("Location: ../logActivities/logActivities.php".
          "?activity=user_unregistered_access_blocked".
          "&user=".
          "&fileName=");
}
?>