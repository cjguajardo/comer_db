<?php
  require_once("../lib/index.php");

  $sql = "SELECT producto.*, 
            c.categoria,
            p.productor 
          FROM producto
          INNER JOIN categoria c ON c.id=id_categoria 
          INNER JOIN productor p ON p.id=id_productor;";

  //Listar productos
  $results = $pdo->query($sql);

  $tbody='';
  while($row = $results->fetch(PDO::FETCH_ASSOC)) {
    //Convert array to object
    $producto = (object) $row;
    $precio = number_format($producto->precio,0,',','.');

    $edit = checkIsAdmin()?"<a href='productos/edit.php?id=$producto->id' class='btn btn-primary btn-sm'>Editar</a>":'';
    $delete = checkIsAdmin()?"<a href='productos/delete.php?id=$producto->id' class='btn btn-danger btn-sm'>Eliminar</a>":'';

    $tbody .= <<<HTML
    <tr>
      <td>$producto->id</td>
      <td>$producto->categoria</td>
      <td>$producto->marca</td>
      <td>$producto->tipo_producto</td>
      <td>$producto->productor</td>
      <td>$producto->fecha_exp</td>
      <td>$producto->stock</td>
      <td>$precio</td>
      <td>
          $edit
          $delete
      </td>
    </tr>
    HTML;
  } 

  $content = <<<HTML
    <table class="table table-bordered small">
      <thead>
          <tr>
              <th>ID</th>
              <th>CATEGORIA</th>
              <th>MARCA</th>
              <th>TIPO PROD.</th>
              <th>PRODUCTOR</th>
              <th>FECHA EXP.</th>
              <th>STOCK</th>
              <th>PRECIO</th>
              <th>::</th>
          </tr>
      </thead>

      <tbody>
        $tbody
      </tbody>
    </table>
  HTML;

  echo $layout::header('Productos');
  echo $layout::pageTitle('Productos');
  echo $layout::pageContent($content);
  echo $layout::footer();