<?php
//this page is responsible for resetting the list files
require_once '../processes/redirect.php';
require_once '../createTables.php';
require_once '../PopulateTable.php';
$files = glob('../CSSFiles/*.css'); 
foreach($files as $file)
{
    if(is_file($file))
    {
       unlink($file);
    }
}
$files = glob('../CSSBackup/*.css'); 
foreach($files as $file)
{
    if(is_file($file))
    {
      $destination =  "../CSSFiles/" . basename($file).PHP_EOL; 
      $source =  $file;     
      shell_exec("cp -r $source $destination"); 
    }
}
redirect('../display/listFiles.php');
?>