<?php
$mysqli = new mysqli('mysql.eecs.ku.edu', 'lormiston', 'P@$$word123', 'lormiston');

$username = $_POST["username"];

echo '<h2>';
if ($username == ''){
  echo 'Username cannot be blank';
}
else {
  $query = "INSERT INTO Users (user_id) VALUES ('$user_id')";
  if($result = mspli.query($username)) {
    echo "<p>Hello " . $username . "!</p>"
  }
  else{
    echo "$mysqli->error"
  }
}
?>
