<link rel="stylesheet" href="css/search.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">
        <img id = "brand-image" alt = "Website Logo" src="images/notebook.png"/>
      </a>
    </div>

    <ul class="nav navbar-nav"> 
      <?php
        if (basename($_SERVER['PHP_SELF']) == 'home.php') {
          echo '<li class="active"><a href="home.php">Home</a></li>';
        } else {
          echo '<li><a href="home.php">Home</a></li>';
        }

        if (basename($_SERVER['PHP_SELF']) == 'about.php') {
          echo '<li class="active"><a href="about.php">About</a></li>';
        } else {
          echo '<li><a href="about.php">About</a></li>';
        }
      ?>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <?php
       //Daca exista un user logat, atunci butonul va fi 'Logout'
        session_start();
        if (isset($_SESSION['email'])) {
          if(basename($_SERVER['PHP_SELF']) == 'list.php') {
            echo '<li class="active"><a href="list.php"> List </a></li>';
          } else {
            echo '<li><a href="list.php"> List </a></li>';
          }
          echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
        } else {
          echo '<li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
          echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';  
        }
      ?>
    </ul>
  </div>
</nav>