<?php

require 'conexion.php';

session_start();

if (isset($_SESSION['usuario']) && $_SESSION['estado'] == "conectado") {
  "O usuario si está online";
} else {
  header('Location: ../login/login.php');
}
?>
