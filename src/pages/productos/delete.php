<?php
  require_once("../../lib/index.php");

  if(!checkIsAdmin()){
    setMessage("No tiene permisos para acceder a esta página");
    header("Location: ../index.php");
    exit();
  }
  
  $id=intval(isset($_POST['id'])?$_POST['id']:$_GET['id']);
  $newId=md5($id);
  $delete_confirm=isset($_POST['delete_confirm'])?$_POST['delete_confirm']:false;

  if($delete_confirm===md5($id)){
    try{
    $sql = "DELETE FROM producto WHERE id=:id;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    setMessage('Producto eliminado correctamente');
    setErrorMessage('');

    header("Location: ../productos.php");
    exit();
    } catch (Exception $e) {
      setErrorMessage('Error al eliminar producto');
      setMessage('');
    }
  }

  $content = <<<HTML
      <div class="alert alert-danger">
        <h4>¿Segur@ de que deseas eliminar el producto?</h4>
        <p>Esta acción no se puede deshacer.</p>
        <div class='row'>
          <div class='col-12 col-md-3'>
            <a href="../productos.php" class="btn btn-secondary btn-block">Cancelar</a>
          </div>

          <div class='col-12 col-md-3'>
            <form action="delete.php" method="post">
              <input type="hidden" name="id" value="$_GET[id]">
              <input type="hidden" name="delete_confirm" value="$newId">
              <button type="submit" class="btn btn-danger btn-block">Eliminar</button>
            </form>
          </div>
        </div>
      </div>  
  HTML;

  echo $layout::header('Eliminar Producto');
  echo $layout::pageTitle('Eliminar Producto');
  echo $layout::pageContent($content);
  echo $layout::footer();
