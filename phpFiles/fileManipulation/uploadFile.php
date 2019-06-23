<?php
//this page is responsible for the visual and uploading of a new file
require_once '../processes/redirect.php';
$fileName = basename($_FILES["fileToUpload"]["name"]);
$target_file = "../../CSSFiles/" . $fileName;
if(isset($_POST["uploadFile"])) 
{
    echo '<br>The file\'s type is ' . $_FILES["fileToUpload"]["type"];
    if(file_exists($target_file)) {echo '<br>File/file name is already in the target folder';} else{echo '<br>File/file name is not already in the target folder';}     
    echo '<br>File size is '. $_FILES["fileToUpload"]["size"]. "<br>"; 
    if ($_FILES["fileToUpload"]["type"] != 'text/css')
    {
        redirect('../display/listFiles.php');
       echo '<br>Rejected because the file type is not text/css';
    }    
    elseif (file_exists($target_file))
    {
        redirect('../display/listFiles.php');
       echo '<br>Rejected because the file already exists';
    }    
    elseif ($_FILES["fileToUpload"]["size"] > 5000)
    {
        redirect('../display/listFiles.php');
       echo '<br>Rejected because the file\'s size is over 5000 bytes';
    } 
    elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
    {
        redirect('addToDatabase.php?fileName='. $fileName);
    } 
    else 
    {
        redirect('../display/listFiles.php');
    }
}
else
{ 
   redirect('../display/listFiles.php');
  echo '<br>submit was not used';
}
?>