<?php
  // include("../../../php/include/config.php");
  // include("../../../php/include/funciones.php");
  // include("../include/sesion.php");

  include("../../../db.php");
  include("../../php/include/sesion.php");

  
  $bd=conectar_bd();
  
  $sql="UPDATE 
          recorridos_especiales 
        SET 
          habilitado=0
        WHERE 
          id_especial=:id_especial";
          
  $sth1=$bd->prepare($sql);
  $sth1->execute(array(
    ':id_especial'=>$_GET['id_especial'],
  ));
  
  header("Location: ../../ver_paquetes.php");
?>
