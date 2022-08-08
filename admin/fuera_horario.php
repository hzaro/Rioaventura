<?php
  include("../db.php");
  include("php/include/sesion.php");
    // if(!isset($_SESSION['admin'])){
    //   header("location: login.php");
    // }

  if (!isset($_SESSION['apagado'])) {
    header("location: comprar_paquetes.php");        
  }

  $seccion="fuera_horario";
  include('header.php');
  
?>

      <main class="mn-inner">
          <div class="row">
              <div class="col s12">
                  <div class="page-title">INFORMACIÓN</div>
              </div>
              <div class="col s12 m12 l12">
                  <div class="card">
                      <div class="card-content">
                          <span class="card-title">&nbsp</span><br>
                          <div class="row" style="text-align: center;">
                              <h3>El panel se encuentra deshabilitado</h3>
                              <!-- <h2>Estás fuera del horario permitido para realizar reservas</h2> -->
                              <h5>El panel está disponible de Lunes a Sábado de 8:00hs a 20:0hs</h5>
                          </div>
                          <span class="card-title">&nbsp</span><br>
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
