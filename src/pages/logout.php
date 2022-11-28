<?php
  require_once("../lib/index.php");

  unset($_SESSION);
  session_destroy();

  $content = <<<HTML
    <center>
      Su sesión ha sido cerrada, presione <a href="./login.php">aquí</a> para ir al login.
    </center>
    
  HTML;

  echo $layout::header('Logout');
  echo $layout::pageTitle('Logout',false);
  echo $layout::pageContent($content);
  echo $layout::footer();

