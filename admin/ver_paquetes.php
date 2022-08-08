<?php
  // include("../php/include/config.php");
  // include("../php/include/funciones.php");
  include("../db.php");
  include("php/include/sesion.php");
    if(!isset($_SESSION['admin'])){
      header("location: login.php");
    }

  $seccion="paquetes";
  
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
                              
                              <!-- <p>DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code></p> --><br>
                              <table id="example" class="display responsive-table datatable-example striped">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Nombre Paquete</th>
                                          <th>Tiene Transporte</th>
                                          <th>Precio Transporte</th>
                                          <th>Incluye Almuerzo</th>
                                          <th>Precio Paquete</th>
                                          <th>Acciones</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                          <th>ID</th>
                                          <th>Nombre Paquete</th>
                                          <th>Tiene Transporte</th>
                                          <th>Precio Transporte</th>
                                          <th>Incluye Almuerzo</th>
                                          <th>Precio Paquete</th>
                                          <th>Acciones</th>
                                      </tr>
                                  </tfoot>
                                  <tbody>
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
                                        ?>
                                          <tr>
                                            <td><?php echo $datos['id']; ?></td>
                                            <td><?php echo $datos['titulo']; ?></td>
                                            <td><?php 
                                                if ($datos['tiene_transporte']==0) {
                                                  echo "No Tiene";
                                                }
                                                elseif ($datos['tiene_transporte']==1) {
                                                  echo "Opcional";
                                                } 
                                                else {
                                                  echo "Obligatorio";
                                                } ?>                                                
                                            </td>
                                            <td><?php echo $datos['precio_transporte']; ?></td>
                                            <td><?php 
                                                if ($datos['tiene_almuerzo']==0) {
                                                  echo "No Incluido";
                                                }
                                                else {
                                                  echo "Incluido";
                                                } ?>                                                
                                            </td>
                                            <td><?php echo $datos['precio']; ?></td>
                                            <td>
                                              <a href="agregar_paquete.php?editar&id=<?php echo $datos['id']; ?>">Editar</a>&nbsp &nbsp
                                              <a class="lnkBorrar" href="php/paquetes/borrar.php?id=<?php echo $datos['id']; ?>">Borrar</a>
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
                                        // $bd=conectar_bd();
  
                                      $sql2="SELECT 
                                        recorridos_especiales.id_especial,recorridos_especiales.id_recorrido_principal,recorridos_especiales.nombre_recorrido_especial,recorridos_especiales.precio_recorrido_especial,paquetes_bikini_tours.titulo AS nombre_paquete
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
                                              <td><?php echo $datos2['id_especial']; ?></td>
                                              <td><?php echo $datos2['nombre_paquete']; ?></td>
                                              <td><?php echo $datos2['nombre_recorrido_especial']; ?></td>
                                              <td><?php echo $datos2['precio_recorrido_especial']; ?></td>
                                              <td>
                                                <a href="agregar_recorrido_especial.php?editar&id_especial=<?php echo $datos2['id_especial']; ?>">Editar</a>&nbsp &nbsp
                                                <a class="lnkBorrar" href="php/recorridos_especiales/borrar.php?id_especial=<?php echo $datos2['id_especial']; ?>">Borrar</a>
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
              include('footer.php');
              $pageScripts[]="scripts/borrar.js";
            ?>
    </body>
</html>