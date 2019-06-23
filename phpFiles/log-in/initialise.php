<?php
//this page is responsible for showing the first page the user sees
require_once "../display/header.php";
session_start();
require_once '../createTables.php';
require_once '../PopulateTable.php';
echo "<br>initialise complete<br>";

require_once '../display/header.php';	
		if (!isset($_SESSION['userId'])) 
		{
			echo '<span style="margin-left: 30px;">
          <a href="logIn.php">Login</a>';
		} 	
	require_once 'footer.php';	
?>