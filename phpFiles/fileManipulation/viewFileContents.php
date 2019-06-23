<?php
//this page is responsible for the display of the file contents page
require_once '../DatabaseAccess.php';
require_once '../display/header.php';
$sql = "SELECT * FROM siteFiles WHERE fileId = ".$_GET['file'];
$siteFiles = $DBcon->query($sql);
if($siteFiles->rowCount() == 1) 
{
  $row = $siteFiles->fetch();  
  if( pathinfo($row['fileName'], PATHINFO_EXTENSION) == 'css')
   {  
    $myfile = fopen('../../CSSFiles/' . $row['fileName'], "r") or die("Unable to open file " . $row['fileName']);
    echo '<div id="heading">
            <h3>'.$row['title'].'</h3>
          </div>
          <div style="color: #333399; margin-left: 3%;">
            <p>Last modified on '.date("l j F Y, \@  H:i",strtotime($row['dateModified'])).'</p>
          </div> 
          <div class="fileInfo">';
    $textFromFile = '';
    while(!feof($myfile)) 
    {
      $textFromFile = $textFromFile . fgets($myfile). "            <br>";
    }
    fclose($myfile);
    echo $textFromFile;
    echo '
          </div>
          <br>
          <input type="button" value="Return to home page" onclick="home(\'listFiles.php\');"/>';              
  }  
}
require_once '../display/footer.php';
?>
<script>
  function home(file)
  {
      myWindow = window.open('../display/' +  file,'_self');
  } 
</script>