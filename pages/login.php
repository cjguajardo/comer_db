<?php

session_start();

$uname = 'Alan@gmail.com';
$pwd = 'Alan123456';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
  <?php if(isset($_SESSION['ERROR']) && $_SESSION['ERROR']!='') { ?>
  <div class='alert alert-warning'>
    <?= $_SESSION['ERROR']; ?>
  </div>
  <?php } ?>
  <center>
    <form id='form' action='lib/authenticate.php' method="POST">
      <div class='form-group'>
        <label>Usuario</label>
        <input class='form-control' type='email' value="<?=$uname;?>" name='correo_e' placeholder='Email'/>
      </div>

      <div class='form-group'>
        <label>Contraseña</label>
        <input class='form-control' type='password' value="<?=$pwd;?>" name='contrasenia_e' placeholder='Contraseña'/>
      </div>

      <button type='submit' class='btn btn-primary'>
        Entrar
      </button>
    </form>
  </center>
</body>
</html>