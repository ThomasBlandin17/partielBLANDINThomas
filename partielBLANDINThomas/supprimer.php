<?php

$conn = new mysqli('localhost','root','root','partiel');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_GET['id'])) {
      $id = $_GET['id'];
  
      $query = "DELETE FROM partiel WHERE id=$id";
      mysqli_query($conn, $query);
  }
    $conn->close();

header("Location: index.php");
exit();

?>