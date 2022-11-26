<?php

require_once("db.php");

session_start();

unset($_SESSION['ERROR']);

$db = new DB();
$pdo = $db->connect();

$username = $_POST['correo_e']??null;
$password = $_POST['contrasenia_e']??null;

$result = $pdo->query("SELECT * 
    FROM empleados 
    WHERE correo_e='$username' AND contrasenia_e='$password';");

if($result){
    $result = $result->fetch();
    //var_dump($result);

    $_SESSION['USER'] = $result;

    $page = $result->id_perfil === 1 ? 'admin':'employee';
    header("location: ./../pages/$page.php");

    exit();
}


$_SESSION['ERROR'] = "Usuario no encontrado";
header("location: ./../index.php");

