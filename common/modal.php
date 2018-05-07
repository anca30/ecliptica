<?php
  $db = include('../common/db.php');
  session_start();
  if (isset($_POST['url'])) {
    $url = $_POST['url'];
    $conn = new mysqli($db['host'], $db['user'], $db['password'], $db['dbname'], $db['port'], $db['socket'])
    or die ('Could not connect to the database server' . mysqli_connect_error());

    // SELECT id FROM users WHERE email = $_SESSION[email]
    $id = -1;
    $idQuery = "SELECT id FROM users WHERE email = '" . $_SESSION["email"] . "';";
    $result = $conn->query($idQuery);
    if($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $id = $row["id"];
      $insertUrl = "INSERT INTO  url (url, user) VALUES ('$url', '$id');";
      if ($conn->query($insertUrl) === TRUE) {
        echo "success";
      } else {
          echo "Error: " . $insertUrl . "<br>" . $conn->error;
      }
    } else {
      echo "fail";
    } 

    $conn->close();
  }

?>

