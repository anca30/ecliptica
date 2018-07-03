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
		<!-- <link rel="stylesheet" href="css.css" type="text/css"> -->
        <script type="text/javascript" src="js/functions.js"></script>
        <!-- <script type="text/javascript" src="js/reset.js"></script> -->
        <link rel="icon" href="cart.png" type="image/png"/>
        <link rel="stylesheet" href="css/css.css" type="text/css">
  		<link rel="stylesheet" href="css/page.css" type="text/css">
   		<script src="js/reset.js"></script>
	</head>

	<body>
		<?php include('common/navbar.php'); ?>

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
		                                <a id="btn-login" href="#" class="btn btn-success" class="login login-submit" onclick="reset()">Submit</a>
		           
		                            </div>
		           				</div>                 
        			</div>
    			</div>
			</div>
		</div>
		<?php include('common/footer.php'); ?>

  	</body>

</html>     

