<section id="event-map" class="main-section">

    <div class="container-fluid">

        <div class="row">

            <div class="col-xs-12">

                <h3 class="col-xs-12 text-center">Adresse et carte</h3>

                <div id="adresse" class="col-xs-12 col-md-6 col-md-offset-3 text-center">

                    <div class="row">

                        <?php the_field( 'adresse' ); ?>

                    </div>

                </div>

                <div id="map">
                    <iframe src="<?php the_field( 'google_map_url' ); ?>"
                            width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

            </div>

        </div>

    </div>

</section>