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
    $username = $_POST['username'];
    $query_post = "SELECT post_id, content, author_id FROM Posts WHERE author_id='$username'";
    $result = $mysqli->query($query_post);
    if(mysqli_num_rows($result) > 0){
    	echo "<h2>$username's posts:</h2>";
    	echo '<table>';
    	echo '<tr><th>post_id</th><th>content</th></tr>';
    	while ($post = $result->fetch_assoc()){
    		echo "<tr><td>" . $post['post_id'] . "</td><td>" . $post['content'] . "</td></tr>";
    	}
    	echo '</table>';
    }
    else{
    	echo "<h2>$username has not made any posts yet!</h2>";
    }
    $result->free();
    echo '</div>';
    $mysqli->close();
    ?>
  </body>
</html>
