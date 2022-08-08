<?php
  include("../db.php");
  include("php/include/sesion.php");
    if(!isset($_SESSION['admin'])){
      header("location: login.php");
    }
  include('header.php');
  
  $bd=conectar_bd();
  
  $editar=false;
  if(isset($_GET['editar']))
  {
    $editar=true;
  
    $sql="SELECT 
            * 
          FROM  
            paquetes_bikini_tours 
          WHERE 
            id=:id";
            
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
                        <div class="page-title"><?php echo $editar ? "EDITANDO PAQUETE: ".$datos['titulo']."" : "AGREGAR PAQUETE"; ?></div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">&nbsp</span><br>
                                <div class="row">
                                    <form class="col s12" method="post" action="php/paquetes/agregar.php" enctype="multipart/form-data">
                                        
                                        <div class="row">   
                                            <div class="input-field col s4">
                                                <input placeholder="" id="titulo" type="text" class="validate" name="titulo" value="<?php echo $editar ? $datos['titulo'] : ""; ?>">
                                                <label for="titulo">Nombre</label>
                                            </div>                                            
                                            <div class="input-field col s4">
                                                <input placeholder="" id="precio" type="text" class="validate" name="precio" value="<?php echo $editar ? $datos['precio'] : ""; ?>">
                                                <label for="precio">Precio del Paquete</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <input placeholder="" id="precio-transporte" type="text" class="validate" name="precio-transporte" value="<?php echo $editar ? $datos['precio_transporte'] : ""; ?>">
                                                <label for="precio-transporte">Precio del Transporte</label>
                                            </div>
                                        </div>  

                                        <div class="row">
                                          <div class="input-field col s6" style="position: relative;padding-top: 30px;">
                                              <select id="tiene-transporte" class="browser-default" name="tiene-transporte" required>
                                                <option value="" disabled selected>Elige una opción</option>
                                                <option value="0" <?php echo $editar && $datos['tiene_transporte']==0 ? "selected" : "" ?>>No Tiene</option>
                                                <option value="1" <?php echo $editar && $datos['tiene_transporte']==1 ? "selected" : "" ?>>Opcional</option>
                                                <option value="2" <?php echo $editar && $datos['tiene_transporte']==2 ? "selected" : "" ?>>Obligatorio</option>
                                              </select>
                                              <label style="position: absolute;left: 15px;top: 0px;" for="tiene-transporte">Incluye Transporte</label>
                                          </div>

                                          <div class="input-field col s6" style="position: relative;padding-top: 30px;">
                                              <select id="tiene-almuerzo" class="browser-default" name="tiene-almuerzo" required>
                                                <option value="" disabled selected>Elige una opción</option>
                                                <option value="0" <?php echo $editar && $datos['tiene_almuerzo']==0 ? "selected" : "" ?>>No Incluido</option>
                                                <option value="1" <?php echo $editar && $datos['tiene_almuerzo']==1 ? "selected" : "" ?>>Incluido</option>
                                              </select>
                                              <label style="position: absolute;left: 15px;top: 0px;" for="id_categoria">Incluye Almuerzo</label>
                                          </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12" style="position: relative;padding-top: 30px;">
                                                <textarea id="mini_descripcion" type="text" class="validate" name="mini_descripcion" value=""  maxlength="125" style="min-height: 45px;border: 1px solid #ccc;padding: 10px;"><?php echo $editar ? $datos['mini_descripcion'] : ""; ?></textarea>
                                                <label style="position: absolute;left: 15px;top: 30px; font-size: 1rem;" for="mini_descripcion">Mini Descripción (max. 125 caracteres)</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-field col s12" style="position: relative;padding-top: 30px;">
                                                <textarea id="editor" type="text" class="validate" name="descripcion" value="" style="min-height: 200px;border: 1px solid #ccc;padding: 10px;"><?php echo $editar ? $datos['descripcion'] : ""; ?></textarea>
                                                <label style="position: absolute;left: 15px;top: 0px; font-size: 1rem;" for="descripcion">Descripción</label>
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
                                              <input type="hidden" name="imagen_paquete" value="<?php echo $datos['imagen_paquete']; ?>">
                                              <input type="hidden" name="mini_img" value="<?php echo $datos['mini_img']; ?>">
                                              <input type="hidden" name="filtro" value="<?php echo $datos['filtro']; ?>">
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

           <script>
              // var editor = new Simditor({
              //   textarea: $('#editor')
              //   //optional options
              // });

              Simditor.locale = 'en-US';
                var editor = new Simditor({
                
                textarea: $('#editor'),

                toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'color', '|', 'ol', 'ul', '|', 'alignment', 'hr']

              });

           </script>
        
    </body>
</html>
