<?php

/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FineDiv
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <div class="comments-list-container">

        <?php
        // You can start editing here -- including this comment!
        //        if ( have_comments() ) : ?>
        <div class="comment-title-wrap">
            <h3 class="comment-title"># Comments</h3>
            <p class="comments-number">
                <?php
                printf(
                    esc_html(_nx(
                        ' %1$s',
                        get_comments_number(),
                        'comments title',
                        'FineDiv'
                    )),
                    number_format_i18n(get_comments_number())
                );
                ?>
            </p>
        </div> <!-- comment-title-wrap -->
        <div class="comments-list-wrap">
            <?php
            // You can start editing here -- including this comment!
            if (!have_comments()) : ?>
                <div class="no-comments-msg">
                    <p>No comments have been posted yet. Please feel free to comment first!</p>
                    <p><em>Note: Make sure your comment is related to the topic of the article above. Let's start a
                            personal and meaningful conversation!</em></p>
                </div>
            <?php endif; ?>

            <ol id="comment-list" class="comment-list">
                <?php
                wp_list_comments();
                ?>
            </ol><!-- .comment-list -->

            <?php
            if (have_comments() && get_comments_number() > 2) : ?>
                <script type="text/javascript"> fds_comments(); </script>
            <?php endif; ?>
            <?php
            if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
                <p class="no-comments"><?php esc_html_e('Comments are closed', 'FineDiv'); ?></p>
            <?php
            endif;
            ?>
        </div>
        <?php
        comment_form_custom();

        ?>
    </div><!-- .comments-list-container -->
</div><!-- #comments -->
