<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shopping</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/modalFunctions.js"></script>
  <script src="js/remove.js"></script>
  <script src="js/functions.js"></script>
  <link rel="stylesheet" href="css/css.css" type="text/css">
  <link rel="stylesheet" href="css/page.css" type="text/css">
  <link rel="stylesheet" href="css/modal1.css" type="text/css">
  <link rel="stylesheet" href="css/list.css" type="text/css">
  <link rel="stylesheet" href="css/checkbox.css" type="text/css">
  <link rel="stylesheet" href="css/table.css" type="text/css"> 
  <!-- <link rel="stylesheet" href="css/search.css" type="text/css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="cart.png" type="image/png"/>
</head>

<body>


  <?php include('common/navbar.php'); ?>
  <div class="main">
    <div class="content sidenav">
      <h2> List Actions </h2>
  <!-- Trigger/Open The Modal -->
      <button class="button3" id="myBtn">Add link</button>

      <br></br>
      <button type="button" class="button3" onclick="remove()">Remove</button>
      <br> </br>
      <button type="button" class="button3" id="shareBtn">Share</button>
      <br> </br>
      <button type="button" class="button3" id = "help" onclick = "help()">Need help</button>
      <br> </br>
      <button type="button" class="button3" id = "print" onclick = "printPage()">Print</button>
      <br> </br>
    </div>

  <div class="content products">
  <br>
    <input type="text" id="searchInput" class="searchInput" onkeyup="searchInTable()" placeholder="Search for products ...">
  </br>

  <div id="tableLoader" class="tableGif"><img src="images/gifspinner.gif"></div>
  <div id="productsTable"></div>
  <script>
    getProductsTable();
  </script>

  </div>
</div>


<?php include('common/footer.php'); ?>

<!-- The Modal add link -->
<div id="myModal" class="modal">
  <div class=" modal-dialog">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Add link</h2>
    </div>
    <div class="modal-body">
      <input type="text" class="form-control" name="url" id="txt">
    </div>
    <div class="modal-footer">
      <br> </br>
      <button type="button" id="save" class="btn btn-primary" onclick="saveUrl()">Save changes</button>
      <button type="button" id="close" class="btn btn-default" data-dismiss="modal" onclick="closeUrlModal()">Close</button>
       <br> </br>
    </div>
  </div>
</div>
</div>

<!-- Modal pt remove -->
<div id="removeModal" class="modal">
<div class="modal-dialog"> 
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Remove</h2>
    </div>
    <div class="modal-body">
      <p>Please, select the products you want to remove!</p>
    </div>
    <div class="modal-footer">
      <br> </br>
      <button type="button" id="confirm" class="btn btn-default" data-dismiss="modal" onclick="closeRemoveModal()">Ok</button>
       <br> </br>
    </div>
  </div>
</div>
</div>

<script>
  // Get the modal
  var modal2 = document.getElementById('removeModal');

  // Get the button that opens the modal
  var btn2 = document.getElementById("myBtn2");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn2.onclick = function() {
      modal2.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
      modal2.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal2) {
          modal2.style.display = "none";
      }
  }
</script>

<!-- The Share Modal -->
<div id="shareModal" class="modal">
  <div class="modal-dialog"> 
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Add People</h2>
    </div>
    <div class="modal-body">
      <span id="addPeopleErrNoEmail" style="color: red; display: none;">Please add at least one e-mail address!</span>
      <span id="addPeopleErrMatch" style="color: red; display: none;">Usage: first@email.com second@email.com ... last@email.com</span>
      <input type="text" class="form-control" name="email" id="email">
    </div>
    <div class="modal-footer">
      <br> </br>
      <button type="button" id="share" class="btn btn-primary" onclick="share()">Share</button>
      <button type="button" id="close" class="btn btn-default" data-dismiss="modal" onclick="closeShareModal()">Close</button>
       <br> </br>
    </div>
  </div>
</div>
</div>

<script>
  // Get the modal
  var modal = document.getElementById('myModal');
  var shareModal = document.getElementById('shareModal');

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  var shareBtn = document.getElementById("shareBtn");

  // Get the <span> element that closes the modal
  var closeSpanList = document.getElementsByClassName("close");

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
      modal.style.display = "block";  
  }

  shareBtn.onclick = function() {
    shareModal.style.display = "block";
  }

  
  // When the user clicks on <span> (x), close the modal
  
  for(var i = 0; i < closeSpanList.length; i++) {
    closeSpanList[i].onclick = function() {
        var modalToBeClosed = document.getElementsByClassName("modal");
        modalToBeClosed[i].style.display = "none";
    }
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      var anyModal = document.getElementsByClassName("modal");

      for(var i = 0; i < anyModal; i++) {
        if (event.target == anyModal[i]) {
            anyModal[i].style.display = "none";
        }
      }
  }
</script>


<!-- Modal pt confirmare remove  -->
<div id="confirmRemoveModal" class="modal">
  <div class="modal-dialog"> 
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Remove</h2>
    </div>
    <div class="modal-body">
      <p>Are you sure you want to remove these products?</p>
    </div>
    <div class="modal-footer">
      <br> </br>
      <button type="button" id="confirmRemove" class="btn btn-default" data-dismiss="modal" onclick="confirmRemove()">Ok</button>
       <br> </br>
    </div>
  </div>
`</div>
</div>

<script type="text/javascript">
  $("#confirmRemove").on("click", function(){
    $("#confirmRemoveModal").modal('hide');
    confirmRemove();
  });
</script>

<!-- Modal pt need help  -->
<div id="needHelpModal" class="modal">
 <div class="modal-dialog"> 
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Need help?</h2>
    </div>
    <div class="modal-body">
      <p>If you want to add products to your list you have to follow the next steps:</p>
      <p>- visit your favorite online shops</p>
      <p>- pick a product and copy its link from the shop's page</p>
      <p>- come back to "List" page</p>
      <p>- select "Add link" button</p>
      <p>- paste the link in the empty field</p>
      <p>- press "Save changes"</p>
      <p>- now the product is on the list</p>
    </div>
    <div class="modal-footer">
      <br> </br>
      <button type="button" id="helpClose" class="btn btn-default" data-dismiss="modal" onclick="helpClose()">Close</button>
       <br> </br>
    </div>
  </div>
  </div>
</div>

<script>
  // Get the modal
  var modal4 = document.getElementById('needHelpModal');

  // Get the button that opens the modal
  var help = document.getElementById("help");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  help.onclick = function() {
      modal4.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
      modal4.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal4) {
          modal4.style.display = "none";
      }
  }
</script>

</body>
</html>