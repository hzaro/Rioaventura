<?php
  // include("../../../php/include/config.php");
  // include("../../../php/include/funciones.php");
  // include("../include/sesion.php");
  
  include("../../../db.php");
  include("../../php/include/sesion.php");
  // include('../../header.php');
  
  // ini_set("gd.jpeg_ignore_warning", 1);
  // include("../../../php/include/simpleimage.php");
  
  $bd=conectar_bd();
  
  $sql="REPLACE INTO 
          apagar_panel 
          (id,apagado) 
        VALUES 
          (:id,:apagado)";
          
  $sth1=$bd->prepare($sql);
  $sth1->execute(array(
    ':id'=>isset($_POST['id']) ? $_POST['id'] : 1,
    ':apagado'=>$_POST['apagar_panel'],
  ));
  
  // $id_producto=$bd->lastInsertId("apagar_panel");
  
  
  
  header("Location: ../../apagar_panel.php");
?>
