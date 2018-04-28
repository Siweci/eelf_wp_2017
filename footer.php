        
        <footer class="">
            
            <div class="container-fluid">
            
                <div class="row">
                    
                    <div class="wrapper col-xs-12">
                        
                        <div id="church-datas" class=" col-xs-12 col-md-4 text-center-xs">
                            <p><?php echo mwc_front_Contacts::get_full_name(); ?></p>
                            <p>Membre de la
                                <a href="http://lafree.ch/" target="_blank"
                                   title="Fédération Romande d'Eglises Evangéliques">FREE</a>
                            </p>
                        </div>

                        <div id="church-adress" class="col-xs-12 col-md-4 text-center">
                            <?php mwc_front_Contacts::print_telephone_link(); ?>
                            <p>
                                <?php echo mwc_front_Contacts::get_adresse(); ?>
                            </p>
                        </div>

                        <?php // include 'parts/church-networks.php'; ?>
                        
                    </div>
                    
                    
                        
                </div>
                
            </div>
            
            
            <div id="message" class="container-fluid"></div>            
            
        
        </footer>
        
        
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        
         Latest compiled and minified JavaScript 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                crossorigin="anonymous"></script>
                
        <script src="js/main.js" type="text/javascript"></script>-->
        
        <?php wp_footer(); ?>

    </body>
    
</html>