<html>
  <body>
    <form id="frmCompra" method="post" action="action/generarPago.php">
      <!-- MERCADO ENVÍOS, SI NO SE QUIERE USAR SE PUEDE BORRAR TODO ESTO -->
      Mercado envíos <input type="checkbox" name="me" value="1"><br>
      Código postal <input type="text" name="me_cp" id="txtCp"><button type="button" id="btnCalcular">Calcular costo</button><br>
      <div id="listaEnvio">
      
      </div>
      <!-- FIN MERCADO ENVÍOS -->
      
      <br>
      <button type="submit" class="botonMP" data-monto="100">$100</button><br>
      <button type="submit" class="botonMP" data-monto="200">$200</button><br>
      Ingresar monto<input type="number" id="txtMonto" name="monto"><br>
      Mensaje <textarea name="mensaje"></textarea><br>
      <button type="submit" class="botonMP">Enviar</button>
    </form>
    
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
      (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
    </script>
    <script src="script.js"></script>
  </body>
</html>
