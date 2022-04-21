<?php
  // session_start();
  require '../conexion/sesion.php';
  unset($_SESSION['usuario']);
  unset($_SESSION['estado']);
  session_destroy();
  header("location:login.php");
?>
