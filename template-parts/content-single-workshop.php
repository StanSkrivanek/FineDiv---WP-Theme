<?php
/**
 *
 *
 * Template part for displaying workshop post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="article-header">
        <div class="single-header__wrapper">
            <div>
                <span class="name">
                    <?php echo get_post_meta(get_the_ID(), '_workshop_data_leader', true); ?>
                </span>
                <span class="nameWhat"> povede workshop</span>
            </div>
            <?php
            //if ( 'post' === get_post_type('workshops') ) : ?>

            <?php
            if (is_single()) :
                the_title('<h1 class="article-title">', '</h1>');
            else :
                the_title('<h2 class="article-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;

            ?>
            <section class="article-post__stats">
                <ul>
                    <li class="article-post__reading_time">
                        <span class="article-post__stats-icon">
                            <?php echo FineDiv_get_svg(array('icon' => 'calendar')) ?>
                        </span>
                        <?php
                        $datum = get_post_meta(get_the_ID(), '_workshop_data_event_date', true);
                        echo date('d-m-Y', $datum); ?>
                    </li>
                    <li class="article-post__reading_time">
                    <span class="article-post__stats-icon">
                        <?php echo FineDiv_get_svg(array('icon' => 'mmarker')) ?>
                    </span>
                        <?php echo get_post_meta(get_the_ID(), '_workshop_data_town', true); ?>
                        | <?php echo get_post_meta(get_the_ID(), '_workshop_data_country', true); ?>
                    </li>
                </ul>

            </section><!-- .article-meta -->
        </div>
    </header><!-- .article-header -->

    <section class="article-content">
        <div class="column list">
            <h3 class="red"> Introduction </h3>
            <?php
            echo apply_filters(
                'the_content',
                get_post_meta(
                    get_the_ID(),
                    '_workshop_data_introduction',
                    true
                )
            ); ?>
        </div>
        <div class="column list">
            <h3 class="red"> Who is this for ?</h3>
            <?php
            echo apply_filters(
                'the_content',
                get_post_meta(
                    get_the_ID(),
                    '_workshop_data_isfor',
                    true
                )
            ); ?>
        </div>
        <div class="column list">
            <h3 class="red"> What you will learn ?</h3>
            <?php
            echo apply_filters(
                'the_content',
                get_post_meta(
                    get_the_ID(),
                    '_workshop_data_youlearn',
                    true
                )
            ); ?>
        </div>

        <div class="column list">
            <h3 class="red"> What you will need ?</h3>
            <?php
            echo apply_filters(
                'the_content',
                get_post_meta(
                    get_the_ID(),
                    '_workshop_data_youneed',
                    true
                )
            ); ?>
        </div>
        <div class="column list">
            <?php $leadername = get_post_meta(get_the_ID(), '_workshop_data_leader', true); ?>

            <h3 class="red "> Profil: <?php echo $leadername ?></h3>
            <?php
            echo apply_filters(
                'the_content',
                get_post_meta(
                    get_the_ID(),
                    '_workshop_data_about_me',
                    true
                )
            ); ?>
        </div>

        <div class="column list">
            <h3 class="red">What is Included ?</h3>

            <?php $opts = get_post_meta(get_the_ID(), '_workshop_data_included', true); ?>
            <ul class="clearall">
                <?php foreach ($opts as $opt) { ?>
                    <li class="block yes ">
                        <?php echo $opt; ?>
                    </li>
                <?php

            } ?>
            </ul>
        </div>
        <div class="column list">
            <h3 class="red">Time</h3>
            <?php $wkstimes = get_post_meta(get_the_ID(), '_workshop_data_wks_timetable', true); ?>
            <?php //echo var_dump($wkstimes[2]) ?>
            <?php foreach ($wkstimes as $wkstime) {
                extract($wkstime);
                $wks_d1 = ("$wks_time");
                $wks_d2 = ("$wks_whats_up");
                ?>
            <ul class="clearall">
                <li class="block yes ">
                    <span class="wks-timetable-time"><?php echo $wks_d1 ?> - </span>
                    <span class="wks-timetable-whatsup"><?php echo $wks_d2 ?></span>

                </li>
                <?php

            } ?>
            </ul>

        </div>
    </section> <!-- article-content -->
    <section class="venue-location-container p-top">
        <div class="venue-location-address p-top">
            <!--<h3>Time and Location</h3>-->
            <div class="t-and-l">
                <p class=""><?php echo get_post_meta(get_the_ID(), '_workshop_data_date', true); ?></p>
                <?php echo the_title('<h1 class="article-title">', '</h1>'); ?>
            </div>
                <div class="venue-address">
                    <span class="form-map-address">
                        <?php echo get_post_meta(get_the_ID(), '_workshop_data_v-address', true); ?> -
                    </span>
                    <span class="form-map-address">
                        <?php echo get_post_meta(get_the_ID(), '_workshop_data_town', true); ?> -
                    </span>
                    <span class="form-map-address">
                        <?php echo get_post_meta(get_the_ID(), '_workshop_data_country', true); ?>
                    </span>
                </div>
            <div class="column list">
                <h3 class="p-top">Price</h3>
                <?php
                $czk = get_post_meta(get_the_ID(), '_workshop_data_wks_price-cz', true);
                $sk = get_post_meta(get_the_ID(), '_workshop_data_wks_price-sk', true);
                if ($czk) : ?>
                    <span>CZK</span>
                    <span class="wks_price">
           <?php echo $czk; ?>
            </span>
                <?php else : ?>
                    <span>&euro;</span>
                    <span class="wks_price">
           <?php echo $sk; ?>
            </span>
                <?php endif;
                ?>
            </div>
            <div>
                <?php $link = get_post_meta(get_the_ID(), '_workshop_data_wks_url', true); ?>
                <a href="<?php echo $link ?>" target="_blank"><button class="btn-FineDiv-form" type="button">More Info</button></a>
            </div>

        </div>
        <div class="map">
        <?php $mapGPS = get_post_meta(get_the_ID(), '_workshop_data_location', true);
        //        echo 'My map latitude: ' . $mapGPS["latitude"] . ' | ';
        //        echo 'My map longitude: ' . $mapGPS["longitude"] .' ' ;
        ?>
        <div id="gmap_canvas" style="height:300px;width:100%;"></div>
        <!--  TODO: place into function.php and call it back ? -->
        <script type="text/javascript">
            function init_map() {
                // Options
                var myOptions = {
                    zoom: 16,
                    center: new google.maps.LatLng(
                        <?php echo $mapGPS["latitude"]; ?>,
                        <?php echo $mapGPS["longitude"]; ?>
                        )};

                // Setting map using options
                map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                // Setting marker to our GPS coordinates
                marker = new google.maps.Marker({
                    map: map, clickable: false, position: new google.maps.LatLng(
                        <?php echo $mapGPS["latitude"]; ?>,
                        <?php echo $mapGPS["longitude"]; ?>)
                });
            }

            // Initializes google map
            google.maps.event.addDomListener(window, 'load', init_map);
        </script>
        </div>
    </section>

</article><!-- #post-## -->
