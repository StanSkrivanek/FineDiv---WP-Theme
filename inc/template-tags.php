<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package FineDiv
 */

if ( ! function_exists( 'FineDiv_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function FineDiv_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'FineDiv' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

//	$byline = sprintf(
//		esc_html_x( 'by %s', 'post author', 'FineDiv' ),
//		'<span class="author"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
//	);

	echo '<span class="meta-posted_on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

/**
 * Custom template aurhor meta  for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package FineDiv
 */

if ( ! function_exists( 'FineDiv_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function FineDiv_posted_by() {

        $author = sprintf(
            esc_html_x( '%s', 'post author', 'FineDiv' ),
            '<span class="author"><a class="url fn n" href="' . esc_url( get_author_posts_url(
                get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>
<span class="nameWhat">wrote</span>'
        );

        echo '<span class="meta-author"> ' . $author . '</span>'; // WPCS: XSS
        // OK.

    }
endif;


if ( ! function_exists( 'FineDiv_stripe_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function FineDiv_stripe_posted_by() {

        $author = sprintf(
            esc_html_x( '%s', 'post author', 'FineDiv' ),
            '<span class="author"><a class="url fn n" href="' . esc_url( get_author_posts_url(
                get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );

        echo '<span class="meta-author"> ' . $author . '</span>'; // WPCS: XSS
        // OK.

    }
endif;
if ( ! function_exists( 'FineDiv_article_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function FineDiv_article_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'FineDiv' ) );
		if ( $categories_list && FineDiv_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'FineDiv' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'FineDiv' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'FineDiv' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Napiš komentář<span class="screen-reader-text"> on %s</span>', 'FineDiv' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'FineDiv' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function FineDiv_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'FineDiv_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'FineDiv_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so FineDiv_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so FineDiv_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in FineDiv_categorized_blog.
 */
function FineDiv_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'FineDiv_categories' );
}
add_action( 'edit_category', 'FineDiv_category_transient_flusher' );
add_action( 'save_post',     'FineDiv_category_transient_flusher' );

/**
 * Category with number of articles count
 */

function FineDiv_category_with_count () {
    global $post;

    $taxonomy = 'category';
    // Get the term IDs assigned to post.
    $post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
    // Separator between links.
    $separator = ' ';

    if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {

        $term_ids = implode( ',', $post_terms );

        $terms = wp_list_categories( array(
            'title_li' => '',
            'style'    => 'list',
            'echo'     => 0,
            'taxonomy' => $taxonomy,
            'include'  => $term_ids,
            'show_count'       => 1,
        ) );

        $terms = rtrim( trim( str_replace( '<br />', $separator, $terms ) ), $separator );

        // Display post categories.
        echo $terms ;
    }
}

/**
 * Category without number of articles count
 */

function FineDiv_category_no_count () {
    global $post;

    $taxonomy = 'category';
    // Get the term IDs assigned to post.
    $post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
    // Separator between links.
    $separator = ' ';

    if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {

        $term_ids = implode( ',', $post_terms );

        $terms = wp_list_categories( array(
            'title_li' => '',
            'style'    => 'list',
            'echo'     => 0,
            'taxonomy' => $taxonomy,
            'include'  => $term_ids,
//            'show_count'       => 1,
        ) );

        $terms = rtrim( trim( str_replace( '<br />', $separator, $terms ) ), $separator );

        // Display post categories.
        echo $terms ;
    }
}
/**
 *      Wrap post category count into span
 *      ----------------------------------------------------------------------------
 */

function cat_count_span( $links ) {
    $links = str_replace( '</a> (', '</a> <span class="cat-posts-count"><sup>', $links );
    $links = str_replace( ')', '</sup></span>', $links );
    return $links;
}

function FineDiv_cc_no_count () {
    global $post;

    $taxonomy = 'props';
    // Get the term IDs assigned to post.
    $post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
    // Separator between links.
    $separator = ' ';

    if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {

        $term_ids = implode( ',', $post_terms );

        $terms = wp_list_categories( array(
            'title_li' => '',
            'style'    => 'list',
            'echo'     => 0,
            'taxonomy' => $taxonomy,
            'include'  => $term_ids,
//            'show_count'       => 1,
        ) );

        $terms = rtrim( trim( str_replace( '<br />', $separator, $terms ) ), $separator );

        // Display post categories.
        echo $terms ;
    }
}

add_filter( 'wp_list_categories', 'cat_count_span' );

/**
 * Set length of excerpt by number of characters
 * @param $limit : number of characters
 * @param  $source : null = excerpt; word "content" = excerpt from article content
 * @excerpt_example echo FineDiv_get_excerpt(150)
 * @content_example echo FineDiv_get_excerpt(150,content')
 * @return bool|null|string|string[]
 * @original https://wordpress.stackexchange.com/questions/70913/how-can-i-limit-the-character-length-in-excerpt
 */
function FineDiv_get_excerpt($limit, $source = null){

    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
//    $excerpt = $excerpt.' '.'<a href="'.get_permalink().'">[ ... ]</a>';
    $excerpt = $excerpt .' '.' ...';

    return $excerpt;
}


add_filter( 'excerpt_length', 'FineDiv_get_excerpt');

/**
 * Set length of excerpt by number of characters
 * @param $limit : number of characters
 * @param  $source : null = excerpt; word "content" = excerpt from article content
 * @excerpt_example echo FineDiv_get_excerpt(150)
 * @content_example echo FineDiv_get_excerpt(150,content')
 * @return bool|null|string|string[]
 * @original https://wordpress.stackexchange.com/questions/70913/how-can-i-limit-the-character-length-in-excerpt
 */
function FineDiv_get_cpt_excerpt($limit, $source = null){

    if($source == "content" ? ($excerpt = get_post_meta( get_the_ID(), '_workshop_data_excerpt', true )) : ($excerpt =
        get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
//    $excerpt = $excerpt.' '.'<a href="'.get_permalink().'">[ ... ]</a>';
    $excerpt = $excerpt .' '.' ...';

    return $excerpt;
}


add_filter( 'excerpt_length', 'FineDiv_get_cpt_excerpt');