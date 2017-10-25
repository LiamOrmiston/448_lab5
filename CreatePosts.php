<html>
  <body>
  <?php
  $mysqli = new mysqli('mysql.eecs.ku.edu', 'lormiston', 'P@$$word123', 'lormiston');
  // connection test
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $content = $_POST['content'];
  $username = $_POST['username'];
  echo '<div>';
  if ($content == ''){
    echo '<p>Content cannot be blank</p>';
  }
  else{
    $query_content = "INSERT INTO Posts (content) VALUES ('$content');";
    $query_author = "INSERT INTO Posts (author_id) VALUES ('$username');";
    if ($result_author = $mysqli->query($query_author)){
      echo "<p>Hello " . $username . "!</p>";
    }
    if ($result_content = $mysqli->query($query_content)){
      echo "<p>Your content was successfully posted!</p>";
    }
    else{
      echo "$mysqli->error";
    }
    $result_author->free();
    $result_content->free();
  }
  echo '</div>';
  $mysqli->close();
  ?>
  </body>
</html>
