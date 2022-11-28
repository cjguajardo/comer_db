<?php

class Layout{
  static function header($title=''){
    $html = <<<HTML
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>$title</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    HTML;

    return $html;
  }

  static function navbar(){
    return <<<HTML
      <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Comercio</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" href="/pages/productos.php">Productos</a>
              <a class="nav-link disabled">Categorías</a>
              <a class="nav-link disabled">Proveedores</a>
              <a class="nav-link" href="/pages/logout.php">Logout</a>
            </div>
          </div>
        </div>
      </nav>
    HTML;
  }

  static function pageTitle($title='', $putNavbar=true){
    $navbar = $putNavbar?self::navbar():'';

    $html = <<<HTML
      $navbar

      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class='text-center'>$title</h1>
            <hr/>
          </div>
        </div>
      </div>
    HTML;

    return $html;
  }

  static function pageContent($content=''){

    $message = '';
    if(isset($_SESSION['message']) && $_SESSION['message'] != ''){
      $message = <<<HTML
      <div class="alert alert-success mx-5" role="alert">
        $_SESSION[message]
      </div>
      HTML;
      unset($_SESSION['message']);
    }else if(isset($_SESSION['error']) && $_SESSION['error'] != ''){
      $message = <<<HTML
      <div class="alert alert-danger mx-5" role="alert">
        $_SESSION[error]
      </div>
      HTML;
      unset($_SESSION['error']);
    }

    $html = <<<HTML

    $message

    <div class="container">
      <div class="row">
        <div class="col-12">
          $content
        </div>
      </div>
    </div>
    HTML;

    return $html;
  }

  static function footer(){
    $html = <<<HTML
    </body>
    </html>
    HTML;

    return $html;
  }

}