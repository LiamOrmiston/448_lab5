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
      echo '<input type="submit" value="Submit">';
    }
    else{
    	echo '<h2>No posts exist</h2>';
    }
    $result->free();
    echo '</div>';
    $mysqli->close();
    ?>
  </body>
</html>
