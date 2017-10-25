<html>
  <body>
  <?php
  $mysqli = new mysqli('mysql.eecs.ku.edu', 'lormiston', 'P@$$word123', 'lormiston');
  // connection test
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $post = $_POST['post'];
  $username = $_POST['username']
  echo '<div>';
  if (post == ''){
    echo '<p>Posts cannot be blank</p>';
  }
  else{
    $query_post = "INSERT INTO Posts (post) VALUES ('$username');";
    $query_author = "INSERT INTO Posts (author_id) VALUES ('$username');";
    if ($result_author = $mysqli->query($query_author)){
      echo "<p>Hello " . $username . "!</p>";
    }
    if ($result_post = $mysqli->query($query_post)){
      echo "<p>Your post was successfully stored!</p>";
    }
    else{
      echo "$mysqli->error";
    }
    $result_author->free();
    $result_post->free();
  }
  echo '</div>';
  $mysqli->close();
  ?>
  </body>
</html>
