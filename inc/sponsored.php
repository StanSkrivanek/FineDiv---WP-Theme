<?php

/**
 * Sponsored POST - Admin Checkbox
 * src: https://smallenvelop.com/how-to-create-sponsored-posts-in-wordpress/
 */


// Add checkbox to Post admin area.

function sponsored_custom_meta()
{
    add_meta_box( 'sponsored_meta', __( 'Is sponsored Posts', 'FineDiv' ), 'sponsored_meta_callback', 'post' );
}
function sponsored_meta_callback( $post )
{
    $sponsored = get_post_meta( $post->ID );
    ?>

	<p>
    <div class=fds-row-content">
        <label for="sponsored-checkbox">
            <input type="checkbox" name="sponsored-checkbox" id="sponsored-checkbox" value="yes" <?php if ( isset($sponsored['sponsored-checkbox'] ) ) checked( $sponsored['sponsored-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Yes', 'FineDiv' ) ?>
        </label>

    </div>
</p>

    <?php

}
add_action('add_meta_boxes', 'sponsored_custom_meta');


// Saves the custom meta input.
function sponsored_meta_save($post_id)
{

    // Checks save status.

    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset($_POST['sponsored_nonce'] ) && wp_verify_nonce( $_POST['sponsored_nonce'], basename(__FILE__) ) ) ? 'true' : 'false';

// Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

// Checks for input and saves
    if ( isset($_POST['sponsored-checkbox'] ) ) {
        update_post_meta( $post_id, 'sponsored-checkbox', 'yes' );
    } else {
        update_post_meta( $post_id, 'sponsored-checkbox', '' );
    }
}
add_action( 'save_post', 'sponsored_meta_save' );
