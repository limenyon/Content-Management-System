<?php  
//this page is responsible for upload file form
require_once '../display/header.php'; 
  echo '
      <h2>Selecting and uploading a CSS file</h2>
      <form action="uploadFile.php" method="post" enctype="multipart/form-data">
        Select CSS file to upload:
        <input type="file" name="fileToUpload"><br><br>
        <input type="submit" value="Upload file" name="uploadFile">
      </form>
      <input type="Submit" name= "" value="Cancel" onclick="window.history.back();">';
require_once '../display/footer.php';
?>