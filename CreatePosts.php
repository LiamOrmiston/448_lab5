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
  $query_content = "INSERT INTO Posts (content, author_id) VALUES ('$content', '$username');";
  $query_author = "SELECT * FROM Users WHERE user_id='$username';";
  if ($content == ''){
    echo '<p>Content cannot be blank</p>';
  }
  elseif (mysqli_num_rows($query_author) == 0){
  echo "<h2>User $username does not exist! Please try again or create a new username</h2>";
}
  else{
    if ($result_content= $mysqli->query($query_content)){
      echo "<p>Hello " . $username . "!</p>";
      echo "<p>Your content was successfully posted!</p>";
    }
    else{
      echo "$mysqli->error";
    }
    $result_content->free();
  }
  echo '</div>';
  $mysqli->close();
  ?>
  </body>
</html>
