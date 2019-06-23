<html>
    <!-- This page is responsible for showing the main page and sending the data for the log abot user transactions -->
    <head>
        <title>Add-Update-Delete data</title>
         <style> 
             table td {background-color: #fafaff; border: solid 1px blue; text-align: center; padding-left: 5px; padding-right: 5x;} 
             #logobar {color: blue; font-size: 16pt;} 
             p {color: #800000; font-family: verdana;}
        </style> 
        <script>
            function addUser(user)
            {

                filelocation = "../logActivities/logActivities.php?user=" + user + "&activity=user_add&fileName=addUserForm";
                window.open(filelocation, '_self');
            } 
            function updateUser(user)
            {
                filelocation = "../logActivities/logActivities.php?user=" + user + "&activity=user_update_user&fileName=updateUserForm";
                window.open(filelocation, '_self');
            } 
            function deleteUser(user)
            {
                //go to the view page for this file
                filelocation = "../logActivities/logActivities.php?user=" + user + "&activity=user_deleteUser&fileName=deleteUser";
                window.open(filelocation, '_self');
            } 
            function resetUsers(user)
            {
                //reset the users table
                filelocation = "../logActivities/logActivities.php?user=" + user + "&activity=user_resetUsers&fileName=resetUsers";
                window.open(filelocation, '_self');
            }
        </script>
    </head>
    <body>
        <div id="logobar">Example activity to add, update and remove data from a database via Javascript and buttons.</div>
        <div id="mainArea">
            <p>This page is the main page to display users that are stored in the 'users' table.</p>
            <p>The names etc are extraced from the table using SQL.</p>
            <p>The buttons use Javascript to open php pages and in all bar the' Add new' and 'Reset' cases will send the user's Id number via the URL bar.</p>
            <p>The reset is there to recover from deleting all users - it will result in the replacement of the table with a new one and repopulate it.</p>
            <p>This page therefore will use a mix of URL/GET and form/POST methods for sending data to another page/file.</p>
            <hr>
            <h3>Registered users</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Access level</th>
                    <th colspan="2">Options</th>
               </tr>
                <?php
                require_once '../DatabaseAccess.php';
                require_once '../display/header.php';
                $sql = "SELECT * FROM users where accessLevel > 0";
                $users = $DBcon->query($sql); 
                if($users->rowCount() > 0 )
                {
                    while ($row = $users->fetch())
                    { 
                        echo "<tr><td>".$row['userId']."</td>";
                        echo "<td>".$row['firstName']."</td>";
                        echo "<td>".$row['lastName']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['accessLevel']."</td>";
                        echo '<td><input type="button" value="Update" onclick="updateUser(' . $row['userId'] . ')"/></td>';
                        echo '<td><input type="button" value="Delete" onclick="deleteUser(' . $row['userId'] . ')"/></td></tr>';
                    }
                } 
                else 
                {
                    echo "<tr><td colspan='7'>No one is currently registered.</td></tr>";
                } 
                ?>
            </table>
            <input type="button" value="Add user" onclick="addUser()"/>
            <hr>
            <input type="button" value="Reset contents" onclick="resetUsers()"/>
            <form action="../log-in/home.php">
                <input type="submit" value="Return" />
            </form>
            
        </div>
    </body>
</html>