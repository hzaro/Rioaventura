<?php 
	$iD = $_GET['iD'];



	include("../db.php");  
	$bd=conectar_bd();

	$query2 = "SELECT * FROM paquetes_bikini_tours WHERE id=$iD ";
	$sql2 = $query2;

    $sth2=$bd->prepare($sql2);
    $sth2->execute(array()); 

?>




<?php 
    while($datos2=$sth2->fetch(PDO::FETCH_ASSOC)){        
?>

		<div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		    <h4 class="modal-title" id="myModalLabel">Información del Paquete</h4>
		</div>
		<div class="modal-body">		    
			<div class="content_bar project">
				<div class="row">
				    <div class="col-sm-12">	    	
				        <h2><?php echo $datos2['titulo']; ?></h2>
				    </div>			
				</div>

				<div class="row">					
				    <div class="col-sm-5 col-md-6 featured_image project_detail">
				        <!-- <img src="images/portfolio/canon/canon-1.jpg" alt="slider"> -->
				        <img src="<?php echo $datos2['imagen_paquete']; ?>" alt="slider">
				    </div>
				    <div class="col-sm-7 col-md-6">
				    	<div class="project_detail">
				        	<div class="project_text">
				                <?php echo $datos2['descripcion']; ?>								
				            </div>
				        </div>
				    </div>
				</div>
			</div>		    
		</div>
		<div class="modal-footer">

			<?php 
				$sql3="SELECT 
                      *
                    FROM 
                      recorridos_especiales                                          
                    WHERE 
                      habilitado=1 AND id_recorrido_principal=".$iD."";
                      
              	$sth3=$bd->prepare($sql3);
             	$sth3->execute();

              	$datos9=$sth3->fetch(PDO::FETCH_BOTH);

                if (empty($datos9) && $iD!="12") { ?>
                 
                  	<button type="button" name="button" data-cat="Paquete" data-idPaquete="<?php echo $datos2['id']; ?>" class="btn btn-success adquirir" data-toggle="modal" data-target="#modalCompraWeb">
            			<span class="fa fa-shopping-cart"></span> 
            			Adquirir
            		</button>

                <?php

                }

                else{ 

	                $sql4="SELECT 
		                      *
		                    FROM 
		                      recorridos_especiales                                          
		                    WHERE 
		                      habilitado=1 AND id_recorrido_principal=".$iD."";
	                      
		            $sth4=$bd->prepare($sql4);
		            $sth4->execute();

                    
                    while($datos4=$sth4->fetch(PDO::FETCH_ASSOC)) {                                         
                	?>                                        
                        <p>
	                		<b><?php echo $datos4['nombre_recorrido_especial']; ?>:</b>
	                		<!-- <button type="button" name="button" data-cat="Recorrido" data-idPaquete="<?php //echo $datos4['id_especial']; ?>" class="btn btn-success adquirir" data-toggle="modal" data-target=".carrito-modal">
	                			<span class="fa fa-shopping-cart"></span> 
	                			Adquirir
	                		</button> -->
	                		<button type="button" name="button" data-cat="Recorrido" data-idPaquete="<?php echo $datos4['id_especial']; ?>" class="btn btn-success adquirir" data-toggle="modal" data-target="#modalCompraWeb">
	                			<span class="fa fa-shopping-cart"></span> 
	                			Adquirir
	                		</button>

	                				

	                	</p>
                    
                <?php } 


               } ?>

		</div>


<?php } ?>