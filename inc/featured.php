<?php
/**
 * FEATURED POST - Admin Checkbox
 * src: https://smallenvelop.com/how-to-create-featured-posts-in-wordpress/
 */


// Add checkbox to Post admin area.

function featured_custom_meta()
{
    add_meta_box( 'featured_meta', __('Is Featured Posts', 'FineDiv'), 'featured_meta_callback', 'post' );
}
function featured_meta_callback( $post )
{
    $featured = get_post_meta( $post->ID );
    ?>

	<p>
    <div class=fds-row-content">
        <label for="featured-checkbox">
            <input type="checkbox" name="featured-checkbox" id="featured-checkbox" value="yes" <?php if ( isset( $featured['featured-checkbox'] ) ) checked( $featured['featured-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Yes', 'FineDiv' ) ?>
        </label>

    </div>
</p>

    <?php

}
add_action( 'add_meta_boxes', 'featured_custom_meta' );


// Saves the custom meta input.
function featured_meta_save( $post_id )
{

    // Checks save status.

    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset ( $_POST['featured_nonce'] ) && wp_verify_nonce($_POST['featured_nonce'], basename(__FILE__))) ? 'true' : 'false';

// Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

// Checks for input and saves
    if ( isset( $_POST['featured-checkbox'] ) ) {
        update_post_meta( $post_id, 'featured-checkbox', 'yes' );
    } else {
        update_post_meta( $post_id, 'featured-checkbox', '' );
    }
}
add_action( 'save_post', 'featured_meta_save' );
