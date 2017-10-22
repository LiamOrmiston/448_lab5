<?php
$mysqli = new mysqli('mysql.eecs.ku.edu', 'lormiston', 'P@$$word123', 'lormiston');

$username = $_POST["username"];
echo '<body>';
echo '<div>';
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
  $result->free();
}
echo '</h2>';
echo '</div>';
echo '</body>';
$mysqli->close();
?>
