<?php
  // include("../php/include/config.php");
  // include("../php/include/funciones.php");
  include("../db.php");
  include("php/include/sesion.php");
  header("Location: ver_paquetes.php");
  include('header.php');

?>
            <main class="mn-inner inner-active-sidebar">
                <!--<div class="middle-content">-->
                <div class="">
                    
                    <div class="row no-m-t no-m-b">
                      <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Paquetes</span>
                                <span class="card-title">NO LO QUIERO VER MAS</span>
                                
                            </div>
                        </div>
                    </div>
                       
                    </div>
                    
                </div>
                
            </main>
            <?php 
              $pageScripts[]="scripts/borrar.js";
              include('footer.php')
            ?>
    </body>
</html>
