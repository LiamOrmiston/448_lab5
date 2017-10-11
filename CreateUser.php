<?php
$username = $_POST["username"];

if(mspli.query($username)) {
  echo "<p>Hello " . $username . "!</p>"
}
else {
  echo "<p>There was an error</p>"
}
?>
