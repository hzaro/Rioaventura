<?php
  include("../php/include/config.php");
  include("../php/include/funciones.php");
  include("php/include/sesion.php");
  
  $bd=conectar_bd();
  
  $estado=$_GET['e'];
  $id=$_GET['id'];
  
  $nuevo_estado=$estado==0 ? 1 : 0;
  

  $sql="UPDATE   
          presupuestos
        SET 
          estado=:nuevo_estado
        WHERE 
          id=:id";
          
  $sth1=$bd->prepare($sql);
  $sth1->execute(array(
    ':id' => $id,
    ':nuevo_estado' => $nuevo_estado,
  ));
  
  header("Location: pedidos_detalle.php?id=".$id);
?>
