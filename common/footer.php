
<?php
    if (basename($_SERVER['PHP_SELF']) == 'login.php'){
    	echo '<footer class="footer" style="background: #36486b; padding: 10px 0; position: absolute; 
					bottom: 0px; width: 100%;">';
    } else {
    	echo '<footer class="footer">';
    }
?>

  <div class="container text-center">
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-google-plus"></i></a>
    <a href="#"><i class="fa fa-skype"></i></a>
  </div>
</footer>