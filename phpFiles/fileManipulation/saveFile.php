<?php
//this page is responsible for uploading a new file to the database
require_once '../DatabaseAccess.php';
require_once '../processes/redirect.php';
try
{
  if ($_REQUEST['action'] == "Update file")
  { 
    $title = $_POST['title'];
    $bodyText = $_POST['bodyText'];
    $fileName= $_GET['name'];
    $fileId = $_GET['file'];
    if ($title)
    {
      $file= fopen('../../CSSFiles/' . $fileName , "w") or die('Unable to open file ../../CSSFiles/' . $fileName . "for writing!");
      fwrite($file, $bodyText) or die("Couldn't write values to file!"); 
      fclose($file);
      ini_set('date.timezone', 'Europe/London');
      $date = date("Y-m-d H:i:s",time());
      $sql = "UPDATE siteFiles SET dateModified='" . $date . "', title ='" .$title."' WHERE fileId = ".$fileId;
      $DBcon->exec($sql);
      redirect('../display/listFiles.php');
    }
  }
  else
  {
    redirect('../display/listFiles.php');
  }
}
catch (Exception $e) 
{
  echo $e->getMessage();
}
?>