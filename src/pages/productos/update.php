<?php
  require_once("../../lib/index.php");

  if(!checkIsAdmin()){
    setMessage("No tiene permisos para acceder a esta página");
    header("Location: ../index.php");
    exit();
  }

  try{
    $id=intval($_POST['id']);
    $id_categoria=intval($_POST['id_categoria']);
    $marca=$_POST['marca'];
    $tipo_producto=$_POST['tipo_producto'];
    $id_productor=intval($_POST['id_productor']);
    $fecha_exp=$_POST['fecha_exp'];
    $stock=intval($_POST['stock']);
    $precio=intval($_POST['precio']);

    $sql = "UPDATE producto 
            SET 
              id_categoria=:id_categoria,
              marca=:marca,
              tipo_producto=:tipo_producto,
              id_productor=:id_productor,
              fecha_exp=:fecha_exp,
              stock=:stock,
              precio=:precio
            WHERE id=:id;";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':id_categoria', $id_categoria);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':tipo_producto', $tipo_producto);
    $stmt->bindParam(':id_productor', $id_productor);
    $stmt->bindParam(':fecha_exp', $fecha_exp);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':precio', $precio);
    $stmt->execute();

    setMessage('Producto actualizado correctamente');
    setErrorMessage('');
  } catch (Exception $e) {
    setErrorMessage('Error al actualizar producto');
    setMessage('');
  }

  header("Location: ../productos.php");