<?php
  // include("../php/include/config.php");
  // include("../php/include/funciones.php");
  include("../db.php");
  include("php/include/sesion.php");
    if(!isset($_SESSION['admin'])){
      header("location: login.php");
    }

  $seccion="usuarios";
  include('header.php');
  
?>
            <main class="mn-inner inner-active-sidebar">
                <!--<div class="middle-content">-->
                <div class="">
                    
                  <div class="row no-m-t no-m-b">
                    <div class="col s12 m12 l12">
                      <div class="card">
                          <div class="card-content">
                              <span class="card-title">Usuarios</span>
                              
                              <!-- <p>DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code></p> --><br>
                              <table id="example" class="display responsive-table datatable-example striped">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Usuario</th>
                                          <th>Contraseña</th>
                                          <th>Nombre y Apellido</th>
                                          <th>Hotel</th>
                                          <th>Correo</th>
                                          <th>Acciones</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                          <th>ID</th>
                                          <th>Usuario</th>
                                          <th>Contraseña</th>
                                          <th>Nombre y Apellido</th>
                                          <th>Hotel</th>
                                          <th>Correo</th>
                                          <th>Acciones</th>
                                      </tr>
                                  </tfoot>
                                  <tbody>
                                    <?php
                                      $bd=conectar_bd();

                                      $sql="SELECT 
                                              *
                                            FROM 
                                              usuarios                                          
                                            WHERE 
                                              habilitado=1";
                                              
                                      $sth1=$bd->prepare($sql);
                                      $sth1->execute();
                                      
                                      while($datos=$sth1->fetch(PDO::FETCH_ASSOC))
                                      {
                                        ?>
                                          <tr>
                                            <td><?php echo $datos['id']; ?></td>
                                            <td><?php echo $datos['user']; ?></td>
                                            <td><?php echo $datos['pass']; ?></td>
                                            <td><?php echo $datos['nombre_apellido']; ?></td>
                                            <td><?php echo $datos['hotel']; ?></td>
                                            <td><?php echo $datos['email']; ?></td>
                                            <td>
                                              <a href="agregar_usuario.php?editar&id=<?php echo $datos['id']; ?>">Editar</a>&nbsp &nbsp
                                              <a class="lnkBorrar" href="php/usuarios/borrar.php?id=<?php echo $datos['id']; ?>">Borrar</a>
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
    </body>
</html>
