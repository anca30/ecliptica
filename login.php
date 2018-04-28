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
	    <link rel="stylesheet" href="css/css.css" type="text/css">
	    <link rel="stylesheet" href="css/page.css" type="text/css">
	    <script type="text/javascript" src="js/functions.js"></script>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
  	</head>
            
  	<body>
    	<?php include('common/navbar.php'); ?>
  		

		<div class="container" style="height: 100%">    
		    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">    
		    	<div class="panel panel-info" >
		            <div class="panel-heading" style="border: 2px solid #36486b;  background-color: #36486b">
	                    <div class="panel-title" style="color: #8ca3a3;">Login</div>
	                    <div style="float:right; font-size: 80%; position: relative; top:-10px;"><a href="forgot.php">Forgot password?</a>
	                    </div>
		            </div>     

	                <div style="padding-top:30px; background-color: LightGrey; border: 2px solid #36486b;" class="panel-body" >
	                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
	                    	<form id="loginform" class="form-horizontal" role="form" method="post" name="myform">
	                            <div style="margin-bottom: 25px" class="input-group">
	                            	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	                            	<input id="login-username" type="text" class="form-control" name="email" value="" placeholder="email">                                        
	                        	</div>
	                            
	                        	<div style="margin-bottom: 25px" class="input-group">
	                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	                                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
	                        	</div>
								<div class="input-group">
	                                  <div class="checkbox">
	                                    <label>
	                                      <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
	                                    </label>
	                                  </div>
	                        	</div>
							    <div style="margin-top:10px" class="form-group">
	                              <div class="col-sm-12 controls">
	                                  <a id="btn-login" href="#" class="btn btn-success" onclick="validateSignIn()">Login  </a>
	                                  <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Google</a></div>
	                            </div>
	                    	</form>     
	                	</div>                     
		            </div>  
		    	</div>
        	 </div> 
        </div>
    
    	<?php include('common/footer.php'); ?>
   	</body>
        
</html>