<?php
//the page is responsible for the addtodatabase page buttons
require_once '../display/header.php';
$fileName = $_GET['fileName'];
echo '<form method="post" action="registerFileWithDatabase.php">
        <h2>Upload File - Add meaningful name</h2>
        <p>
            Name/Title: <br>
            <input type="text" class="title" name= "title" maxlength="255" required="required" value="' . $fileName . '">
            <input type="hidden" class="fileName" name= "fileName" value="' . $fileName . '">
        </p>
        <input type="Submit" name= "action" value="Register File">
    </form>'; 
require_once '../display/footer.php';
?>