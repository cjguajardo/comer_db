<?php
  require_once("../lib/index.php");

  $uname = 'Comerc@gmail.com';
  $pwd = 'jhon123456';

  $content = <<<HTML
    <div class="row justify-content-center">

      <div class="col-12 col-sm-10 col-md-6">
        <form id='form' action='../lib/authenticate.php' method="POST">
          <div class='form-group'>
            <label>Usuario</label>
            <input class='form-control text-center' type='email' value="$uname" name='correo_e' placeholder='Email'/>
          </div>
      
          <div class='form-group'>
            <label>Contraseña</label>
            <input class='form-control text-center' type='password' value="$pwd" name='contrasenia_e' placeholder='Contraseña'/>
          </div>
      
          <div class="row justify-content-center mt-4">
            <div class="col-12 col-md-4">
              <button type='submit' class='btn btn-primary w-100'>
                Entrar
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  HTML;

  echo $layout::header('Login');
  echo $layout::pageTitle('Login',false);
  echo $layout::pageContent($content);
  echo $layout::footer();

