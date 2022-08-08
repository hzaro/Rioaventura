<?php
  include("../db.php");
  include("php/include/sesion.php");
    // if(!isset($_SESSION['admin'])){
    //   header("location: login.php");
    // }
  include('header.php');
  
?>

    <main class="mn-inner inner-active-sidebar comprar_paquetes">
      <div class=""> 

        <div class="row no-m-t no-m-b">
          <div class="col s12 m12 l12">
            <div class="card">
              <!-- Dropdown Trigger -->
              <a class='dropdown-button btn' href='#' data-activates='dropdown5'>Drop Me!</a>
              <!-- Dropdown Structure -->
              <ul id='dropdown5' class='dropdown-content'>
                  <li><a href="#!">one</a></li>
                  <li><a href="#!">two</a></li>
                  <li class="divider"></li>
                  <li><a href="#!">three</a></li>
              </ul>
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
                                      $sql4="SELECT 
                                              *
                                            FROM 
                                              recorridos_especiales                                          
                                            WHERE 
                                              id_recorrido_principal=".$datos['id']."";
                                              
                                      $sth4=$bd->prepare($sql4);
                                      $sth4->execute();


                                      $datos9=$sth4->fetch(PDO::FETCH_BOTH);

                                        if (empty($datos9)) { ?>

                                          <a class='btn modal-trigger comprar' href="#modalCompra">Comprar</a>

                                        <?php
                                          echo 'is empty';
                                        }
                                        else{  ?>

                                          <a class='dropdown-button btn comprar' <?php echo 'data-activates="dropdown_'.$datos['id'].'"'; ?> >Drop Me!</a>
                                          <ul <?php echo 'id="dropdown_'.$datos['id'].'"'; ?> class='dropdown-content'>

                                        <?php
                                          echo 'is not empty';


                                          while($datos5=$sth4->fetch(PDO::FETCH_ASSOC))
                                          {                                         
                                        ?>                                        
                                            <li><a class="modal-trigger comprar" href="#modalCompra"><?php echo $datos5['nombre_recorrido_especial']; ?></a></li>
                                        <?php 
                                          } 
                                        ?>                                    

                                          </ul>


                                        <?php 
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
                        <div class="modal-footer">
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
                        </div>
                    </div>
                    <!-- END Modal Structure -->

                </div>
            </div>
          </div>                       
        </div>
        
        <div class="row no-m-t no-m-b">
          <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Recorridos Especiales</span>
                    
                    <!-- <p>DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code></p> --><br>
                    <table id="example" class="display responsive-table datatable-example striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Recorrido Principal</th>
                                <th>Nombre Recorrido Especial</th>
                                <th>Precio Recorrido Especial</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Recorrido Principal</th>
                                <th>Nombre Recorrido Especial</th>
                                <th>Precio Recorrido Especial</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                              $bd=conectar_bd();

                              $sql2="SELECT 
                                      recorridos_especiales.id,recorridos_especiales.id_recorrido_principal,recorridos_especiales.nombre_recorrido_especial,recorridos_especiales.precio_recorrido_especial,paquetes_bikini_tours.titulo AS nombre_paquete
                                    FROM 
                                      recorridos_especiales
                                    LEFT JOIN 
                                      paquetes_bikini_tours ON (recorridos_especiales.id_recorrido_principal=paquetes_bikini_tours.id)
                                    WHERE 
                                      recorridos_especiales.habilitado=1 AND paquetes_bikini_tours.habilitado=1";
                                      
                              $sth2=$bd->prepare($sql2);
                              $sth2->execute();
                              
                              while($datos2=$sth2->fetch(PDO::FETCH_ASSOC))
                              {
                                ?>
                                  <tr>
                                    <td><?php echo $datos2['id']; ?></td>
                                    <td><?php echo $datos2['nombre_paquete']; ?></td>
                                    <td><?php echo $datos2['nombre_recorrido_especial']; ?></td>
                                    <td><?php echo $datos2['precio_recorrido_especial']; ?></td>
                                    <td>
                                      <a href="agregar_recorrido_especial.php?editar&id=<?php echo $datos2['id']; ?>">Editar</a>&nbsp &nbsp
                                      <a class="lnkBorrar" href="php/recorridos_especiales/borrar.php?id=<?php echo $datos2['id']; ?>">Borrar</a>
                                    </td>
                                  </tr>
                                <?php
                              }
                            ?>
                          </tbody>
                    </table>
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
    </script>

</body>
</html>