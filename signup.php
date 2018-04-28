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
  

    <div class="container">    
         <div id="signupbox" style="margin-top:50px; width: ;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">           
            <div class="panel panel-info" >
                        <div class="panel-heading" style="border: 2px solid #36486b;  background-color: #36486b">
                            <div class="panel-title" style="color: #8ca3a3;">Sign up</div>
            </div>     

            <div style="padding-top:30px;  background-color: LightGrey; border: 2px solid #36486b;" class="panel-body">
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form id="signupform" class="form-horizontal" role="form">
                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                         <div class="col-md-9">
                                <input id = "signup-email" type="text" class="form-control" name="email" placeholder="Email Address">
                            </div>
                    </div>
                                    
                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                                <input id = "signup-firstname" type="text" class="form-control" name="firstname" placeholder="First Name">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-9">
                            <input id = "signup-lastname" type="text" class="form-control" name="lastname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input id = "signup-password" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icode" class="col-md-3 control-label">Retype password</label>
                        <div class="col-md-9">
                            <input id = "signup-password2" type="password" class="form-control" name="password2" placeholder="Retype password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icode" class="col-md-3 control-label">Address</label>
                        <div class="col-md-9">
                            <input id = "signup-address" type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icode" class="col-md-3 control-label">Phone Number</label>
                        <div class="col-md-9">
                            <input id = "signup-phone" type="text" class="form-control" name="phone number" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Button -->                                        
                        <div class="col-md-offset-3 col-md-9">
                             <!--<a id="btn-login" href="#" class="btn btn-success" onclick="validateSignUp()">Sign In  </a>-->
                            <button id="btn-signup" type="button" class="btn btn-info" style="background-color: #36486b; border: 2px solid  #36486b;" onclick="validateSignUp()" ><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                        <span style="margin-left:8px;">or</span>  
                        </div>
                    </div>
                    <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-fbsignup" type="button" class="btn btn-primary" style="background color: #36486b;"><i class="icon-facebook"></i>   Sign Up with Google</button>
                        </div>                                           
                                        
                    </div>
                 </form>     

        </div>                     
    </div>  
        </div>
            
</div> 
    
    <?php include('common/footer.php'); ?>
        </body>
        
</html>