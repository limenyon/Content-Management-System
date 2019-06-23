<?php
//this page is responsible for resetting the tables
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
  # -------------------------------------------------------  
  require_once 'createTables.php';
  require_once 'PopulateTable.php';
echo "<br>table populated<br>";
  require_once '../resetFiles/emptyCssFilesFolder.php';
echo "<br>folder emptied<br>";
  require_once '../resetFiles/copyCSSFiles.php';
  redirect('../Display/listFiles.php');
?>