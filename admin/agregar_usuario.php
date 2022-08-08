<?php
  include("../db.php");
  include("php/include/sesion.php");
    if(!isset($_SESSION['admin'])){
      header("location: login.php");
    }

  $seccion="usuarios";
  include('header.php');
  
  $bd=conectar_bd();
  
  $editar=false;
  if(isset($_GET['editar']))
  {
    $editar=true;

    $sql="SELECT 
            * 
          FROM  
            usuarios 
          WHERE 
            id=:id";
    

    // $sql="SELECT 
    //     recorridos_especiales.id,recorridos_especiales.id_recorrido_principal,recorridos_especiales.nombre_recorrido_especial,recorridos_especiales.precio_recorrido_especial,paquetes_bikini_tours.titulo AS nombre_paquete
    //   FROM 
    //     recorridos_especiales
    //   LEFT JOIN 
    //     paquetes_bikini_tours ON (recorridos_especiales.id_recorrido_principal=paquetes_bikini_tours.id)
    //   WHERE 
    //     recorridos_especiales.habilitado=1 AND paquetes_bikini_tours.habilitado=1";
  
    // $sql="SELECT 
    //         * 
    //       FROM  
    //         paquetes_bikini_tours 
    //       WHERE 
    //         id=:id";
            
    $sth1=$bd->prepare($sql);
    $sth1->execute(array(
      ':id'=>$_GET['id'],
    ));
    
    $datos=$sth1->fetch(PDO::FETCH_ASSOC);    
  }




?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title"><?php echo $editar ? "EDITANDO USUARIO: ".$datos['nombre_apellido']."" : "AGREGAR USUARIO"; ?></div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">&nbsp</span><br>
                                <div class="row">
                                    <form class="col s12" method="post" action="php/usuarios/agregar.php" enctype="multipart/form-data">
                                        
                                        <div class="row">   
                                            <div class="input-field col s6">
                                                <input placeholder="" id="nombre-apellido" type="text" class="validate" name="nombre-apellido" value="<?php echo $editar ? $datos['nombre_apellido'] : ""; ?>">
                                                <label for="nombre-apellido">Nombre y Apellido</label>
                                            </div>                                            
                                            <div class="input-field col s6">
                                                <input placeholder="" id="hotel" type="text" class="validate" name="hotel" value="<?php echo $editar ? $datos['hotel'] : ""; ?>">
                                                <label for="hotel">Hotel</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <input placeholder="" id="usuario" type="text" class="validate" name="usuario" value="<?php echo $editar ? $datos['user'] : ""; ?>">
                                                <label for="usuario">Usuario</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <input placeholder="" id="contrasena" type="text" class="validate" name="contrasena" value="<?php echo $editar ? $datos['pass'] : ""; ?>">
                                                <label for="contrasena">Contraseña</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <input placeholder="" id="correo" type="text" class="validate" name="correo" value="<?php echo $editar ? $datos['email'] : ""; ?>">
                                                <label for="correo">Correo electrónico</label>
                                            </div>
                                        </div>  

                                        <div class="row">                                    
                                          <div class="input-field col s6">
                                                <input placeholder="" id="" type="submit" class="validate" value="Guardar">
                                            </div>
                                        </div>
                                        
                                        <?php
                                          if($editar)
                                          {
                                            ?>
                                              <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">
                                            <?php
                                          }
                                        ?>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>                      
                        
                        
                        
                        
                    </div>
                    
                </div>
            </main>
           <?php 
            $pageScripts[]="scripts/producto.js";
            include('footer.php')
           ?>
           <!-- <script>
            var mia = <?php echo $datosmiprueba ;?>;
             if ( mia.length >= 8) {
                $('#deje').hide();
                $('#nodeje').show();
             }
             else{
                $('#deje').show();
                $('#nodeje').hide();
             };
           </script> -->
        
    </body>
</html>
