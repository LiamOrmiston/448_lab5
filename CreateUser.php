<html>
  <body>
  <?php
  $mysqli = new mysqli('mysql.eecs.ku.edu', 'lormiston', 'P@$$word123', 'lormiston');
  // connection test
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $username = $_POST['username'];
  echo '<div>';
  echo '<h2>';
  if ($username == ''){
    echo '<p>Username cannot be blank</p>';
  }
  $exists = "SELECT * FROM Users WHERE user_id='".$username."';";
  $run_exists = $mysqli->query($exists);
  if (mysqli_num_rows($run_exists) > 0) {
    echo "<p>Username already exists. Please choose a different username.</p>";
  }
  else{
    $query = "INSERT INTO Users (user_id) VALUES ('$username')";
    if ($result = $mysqli->query($query)){
      echo "<p>Hello " . $username . "!</p>";
    }
    else{
      echo "$mysqli->error";
    }
    $result->free();
  }
  echo '</h2>';
  echo '</div>';
  $mysqli->close();
  ?>
  </body>
</html>
