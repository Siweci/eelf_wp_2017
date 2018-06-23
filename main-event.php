<?php /* Template Name: Evénement principal */  ?>

<?php get_header(); ?>

<?php $page_slug = get_post_field ( 'post_name', get_post() ); ?>


<div id="<?php echo $page_slug; ?>">
    
    <section id="basic-infos" class="main-section" role="article">
    
        <div class="container-fluid">

            <div class="row">

                <div class="col-xs-12 col-md-10 col-md-offset-1">

                    <div class="row">
                        
                        <aside id="register-form" class="col-xs-12 col-md-5 text-center">
                            
                            <h1>Week-end d'Eglise</h1>
                            
                            <div class="date">Du 28 au 30 septembre 2018</div>
                            
                            <div class="inscription col-xs-12">

                                <div class="row">

                                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSe5WyUSeimajPVnY4qgT0eI-9xlrjIWkSoted6xoKK9upQWKg/viewform?usp=sf_link"
                                       target="_blank"
                                       class="inscription-en-ligne btn btn-blue btn-block"
                                       role="button">
                                        S'inscrire ici
                                    </a>

                                </div>

                            </div>
                            
                        </aside>

                        <main class="col-xs-12 col-md-6 col-md-offset-1">

<!--                            <h1>Week-end d'Eglise</h1>-->

                            <article id="description">

                                <p>
                                    Le week-end aura lieu du 28 au 30 septembre 2018.
                                    Il aura lieu à Isenfluh, dans un cadre champêtre et convivial.
                                </p>
                                <p>
                                    <strong>Date limite d'inscription le 19 septembre 2018</strong>
                                </p>
                                <p>Tout le monde est convié.</p>

                            </article>

                            <div id="organisateur" class="media">

                                <div class="media-left">
                                    <div class="media-object img-circle text-center">
                                        <!--<img class="" src="..." alt="...">-->
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>

                                </div>

                                <div class="media-body">
                                    <h4 class="media-heading">Daniel Cherbuin</h4>
                                    <p class="role">Organisateur</p>
                                </div>

                            </div><!-- #organisateur -->

                        </main>

                    </div>

                </div>

            </div>

        </div>
        
    </section><!-- #basic-infos -->
    
    <section id="savoir-plus">
        
        <div class="container-fluid">
            
            <div class="row">
                
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    
                    <div class="row">
                    
                        <div class="panel-group">

                            <div class="panel panel-no-border">

                                <div class="panel-heading">

                                    <h4 class="panel-title text-center">
                                        <a role="button" data-toggle="collapse" href="#infos-complementaires" aria-expanded="true" aria-controls="infos-complementaires">
                                            <span class="texte">
                                                En savoir plus
                                            </span>
                                            <span class="icone">
                                                <i class="fa fa-caret-down fa-2x" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </h4>

                                </div><!-- .panel-heading -->

                                <div id="infos-complementaires" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

                                    <div class="panel-body">
                                        
                                        <?php include 'includes/infos_complementaires.php'; ?>
                                        
                                    </div>

                                </div>

                            </div>

                        </div><!-- .paneil-group -->
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </section>
    
    <section id="tarifs" class="main-section">
        
        <div class="container-fluid">
            
            <div class="row">
                
                <div class="col-xs-12 col-md-8 col-md-offset-2">

                    <h3 class="col-xs-12 text-center">Tarifs</h3>

                    <table class="content table table-hover">

                        <thead class="dark">

                            <tr>

                                <td colspan="5" align="center">Prix sous tente</td>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>
                                <td></td>
                                <td>0 – 4 ans</td>
                                <td>5 ans</td>
                                <td>6-14 ans</td>
                                <td>dès 15 ans</td>
                            </tr>

                            <tr>
                                <td>Dès vendredi soir</td>
                                <td>gratuit</td>
                                <td>chf 25.00</td>
                                <td>chf 45.00</td>
                                <td>chf 60.00</td>
                            </tr>

                            <tr>
                                <td>Dès samedi matin</td>
                                <td>gratuit</td>
                                <td>chf 25.00</td>
                                <td>chf 35.00</td>
                                <td>chf 50.00</td>
                            </tr>

                        </tbody>

                    </table>

                    <table class="content table table-hover">

                        <thead class="dark">

                            <tr>

                                <td colspan="5" align="center">Prix chambres</td>

                            </tr>  

                        </thead>

                        <tbody>

                            <tr>
                                <td></td>
                                <td>0 – 4 ans</td>
                                <td>5 ans</td>
                                <td>6-14 ans</td>
                                <td>dès 15 ans</td>
                            </tr>

                            <tr>
                                <td>Dès vendredi soir</td>
                                <td>gratuit</td>
                                <td>chf 25.00</td>
                                <td>chf 72.00</td>
                                <td>chf 98.00</td>
                            </tr>

                            <tr>
                                <td>Dès samedi matin</td>
                                <td>gratuit</td>
                                <td>chf 25.00</td>
                                <td>chf 52.00</td>
                                <td>chf 75.00</td>
                            </tr>

                        </tbody>

                    </table>
                    
                    <div id="meta-tarifs" class="text-justify">
                        <p>
                            Les frais seront payés sur place.
                        </p>
                        <p>
                            L'aspect financier ne doit empêcher personne à participer au week-end. Une remise peut être accordée, veuillez contacter Daniel Cherbuin.
                        </p>
                    </div>

                    <div class="inscription col-xs-12 col-md-4 col-md-offset-4">

                        <div class="row">

                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSe5WyUSeimajPVnY4qgT0eI-9xlrjIWkSoted6xoKK9upQWKg/viewform?usp=sf_link"
                               target="_blank"
                               class="inscription-en-ligne btn btn-blue btn-block"
                               role="button">
                                S'inscrire ici
                            </a>

                        </div>

                    </div>
                    
                </div>
                
            </div>
            
        </div>

    </section><!-- #tarifs -->

    <section id="galerie-photos" class="main-section">
        
        <div class="container-fluid">
            
            <div class="row">

                <div class="col-xs-12 col-md-10 col-md-offset-1">

                    <h3 class="col-xs-12 text-center">Les photos du week-end d'Eglise 2017</h3>

                    <div class="content">

                        <div class="col-xs-6 col-md-3">
                            <img src="images/camp-1.jpg"
                                 class="img-responsive img-rounded" alt=""/>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <img src="images/camp-2.jpg"
                                 class="img-responsive img-rounded" alt=""/>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <img src="images/camp-3.jpg"
                                 class="img-responsive img-rounded" alt=""/>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <img src="images/camp-4.jpg"
                                 class="img-responsive img-rounded" alt=""/>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <img src="images/camp-5.jpg"
                                 class="img-responsive img-rounded" alt=""/>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <img src="images/camp-6.jpg"
                                 class="img-responsive" alt=""/>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <img src="images/camp-7.jpg"
                                 class="img-responsive img-rounded" alt=""/>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <img src="images/camp-8.jpg"
                                 class="img-responsive img-rounded" alt=""/>
                        </div>

                    </div>

                </div>
                
            </div>
            
        </div>

    </section>

    <section id="personnes-contact" class="main-section">
        
        <div class="container-fluid">
            
            <div class="row">
                
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    
                    <h3 class="col-xs-12 text-center">Personnes à contacter</h3>
                    
                    <div class="col-xs-12">
                        
                        <div class="row">
                    
                            <div class="content"><!-- .flex -->

                                <div class="col-xs-12 col-md-3">

                                    <div class="thumbnail text-center">

                                        <div class="background-icone img-circle text-center center-block">

                                            <!--<img src="..." alt="...">-->
                                            <i class="fa fa-user" aria-hidden="true"></i>

                                        </div>

                                        <div class="caption">

                                            <h4>Daniel Cherbuin</h4>

                                            <p class="role">Organisateur</p>
                                            <p class="meta-role">
                                                Vous aide en cas de problème de finance
                                            </p>

                                            <p>
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-envelope-o fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-mobile fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-whatsapp fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>

                                            </p>

                                        </div>

                                    </div>

                                </div>
                                
                                <div class="col-xs-12 col-md-3">

                                    <div class="thumbnail text-center">

                                        <div class="background-icone img-circle text-center center-block">

                                            <!--<img src="..." alt="...">-->
                                            <i class="fa fa-user" aria-hidden="true"></i>

                                        </div>

                                        <div class="caption">

                                            <h4>Sonia Cherbuin</h4>

                                            <p class="role">Organisateur</p>
                                            <p class="meta-role">
                                                Vous aide en cas de problème pour le déplacement
                                            </p>

                                            <p>
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-envelope-o fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-mobile fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-whatsapp fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>

                                            </p>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-xs-12 col-md-3">

                                    <div class="thumbnail text-center">

                                        <div class="background-icone img-circle text-center center-block">

                                            <!--<img src="..." alt="...">-->
                                            <i class="fa fa-user" aria-hidden="true"></i>

                                        </div>

                                        <div class="caption">

                                            <h4>Thomy</h4>

                                            <p class="role">Organisateur</p>
                                            <p class="meta-role"></p>
                                            
                                            <p>
        <!--                                        <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-envelope-o fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>-->
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-mobile fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>
        <!--                                        <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-whatsapp fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>-->

                                            </p>

                                        </div>

                                    </div>

                                </div>
                                
                                <div class="col-xs-12 col-md-3">

                                    <div class="thumbnail text-center">

                                        <div class="background-icone img-circle text-center center-block">

                                            <!--<img src="..." alt="...">-->
                                            <i class="fa fa-user" aria-hidden="true"></i>

                                        </div>

                                        <div class="caption">

                                            <h4>Myriam</h4>

                                            <p class="role">Organisateur</p>
                                            <p class="meta-role"></p>

                                            <p>
        <!--                                        <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-envelope-o fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>-->
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-mobile fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>
        <!--                                        <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-whatsapp fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>-->

                                            </p>

                                        </div>

                                    </div>

                                </div>
                                
                                <div class="col-xs-12 col-md-3">

                                    <div class="thumbnail text-center">

                                        <div class="background-icone img-circle text-center center-block">

                                            <!--<img src="..." alt="...">-->
                                            <i class="fa fa-user" aria-hidden="true"></i>

                                        </div>

                                        <div class="caption">

                                            <h4>Noémie</h4>

                                            <p class="role">Organisateur</p>
                                            <p class="meta-role"></p>

                                            <p>
        <!--                                        <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-envelope-o fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>-->
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-mobile fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>
        <!--                                        <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-whatsapp fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>-->

                                            </p>

                                        </div>

                                    </div>

                                </div>
                                
                                <div class="col-xs-12 col-md-3">

                                    <div class="thumbnail text-center">

                                        <div class="background-icone img-circle text-center center-block">

                                            <!--<img src="..." alt="...">-->
                                            <i class="fa fa-user" aria-hidden="true"></i>

                                        </div>

                                        <div class="caption">

                                            <h4>Philippe</h4>

                                            <p class="role">Organisateur</p>
                                            <p class="meta-role"></p>

                                            <p>
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-envelope-o fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-mobile fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-whatsapp fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>

                                            </p>

                                        </div>

                                    </div>

                                </div>
                                
                                <div class="col-xs-12 col-md-3">

                                    <div class="thumbnail text-center">

                                        <div class="background-icone img-circle text-center center-block">

                                            <!--<img src="..." alt="...">-->
                                            <i class="fa fa-user" aria-hidden="true"></i>

                                        </div>

                                        <div class="caption">

                                            <h4>David</h4>

                                            <p class="role">Organisateur</p>
                                            <p class="meta-role">
                                                Grand champion de tennis de table
                                            </p>
                                            <p>
        <!--                                        <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-envelope-o fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>-->
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-mobile fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn btn-link" role="button">
                                                    <i class="fa fa-whatsapp fa-fw fa-2x" aria-hidden="true"></i>
                                                </a>

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>

    </section>
    
    
    <section id="event-map" class="main-section">
        
        <div class="container-fluid">
            
            <div class="row">
                
                <div class="col-xs-12">
                    
                    <h3 class="col-xs-12 text-center">Adresse et carte</h3>
                    
                    <div id="adresse" class="col-xs-12 col-md-6 col-md-offset-3 text-center">
                        
                        <div class="row">
                            
                            <p>Isenfluh</p>
                            
                        </div>
                        
                    </div>
                    
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10961.304451229618!2d7.886918632690129!3d46.620319116103815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478fa1722711c94f%3A0x75964d952b71cc57!2sIsenfluh%2C+3822+Lauterbrunnen!5e0!3m2!1sfr!2sch!4v1529587527548" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </section>
    
</div>


<?php get_footer();