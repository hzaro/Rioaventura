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
          paquetes_bikini_tours 
          (id,titulo,tiene_transporte,tiene_almuerzo,precio_transporte,precio,mini_descripcion,descripcion,imagen_paquete,mini_img,filtro) 
        VALUES 
          (:id,:titulo,:tiene_transporte,:tiene_almuerzo,:precio_transporte,:precio,:mini_descripcion,:descripcion,:imagen_paquete,:mini_img,:filtro)";
          
  $sth1=$bd->prepare($sql);
  $sth1->execute(array(
    ':id'=>isset($_POST['id']) ? $_POST['id'] : 0,
    ':titulo'=>$_POST['titulo'],
    ':tiene_transporte'=>$_POST['tiene-transporte'],
    ':tiene_almuerzo'=>$_POST['tiene-almuerzo'],
    ':precio_transporte'=>$_POST['precio-transporte'],
    ':precio'=>$_POST['precio'],
    ':mini_descripcion'=>$_POST['mini_descripcion'],
    ':descripcion'=>$_POST['descripcion'],
    ':imagen_paquete'=>$_POST['imagen_paquete'],
    ':mini_img'=>$_POST['mini_img'],
    ':filtro'=>$_POST['filtro'],
  ));
  
  $id_producto=$bd->lastInsertId("paquetes_bikini_tours");
  
  
  
  header("Location: ../../ver_paquetes.php");
?>
