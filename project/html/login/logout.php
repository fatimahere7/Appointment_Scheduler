<?php
  session_start();
  session_unset(); 
  header('location: login-index.php');
?>