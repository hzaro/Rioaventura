<?php 
	$iD = $_GET['iD'];
?>

<?php
	include("../db.php");  
	$bd=conectar_bd();

	$query = "SELECT * FROM paquetes_bikini_tours WHERE id=$iD ";
	$sql3 = $query;

    $sth3=$bd->prepare($sql3);
    $sth3->execute(array()); 

?>

<?php 

    while($datos3=$sth3->fetch(PDO::FETCH_ASSOC)){
        
    ?>

    <div>
        <div class="space20"></div>
        <h2 class="m0"><?php echo $datos3['titulo']; ?></h2>
        <span class="precio">$<?php echo $datos3['precio']; ?> / por persona</span>

        <div class="space20"></div>

        <?php echo $datos3['descripcion']; ?>

        <div class="space20"></div>
        <div class="space20"></div>

        <h6><b>Detalles del Paquete</b></h6>
        <div class="space20"></div>
        <table>
            <tr>
                <td>Precio Excursión</td>
                <td>$<?php echo $datos3['precio']; ?></td>
            </tr>
            <tr>
                <td>Transporte</td>
                <td>
                    <?php 
                    if ($datos3['tiene_transporte']==0) {
                        echo 'No tiene transporte';                                         
                    }
                    elseif ($datos3['tiene_transporte']==1) {
                        echo 'Opcional';
                    }
                    else{
                        echo 'Obligatorio';                                         
                    }
                    ?>                                      
                </td>                                       
            </tr>
            <tr>
                <td>Precio del Transporte</td>
                <td>
                    <?php 
                    if ($datos3['tiene_transporte']==0) {
                        echo 'No aplica';                                           
                    }
                    elseif ($datos3['tiene_transporte']==1) {
                        echo '$'.$datos3['precio_transporte'];
                    }
                    else{
                        echo '$'.$datos3['precio_transporte'];                                           
                    }
                    ?>  
                </td>
            </tr>
            <tr>
                <td>Incluye Almuerzo</td>
                <td>
                    <?php 
                    if ($datos3['tiene_almuerzo']==0) {
                        echo '<i class="tilde fas fa-times yellow"></i> No';                                            
                    }                               
                    else{
                        echo '<i class="tilde fas fa-check yellow"></i> Si';                                            
                    }
                    ?>                                          
                </td>
            </tr>
            
        </table>
    </div>

    <?php } ?>