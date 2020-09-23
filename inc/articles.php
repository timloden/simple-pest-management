<?php

// change excerpt length

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function custom_type_archive_display($query) {
    if (is_post_type_archive('service-areas') || is_post_type_archive('pests')) {
         $query->set('posts_per_page',-1);
        return;
    }     
}
add_action('pre_get_posts', 'custom_type_archive_display');