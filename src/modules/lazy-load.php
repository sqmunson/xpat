<?php

// this allow me to hit this:
// http://localhost:8888/xpatnation/wp-admin/admin-ajax.php?action=scott_ajax

// I should be able to pass in a page number in order to "paginate" the calls:
// http://localhost:8888/xpatnation/wp-admin/admin-ajax.php?action=scott_ajax&page=3

// I should be able to cache these calls with W3 Total Cache
// setting the cache-control header

function lazy_load_query($loop) {

    if (!$loop) {
        // if we're not in a loop then we're loading via ajax, so get the query params
        $categories = (isset($_GET['categories']) && $_GET['categories'] !== '' && $_GET['categories'] !== '1') ? explode(',',$_GET['categories']) : '';
        // $categories = $categories ? explode(',', $categories) : '';
        $author = (isset($_GET['author'])) ? $_GET['author'] : '';
        $tags = (isset($_GET['tags']) && $_GET['tags'] !== '') ? explode(',',$_GET['tags']) : '';
        // $tags = $tags ? implode(',', $tags) : '';
        $post_id = (isset($_GET['exclude'])) ? $_GET['exclude'] : '';
        $search_term = (isset($_GET['search'])) ? $_GET['search'] : '';
        $page = (isset($_GET['page'])) ? $_GET['page'] : '';
    } else {
        // if we are in a loop then we need to see what kind of loop
        $page = 0;
        if (is_single()) {
            $_post = get_post();
            $post_id = $_post->ID;
            $categories = wp_get_post_categories($post_id);
            $categories = implode(',', $categories);
            $tags = wp_get_post_tags($post_id, array('fields' => 'ids'));
            $tags = implode(',', $tags);
        }
        if (is_category()) {
            $categories = get_query_var('cat');
        }
        if (is_tag()) {
            $tags = get_query_var('tag');
        }
        if (is_search()) {
            $search_term = get_search_query();
        }
        if (is_author()) {
            $author_id = get_the_author_meta('ID');
        }
    }

    // we'll use this for querying regular posts cuz we don't want any featured ones showing up there
    $featured_tag_id = get_term_by( 'slug', 'featured', 'post_tag');

    $featured_post_args = array(
        'post_type' => 'post',
        'posts_per_page' => 2,
        'offset' => 2 * $page,
        'post_status' => 'publish',
    );

    $regular_post_args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'offset' => 5 * $page,
        'post_status' => 'publish',
    );

    if (!$categories && !$tags) {
        // without categories or tags we don't need a custom tax_query
        $featured_post_args['tag'] = 'featured';
        $regular_post_args['tag__not_in'] = array( $featured_tag_id->term_id );
    } else {
        // if we have categories or tags we'll need a custom tax_query, so let's add the first piece
        $featured_post_args['tax_query'] = array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'slug',
                'terms'    => array( 'featured' ),
            ),
        );
        $regular_post_args['tax_query'] = array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'slug',
                'terms'    => array( 'featured' ),
                'operator' => 'NOT IN',
            ),
        );
    }

    if ($categories && !$tags) {
        
        $featured_post_args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $categories,
        );

        $regular_post_args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $categories,
        );
    }

    if ($tags && !$categories) {

        $featured_post_args['tax_query'][] = array(
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'slug',
                'terms'    => $tags,
            ),
        );

        $regular_post_args['tax_query'][] = array(
            'taxonomy' => 'post_tag',
            'field'    => 'slug',
            'terms'    => $tags,
        );
    }

    if ($categories && $tags) {

        $featured_post_args['tax_query'][] = array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $categories,
            ),
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'slug',
                'terms'    => $tags,
            ),
        );

        $regular_post_args['tax_query'][] = array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $categories,
            ),
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'slug',
                'terms'    => $tags,
            ),
        );
    }

    if ($search_term) {
        $featured_post_args['s'] = $search_term;
        $regular_post_args['s'] = $search_term;
    }

    if ($post_id) {
        $featured_post_args['post__not_in'] = array($post_id);
        $regular_post_args['post__not_in'] = array($post_id);
    }

    if ($author) {
        $featured_post_args['author'] = $author;
        $regular_post_args['author'] = $author;
    }

    $the_query = new WP_Query( $featured_post_args ); // The Featured Loop
    if ( $the_query->have_posts() ) {
        $path = dirname(__FILE__) . '/lazy-load-content.php';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            include ( $path );
        }
    }
    wp_reset_postdata(); /* Restore original Post Data */


    $the_query = new WP_Query( $regular_post_args ); // The Regular Loop
    if ( $the_query->have_posts() ) {
        $path = dirname(__FILE__) . '/lazy-load-content.php';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            include ( $path );
        }
    }
    wp_reset_postdata(); /* Restore original Post Data */

    // exit;
}
add_action( 'wp_ajax_nopriv_lazy_load_query', 'lazy_load_query');
add_action( 'wp_ajax_lazy_load_query', 'lazy_load_query');


// enqueue scripts and insert js variable in page
function lazy_load_enqueue_scripts(){
    wp_enqueue_script( 'lazy_load', get_template_directory_uri() . '/js/lazyload.js', array('jquery'),  '1.1', true );
    wp_localize_script(
        'lazy_load',
        'lazy_load_localize',
        array(
            'ajaxurl'   => admin_url('admin-ajax.php')
        )
    );
    
}
add_action( 'wp_enqueue_scripts', 'lazy_load_enqueue_scripts' );


function lazy_load_shortcode($atts, $content = null) {
    $html = '<div class="lazy-load-more" ';

    if (is_home()) {
        $type = 'home';
    }
    if (is_single()) {
        $type = 'single';
        $_post = get_post();
        $post_id = $_post->ID;
        $categories = wp_get_post_categories($post_id);
        $categories = implode(',', $categories);
        $tags = wp_get_post_tags($post_id, array('fields' => 'slugs'));
        $tags = implode(',', $tags);
    }
    if (is_category()) {
        $type = 'category';
        $categories = get_query_var('cat');
    }
    if (is_tag()) {
        $type = 'tag';
        $tags = get_query_var('tag');
    }
    if (is_search()) {
        $type = 'search';
        $search_term = get_search_query();
    }
    if (is_author()) {
        $type = 'author';
        $author_id = get_the_author_meta('ID');
    }

    $html .= ' data-type="' . $type . '"';
    $html .= ' data-author="' . $author_id . '"';
    $html .= ' data-search="' . $search_term . '"';
    $html .= ' data-categories="' . $categories . '"';
    $html .= ' data-post="' . $post_id . '"';
    $html .= ' data-tags="' . $tags . '"';
    $html .= '><div class="lazy-load-content"></div><div class="lazy-load-button"></div></div>';

    return $html;
}
add_shortcode( 'lazy_load', 'lazy_load_shortcode');  