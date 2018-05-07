<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shopping</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/modalFunctions.js"></script>
  <link rel="stylesheet" href="css/css.css" type="text/css">
  <link rel="stylesheet" href="css/page.css" type="text/css">
  <link rel="stylesheet" href="css/modal1.css" type="text/css">
  <link rel="stylesheet" href="css/list.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <?php include('common/navbar.php'); ?>

  <div class="sidenav">
    <h2> List Actions </h2>
<!-- Trigger/Open The Modal -->
    <button class="button3" id="myBtn">Add link</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Add a link</h2>
    </div>
    <div class="modal-body">
      <input type="text" name="url" id="txt" style=" width: 1000px; position: relative;">
    </div>
    <div class="modal-footer">
      <br> </br>
      <button type="button" id="save" class="btn btn-primary" onclick="saveUrl()">Save changes</button>
      <button type="button" id="close" class="btn btn-default" data-dismiss="modal" onclick="closeUrlModal()">Close</button>
       <br> </br>
    </div>
  </div>


</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
  

</script>

<br></br>
<button type="button" class="button3">Remove
    </button>
    <br> </br>

<button type="button" class="button3">Share
    </button>
    <br> </br>
  </div>

  <div class = "main">
    <?php
      $db = include('C:\Apache24\htdocs\Shop\common\db.php');
     // $tableHtml = "<table><tr><th>Name </th><th>Brand</th></tr><tr><th>Price</th></tr></table>";
      $total = 0;
    
      $conn = new mysqli($db['host'], $db['user'], $db['password'], $db['dbname'], $db['port'], $db['socket']) or die ('Could not connect to the database server' . mysqli_connect_error());
      $id = -1;
      $idQuery = "SELECT id FROM users WHERE email = '" . $_SESSION["email"] . "';";
      $result = $conn->query($idQuery);
     if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $id = $row["id"];
        //echo $id;
        $idProduct = -1;
        $idProductQuery = "SELECT idproduct, name, brand, price, imageUrl FROM product WHERE iduser = $id;";
        $result1 = $conn->query($idProductQuery);
       // $row = mysqli_fetch_assoc($result1);
        echo "<table border='1'>
        <tr>
        <th>Nmme</th>
        <th>Brand</th>
        <th>Price</th>
        <th>Image</th>


        </tr>";
   
        while($row = mysqli_fetch_assoc($result1)){
          //$tableHtml .= "<tr><td>" . $row["name"] . "</td><td>" . $row["brand"] . "</td></tr>" . $row["price"] . "</td></tr>" ;
          //echo $tableHtml;
          //$total += $row["Pret"];
          /*echo $row["idproduct"];
          echo "</br>";
          echo $row["name"];
          echo "</br>";
          echo $row["brand"];
          echo "</br>";
          echo $row["price"];
          echo "</br>";
          echo $row["imageUrl"];*/
          echo "<tr>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['brand'] . "</td>";
          echo "<td>" . $row['price'] . "</td>";
          echo "<td><img src='" . $row['imageUrl'] . "' width='56' height='56'></td>";
          echo "</tr>";
        
        }
        echo "</table>";
    }

?>

    
</div>

<?php include('common/footer.php'); ?>



</body>
</html>