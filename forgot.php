<!DOCTYPE html>
<html>
	
	<head>
		<title>Shopping</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" href="css.css" type="text/css">
        <script type="text/javascript" src="js/functions.js"></script>
	</head>

	<!DOCTYPE html>
<body>

  <?php include('common/navbar.php'); ?>

	<?php
		if (isset($_POST['login'])) {
			$loginInfo = explode(" ", $_POST['login']);
	        $email = $loginInfo[0];
	        $passwd = $loginInfo[1];

			$host="127.0.0.1";
			$port=3306;
			$socket="";
			$user="root";
			$password="root";
			$dbname="shop";

			$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
			or die ('Could not connect to the database server' . mysqli_connect_error());
			$err = "";

			$verifyUser = "SELECT Email, Password FROM Users WHERE email = '$email'";
			$result = $conn->query($verifyUser);

			if($result->num_rows == 0) {
				$userErr = "This email does not exist! Try again!";
				$err = TRUE;
			} 

			if($passwd != $passwd2) {
				$passErr = "The passwords do not match!";
				$err = TRUE;
			}

			if($user == "") {
				$userErr = "Required field";
				$err = TRUE;
			}

			if($passwd == "") {
				$passErr = "Required field";
				$err = TRUE;
			}
			
			if($err !== TRUE) {
				$changePasswd = "UPDATE Users SET Password='$passwd' WHERE email='$email';";
				$result = $conn->query($changePasswd);

				if($result !== TRUE) {
					$userErr = "DB Error! Please, contact the admin!";
				}

				header('Location: login.php');
			}
		}
	?>

		<div class="container">    
		    	<div id="changebox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">    <div class="panel panel-info" >
		                <div class="panel-heading">
		                    <div class="panel-title">Set password</div>
		                </div>     

		                <div style="padding-top:30px" class="panel-body" >
		                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
		                    <form id="changeform" class="form-horizontal" role="form" method="post" name="myform">
		                                
		                        <div style="margin-bottom: 25px" class="input-group">
		                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		                            <input id="change-username" type="text" class="form-control" name="email" value="" placeholder="email">                                        
		                        </div>
		                            
		                        <div style="margin-bottom: 25px" class="input-group">
		                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		                                    <input id="change-password" type="password" class="form-control" name="password" placeholder="password">
		                        </div>

		                        <div style="margin-bottom: 25px" class="input-group">
		                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		                                    <input id="change-password2" type="password" class="form-control" name="password2" placeholder="retype password">
		                        </div>


		                         <div style="margin-top:10px" class="form-group">
		                            <div class="col-sm-12 controls">
		                                <a id="btn-login" href="#" class="btn btn-success" onclick="validateSignIn()">Submit</a>
		           
		                            </div>
		           </div>                 
        </div>
        <?php include('common/footer.php'); ?>

  	 </body>
</html>     

