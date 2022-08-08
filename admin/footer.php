           <div class="page-footer">
                <div class="footer-grid container">
                    <div class="footer-l white">&nbsp;</div>
                    <div class="footer-grid-l white">
                    </div>
                    <div class="footer-r white">&nbsp;</div>
                    <div class="footer-grid-r white">
                        <!-- <a class="footer-text" href="mailbox.html">
                            <i class="material-icons arrow-r">arrow_forward</i>
                            <span class="direction">Next</span>
                            <div>
                                Mailbox app
                            </div>
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="left-sidebar-hover"></div>
        
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/plugins/chart.js/chart.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="assets/plugins/peity/jquery.peity.min.js"></script>
        
        <script src="assets/js/script_pagos_admin.js"></script>
        <script src="assets/js/jquery.datetimepicker.full.js"></script>
        
        <script src="assets/plugins/simditor/scripts/module.js"></script>
        <script src="assets/plugins/simditor/scripts/hotkeys.js"></script>
        <script src="assets/plugins/simditor/scripts/uploader.js"></script>
        <script src="assets/plugins/simditor/scripts/simditor.js"></script>
        
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <!-- <script src="assets/js/pages/dashboard.js"></script> -->
  
        
          
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
          



        
        <script type="text/javascript">
        variables={};
        <?php
          if(isset($variablesJS) && is_array($variablesJS)){
            foreach ($variablesJS as $nombre => $valor){
              ?>
               variables.<?php echo $nombre; ?>='<?php echo $valor; ?>';
              <?php
            }
          }
        ?>
        </script>
        <script>
            $(document).ready(function(){
              $('#example').DataTable();
            });
        </script>

        <?php
          if(isset($pageScripts) && is_array($pageScripts)){
            foreach ($pageScripts as &$script){
              echo "<script src=\"{$script}\"></script>";
            }
          }
        ?>
        
