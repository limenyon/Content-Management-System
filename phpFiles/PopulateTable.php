<?php 
//this page is responsible for deleting and populating tables
try
{
    $email = "admin@yoursite.com";
    $password = "admin";
    $firstName = "A";
    $lastName = "Admin";
    $accessLevel = "1";  
    $sql = "INSERT IGNORE INTO users VALUES (NULL,'$email', '$password', '$firstName','$lastName', $accessLevel )";    
    $DBcon->exec($sql);
    echo "<br>populateTables - 1st user created successfully";
  
    $email = "user2@yoursite.com";
    $password = "user2";
    $firstName = "A level 2";
    $lastName = "User";
    $accessLevel = "2";
    $sql = "INSERT IGNORE INTO users VALUES (NULL,'$email', '$password', '$firstName','$lastName', $accessLevel )";
    $DBcon->exec($sql);
    echo "<br>populateTables - 2nd user created successfully";     
#************************************************************

    $email = "user3@yoursite.com";
    $password = "user3";
    $firstName = "A level 3";
    $lastName = "User";
    $accessLevel = "3";
    $sql = "INSERT IGNORE INTO users VALUES (NULL,'$email', '$password', '$firstName','$lastName', $accessLevel )";
  
	  $DBcon->exec($sql);
    echo "<br>populateTables - 3rd user created successfully";
 }
catch(PDOException $e)
  {
    echo $sql . "<br>" . $e->getMessage();
 }
ini_set('date.timezone', 'Europe/London');
	$date = date("Y-m-d H:i:s",time());
	$title = "CSS for Main Site";
	$fileName = 'mainPage.css';
	$sql = "INSERT IGNORE INTO siteFiles VALUES (NULL, '$date', '$title', '$fileName')";
	$DBcon->exec($sql);
	ini_set('date.timezone', 'Europe/London');
	$date = date("Y-m-d H:i:s",time());
	$title = "CSS for Main Site - alternate";
	$fileName = 'mainPageAlternate.css';
	$sql = "INSERT IGNORE INTO siteFiles VALUES (NULL, '$date', '$title', '$fileName')";
	$DBcon->exec($sql);
echo "files populated";
?>