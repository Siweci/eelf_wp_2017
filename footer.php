        
        <footer class="">
            
            <div class="container-fluid">
            
                <div class="row">
                    
                    <div class="wrapper col-xs-12">
                        
                        <div id="church-datas" class=" col-xs-12 col-md-4 text-center-xs">
                            
                            <p><?php echo mwc_front_Contacts::get_info( 'full_name' ); ?></p>
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
        
        
        <?php wp_footer(); ?>

    </body>
    
</html>