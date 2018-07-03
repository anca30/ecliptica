<?php
  
  $db = include('../common/db.php');
  session_start();

  if (isset($_POST['products'])){
  	$conn = new mysqli($db['host'], $db['user'], $db['password'], $db['dbname'], $db['port'], $db['socket'])
    or die ('Could not connect to the database server' . mysqli_connect_error());


    $products = $_POST['products'];
    for($i = 0; $i < count($products); $i++){
    	$removeProduct = "DELETE FROM product WHERE idproduct = " . $products[$i] . ";";
        $result = $conn->query($removeProduct);

        if ($result === TRUE) {
        	echo "succes";
        }
    }
  }
  ?>