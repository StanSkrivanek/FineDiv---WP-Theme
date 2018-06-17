<?php
//  ============================================================================================
//      REGISTER CPT - CSS Refs
//  ============================================================================================
add_action( 'init', 'css_reference_custom_post_type' );
add_action( 'init', 'css_reference_custom_taxonomies' );

function css_reference_custom_post_type() {

    $labels = array(
        'name'                  => _x( 'CSS Refs', 'Post Type General Name', 'FineDiv' ),
        'singular_name'         => _x( 'CSS Ref', 'Post Type Singular Name', 'FineDiv' ),
        'name_admin_bar'        => __( 'CSS Ref', 'FineDiv' ),
        'menu_name'             => __( 'CSS Ref', 'FineDiv' ),
        'archives'              => __( 'CSS Ref Archives', 'FineDiv' ),
        'attributes'            => __( 'CSS Ref Attributes', 'FineDiv' ),
        'parent_item_colon'     => __( 'Parent Item:', 'FineDiv' ),
        'all_items'             => __( 'All CssProps', 'FineDiv' ),
        'add_new_item'          => __( 'Add New Item', 'FineDiv' ),
        'add_new'               => __( 'Add New Item', 'FineDiv' ),
        'new_item'              => __( 'New Item', 'FineDiv' ),
        'edit_item'             => __( 'Edit Item', 'FineDiv' ),
        'update_item'           => __( 'Update Item', 'css-reference' ),
        'view_item'             => __( 'View Item', 'FineDiv' ),
        'view_items'            => __( 'View Items', 'FineDiv' ),
        'search_items'          => __( 'Search Item', 'FineDiv' ),
        'not_found'             => __( 'Item Not found', 'FineDiv' ),
        'not_found_in_trash'    => __( 'Item Not found in Trash', 'FineDiv' ),
        'featured_image'        => __( 'Featured Image', 'FineDiv' ),
        'set_featured_image'    => __( 'Set featured image', 'FineDiv' ),
        'remove_featured_image' => __( 'Remove featured image', 'FineDiv' ),
        'use_featured_image'    => __( 'Use as featured image', 'FineDiv' ),
        'insert_into_item'      => __( 'Insert into CSS Reference', 'FineDiv' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'FineDiv' ),
        'items_list'            => __( 'Items list', 'FineDiv' ),
        'items_list_navigation' => __( 'Items list navigation', 'FineDiv' ),
        'filter_items_list'     => __( 'Filter Items list', 'FineDiv' ),
    );
    $args   = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'supports'            => array( 'title', 'editor', 'custom-fields', 'post-formats' ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'has_archive'         => true,
        'can_export'          => true,
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-layout',
        'rewrite'             => array( 'slug' => 'css-reference' ),
        'capability_type'     => 'post',
        'label'               => __( 'CSS Reference', 'FineDiv' ),
        'description'         => __( 'Post Type Description', 'FineDiv' ),
        'show_in_admin_bar'   => true,
        'exclude_from_search' => false,
    );
    register_post_type( 'css-reference', $args );

}

//  REGISTER Taxonomies - CSS Refs
//  ===================================================

function css_reference_custom_taxonomies() {
// add new taxonomy hierarchical (category)
    $labels = array(
        'name'              => 'Custom Categories',
        'singular_name'     => 'Custom Category',
        'search_items'      => 'Search Custom Category',
        'all_items'         => 'All Custom Categories',
        'parent_item'       => 'Parent Custom Category',
        'parent_item_colon' => 'Parent Custom Category',
        'edit_item'         => 'Edit Custom Category',
        'update_item'       => 'Update Custom Category',
        'add_new_item'      => 'Add New Custom Category',
        'new_item_name'     => 'New Custom Category Name',
        'menu_name'         => 'Custom Category',
    );
    $args   = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'custom-category' )
    );

    register_taxonomy( 'custom-category', array( 'css-reference' ), $args );

// add new taxonomy NOT hierarchical (tag)

    register_taxonomy( 'props', 'css-reference', array(
        'label'             => 'Props',
        'rewrite'           => array( 'slug' => 'props' ),
        'hierarchical'      => false,
        'show_admin_column' => true,
    ) );

}


/*
*
*   @package FineDivtheme
*
*	========================================================================
*		THEME CUSTOM POST TYPES
*	========================================================================
*
*/

add_action( 'init', 'FineDiv_contact_custom_post_type' );

add_filter( 'manage_FineDiv-contact_posts_columns', 'FineDiv_set_contact_columns' );
add_action( 'manage_FineDiv-contact_posts_custom_column', 'FineDiv_contact_custom_column', 10, 2 );

