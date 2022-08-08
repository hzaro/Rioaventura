<?php 
    $iD = $_GET['iD'];
    $categoria = $_GET['categoria'];
    // $datos2 = array();
	// $datos2 = $_GET['datos2'];
?>

<?php
    
	include("../db.php");  
	$bd=conectar_bd();

    if ($categoria=="Paquete") {
        
    	$query = "SELECT * FROM paquetes_bikini_tours WHERE id=$iD ";
    	$sql3 = $query;

        $sth3=$bd->prepare($sql3);
        $sth3->execute(array()); 
    }
    else{

        $sql3="SELECT 
            recorridos_especiales.id_especial,recorridos_especiales.id_recorrido_principal,recorridos_especiales.nombre_recorrido_especial,recorridos_especiales.precio_recorrido_especial,paquetes_bikini_tours.titulo AS nombre_paquete, paquetes_bikini_tours.tiene_transporte AS tiene_transporte_paquete, paquetes_bikini_tours.precio_transporte AS precio_transporte_paquete
          FROM 
            recorridos_especiales
          LEFT JOIN 
            paquetes_bikini_tours ON (recorridos_especiales.id_recorrido_principal=paquetes_bikini_tours.id)
          WHERE 
            recorridos_especiales.habilitado=1 AND recorridos_especiales.id_especial=".$iD."";
            
        $sth3=$bd->prepare($sql3);
        $sth3->execute();

    }


?>

