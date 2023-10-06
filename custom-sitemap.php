<?php

namespace RankMath\Sitemap\Providers;

defined( 'ABSPATH' ) || exit;

class Custom implements Provider {

	public function handles_type( $type ) {
		return 'custom' === $type;
	}

	public function get_index_links( $max_entries ) {
		return [
			[
				'loc'     => \RankMath\Sitemap\Router::get_base_url( 'custom-sitemap.xml' ),
				'lastmod' => '',
			]
		];
	}

	public function get_sitemap_links( $type, $max_entries, $current_page ) {
        $links = [];
        
        $query = new \WP_Query( [
            'post_type'      => 'service-areas',
            'nopaging'       => true,
            'posts_per_page' => '-1',
        ]);

        $post_ids = wp_list_pluck( $query->posts, 'ID' );

        foreach ($post_ids as $post_id) {
            array_push($links, array('loc' => get_permalink($post_id) . 'rodents/'));
            array_push($links, array('loc' => get_permalink($post_id) . 'wasps/'));
            array_push($links, array('loc' => get_permalink($post_id) . 'cockroaches/'));
            array_push($links, array('loc' => get_permalink($post_id) . 'bed-bugs/'));
			array_push($links, array('loc' => get_permalink($post_id) . 'ants/'));
			array_push($links, array('loc' => get_permalink($post_id) . 'spiders/'));
			array_push($links, array('loc' => get_permalink($post_id) . 'silverfish/'));
			array_push($links, array('loc' => get_permalink($post_id) . 'fleas-ticks-mites/'));
			array_push($links, array('loc' => get_permalink($post_id) . 'carpet-beetles/'));
			array_push($links, array('loc' => get_permalink($post_id) . 'centipedes'));
			array_push($links, array('loc' => get_permalink($post_id) . 'mosquitos/'));
			array_push($links, array('loc' => get_permalink($post_id) . 'earwigs/'));
        }

		return $links;
	}

}