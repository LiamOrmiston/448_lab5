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
    $query_user = "SELECT * FROM Users";
    $result = $mysqli->query($query_user);
    if(mysqli_num_rows($result) > 0){
      echo "<select name='username'>";
    	while ($username = $result->fetch_assoc()){
    		echo "<option value='" . $username['user_id'] . "'>" . $username['user_id'] . '</option>';
    	}
    	echo '</select>';
    }
    else{
    	echo '<h2>No usernames exist</h2>';
    }
    $result->free();
    echo '</div>';
    $mysqli->close();
    ?>
  </body>
</html>