<?php 

    while($datos3=$sth3->fetch(PDO::FETCH_ASSOC)){
        
    ?>

    <div>
        <div class="row no-m-t no-m-b">
            <div class="col s12 m12 l12">

                <div class="row no-m-t no-m-b">
                    <div class="col s12 m6 l3">
                        <h5><?php echo isset($datos3['titulo']) ? $datos3['titulo'] : $datos3['nombre_paquete']; ?></h5>
                        <h4><?php echo isset($datos3['nombre_recorrido_especial']) ? $datos3['nombre_recorrido_especial'] : ""; ?></h4>
                        <h6>Precio: <span> <?php echo isset($datos3['precio']) ? '$<span id="precio_paquete">'.$datos3['precio'].'</span> por persona' : '$<span id="precio_paquete">'.$datos3['precio_recorrido_especial'].'</span> por persona' ?> </span></h6>
                    </div>
                </div>


                <form id="form_modalCompra">

                    <div class="row" style="margin-top: 40px; margin-bottom: 20px;">
                        <div class="col s12 m12 l12">
                            <div class="row no-m-t no-m-b">

                                <div class="col s12 m6 l4">
                                    <div class="input_container">
                                        <label for="nombre_comprador">Nombre Comprador</label>
                                        <input class="form-control w-100 prueba" type="text" name="nombre_comprador" placeholder="Nombre" required>
                                    </div>
                                </div>
                                <div class="col s12 m6 l4">
                                    <div class="input_container">
                                        <label for="email_comprador">Email Comprador</label>
                                        <input class="form-control w-100" type="email" name="email_comprador" placeholder="Email" required>
                                    </div>                                    
                                </div>
                                <div class="col s12 m6 l4">
                                    <div class="input_container">
                                        <label for="telefono_comprador">Teléfono Comprador</label>
                                        <input class="form-control w-100" type="text" name="telefono_comprador" placeholder="Teléfono" required>
                                    </div>
                                </div>

                                <div class="col s12">
                                    <div class="input_container">
                                        <label for="mensaje">Mensaje</label>
                                        <textarea class="form-control w-100" name="mensaje" rows="10" cols="30" placeholder="Mensaje" style="height: 100px;border: 1px solid #BCBCBC;margin-bottom: 20px;"></textarea> 
                                    </div>
                                </div>  

                                <div class="col s12 m6 l4">
                                    <div class="input_container">
                                        <label for="fecha">Fecha de Reserva</label>
                                        <input id="fecha_paquete" type="text" class="form-control datetime" name="fecha" placeholder="dd / mm / aa" required>
                                    </div>
                                </div>                                                               
                                <div class="col s12 m6 l4">
                                    <div class="input_container">
                                        <label for="precio_transporte">Transporte</label>
                                        <?php

                                            if ( isset($datos3['tiene_transporte']) ) {
                                                # code...
                                                if ($datos3['tiene_transporte']==2) {
                                                    echo '<select name="precio_transporte" id="precio_transporte" style="display:block;" required>
                                                            <option selected value="'.$datos3['precio_transporte'].'">Obligatorio ( $'.$datos3['precio_transporte'].' )</option>
                                                          </select>';
                                                }
                                                elseif ($datos3['tiene_transporte']==1) {
                                                    echo '<select name="precio_transporte" id="precio_transporte" style="display:block;" required>
                                                            <option disabled value="Opcional">Opcional</option>
                                                            <option selected value="'.$datos3['precio_transporte'].'">Contratar transporte ( $'.$datos3['precio_transporte'].' )</option>
                                                            <option value="0">No Contratar ( $0 ) </option>
                                                          </select>';
                                                }
                                                elseif ($datos3['tiene_transporte']==0) {
                                                    echo '<select name="precio_transporte" id="precio_transporte" style="display:block;" required>
                                                            <option selected value="0">No Tiene ( $0 )</option>
                                                          </select>';
                                                }
                                            }
                                            elseif ( isset($datos3['tiene_transporte_paquete']) ) {
                                                 # code...
                                                if ($datos3['tiene_transporte_paquete']==2) {
                                                    echo '<select name="precio_transporte" id="precio_transporte" style="display:block;" required>
                                                            <option selected value="'.$datos3['precio_transporte_paquete'].'">Obligatorio ( $'.$datos3['precio_transporte_paquete'].' )</option>
                                                          </select>';
                                                }
                                                elseif ($datos3['tiene_transporte_paquete']==1) {
                                                    echo '<select name="precio_transporte" id="precio_transporte" style="display:block;" required>
                                                            <option disabled value="Opcional">Opcional</option>
                                                            <option selected value="'.$datos3['precio_transporte_paquete'].'">Contratar transporte ( $'.$datos3['precio_transporte_paquete'].' )</option>
                                                            <option value="0">No Contratar ( $0 ) </option>
                                                          </select>';
                                                }
                                                elseif ($datos3['tiene_transporte_paquete']==0) {
                                                    echo '<select name="precio_transporte" id="precio_transporte" style="display:block;" required>
                                                            <option selected value="0">No Tiene ( $0 )</option>
                                                          </select>';
                                                }
                                            }

                                        ?>
                                    </div>
                                </div> 
                                <div class="col s12 m6 l4">
                                    <div class="input_container">
                                        <label for="cant_personas">Cantidad de Perosnas</label><br>
                                        <input id="cant_personas" class="form-control w-100" type="number" name="cant_personas" placeholder="Cant. de personas" min="1" value="1">
                                    </div>                             
                                </div>  



                                <input hidden type="text" name="id_var" <?php echo 'value="'.$iD.'"' ?> > 
                                <input hidden type="text" name="categoria_var" <?php echo 'value="'.$categoria.'"' ?> > 

                            </div>                                                       
                        </div>
                    </div>
                
                    <div class="row no-m-t no-m-b">
                        <div class="col s6 m6 l6">
                            <p>Subtotal por persona:  $<span id="subtotal"></span></p>
                            <h3><span class="fa fa-dollar"></span>Total:  $<span id="total"></span></h3>
                        </div>
                        <div class="col s6 m6 l6" style="text-align: right;padding-top: 55px;">
                            <button type="submit" href="#!" id="botonPagarAdmin" class="btn waves-effect waves-green modal-trigger" href="#modalMetodoPago">
                                Comprar
                            </button> 
                        </div>
                    </div>

                </form> 
                
            </div>
        </div>
    </div>



                        
    <?php } ?>