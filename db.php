<?php
define("DB_HOST","localhost");
define("DB_NAME","rioavent_bd");
define("DB_USER","rioaventura");
define("DB_PASS","rio123**");

// define("DB_HOST","localhost");
// define("DB_NAME","bikini");
// define("DB_USER","root");
// define("DB_PASS","");

// define("DB_HOST","localhost");
// define("DB_NAME","ipageldl_bikini");
// define("DB_USER","ipageldl");
// define("DB_PASS","Chispert2");

// define("DB_PASS","QN!CTyg[TI4F");

define("SYS_PASS","123456");

function conectar_bd()
{
$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8';
$conexion=new PDO($dsn, DB_USER, DB_PASS);
$conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
return $conexion;
}

?>
