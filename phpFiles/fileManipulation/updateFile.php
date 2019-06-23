<?php
//this page is responsible for this page is responsiblefor updating the preexisting files
require_once '../DatabaseAccess.php';
require_once '../display/header.php';
$sql = "SELECT * FROM siteFiles WHERE fileId = ".$_GET['file'];
$siteFiles = $DBcon->query($sql);
if($siteFiles->rowCount() == 1) 
{
    $row = $siteFiles->fetch();
    if( pathinfo($row['fileName'], PATHINFO_EXTENSION) == 'css')
    {
      $myfile = fopen('../../CSSFiles/' . $row['fileName'], "r") or die("Unable to open file ../CSSFiles" . $row['body']);
      $textFromFile = '';
      while(!feof($myfile)) 
      {
        $textFromFile = $textFromFile . fgets($myfile);
      }
      fclose($myfile);
      echo '
      <form method="post" action="saveFile.php?name='.$row['fileName'].'&file='.$row['fileId'].'">
      <h2>Update File</h2>
      <p>Title: <br>
      <input type="text" class="fileInfo" name= "title" size="44" maxlength="255" value="'.$row['title'] .'"/></p>
      <p>Last modified: '.date("l j F Y, \@ H:i",strtotime($row['dateModified'])).'</p>
      <p>Body: <br>
      <textarea class="fileInfo" name="bodyText" rows="20" cols="84">'.$textFromFile.'</textarea></p>
      <input type="Submit" name= "action" value="Update file">
      <input type="Submit" name= "action" value="Cancel">
    </form>';
    }
}
require_once '../display/footer.php';
?>