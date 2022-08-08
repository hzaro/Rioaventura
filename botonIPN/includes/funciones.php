<?php
  function conectar_bd()
  {
    $dsn = 'mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8';
    $conexion=new PDO($dsn, DBUSER, DBPASS);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$conexion->exec("set names utf8");
    $conexion->exec("SET time_zone = '-3:00'");
    return $conexion;
  }
?>
