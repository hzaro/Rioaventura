<?php
  include("../db.php");
  include("php/include/sesion.php");
    if(!isset($_SESSION['admin'])){
      header("location: login.php");
    }

  $seccion="panel";
  include('header.php');
  
  $bd=conectar_bd();
  
  // $editar=false;
  // if(isset($_GET['editar']))
  // {
    $editar=true;

    $sql="SELECT 
            * 
          FROM  
            apagar_panel 
          WHERE 
            id=1";
            
    $sth1=$bd->prepare($sql);
    $sth1->execute(array());
    
    $datos=$sth1->fetch(PDO::FETCH_ASSOC);    
  // }




?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">APAGAR PANEL</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">&nbsp</span><br>
                                <div class="row">
                                    <form class="col s12" method="post" action="php/panel/apagar.php" enctype="multipart/form-data">

                                        <div class="row">   
                                            <div class="input-field col s12">
                                              <select name="apagar_panel" id="apagar_panel">
                                                <option disabled>Elige una opción</option>
                                                <option <?php echo $datos['apagado']==0 ? "selected" : "" ?> value="0">Habilitado</option>
                                                <option <?php echo $datos['apagado']==1 ? "selected" : "" ?> value="1">Apagado</option>
                                              </select>
                                              <label for="apagar_panel">Habilitar / Apagar Panel</label>                                        
                                            </div>    
                                        </div>  

                                        <div class="row">                                    
                                          <div class="input-field col s6">
                                            <input type="submit" class="validate" value="Guardar">
                                          </div>
                                        </div>                                       
                                        
                                        <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">                                           
                                        
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
