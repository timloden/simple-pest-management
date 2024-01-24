<?php 

add_filter( 'rank_math/frontend/title', function( $title ) {
    if (is_singular('service-areas')) {
        global $wp_query;
        $post_id = get_the_ID();
        $query_vars = $wp_query->query_vars;
        
        $pests = array(
            'wasps',
            'rodents',
            'bed-bugs',
            'cockroaches',
            'silverfish',
            'spiders',
            'ants',
            'fleas-ticks-mites',
            'carpet-beetles',
            'centipedes',
            'mosquitos',
            'earwigs',
        );

        foreach ($pests as $pest) {
            if (array_key_exists($pest, $query_vars)) {

                if (str_ends_with($pest, 's')) {
                    $pest = rtrim($pest, "s");
                }

                $city = get_field('city', $post_id);
                $title = $city . ' ' . $pest . ' Control | Simple Pest Management';
            }
        }
    }
    
    return $title;
});

add_filter( 'rank_math/frontend/description', function( $description ) {
    if (is_singular('service-areas')) {
        global $wp_query;
        $post_id = get_the_ID();
        $query_vars = $wp_query->query_vars;
        
        $pests = array(
            'wasps',
            'rodents',
            'bed-bugs',
            'cockroaches',
            'silverfish',
            'spiders',
            'ants',
            'fleas-ticks-mites',
            'carpet-beetles',
            'centipedes',
            'mosquitos',
            'earwigs',
        );

        foreach ($pests as $pest) {
            if (array_key_exists($pest, $query_vars)) {

                if (str_ends_with($pest, 's')) {
                    $pest = rtrim($pest, "s");
                }

                $city = get_field('city', $post_id);
                $description = '100% Satisfaction Guaranteed - ' . ucfirst($city) . ' ' . ucfirst($pest) . ' Control';
            }
        }
    }

	return $description;
});