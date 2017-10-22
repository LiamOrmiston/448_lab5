<html>
  <body>
  <?php
  $mysqli = new mysqli('mysql.eecs.ku.edu', 'lormiston', 'P@$$word123', 'lormiston');

  // connection test
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  echo '<p>About to post</p>';
  $username = $_POST['username'];
  echo '<p>Posted</p>';
  // echo "<p>Hello " . $username . "!</p>";
  echo '<div>';
  echo '<h2>';
  if ($username == ''){
    echo 'Username cannot be blank';
  }
  else {
    echo '<p>Inside else statement</p>';
    $query = "INSERT INTO Users (user_id) VALUES ('$username')";
    if($result == mysqli->query($query)) {
      echo "<p>In the if statement</p>";
      echo "<p>Hello " . $username . "!</p>";
      echo "<p>username should have been posted above this line</p>";
    }
    else{
      echo "<p>error message should be below</p>"
      echo "$mysqli->error";
    }
  }
  echo '</h2>';
  echo '</div>';
  $mysqli->close();
  ?>
  </body>
</html>
