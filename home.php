<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shopping</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/css.css" type="text/css">
  <link rel="stylesheet" href="css/page.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <?php include('common/navbar.php'); ?>
 

  <!--<?php
/*if(isset($_POST['currentTabUrl'])){
        echo"Data Detected";
}else{
        echo"Data Not Set";
}*/
?>-->
<IMG class="displayed" src="images/logo.jpg" alt="ecliptica">

<div class="container">
  <h2>Welcome to Ecliptica!</h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 640px; height: 360px; margin: auto;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/carusel1.jpg" alt="Los Angeles" style="width:640px; height: 360px">
         <div class="carousel-caption">
          <h3 style="font-size:2vw;">Add any prduct you want!</h3>
          <p></p>
        </div>
      </div>
       

      <div class="item">
        <img src="images/carusel2.jpg" alt="Chicago" style="width:640px; height: 360px">
         <div class="carousel-caption">
          <h3>Everything you want in just one place!</h3>
          <p></p>
        </div>
      </div>

    
      <div class="item">
        <img src="images/carusel3.jpg" alt="New york" style="width:640px; height: 360px">
        <div class="carousel-caption">
          <h3>Find out the price of all your products!</h3>
          <p></p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<br>
</br>
<br/>

<?php include('common/footer.php'); ?>

</body>


</html>
