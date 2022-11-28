<?php

  require_once("lib/index.php");

  if(checkIsLogged()){
    header("Location: pages/productos.php");
  }
  else {
    header("Location: pages/login.php");
  }

  exit();