add_action( 'add_meta_boxes', 'FineDiv_contact_add_email_meta_box' );
add_action( 'add_meta_boxes', 'FineDiv_contact_add_topic_meta_box' );
add_action( 'save_post', 'FineDiv_save_contact_email_data' );
add_action( 'save_post', 'FineDiv_save_contact_topic_data' );


/* CONTACT CPT */
function FineDiv_contact_custom_post_type() {
    $labels = array(
        'name'           => 'Messages',
        'singular_name'  => 'Message',
        'menu_name'      => 'Messages',
        'name_admin_bar' => 'Message'
    );

    $args = array(
        'labels'          => $labels,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierarchical'    => false,
        'menu_position'   => 26,
        'menu_icon'       => 'dashicons-email-alt',
        'supports'        => array( 'title', 'editor', 'author' )
    );

    register_post_type( 'FineDiv-contact', $args );

}

function FineDiv_set_contact_columns() {
    $newColumns            = array();
    $newColumns['title']   = 'Full Name';
    $newColumns['topic']   = 'Topic';
    $newColumns['message'] = 'Message';
    $newColumns['email']   = 'Email';
    $newColumns['date']    = 'Date';

    return $newColumns;
}

function FineDiv_contact_custom_column( $column, $post_id ) {

    switch ( $column ) {
        case 'topic' :
            //topic column
            $topic = get_post_meta( $post_id, '_contact_topic_value_key', true );
            echo $topic;
            break;

        case 'message' :
            echo FineDiv_get_excerpt( 120, 'content' );
            break;

        case 'email' :
            //email column
            $email = get_post_meta( $post_id, '_contact_email_value_key', true );
            echo '<a href="mailto:' . $email . '">' . $email . '</a>';
            break;
    }

}

/* CONTACT META BOXES */

function FineDiv_contact_add_email_meta_box() {
    add_meta_box( 'contact_email', 'User Email', 'FineDiv_contact_email_callback', 'FineDiv-contact' );
}

