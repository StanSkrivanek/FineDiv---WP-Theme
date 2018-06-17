<?php

/**
 *  Template Name: Workshops-List
 *  The template for displaying orkshops archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <header class="category-header">

                <h1 class="page-title">WORKSHOPS</h1>

                <div class="archive-description">
                    <p>Workshopy Propertium Archivus descripsum dolor situs headurs amet, consectetur adipisicing elit,
                        sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>

            </header><!-- .page-header -->
            <section id="" class="">
                <div class="wks-filter__container">
                    <?php
//                    $all = remove_query_arg( 'past_workshops' );
//                    $past = remove_query_arg( 'new_workshops' );
//                    $new = remove_query_arg( 'past_workshops' );?>
<!--                    <a href="--><?php //echo esc_attr( add_query_arg( null, null ) );
//                    ?><!--"><button>ALL</button></a>-->
<!--                    <a href="--><?php //echo esc_attr( add_query_arg( 'past_workshops','' , $past) );
//                    ?><!--"><button>DONE</button></a>-->
<!--                    <a href="--><?php //echo esc_attr( add_query_arg( 'new_workshops','', $new ) );
//                    ?><!--"><button>COMMING SOON</button></a>-->
<!--                    <a href="http://192.168.1.1:8080/FineDiv/workshops/">new events</a>-->
                </div>

                <div class="">
                    <?php

//                    $args = array(
//                        'post_type'      => 'workshops',
//                        'posts_per_page' => 10,
//                        'meta_key'       => '_workshop_data_event_date',
//                        'orderby'        => 'meta_value',
//                        'order'          => 'DESC'
//                    );


//                    $args = array(
//                        'post_type' => 'workshops',
//                        'meta_key' => '_workshop_data_event_date',
//                        'posts_per_page' => 3,
////                        'meta_query' => array(
////                            array(
////                                'key' => '_workshop_data_event_date',
////                                'value' => current_time('timestamp'),
////                                'default' => 0,
////                                'compare' => '>'
////                            )
////                        ),
////                        'meta_type' => 'text_date_timestamp',
////                        'orderby'   => 'meta_value_num',
//                        'order'     => 'DESC'
//                    );

//                    if ( isset( $_GET['all_workshops'] ) ) {
//                        wp_reset_postdata ();
//                    }
//                    if ( isset( $_GET['past_workshops'] ) ) {
//                        $args['meta_query'][0]['compare'] = '<';
//
//                    }
//
//                    if ( isset( $_GET['new_workshops'] ) ) {
//                        $args['meta_query'][0]['compare'] = '>';
//
//                    }
                    $args = array(
                        'post_type'      => 'workshops',
                        'posts_per_page' => 6,
                        'meta_key'       => '_workshop_data_event_date',
                        'orderby'        => 'meta_value',
                        'order'          => 'DESC'
                    );
                    $articles = new WP_Query( $args );

                    if ( $articles->have_posts() ) : $articles->the_post();
                        echo '<div class="cptul-stripe-2 article-post__stats">';
                        foreach ( $articles->posts as $article ) {
                            $datum = get_post_meta( $article->ID, '_workshop_data_event_date', true );
//                            var_dump($date);
                            echo '<div class="cptli-stripe-2--wrap">
                            <div class="cptli-stripe-2--header">
                            <div><span class="name">'
                                 . get_post_meta( $article->ID, '_workshop_data_leader', true )
                                 . '</span>
                            <span class="nameWhat"> povede workshop</span>
                            </div>
                                    <a class="stripe-title-mid" href="' . get_permalink( $article->ID ) . '">'
                                 . $article->post_title . '</a>
                                     <ul>
                                        <li id="event-date" class="article-post__event-date"><span
                                        class="article-post__stats-icon">'
                                 . FineDiv_get_svg( array( 'icon' => 'calendar' ) ) . '</span>'
                                 . date('d-m-Y', $datum) .

                                 '</li><li class="article-post__event-town"><span class="article-post__stats-icon"> '
                                 . FineDiv_get_svg( array( 'icon' => 'mmarker' ) ) . '</span>'
                                 . get_post_meta( $article->ID, '_workshop_data_town', true ) . ' | '
                                 . get_post_meta( $article->ID, '_workshop_data_country', true ) .
                                 '</li></ul> </div>


                                 <div class="cptli-stripe-2--data">'
                                 . apply_filters( 'the_content', get_post_meta( $article->ID, '_workshop_data_excerpt',
                                    true ) ) .
                                 '</div>
                                </div>';
                        }
                        echo '</div>';

                    endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <section class="articles__nav">
                    <div class="pagination">
                        <?php
                        echo paginate_links( array(
                            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                            'total'        => $articles->max_num_pages,
                            'current'      => max( 1, get_query_var( 'paged' ) ),
                            'format'       => '?paged=%#%',
                            'show_all'     => false,
                            'type'         => 'plain',
                            'end_size'     => 2,
                            'mid_size'     => 1,
                            'prev_next'    => true,
                            'prev_text'    => sprintf( '<i> </i> %1$s', __( '<', 'text-domain' ) ),
                            'next_text'    => sprintf( '%1$s <i></i>', __( '>', 'text-domain' ) ),
                            'add_args'     => false,
                            'add_fragment' => '',
                        ) );
                        ?>
                    </div>
                </section>
            </section> <!--  maybe is not neded -->
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();

