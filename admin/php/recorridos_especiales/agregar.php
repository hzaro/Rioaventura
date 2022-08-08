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
          recorridos_especiales 
          (id_especial,id_recorrido_principal,nombre_recorrido_especial,precio_recorrido_especial) 
        VALUES 
          (:id_especial,:id_recorrido_principal,:nombre_recorrido_especial,:precio_recorrido_especial)";
          
  $sth1=$bd->prepare($sql);
  $sth1->execute(array(
    ':id_especial'=>isset($_POST['id_especial']) ? $_POST['id_especial'] : 0,
    ':id_recorrido_principal'=>$_POST['id-recorrido-principal'],
    ':nombre_recorrido_especial'=>$_POST['nombre-recorrido-especial'],
    ':precio_recorrido_especial'=>$_POST['precio-recorrido-especial'],
  ));
  
  $id_producto=$bd->lastInsertId("recorridos_especiales");
  
  
  
  header("Location: ../../ver_paquetes.php");
?>
