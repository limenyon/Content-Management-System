<?php
//this page is responsible for removing a file from the database
require_once '../DatabaseAccess.php';
require_once '../processes/redirect.php';
$fileName ='';
$sql = "SELECT * FROM siteFiles WHERE fileId = ".$_GET['file'];
$siteFiles = $DBcon->query($sql);
if($siteFiles->rowCount() == 1)
{
    $row = $siteFiles->fetch();
    $fileName = $row['fileName'];
    unlink('../CSSFiles/' . $row['fileName']);
    $sql = "DELETE FROM siteFiles WHERE fileId = ".$row['fileId'];
    $DBcon->exec($sql);
}
redirect('../display/listFiles.php');
?>
