<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <center>
    <form id='form' action='authenticate.php'>
      <div class='form-group'>
        <label>Usuario</label>
        <input class='form-control' type='email' name='correo_e' placeholder='Email'/>
      </div>

      <div class='form-group'>
        <label>Contraseña</label>
        <input class='form-control' type='password' name='contrasenia_e' placeholder='Contraseña'/>
      </div>

      <button type='submit'>
        Entrar
      </button>
    </form>
  </center>
</body>
</html>