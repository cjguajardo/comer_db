<?php
require_once("index.php");

unset($_SESSION['ERROR']);

$username = $_POST['correo_e']??null;
$password = $_POST['contrasenia_e']??null;

$result = $pdo->query("SELECT * 
    FROM empleados 
    WHERE correo_e='$username' AND contrasenia_e='$password';")->fetch();

if($result){
  $user = (object) $result;
  setUser($user);

  header("location: ./../pages/productos.php");
  exit();
}

setErrorMessage("Usuario no encontrado");
header("location: ./../index.php");

