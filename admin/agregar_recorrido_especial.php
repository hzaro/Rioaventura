<?php
  include("../db.php");
  include("php/include/sesion.php");
    if(!isset($_SESSION['admin'])){
      header("location: login.php");
    }

  $seccion="paquetes";
  include('header.php');
  
  $bd=conectar_bd();
  
  $editar=false;
  if(isset($_GET['editar']))
  {
    $editar=true;

    $sql="SELECT 
            * 
          FROM  
            recorridos_especiales 
          WHERE 
            id_especial=:id_especial";
    

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
      ':id_especial'=>$_GET['id_especial'],
    ));
    
    $datos=$sth1->fetch(PDO::FETCH_ASSOC);    
  }




?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title"><?php echo $editar ? "EDITANDO RECORRIDO: ".$datos['nombre_recorrido_especial']."" : "AGREGAR RECORRIDO ESPECIAL"; ?></div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">&nbsp</span><br>
                                <div class="row">
                                    <form class="col s12" method="post" action="php/recorridos_especiales/agregar.php" enctype="multipart/form-data">
                                        
                                        <div class="row">   
                                            <div class="input-field col s4">
                                                <select class="browser-default" name="id-recorrido-principal" required>
                                                    <option value="" disabled selected>Elige el Recorrido Principal</option>

                                                    <?php
                                                      $sql2="SELECT id,titulo FROM paquetes_bikini_tours WHERE habilitado=1";

                                                      $sth2=$bd->prepare($sql2);
                                                      $sth2->execute();
                                                      
                                                      while($cat=$sth2->fetch(PDO::FETCH_ASSOC))
                                                      {
                                                        ?>
                                                          <option value="<?php echo $cat['id']; ?>" <?php echo $editar && $cat['id']==$datos['id_recorrido_principal']  ? "selected" : "" ?>><?php echo $cat['titulo']; ?></option>
                                                        <?php
                                                      }
                                                    ?>
                                                </select>
                                                <label style="position: absolute;left: 15px;top: -25px;" for="id-recorrido-principal">Recorrido Principal</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <input placeholder="" id="nombre-recorrido-especial" type="text" class="validate" name="nombre-recorrido-especial" value="<?php echo $editar ? $datos['nombre_recorrido_especial'] : ""; ?>">
                                                <label for="nombre-recorrido-especial">Nombre</label>
                                            </div>                                            
                                            <div class="input-field col s4">
                                                <input placeholder="" id="precio-recorrido-especial" type="text" class="validate" name="precio-recorrido-especial" value="<?php echo $editar ? $datos['precio_recorrido_especial'] : ""; ?>">
                                                <label for="precio-recorrido-especial">Precio del Paquete</label>
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
                                              <input type="hidden" name="id_especial" value="<?php echo $datos['id_especial']; ?>">
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
    </body>
</html>
