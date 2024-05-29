<?php 

if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['id'])) {
  header ("../pages/login.php");
}

