<?php

session_start(); 
if(session_destroy()) { // Destroying All Sessions 
  header("Location: cafe.php"); // Redirecting To Home Page 
}
?>