function FineDiv_contact_email_callback( $post ) {
    wp_nonce_field( 'FineDiv_save_contact_email_data', 'FineDiv_contact_email_meta_box_nonce' );

    $value = get_post_meta( $post->ID, '_contact_email_value_key', true );

    echo '<label for="FineDiv_contact_email_field">User Email Address: </label>';
    echo '<input type="email" id="FineDiv_contact_email_field" name="FineDiv_contact_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function FineDiv_save_contact_email_data( $post_id ) {

    if ( ! isset( $_POST['FineDiv_contact_email_meta_box_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['FineDiv_contact_email_meta_box_nonce'], 'FineDiv_save_contact_email_data' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( ! isset( $_POST['FineDiv_contact_email_field'] ) ) {
        return;
    }

    $my_data = sanitize_text_field( $_POST['FineDiv_contact_email_field'] );

    update_post_meta( $post_id, '_contact_email_value_key', $my_data );

}


//  =====================
// FineDiv_contact_topic
//  =====================

function FineDiv_contact_add_topic_meta_box() {
    add_meta_box( 'contact_topic', 'Topic', 'FineDiv_contact_topic_callback', 'FineDiv-contact', 'side', 'high' );
}

function FineDiv_contact_topic_callback( $post ) {

    // Add an nonce field so we can check for it later.
    wp_nonce_field( 'FineDiv_save_contact_topic_data', 'FineDiv_contact_topic_meta_box_nonce' );

    /*
     * Use get_post_meta() to retrieve an existing value
     * from the database and use the value for the form.
     */
    // $value = get_post_meta( $post->ID, '_contact_topic_value_key', true ); //my_key is a meta_key. Change it to --  input[type='radio']:checked.val()
//    $value = get_post_meta( $post->ID);
    $value = get_post_meta( $post->ID, '_contact_topic_value_key', true );
//    var_dump($value);
    ?>

    <input type="radio" id="rd_opinion" name="user_topic"
           value="Voicing an opinion" <?php checked( $value, 'Voicing an opinion' ); ?>>
    <label for="rd_opinion">Voicing an opinion</label><br>

    <input type="radio" id="rd-author" name="user_topic"
           value="Become an Author" <?php checked( $value, 'Become an Author' ) ?>>
    <label for="rd-author">Become an Author</label><br>

    <input type="radio" id="rd-ads" name="user_topic"
           value="Advertising / Sponsoring" <?php checked( $value, 'Advertising / Sponsoring' ) ?>>
    <label for="rd-ads">Advertising / Sponsoring</label><br>

    <input type="radio" id="rd-shop" name="user_topic"
           value="Shop / Job board" <?php checked( $value, 'Shop / Job board' ) ?>>
    <label for="rd-shop">Shop / Job board</label><br>

    <input type="radio" id="rd-press" name="user_topic"
           value="Press Release" <?php checked( $value, 'Press Release' ) ?>>
    <label for="rd-press">Press Release</label><br>

    <input type="radio" id="rd-books" name="user_topic"
           value="Books / Conferences" <?php checked( $value, 'Books / Conferences' ) ?>>
    <label for="rd-books">Books / Conferences</label><br>

    <input type="radio" id="rd-freebie" name="user_topic"
           value="Release a freebie"<?php checked( $value, 'Release a freebie' ) ?>>
    <label for="rd-freebie">Release a freebie</label><br>

    <input type="radio" id="rd-link" name="user_topic"
           value="Links suggestion" <?php checked( $value, 'Link suggestion' ) ?>>
    <label for="rd-link">Link suggestion</label><br>

    <input type="radio" id="rd-membership" name="user_topic"
           value="Membership" <?php checked( $value, 'Membership' ); ?>>
    <label for="rd-membership">Membership</label><br>

    <input type="radio" id="rd-bugs" name="user_topic" value="Bugs reports" <?php checked( $value, 'Bugs reports' ); ?>>
    <label for="rd-bugs">Bugs report</label><br>
    <?php
}

function FineDiv_save_contact_topic_data( $post_id ) {

    if ( ! isset( $_POST['FineDiv_contact_topic_meta_box_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['FineDiv_contact_topic_meta_box_nonce'], 'FineDiv_save_contact_topic_data' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

//    if ( ! isset( $_POST['user_topic'] ) ) {
//        return;
//    }
    $new_value = $_POST['user_topic'];
    update_post_meta( $post_id, '_contact_topic_value_key', $new_value );


//    $my_data = sanitize_text_field( $_POST['user_topic'] );


}

//function FineDiv_save_contact_topic_data( $post_id ) {
//
//    // Check if our nonce is set.
//    if ( !isset( $_POST['FineDiv_contact_topic_meta_box_nonce'] ) ) {
//        return;
//    }
//
//    // Verify that the nonce is valid.
//    if ( !wp_verify_nonce( $_POST['FineDiv_contact_topic_meta_box_nonce'], 'FineDiv_save_contact_topic_data' ) ) {
//        return;
//    }
//
//    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
//    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
//        return;
//    }
//
//    // Check the user's permissions.
//    if ( !current_user_can( 'edit_post', $post_id ) ) {
//        return;
//    }
//
////    if ( ! isset( $_POST['usertopic'] ) ) {
////        return;
////    }
//    $value = sanitize_html_class($_POST['usertopic'] ) ;
//    update_post_meta( $post_id, '_contact_topic_value_key', $value );
//}

//    // Sanitize user input.
//$value = ( isset( $_POST['usertopic'] ) ? sanitize_html_class($_POST['usertopic'] ) : '' );
//    //$new_meta_value = ( isset( $_POST['the_name_of_the_radio_buttons'] ) ? sanitize_html_class(
//    // $_POST['the_name_of_the_radio_buttons'] ) : '' );
//    $new_meta_value = ( isset( $_POST['usertopic'] ) ? sanitize_html_class( $_POST['usertopic'] ) : '' );
////    // Update the meta field in the database.
////    update_post_meta( $post_id, 'my_key', $new_meta_value );
//    update_post_meta( $post_id, '_contact_topic_value_key', $new_meta_value );


//

//  REGISTER Taxonomies - Messages
//  ===================================================

//function FineDiv_messages_custom_taxonomies() {
//// add new taxonomy hierarchical (category)
//    $labels = array(
//        'name'              => 'Messages Categories',
//        'singular_name'     => 'Message Category',
//        'search_items'      => 'Search Message Category',
//        'all_items'         => 'All Messages Categories',
//        'parent_item'       => 'Parent Message Category',
//        'parent_item_colon' => 'Parent Message Category',
//        'edit_item'         => 'Edit Message Category',
//        'update_item'       => 'Update Message Category',
//        'add_new_item'      => 'Add New Message Category',
//        'new_item_name'     => 'New Message Category Name',
//        'menu_name'         => 'Message Category',
//    );
//    $args   = array(
//        'hierarchical'      => true,
//        'labels'            => $labels,
//        'show_ui'           => true,
//        'show_admin_column' => true,
//        'query_var'         => true,
//        'rewrite'           => array( 'slug' => 'message-category' )
//    );
//    register_taxonomy( 'message-category', array( 'css-reference' ), $args );
//}
//
//add_action( 'init', 'FineDiv_messages_custom_taxonomies' );


//  ============================================================================================
//      REGISTER CPT - Jobs
//  ============================================================================================

//function jobs_custom_post_type() {
//
//$labels = array(
//'name'                  => _x( 'Jobs', 'Post Type General Name', 'FineDiv' ),
//'singular_name'         => _x( 'Job', 'Post Type Singular Name', 'FineDiv' ),
//'name_admin_bar'        => __( 'Jobs', 'FineDiv' ),
//'menu_name'             => __( 'Jobs', 'FineDiv' ),
//'archives'              => __( 'Jobs Archives', 'FineDiv' ),
//'attributes'            => __( 'Job Attributes', 'FineDiv' ),
//'parent_item_colon'     => __( 'Parent Item:', 'FineDiv' ),
//'all_items'             => __( 'All CssProps', 'FineDiv' ),
//'add_new_item'          => __( 'Add New Item', 'FineDiv' ),
//'add_new'               => __( 'Add New Item', 'FineDiv' ),
//'new_item'              => __( 'New Item', 'FineDiv' ),
//'edit_item'             => __( 'Edit Item', 'FineDiv' ),
//'update_item'           => __( 'Update Item', 'job' ),
//'view_item'             => __( 'View Item', 'FineDiv' ),
//'view_items'            => __( 'View Items', 'FineDiv' ),
//'search_items'          => __( 'Search Item', 'FineDiv' ),
//'not_found'             => __( 'Item Not found', 'FineDiv' ),
//'not_found_in_trash'    => __( 'Item Not found in Trash', 'FineDiv' ),
//'featured_image'        => __( 'Featured Image', 'FineDiv' ),
//'set_featured_image'    => __( 'Set featured image', 'FineDiv' ),
//'remove_featured_image' => __( 'Remove featured image', 'FineDiv' ),
//'use_featured_image'    => __( 'Use as featured image', 'FineDiv' ),
//'insert_into_item'      => __( 'Insert into Jobs', 'FineDiv' ),
//'uploaded_to_this_item' => __( 'Uploaded to this item', 'FineDiv' ),
//'items_list'            => __( 'Items list', 'FineDiv' ),
//'items_list_navigation' => __( 'Items list navigation', 'FineDiv' ),
//'filter_items_list'     => __( 'Filter Items list', 'FineDiv' ),
//);
//$args = array(
//'labels'                => $labels,
//'hierarchical'          => false,
//'supports'              => array( 'title', 'editor', 'custom-fields', 'post-formats'),
//'public'                => true,
//'show_ui'               => true,
//'show_in_menu'          => true,
//'show_in_nav_menus'     => true,
//'publicly_queryable'    => true,
//'has_archive'           => true,
//'can_export'            => true,
//'menu_position'         => 8,
//'menu_icon'             => 'dashicons-hammer',
//'rewrite'               => array( 'slug' => 'jobs'),
//'capability_type'       => 'post',
//'label'                 => __( 'Jobs', 'FineDiv' ),
//'description'           => __( 'Post Type Description', 'FineDiv' ),
//'show_in_admin_bar'     => true,
//'exclude_from_search'   => false,
//);
//register_post_type( 'jobs', $args );
//
//}
//add_action( 'init', 'jobs_custom_post_type');
//
////  REGISTER Taxonomies - Jobs
////  ===================================================
//function jobs_custom_taxonomies(){
//// add new taxonomy hierarchical (category)
//$labels = array(
//'name' => 'Job Categories',
//'singular_name' => 'Job Category',
//'search_items' => 'Search Job Category',
//'all_items' => 'All Jobs Categories',
//'parent_item' => 'Parent Job Category',
//'parent_item_colon' => 'Parent Job Category',
//'edit_item' => 'Edit Job Category',
//'update_item' => 'Update Job Category',
//'add_new_item' => 'Add New Job Category',
//'new_item_name' => 'New Job Category Name',
//'menu_name' => 'Job Category',
//);
//$args = array(
//'hierarchical' => true,
//'labels' => $labels,
//'show_ui' => true,
//'show_admin_column' => true,
//'query_var' => true,
//'rewrite' => array('slug'=> 'job-category')
//);
//
//register_taxonomy('job-category',array('jobs'),$args);
//
//// add new taxonomy NOT hierarchical (tag)
//
//register_taxonomy('specs','jobs', array(
//'label' => 'Specs',
//'rewrite' => array('slug' => 'specs'),
//'hierarchical'          => false,
//'show_admin_column' => true,
//));
//
//}
//add_action('init', 'jobs_custom_taxonomies');
//
//
////  CUSTOM META BOXES - JOBS
////  ===================================================
//
//// CUSTOM POAST FIELDS - Meta Boxes
//function  FineDiv_jobs_add_meta_box(){
//    add_meta_box('job_title','Job Title','FineDiv_job_title_callback','jobs','advanced','high');
//    add_meta_box('job_position','Job Position','FineDiv_job_position_callback','jobs','advanced','high');
//    add_meta_box('job_town','Job Town','FineDiv_job_town_callback','jobs','advanced','high');
//}
//// Job Title
//function FineDiv_job_title_callback ( $post ){
//    wp_nonce_field('FineDiv_save_job_title','FineDiv_job_title_meta_box_nonce');
//    $value = get_post_meta($post->ID,'_job_title_value_key',true);
//    echo '<label  for="FineDiv_job_title_field">Job Title:  </label>';
//    echo '<input type="text" id="FineDiv_job_title_field" name="FineDiv_job_title_field" value="' . esc_attr(
//        $value ) . '" size="26" />';
//}
//// Position
//function FineDiv_job_position_callback ( $post ){
//    wp_nonce_field('FineDiv_save_job_position','FineDiv_job_position_meta_box_nonce');
//    $value = get_post_meta($post->ID,'_job_position_value_key',true);
//    echo '<label for="FineDiv_job_position_field">Job Position:  </label>';
//    echo '<input type="text" id="FineDiv_job_position_field" name="FineDiv_job_position_field" value="' . esc_attr(
//            $value ) . '" size="26"/>';
//}
//// Town
//function FineDiv_job_town_callback ( $post ){
//    wp_nonce_field('FineDiv_save_job_town','FineDiv_job_town_meta_box_nonce');
//    $value = get_post_meta($post->ID,'_job_town_value_key',true);
//    echo '<label for="FineDiv_job_town_field">Job Town:  </label>';
//    echo '<input type="text" id="FineDiv_job_town_field" name="FineDiv_job_town_field" value="' . esc_attr(
//            $value ) . '" size="26"/>';
//}
//add_action('add_meta_boxes', 'FineDiv_jobs_add_meta_box');




////  ============================================================================================
////      REGISTER CPT - Freebies
////  ============================================================================================
////
//function freebies_custom_post_type() {
//
//    $labels = array(
//        'name'                  => _x( 'Freebies', 'Post Type General Name', 'FineDiv' ),
//        'singular_name'         => _x( 'Freebie', 'Post Type Singular Name', 'FineDiv' ),
//        'name_admin_bar'        => __( 'Freebies', 'FineDiv' ),
//        'menu_name'             => __( 'Freebies', 'FineDiv' ),
//        'archives'              => __( 'Freebies Archives', 'FineDiv' ),
//        'attributes'            => __( 'Freebie Attributes', 'FineDiv' ),
//        'parent_item_colon'     => __( 'Parent Item:', 'FineDiv' ),
//        'all_items'             => __( 'All Items', 'FineDiv' ),
//        'add_new_item'          => __( 'Add New Item', 'FineDiv' ),
//        'add_new'               => __( 'Add New Item', 'FineDiv' ),
//        'new_item'              => __( 'New Item', 'FineDiv' ),
//        'edit_item'             => __( 'Edit Item', 'FineDiv' ),
//        'update_item'           => __( 'Update Item', 'job' ),
//        'view_item'             => __( 'View Item', 'FineDiv' ),
//        'view_items'            => __( 'View Items', 'FineDiv' ),
//        'search_items'          => __( 'Search Item', 'FineDiv' ),
//        'not_found'             => __( 'Item Not found', 'FineDiv' ),
//        'not_found_in_trash'    => __( 'Item Not found in Trash', 'FineDiv' ),
//        'featured_image'        => __( 'Featured Image', 'FineDiv' ),
//        'set_featured_image'    => __( 'Set featured image', 'FineDiv' ),
//        'remove_featured_image' => __( 'Remove featured image', 'FineDiv' ),
//        'use_featured_image'    => __( 'Use as featured image', 'FineDiv' ),
//        'insert_into_item'      => __( 'Insert into Item', 'FineDiv' ),
//        'uploaded_to_this_item' => __( 'Uploaded to this item', 'FineDiv' ),
//        'items_list'            => __( 'Items list', 'FineDiv' ),
//        'items_list_navigation' => __( 'Items list navigation', 'FineDiv' ),
//        'filter_items_list'     => __( 'Filter Items list', 'FineDiv' ),
//    );
//    $args = array(
//        'labels'                => $labels,
//        'hierarchical'          => false,
//        'supports'              => array( 'title','excerpt', 'post-formats', 'thumbnail' ),
//        'public'                => true,
//        'show_ui'               => true,
//        'show_in_menu'          => true,
//        'show_in_nav_menus'     => true,
//        'publicly_queryable'    => true,
//        'has_archive'           => true,
//        'can_export'            => true,
//        'menu_position'         => 8,
//        'menu_icon'             => 'dashicons-star-filled',
//        'rewrite'               => array( 'slug' => 'freebies'),
//        'capability_type'       => 'post',
//        'label'                 => __( 'Freebies', 'FineDiv' ),
//        'description'           => __( 'Post Type Description', 'FineDiv' ),
//        'show_in_admin_bar'     => true,
//        'exclude_from_search'   => false,
//    );
//    register_post_type( 'freebies', $args );
//
//}
//add_action( 'init', 'freebies_custom_post_type');
//
////  REGISTER Taxonomies - Freebies
////  ===================================================
//function freebies_custom_taxonomies(){
//// add new taxonomy hierarchical (category)
//    $labels = array(
//        'name' => 'Freebies Categories',
//        'singular_name' => 'Freebie Category',
//        'search_items' => 'Search Freebie Category',
//        'all_items' => 'All Freebies Categories',
//        'parent_item' => 'Parent Freebie Category',
//        'parent_item_colon' => 'Parent Freebie Category',
//        'edit_item' => 'Edit Freebie Category',
//        'update_item' => 'Update Freebie Category',
//        'add_new_item' => 'Add New Freebie Category',
//        'new_item_name' => 'New Freebie Category Name',
//        'menu_name' => 'Freebie Category',
//    );
//    $args = array(
//        'hierarchical' => true,
//        'labels' => $labels,
//        'show_ui' => true,
//        'show_admin_column' => true,
//        'query_var' => true,
//        'rewrite' => array('slug'=> 'freebies-category')
//    );
//
//    register_taxonomy('freebies-category',array('freebies'),$args);
//
//// add new taxonomy NOT hierarchical (tag)
//
//    register_taxonomy('specs','freebies', array(
//        'label' => 'Specs',
//        'rewrite' => array('slug' => 'specs'),
//        'hierarchical'          => false,
//        'show_admin_column' => true,
//    ));
//
//}
//add_action('init', 'freebies_custom_taxonomies');
//
////  CUSTOM META BOXES - Freebies
////  ===================================================
//
//// Freebie Title
//function  FineDiv_freebies_add_meta_box(){
//    add_meta_box('freebie_title','Freebie Title','FineDiv_freebie_title_callback','freebies','advanced','high');
//    add_meta_box('freebie_link','Freebie Link URL','FineDiv_freebie_link_url_callback','freebies','advanced','high');
////    add_meta_box('job_town','Job Town','FineDiv_job_town_callback','jobs','advanced','high');
//}
////
//function FineDiv_freebie_title_callback ( $post ){
//    wp_nonce_field('FineDiv_save_freebie_title','FineDiv_freebie_title_meta_box_nonce');
//    $value = get_post_meta($post->ID,'_freebie_title_value_key',true);
//    echo '<label  for="FineDiv_freebie_title_field">Freebie Title:  </label>';
//    echo '<input type="text" id="FineDiv_freebie_title_field" name="FineDiv_freebie_title_field" value="' . esc_attr(
//            $value ) . '" size="26" />';
//}
//add_action('add_meta_boxes', 'FineDiv_freebies_add_meta_box');


//  ============================================================================================
//      REGISTER CPT - Snippets
//  ============================================================================================
//
//    $labels = array(
//        'name'                  => _x( 'Snippets', 'Post Type General Name', 'text_domain' ),
//        'singular_name'         => _x( 'Snippet', 'Post Type Singular Name', 'text_domain' ),
//        'menu_name'             => __( 'Snippets', 'text_domain' ),
//        'name_admin_bar'        => __( 'Snippets', 'text_domain' ),
//        'archives'              => __( 'Snippet Archives', 'text_domain' ),
//        'attributes'            => __( 'Snippet Attributes', 'text_domain' ),
//        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
//        'all_items'             => __( 'All Snippets', 'text_domain' ),
//        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
//        'add_new'               => __( 'Add New Item', 'text_domain' ),
//        'new_item'              => __( 'New Item', 'text_domain' ),
//        'edit_item'             => __( 'Edit Item', 'text_domain' ),
//        'update_item'           => __( 'Update Item', 'text_domain' ),
//        'view_item'             => __( 'View Item', 'text_domain' ),
//        'view_items'            => __( 'View Items', 'text_domain' ),
//        'search_items'          => __( 'Search Item', 'text_domain' ),
//        'not_found'             => __( 'Item Not found', 'text_domain' ),
//        'not_found_in_trash'    => __( 'Item Not found in Trash', 'text_domain' ),
//        'featured_image'        => __( 'Featured Image', 'text_domain' ),
//        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
//        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
//        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
//        'insert_into_item'      => __( 'Insert into Snippet', 'text_domain' ),
//        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
//        'items_list'            => __( 'Items list', 'text_domain' ),
//        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
//        'filter_items_list'     => __( 'Filter Items list', 'text_domain' ),
//    );
//    $args = array(
//        'label'                 => __( 'Snippet', 'text_domain' ),
//        'description'           => __( 'Post Type Description', 'text_domain' ),
//        'labels'                => $labels,
//        'supports'              => array( 'title', 'editor', 'custom-fields', 'post-formats' ),
//        'taxonomies'            => array( 'category', 'post_tag' ),
//        'hierarchical'          => false,
//        'public'                => true,
//        'show_ui'               => true,
//        'show_in_menu'          => true,
//        'menu_position'         => 5,
//        'show_in_admin_bar'     => true,
//        'show_in_nav_menus'     => true,
//        'can_export'            => true,
//        'has_archive'           => true,
//        'exclude_from_search'   => false,
//        'publicly_queryable'    => true,
//        'capability_type'       => 'page',
//    );
//    register_post_type( 'snippets_post_type', $args );
//
//}
//add_action( 'init', 'FineDiv_snippets_post_type', 0 );


//  REGISTER Taxonomies - Almanach
//  ===================================================
//function jobs_custom_taxonomies(){
//// add new taxonomy hierarchical (category)
//    $labels = array(
//        'name' => 'Jobs Categories',
//        'singular_name' => 'Job Category',
//        'search_items' => 'Search Job Category',
//        'all_items' => 'All Jobs Categories',
//        'parent_item' => 'Parent Job Category',
//        'parent_item_colon' => 'Parent Job Category',
//        'edit_item' => 'Edit Job Category',
//        'update_item' => 'Update Job Category',
//        'add_new_item' => 'Add New Job Category',
//        'new_item_name' => 'New Job Category Name',
//        'menu_name' => 'Job Category',
//    );
//    $args = array(
//        'hierarchical' => true,
//        'labels' => $labels,
//        'show_ui' => true,
//        'show_admin_column' => true,
//        'query_var' => true,
//        'rewrite' => array('slug'=> 'job-category')
//    );
//
//    register_taxonomy('job-category',array('jobs'),$args);
//
//// add new taxonomy NOT hierarchical (tag)
//
//    register_taxonomy('specs','jobs', array(
//        'label' => 'Specs',
//        'rewrite' => array('slug' => 'specs'),
//        'hierarchical'          => false,
//        'show_admin_column' => true,
//    ));
//
//}
//add_action('init', 'jobs_custom_taxonomies');
//
//add_action( 'widgets_init', 'FineDiv_widgets_init' );


//  ============================================================================================
//      REGISTER CPT - Almanach
//  ============================================================================================

//function FineDiv_almanach_post_type() {
//
//    $labels = array(
//        'name'                  => _x( 'Almanach', 'Post Type General Name', 'text_domain' ),
//        'singular_name'         => _x( 'Almanach', 'Post Type Singular Name', 'text_domain' ),
//        'menu_name'             => __( 'Almanach', 'text_domain' ),
//        'name_admin_bar'        => __( 'Almanach', 'text_domain' ),
//        'archives'              => __( 'Almanach Archives', 'text_domain' ),
//        'attributes'            => __( 'Almanach Attributes', 'text_domain' ),
//        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
//        'all_items'             => __( 'All Items', 'text_domain' ),
//        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
//        'add_new'               => __( 'Add New Item', 'text_domain' ),
//        'new_item'              => __( 'New Item', 'text_domain' ),
//        'edit_item'             => __( 'Edit Item', 'text_domain' ),
//        'update_item'           => __( 'Update Item', 'text_domain' ),
//        'view_item'             => __( 'View Item', 'text_domain' ),
//        'view_items'            => __( 'View Item', 'text_domain' ),
//        'search_items'          => __( 'Search Item', 'text_domain' ),
//        'not_found'             => __( 'Item Not found', 'text_domain' ),
//        'not_found_in_trash'    => __( 'Item Not found in Trash', 'text_domain' ),
//        'featured_image'        => __( 'Featured Image', 'text_domain' ),
//        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
//        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
//        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
//        'insert_into_item'      => __( 'Insert into Almanach', 'text_domain' ),
//        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
//        'items_list'            => __( 'Items list', 'text_domain' ),
//        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
//        'filter_items_list'     => __( 'Filter Items list', 'text_domain' ),
//    );
//    $args = array(
//        'label'                 => __( 'Almanach', 'text_domain' ),
//        'description'           => __( 'Post Type Description', 'text_domain' ),
//        'labels'                => $labels,
//        'supports'              => array( 'title', 'editor', 'custom-fields', 'post-formats' ),
//        'taxonomies'            => array( 'category', 'post_tag' ),
//        'hierarchical'          => false,
//        'public'                => true,
//        'show_ui'               => true,
//        'show_in_menu'          => true,
//        'menu_position'         => 6,
//        'show_in_admin_bar'     => true,
//        'show_in_nav_menus'     => true,
//        'can_export'            => true,
//        'has_archive'           => true,
//        'exclude_from_search'   => false,
//        'publicly_queryable'    => true,
//        'capability_type'       => 'page',
//    );
//    register_post_type( 'FineDiv_almanach_post_type', $args );
//
//}
//add_action( 'init', 'FineDiv_almanach_post_type', 0 );

//  REGISTER Taxonomies - almanach
//  ===================================================
//function jobs_custom_taxonomies(){
//// add new taxonomy hierarchical (category)
//    $labels = array(
//        'name' => 'Jobs Categories',
//        'singular_name' => 'Job Category',
//        'search_items' => 'Search Job Category',
//        'all_items' => 'All Jobs Categories',
//        'parent_item' => 'Parent Job Category',
//        'parent_item_colon' => 'Parent Job Category',
//        'edit_item' => 'Edit Job Category',
//        'update_item' => 'Update Job Category',
//        'add_new_item' => 'Add New Job Category',
//        'new_item_name' => 'New Job Category Name',
//        'menu_name' => 'Job Category',
//    );
//    $args = array(
//        'hierarchical' => true,
//        'labels' => $labels,
//        'show_ui' => true,
//        'show_admin_column' => true,
//        'query_var' => true,
//        'rewrite' => array('slug'=> 'job-category')
//    );
//
//    register_taxonomy('job-category',array('jobs'),$args);
//
//// add new taxonomy NOT hierarchical (tag)
//
//    register_taxonomy('specs','jobs', array(
//        'label' => 'Specs',
//        'rewrite' => array('slug' => 'specs'),
//        'hierarchical'          => false,
//        'show_admin_column' => true,
//    ));
//
//}
//add_action('init', 'jobs_custom_taxonomies');
//
//add_action( 'widgets_init', 'FineDiv_widgets_init' );


// REGISTER CPT - BOOKS
//  ============================================================================================
//function register_post_types_books() {
//
//    $labels = array(
//        'name' => _x( 'Books', 'book' ),
//        'singular_name' => _x( 'Book', 'book' ),
//        'add_new' => _x( 'Add New', 'book' ),
//        'add_new_item' => _x( 'Add New Book', 'book' ),
//        'edit_item' => _x( 'Edit Book', 'book' ),
//        'new_item' => _x( 'New Book', 'book' ),
//        'view_item' => _x( 'View Book', 'book' ),
//        'search_items' => _x( 'Search Books', 'book' ),
//        'not_found' => _x( 'No books found', 'book' ),
//        'not_found_in_trash' => _x( 'No books found in Trash', 'book' ),
//        'parent_item_colon' => _x( 'Parent Book:', 'book' ),
//        'menu_name' => _x( 'Books', 'book' ),
//    );
//
//    $args = array(
//        'labels' => $labels,
//        'hierarchical' => false,
//        'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
//        'taxonomies' => array( 'category', 'post_tag' ),
//        'public' => true,
//        'show_ui' => true,
//        'show_in_menu' => true,
//        'show_in_nav_menus' => true,
//        'publicly_queryable' => true,
//        'exclude_from_search' => false,
//        'has_archive' => true,
//        'query_var' => true,
//        'can_export' => true,
//        'rewrite' => array( 'slug' => 'books'),
//        'menu_position'         => 8,
//        'capability_type' => 'post'
//    );
//
//    register_post_type( 'book', $args );
//
//}
//add_action( 'init', 'register_post_types_books');
//

//  REGISTER Taxonomies - Books
//  ===================================================
//function register_custom_taxonomies_books() {
//
//    $labels = array(
//        'name' => _x( 'Author Name', 'authorname' ),
//        'singular_name' => _x( 'Author', 'authorname' ),
//        'search_items' => _x( 'Search Authors', 'authorname' ),
//        'popular_items' => _x( 'Popular Authors', 'authorname' ),
//        'all_items' => _x( 'All Authors', 'authorname' ),
//        'parent_item' => _x( 'Parent Author', 'authorname' ),
//        'parent_item_colon' => _x( 'Parent Author:', 'authorname' ),
//        'edit_item' => _x( 'Edit Author', 'authorname' ),
//        'update_item' => _x( 'Update Author', 'authorname' ),
//        'add_new_item' => _x( 'Add New Author', 'authorname' ),
//        'new_item_name' => _x( 'New Author', 'authorname' ),
//        'separate_items_with_commas' => _x( 'Separate Author Names with commas', 'authorname' ),
//        'add_or_remove_items' => _x( 'Add or remove Authors', 'authorname' ),
//        'choose_from_most_used' => _x( 'Choose from most used Authors', 'authorname' ),
//        'menu_name' => _x( 'Authors', 'authorname' ),
//    );
//
//    $args = array(
//        'labels' => $labels,
//        'public' => true,
//        'show_in_nav_menus' => true,
//        'show_ui' => true,
//        'show_tagcloud' => true,
//        'hierarchical' => false,
//        'rewrite' => array( 'slug' => 'authors'),
//        'query_var' => 'author'
//    );
//
//    register_taxonomy( 'authorname', array('book'), $args );
//
//}
//add_action( 'init', 'register_custom_taxonomies_books');


