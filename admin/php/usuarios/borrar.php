<?php
  // include("../../../php/include/config.php");
  // include("../../../php/include/funciones.php");
  // include("../include/sesion.php");

  include("../../../db.php");
  include("../../php/include/sesion.php");

  
  $bd=conectar_bd();
  
  $sql="UPDATE 
          usuarios 
        SET 
          habilitado=0
        WHERE 
          id=:id";
          
  $sth1=$bd->prepare($sql);
  $sth1->execute(array(
    ':id'=>$_GET['id'],
  ));
  
  header("Location: ../../ver_usuarios.php");
?>
