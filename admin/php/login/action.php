<?php
  // include("../../../botonIPN/includes/config.php");
  // include("../../../botonIPN/includes/funciones.php");

  include("../../../db.php");
  // include("php/include/sesion.php");
  // include('header.php');

  
  $bd=conectar_bd();
  session_start();


  $sql2="SELECT * FROM apagar_panel";          
  $sth2=$bd->prepare($sql2);
  $sth2->execute(array());  
  $dat2=$sth2->fetch(PDO::FETCH_ASSOC);
  if($dat2['apagado']==1){
    $_SESSION['apagado']=true;
  }

  
  $sql="SELECT 
          COUNT(*) AS cantidad
        FROM 
          usuarios 
        WHERE 
          user=:user AND pass=:pass";
          
  $sth1=$bd->prepare($sql);
  $sth1->execute(array(
    ':user'=>$_POST['user'],
    ':pass'=>$_POST['pass'],
  ));
  
  $dat=$sth1->fetch(PDO::FETCH_ASSOC);
  if($dat['cantidad']>0)
  {
    // session_start();
    $_SESSION['logueado']=true;

      // Es Admin
      $sql2="SELECT 
              *
          FROM 
            usuarios 
          WHERE 
            user=:user AND pass=:pass";
            
      $sth2=$bd->prepare($sql2);
      $sth2->execute(array(
        ':user'=>$_POST['user'],
        ':pass'=>$_POST['pass'],
      ));
      
      $dat2=$sth2->fetch(PDO::FETCH_ASSOC);

      $_SESSION['usuario'] = $dat2['user'];

      if ($dat2['id']==1) {
        $_SESSION['admin']=true;
        // $_SESSION['user']=false;
        header("Location: ../../ver_paquetes.php");
      }
      else{
        // $_SESSION['admin']=false;
        $_SESSION['user']=true; 

        header("Location: ../../comprar_paquetes.php");        
      }

  }
  else
  {
    header("Location: ../../login.php?error");
  }
?>
