<html>
  <body>
    <?php
    $mysqli = new mysqli('mysql.eecs.ku.edu', 'lormiston', 'P@$$word123', 'lormiston');
    // connection test
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    echo '<div>';
    $user_query = "SELECT user_id FROM Users";
    $result = $mysqli->query($user_query);
    if(mysqli_num_rows($result) > 0){
    	echo '<h2>Users</h2>';
    	echo '<table>';
    	echo '<tr><th>user_id</th></tr>';
    	while ($user = $result->fetch_assoc()){
    		echo "<tr><td>" . $user['user_id'] . "</td></tr>";
    	}
    	echo '</table>';
    }
    else{
    	echo '<h2>No users exist</h2>';
    }
    $result->free();
    echo '</div>';
    $mysqli->close();
    ?>
  </body>
</html>
