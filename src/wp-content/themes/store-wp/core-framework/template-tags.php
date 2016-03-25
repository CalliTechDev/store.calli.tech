<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 */
if ( ! function_exists( 'igthemes_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function igthemes_posted_on() {
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
        esc_html_x( 'Posted on %s', 'post date', 'store-wp' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );

    $byline = sprintf(
       esc_html_x( 'by %s', 'post author', 'store-wp' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'igthemes_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function igthemes_entry_footer() {
    // Hide category and tag text for pages.
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( esc_html__( ', ', 'store-wp' ) );
        if ( $categories_list && igthemes_categorized_blog() ) {
            printf( '<span class="cat-links">' . esc_html__( '%1$s', 'store-wp' ) . '</span>', $categories_list );
        }

        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html__( ', ', 'store-wp' ) );
        if ( $tags_list ) {
            printf( '<span class="tags-links">' . esc_html__( '%1$s', 'store-wp' ) . '</span>', $tags_list );
        }
    }

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<span class="comments-link">';
        comments_popup_link( esc_html__( 'Leave a comment', 'store-wp' ), __( '1 Comment', 'store-wp' ), esc_html__( '% Comments', 'store-wp' ) );
        echo '</span>';
    }

    edit_post_link(
        sprintf(
            /* translators: %s: Name of current post */
            esc_html__( 'Edit %s', 'store-wp' ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ),
        '<span class="edit-link">',
        '</span>'
    );
}
endif;


if ( ! function_exists( 'igthemes_numeric_paging' ) ) :
/**
 * Display numeric pagination.
 */
function igthemes_numeric_paging() {
    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
        return;
    }
    ?>
            <?php global $wp_query; // pagination
            $big = 999999999; // need an unlikely integer

        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'type'    => 'list',
            'prev_next'    => True,
            'prev_text'    => esc_html__('&#8592;', 'store-wp'),
            'next_text'    => esc_html__('&#8594;', 'store-wp'),
            'total' => $wp_query->max_num_pages
        ) ); ?>

    <?php
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function igthemes_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'igthemes_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,

            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'igthemes_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so igthemes_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so igthemes_categorized_blog should return false.
        return false;
    }
}

/**
 * Flush out the transients used in igthemes_categorized_blog.
 */
function igthemes_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'igthemes_categories' );
}
add_action( 'edit_category', 'igthemes_category_transient_flusher' );
add_action( 'save_post',     'igthemes_category_transient_flusher' );
