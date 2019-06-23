<?php
try 
	  {
      header("Location:phpFiles/log-in/initialise.php");
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
?>
<html>
    <head>   
        <script>
        </script>
        
    </head> 
    
    <body>
    </body>
</html>