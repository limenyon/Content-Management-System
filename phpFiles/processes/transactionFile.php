<?php
//this page is responsible for logging file transactions into the log
require_once '../DatabaseAccess.php';
session_start();
require_once 'redirect.php';
$fileId = $_GET['file'];
$requestType = $_GET['action'];

if (isset($_SESSION['userId'])) {
    switch ($requestType) 
    {    
        case 'view':
            if('control value')
            {
                $fileToOpen = "viewFileContents";
                $activityToReport = "fileViewed";
                
            }
            break;
         case 'update':
            if('control value')
            {
                $fileToOpen = "updateFile";
                $activityToReport = "fileUpdated";
            }
            break;
         case 'remove':
            if('control value')
            {
                $fileToOpen = "removeFile";
                $activityToReport = "fileRemoved";
            }
            break;
         case 'upload':
            if('control value')
            {
                $fileToOpen = "uploadFile";
                $activityToReport = "fileUploaded";
            }
            break;
         default:
                $fileToOpen = "defaultFile";
                $activityToReport = "fileDefaulted";
            break;
    }
    header("Location: ../logActivities/logActivities.php".
           "?activity=".$activityToReport.
           "&fileId=".$fileId.
           "&action=".$fileToOpen);
}
?>