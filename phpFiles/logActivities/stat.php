<?php
//this page is responsible for displaying statistics in the stastistics page
    require_once '../display/header.php';
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

    session_start(); 

        if (!(isset($_SESSION['accessLevel'])))
    {
         redirect('../log-in/failedLog.php');
    break;
    }
      if (!$_SESSION['accessLevel']==1)
    {
         redirect('../siteFiles/home.php');
    break;
}

    $logInSuccess = 0;
    $logInFailure = 0;
    $FileViewCount = 0;

    $siteFiles = fopen("systemActivities.txt", "r") or die("unable to open file");
    $textFromFile = '';
    while (! feof($siteFiles))
    {
     $line = fgets ($siteFiles);
     if (substr($line, 15, 7) == 'login_g')
     {
      $logInSuccess++;
     }
     if (substr($line, 15, 7) == 'login_b')
     {
      $logInFailure++;
     }
            if (substr($line, 15, 6) == 'file_v')
     {
      $FileViewCount++;
     }

    }

    fclose($siteFiles);
    $logPercent = 100;
    if ($logErrors != 0)
    {
     $logPercent = floor ($logSuccess / ($logSuccess + $logInFailure) * 100);
    }

    if ( $logInSuccess + $logInFailure != 0)
    {
      $logPercent = floor($logInSuccess / ($logInSuccess +  $logInFailure) * 100 );
    }

    echo '
            <h2>
              Statistics
            </h2>
            <br>
            <table>
              <tr>
                 <th>Number of Successful Actions</th>
                 <th> | Number of Failed User Actions</th>
                 <th> | Success Rate</th>
                 <th> | File View Count</th>
              </tr>
              <tr>
                <td>' . $logInSuccess . '</td>
                <td>' . $logInFailure . '</td>
                <td>' . $logPercent . '%</td>
                <td>' . $FileViewCount . '</td>
              </tr>
            </table>
              ';

    ?>

    <style>
      table td {background-color: #0000; border: solid 1px lightblue; text-align: center; padding-left: 2px; padding-right: 5px;} 
    </style>

    <div id="PageData" style="margin-left: 30px; color: black; font-family: sans-serif; font-size:14px;">
     <p>Statistics Area</p>
     <p>This is the statistics Page. This shows the stats of the user and whether each action they have done was succesful or not</p>

    </div>

    <?php require_once 'display/footer.php'; ?>