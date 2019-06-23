<?php 
  #the header is called in all pages that are displayed and is responsible for the style, identifying browser, cookies and navigation
	session_start();
?>
<html>
	<head>
		<title>Access control example</title>
		<style>
			#headerArea{ color:#800000; position: relative; left: 50px;}
			#loginTitle { color: #800000; font-size: 16pt; font-weight: 600;}
			#mainArea { color: #800000; font-size: 12pt; position: relative; left: 30px;}
		</style>
        <?php 
        $browser = "";
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        
        if(preg_match("/Firefox/i", $user_agent)){
            $browser = "Firefox";
        }
        else if(preg_match("/OPR/i", $user_agent)){
            $browser = "Opera";
        }
        else if(preg_match("/Trident/i", $user_agent)){
            $browser = "Edge";
        }
        else if(preg_match("/iPad/i", $user_agent)){
            $browser = "Safari";
        }
        else{
            $browser = "Chrome";
        }
        require_once '../../CSSFiles/cssOption.php';
        echo $cssOption;
        ?>
	</head>
	 <body>
        <script>
            var browser = "<?php echo $browser ?>";
        var expireDate = new Date();
            var oneWeek = 60*60*24*7;
            expireDate.setTime(expireDate.getTime() + oneWeek);
            var expires = "expires="+ expireDate.toUTCString();
            document.cookie = "innerheight=" + window.innerHeight + ";" + expires + ";path=/";
            document.cookie = "outerheight=" + window.outerHeight + ";" + expires + ";path=/";
            document.cookie = "innerwidth=" + window.innerWidth + ";" + expires + ";path=/";
            document.cookie = "outerwidth=" + window.outerWidth + ";" + expires + ";path=/";
            document.cookie = "browser=" + browser + ";" + expires + ";path=/";
            function onChangeHeight()
            {
            location.reload();
            }
            window.onresize = onChangeHeight;
        </script>
		<div id="headerArea">
			<div id="loginTitle">
				<p>Access Controlled site Example</p>
			</div>
			<?php
				if (isset($_SESSION['lastName']))
				{
					echo '<div id="loggedIn">';
					echo '<p style="margin-left: 30px;">Welcome '
                .$_SESSION['firstName']." ".$_SESSION['lastName']."</p>";
					echo '</div>';
				}
			?>
		</div>
		<div id="mainArea">
			<div id="navigation">
				<?php
						if (isset($_SESSION['lastName']))  
						{
							echo '<a href="../display/listFiles.php">Content Management System</a>';
							
							if ($_SESSION['accessLevel']== 1)
							{
								echo ' | <a href="../logActivities/systemActivities.txt">Logs and analytics</a>';
							}
							if ($_SESSION['accessLevel'] == 1)
							{
								echo ' | <a href="../siteFiles/mainPage.php">Edit Users</a>';
							}
							echo ' | <a href="../log-in/transactionUser.php?action=Logout">Logout</a>';
                            echo ' | <a href="../logActivities/stat.php">Statistics</a>';
						}
					?>
			</div> 
       