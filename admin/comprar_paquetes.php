<?php
  include("../db.php");
  include("php/include/sesion.php");
    // if(!isset($_SESSION['admin'])){
    //   header("location: login.php");
    // }

  if (isset($_SESSION['apagado'])) {
    if(!isset($_SESSION['admin'])){
      header("location: fuera_horario.php");
    }      
  }

  $seccion="comprar_paquetes";
  include('header.php');
  
?>

    <main class="mn-inner inner-active-sidebar comprar_paquetes">
      <div class=""> 

        <div class="row no-m-t no-m-b">
          <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Paquetes</span>

                    <?php
                      $bd=conectar_bd();

                      $sql="SELECT 
                              *
                            FROM 
                              paquetes_bikini_tours                                          
                            WHERE 
                              habilitado=1";
                              
                      $sth1=$bd->prepare($sql);
                      $sth1->execute();


                        
                      while($datos=$sth1->fetch(PDO::FETCH_ASSOC))
                        {
                        $id = $datos['id'];
                      ?>
                        <div class="col s12 m6 l3">
                          <div class="card">
                              <div class="card-image">
                                  <img <?php echo 'src="../'.$datos['imagen_paquete'].'"'; ?> alt="">
                                  <span class="card-title"><?php echo $datos['titulo']; ?></span>
                              </div>
                              <div class="card-content mini-descripcion">
                                  <?php echo $datos['descripcion']; ?>
                              </div>
                              <div class="card-action">
                                  <a class="waves-effect waves-light btn modal-trigger blue masInfo" <?php echo 'data-IdPaquete="'.$datos['id'].'"'; ?> href="#modalInfo">INFO</a>


                              <?php

                                $sql2="SELECT 
                                        recorridos_especiales.id_especial,recorridos_especiales.id_recorrido_principal,recorridos_especiales.nombre_recorrido_especial,recorridos_especiales.precio_recorrido_especial,paquetes_bikini_tours.titulo AS nombre_paquete
                                      FROM 
                                        recorridos_especiales
                                      LEFT JOIN 
                                        paquetes_bikini_tours ON (recorridos_especiales.id_recorrido_principal=paquetes_bikini_tours.id)
                                      WHERE 
                                        recorridos_especiales.habilitado=1 AND recorridos_especiales.id_recorrido_principal=".$datos['id']."";
                                        
                                $sth2=$bd->prepare($sql2);
                                $sth2->execute();
                                
                              ?>

                                  
                                    <?php 
                                      $sql4="SELECT 
                                              *
                                            FROM 
                                              recorridos_especiales                                          
                                            WHERE 
                                              id_recorrido_principal=".$datos['id']."";
                                              
                                      $sth4=$bd->prepare($sql4);
                                      $sth4->execute();

                                      $datos9=$sth4->fetch(PDO::FETCH_BOTH);

                                        if (empty($datos9) && $datos['id']!=="12") { ?>

                                          <a class='btn modal-trigger adquirir' href="#modalCompra" <?php echo 'data-idPaquete="'.$datos['id'].'"'; ?> data-cat="Paquete" >Adquirir</a>

                                        <?php

                                        }
                                        else{  

                                          if ($datos['id']!=="12"){ ?>

                                              <a class='dropdown-button btn adquirir' <?php echo 'data-activates="dropdown_'.$datos['id'].'"'; ?> >Recorrido</a>
                                              <ul <?php echo 'id="dropdown_'.$datos['id'].'"'; ?> class='dropdown-content'>

                                            <?php
                                              while($datos2=$sth2->fetch(PDO::FETCH_ASSOC)){                                         
                                            ?>                                        
                                                <li><a class="modal-trigger adquirir" href="#modalCompra" <?php echo 'data-idPaquete="'.$datos2['id_especial'].'"'; ?> data-cat="Recorrido" ><?php echo $datos2['nombre_recorrido_especial']; ?></a></li>
                                            <?php 
                                              } 
                                            ?>  

                                              </ul>

                                          <?php 
                                          } 
                                          
                                        } 
                                        ?>  

                              </div>
                          </div> 
                        </div>

                    <?php } ?>

                    

                    <!-- Modal Structure -->
                    <div id="modalInfo" class="modal">
                        <div class="modal-content">
                            <div id="rellenoInfo">
                              <!-- Llena contenido por Ajax  -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
                        </div>
                    </div>
                    <!-- END Modal Structure -->

                    <!-- Modal Structure -->
                    <div id="modalCompra" class="modal">
                        <div class="modal-content">
                            <div id="rellenoCompra">
                              <!-- Llena contenido por Ajax  -->
                            </div>
                        </div>                        
                    </div>
                    <!-- END Modal Structure -->

                    <!-- Modal Structure -->
                    <div id="modalMetodoPago" class="modal">
                        <div class="modal-content">
                          <div id="rellenoMetodo">
                            <div class="container-fluid">

                              <div class="row" style="margin-top: 40px; margin-bottom: 20px;text-align: center;">

                                <div class="col s12 m12 l12">
                                  <h4 style="font-size: 20px;margin-bottom: 50px;">¿Con qué medio quieres pagar?</h4>
                                </div>

                                <div class="col s4">
                                  <button id="mercadopagoImagen" type="button" class="btn btn-primary btn-sm btn-mercado indigo" style="height: 45px;width: 100%;border-radius: 5px;">
                                    <img class="mercad" src="assets/images/mercadopago.png" style="max-height: 33px;margin: 7px auto;">
                                  </button> 
                                </div>
                                <div class="col s4">
                                  <div id="paypal-button"></div>
                                </div>
                                <div class="col s4">
                                  <button id="aCuenta" type="button" class="btn btn-primary btn-sm btn-mercado blue" style="height: 45px;width: 100%;border-radius: 5px;">
                                    A CUENTA
                                  </button>
                                </div>

                              </div>


                              <!-- <div class="row align-items-center rowpago">
                                <div class="col-md-12 align-self-center text-center frase-top">
                                </div>

                                <div class="col-md-4 align-self-center">
                                  <button id="mercadopagoImagen" type="button" class="btn btn-primary btn-sm btn-mercado" style="height: 55px;width: 100%;">
                                    <img class="mercad" src="assets/images/mercadopago.png" style="max-height: 35px;margin: 10px auto;">
                                  </button>             
                                </div>
                                <div class="col-md-4 align-self-center">
                                   <div id="paypal-button"></div>
                                </div>
                                <div class="col-md-4 align-self-center">
                                   <div id="a-cuenta"></div>
                                </div>
                              </div> -->

                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a> -->
                        </div>
                    </div>
                    <!-- END Modal Structure -->

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

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script type="text/javascript">
      (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
    </script>
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>

    <script>
      var funcion = function(){
        $( ".mini-descripcion" ).each( function(){
          if ($(this).text().length > 170) {
            $(this).text($(this).text().substr(0,170)+'...'); 
          }
          else{
            $(this).text($(this).text()); 
          }
        });
      }

      funcion();  
    </script>

    <script>
      $('.masInfo').on('click',function(){
          // extraer dato dato de id y almacenar en variable
          var iD = $(this).attr('data-IdPaquete');
          // Enviar esa variable al archivo que va a traer por ajax
          $.get( "modal_mas_info.php",{  iD:iD } , function( data ) {
            $( "#rellenoInfo" ).html( data );              
          });
      });

      $('.adquirir').on('click',function(){
          // extraer dato de id y almacenar en variable
          var iD = $(this).attr('data-IdPaquete');
          var categoria = $(this).attr('data-cat');
          // Enviar esa variable al archivo que va a traer por ajax
          $.get( "modal_compra.php",{  iD:iD,categoria:categoria } , function( data ) {
            $( "#rellenoCompra" ).html( data );  
            $('#fecha_paquete').datetimepicker({
              format:'d/m/Y',
              minDate: 0,
              timepicker: false,
            });          
            var precioPaquete = $('#precio_paquete').html();
            var cantPersonas = $('#cant_personas').val();
            var precioTransporte = $('#precio_transporte').val()
            $('#subtotal').html(Number(precioTransporte)+Number(precioPaquete)); 
            // $('#total').html(cantPersonas*precioPaquete);
            $('#total').html((cantPersonas*precioTransporte)+(cantPersonas*precioPaquete));  
          });
      });

      $('#modalCompra').on('submit', '#form_modalCompra', function(e){
          e.preventDefault();       
          validar_ipage();    

          // // extraer dato de id y almacenar en variable
          // var iD = $(this).attr('data-IdPaquete');
          // var categoria = $(this).attr('data-cat');
          // // Enviar esa variable al archivo que va a traer por ajax
          // $.get( "modal_compra.php",{  iD:iD,categoria:categoria } , function( data ) {
          //   $( "#rellenoCompra" ).html( data );  
          //   $('#fecha_paquete').datetimepicker({
          //     format:'d/m/Y H:i',
          //     minDate: 0,
          //   });          
          //   var precioPaquete = $('#precio_paquete').html();
          //   var cantPersonas = $('#cant_personas').val();            
          //   $('#total').html(cantPersonas*precioPaquete);  
          // });
      });

       
    </script>




    <script>

    
    </script>

</body>
</html>
