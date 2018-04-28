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

    <?php
      if (basename(__FILE__) == 'list.php') {
        echo 
          '<div class="col-sm-3 col-md-3">
              <form class="navbar-form" role="search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search" name="q">
                  <div class="input-group-btn">
                      <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
                </div>
              </form>
          </div>';
      }
    ?>

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