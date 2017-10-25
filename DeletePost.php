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
    echo "<h2>Select what posts you'd like to delete</h2>";

    echo '<form action="DeletePost.php" method="POST">';
    $query_post = "SELECT post_id, content, author_id FROM Posts";
    $result = $mysqli->query($query_post);

    if(mysqli_num_rows($result) > 0){
      echo "<table>";
      echo '<tr><th>author_id</th><th>content</th><th>post_id</th><th>Delete?</th></tr>';
      while ($post = $result->fetch_assoc()){
      echo '<tr>';
      echo '<td>' . $post['author_id'] . '</td>';
      echo '<td>' . $post['content'] . '</td>';
      echo '<td>' . $post['post_id'] . '</td>';
      echo "<td><input type='checkbox' name='" . $post["post_id"] . "' value='del'></input></td>";
      echo '</tr>';
      }
      echo '</table>';
      echo '<br>';
      echo '<input type="submit" value="Submit" onclick="return RefreshWindow()>';
    echo '</form>';
    }
    else{
    	echo '<h2>No posts exist</h2>';
    }
    $result->free();
    echo '</div>';

    echo '</div>';
    $query_delete = "SELECT post_id FROM Posts";
    $result_delete = $mysqli->query($query_delete);
    if(mysqli_num_rows($result_delete) > 0){
    	while ($post = $result_delete->fetch_assoc()){
    		if($_POST[$post['post_id']] == 'del'){
    			if ($mysqli->query("DELETE FROM Posts WHERE post_id=" . $post['post_id'])){
    				echo "<p>Post ID: " . $post['post_id'] . " has successfully been deleted</p>";
    			}
    			else{
    				echo "<p>Post ID: " . $post['post_id'] . " failed to delete</p>";
    			}
    		}
    	}
    }
    else{
    	echo '<h2>Nothing to delete</h2>';
    }
    $result->free();
    echo '</div>';
    $mysqli->close();
    ?>
  </body>
</html>
