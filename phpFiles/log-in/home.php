<?php
	//this page is responsible for displaying home page of the site
	session_start();	
    require_once '../display/header.php';
		if (!isset($_SESSION['userId'])) 
		{
			echo '<span style="margin-left: 30px;">
        <a href="logIn.php">Login</a>';
		} 	
	require_once '../display/footer.php';	
?>
