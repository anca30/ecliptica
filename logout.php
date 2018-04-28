<?php
    session_start();
    session_unset();
    $res = session_destroy(); 
    header('Location: login.php');
?>