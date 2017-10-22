<html>
  <body>
  <?php
  $mysqli = new mysqli('mysql.eecs.ku.edu', 'lormiston', 'P@$$word123', 'lormiston');
  // echo "top";
  // connection test
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $username = $_POST['username'];
  // echo "posted";
  // echo '<div>';
  // echo '<h2>';
  if ($username == ''){
    echo 'Username cannot be blank';
  }
  // echo "past empty username check";
  // $exists = "SELECT * FROM Users WHERE user_id='$username'";
  // echo "created exists";
  // $result = $mysqli->query($exists);
  // echo "after result";
  // else if (mysqli_num_rows($result) > 0) {
  //   echo "Username already exists. Please choose a different username."
  // }
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
