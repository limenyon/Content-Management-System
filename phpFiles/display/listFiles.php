<?php
#the list files page is responsible for display the file management page
require_once '../DatabaseAccess.php';
require_once '../display/header.php';
$sql = "SELECT * FROM siteFiles";
$siteFiles = $DBcon->query($sql); 
if($siteFiles->rowCount() != 0)
{
  echo '
        <h2>
          Files registered
          <input type="button" value="Reset" onclick="reset()" style="border-radius: 7px; font-size:7pt; color: red; left: 45%;"/>
        </h2>
        <table>
          <tr>
             <th>ID</th>
             <th>title</th>
             <th>date</th>
             <th>options</th>
          </tr>
          ';
  session_start();
  while ($row = $siteFiles -> fetch()) 
  {
    $update = ' | <input type="button" value="Update" onclick="updateFile(' . $row['fileId'] . ')"/>';
    if($_SESSION['accessLevel'] < 3){
    $delete = ' | <input type="button" value="Remove" onclick="removeFile(' . $row['fileId'] . ')"/>';
    }
    $view =      '<input type="button" value="View" onclick="viewFile(' . $row['fileId'] . ')"/>';
    $upload =    '<input type="button" value="Upload file" onclick="uploadFile()"/>'; 
  
    echo "<tr>
            <td>" . $row['fileId'] . "</td>
            <td>" . $row['title'] . "</td>
            <td>" . date("l j F Y, \@ H:i",strtotime($row['dateModified'])) . "</td>
            <td>". $view . $update . $delete . "</td>
          </tr>";
  }
  echo "</table>";
  echo  $upload;
}
else 
{
  echo '<h3>No files are currently registered.</h3>';
}
require_once 'footer.php'; 
?>
<script>
     function viewFile(file)
     {
          filelocation = "../logActivities/logActivities.php?fileId=" + file + "&activity=file_view&action=viewFileContents";
          myWindow = window.open(filelocation, '_self');
     } 
     function updateFile(file)
     {
          filelocation = "../logActivities/logActivities.php?fileId=" + file + "&activity=file_update&action=updateFile";
          myWindow = window.open(filelocation, '_self');
     } 
     function uploadFile(file)
     {
          filelocation = "../logActivities/logActivities.php?fileId=" + file + "&activity=file_upload&action=fileUploadForm";
          myWindow = window.open(filelocation, '_self');
     } 
     function removeFile(file)
     {
         if(confirm("Are you sure you want to completely remove the file?"))
         {
             filelocation = "../logActivities/logActivities.php?fileId=" + file + "&activity=file_remove&action=removeFile";
             myWindow = window.open(filelocation, '_self');
         }
     } 
     function reset(file)
     {
         if(confirm("Are you sure you want to reset the database and CSS files?"))
         {
             filelocation = "../processes/reset.php";
             myWindow = window.open(filelocation, '_self');
         }
     } 
</script>
<head>
   <body>
       <form action="../log-in/home.php">
                <input type="submit" value="Return" />
            </form>
    </body> 
   
</head>
