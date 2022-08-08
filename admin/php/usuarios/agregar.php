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
          usuarios 
          (id,nombre_apellido,hotel,user,email,pass) 
        VALUES 
          (:id,:nombre_apellido,:hotel,:user,:email,:pass)";
          
  $sth1=$bd->prepare($sql);
  $sth1->execute(array(
    ':id'=>isset($_POST['id']) ? $_POST['id'] : 0,
    ':nombre_apellido'=>$_POST['nombre-apellido'],
    ':hotel'=>$_POST['hotel'],
    ':user'=>$_POST['usuario'],
    ':email'=>$_POST['correo'],
    ':pass'=>$_POST['contrasena'],
  ));
  
  $id_producto=$bd->lastInsertId("usuarios");
  
  
  
  header("Location: ../../ver_usuarios.php");
?>
