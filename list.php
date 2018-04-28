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

 <!-- <div class="container">
    <h3>Welcome!</h3>
    <p></p>
  </div>-->

  <!--<?php
/*if(isset($_POST['currentTabUrl'])){
        echo"Data Detected";
}else{
        echo"Data Not Set";
}*/
?>-->
<!--<IMG class="displayed" src="bun3.jpg" alt="ecliptica">-->

</div>
<div>
   <a href="#" class="btn btn-info btn-lg" style="float: right;">
          <span class="glyphicon glyphicon-question-sign"></span> Need help
        </a>
</div>

<div class="about-container">
  <img src="images/listPicture.jpg" alt="Notebook" style="width:100%;">
  <div class="content">
    <h1>Shopping list generator</h1>
    <p>Keep your list updated!</p>
<p2>


  </p2>
  </div>
</div>
<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="http://localhost/scrape2/ygrab.js"></script>

<p id="demo"></p>

<script>        
$(function() {
var data = [
    {
        url: 'http://www.elefant.ro/carti/carte/o-plimbare-in-padure-redescoperind-america-pe-cararile-muntilor-apalasi-238871.html', // url string rquired
        selector: 'div.product-info', // selector string rquired
        loop: true, // each boolean rquired
        result: [
            {
                name: 'autor', // key string rquired
                find: 'div.brand a', // selector child string rquired
                grab: {
                    by: 'text', // attribut string rquired
                    value: '' // attribut value string optional
                }
            },
            {
                name: 'nume',
                find: 'h1.title',
                grab: {
                    by: 'text',
                    value: ''
                }
            },
            {
              name: 'price',
              find: 'div.product-price',
              grab: {
                by: 'text',
                value: ''
            }
      },
      
      {
        name: 'desc',
        find: 'div.product-description-additional',
        grab: {
          by: 'text',
          value: ''
        }
      },
            // ---- new selector ---- //
      
        ]
    
    },
    // ---- new website url ---- //
];

ygrab(data, function(result) {
  //console.log(JSON.stringify(result, null, 2));
  var myJSON =JSON.stringify(result, null, 2);
  document.getElementById("demo").innerHTML = myJSON;
});

});
</script>

<br>
</br>
<?php include('common/footer.php'); ?>

</body>


</html>
