<?php
  //header('Content-Type: text/html; charset=UTF-8');
  session_start();
  
  if(!isset($_SESSION['logueado']))
  {
    header("location: login.php");
    die();
  }

?>
