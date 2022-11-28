<?php
  require_once("../../lib/index.php");

  if(!checkIsAdmin()){
    setMessage("No tiene permisos para acceder a esta página");
    header("Location: ../index.php");
    exit();
  }

  $id = intval($_GET['id']);
  $result = $pdo->query("SELECT * FROM producto WHERE id=$id;")->fetch();

  if(!$result){
    $content=<<<HTML
      <div class="alert alert-danger">
        <h4>Producto no encontrado</h4>
        <p>El producto con ID $id no existe.</p>
      </div>
    HTML;
  }
  else{
    $producto = (object) $result;
    
    $categories = $pdo->query("SELECT * FROM categoria;")->fetchAll();
    $producers = $pdo->query("SELECT * FROM productor;")->fetchAll();
    
    $category_options='';
    $producer_options='';

    foreach($categories as $category){
      $category = (object) $category;
      $selected = $category->id == $producto->id_categoria ? 'selected' : '';
      $category_options .= "<option value='$category->id' $selected>$category->categoria</option>";
    }

    foreach($producers as $producer){
      $producer = (object) $producer;
      $selected = $producer->id == $producto->id_productor ? 'selected' : '';
      $producer_options .= "<option value='$producer->id' $selected>$producer->productor</option>";
    }
    
    $content = <<<HTML
      <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-6">
          <form action="update.php" method="post">
            <input type="hidden" name="id" value="$producto->id">
            <div class="form-group">
              <label for="categoria">Categoria</label>
              <select name="id_categoria" id="categoria" class="form-control">
                <option value="$producto->id_categoria">$producto->id_categoria</option>
                $category_options
              </select>
            </div>
            <div class="form-group">
              <label for="marca">Marca</label>
              <input type="text" name="marca" id="marca" class="form-control" value="$producto->marca">
            </div>
            <div class="form-group">
              <label for="tipo_producto">Tipo Producto</label>
              <input type="text" name="tipo_producto" id="tipo_producto" class="form-control" value="$producto->tipo_producto">
            </div>
            <div class="form-group">
              <label for="productor">Productor</label>
              <select name="id_productor" id="productor" class="form-control">
                <option value="$producto->id_productor">$producto->id_productor</option>
                $producer_options
              </select>
            </div>
            <div class="form-group">
              <label for="fecha_exp">Fecha Exp.</label>
              <input type="date" name="fecha_exp" id="fecha_exp" class="form-control" value="$producto->fecha_exp">
            </div>
            <div class="form-group">
              <label for="stock">Stock</label>
              <input type="number" name="stock" id="stock" class="form-control" value="$producto->stock">
            </div>
            <div class="form-group">
              <label for="precio">Precio</label>
              <input type="number" name="precio" id="precio" class="form-control" value="$producto->precio">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    HTML;
  }

  echo $layout::header('Modificar Producto');
  echo $layout::pageTitle('Modificar Producto');
  echo $layout::pageContent($content);
  echo $layout::footer();