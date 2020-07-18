<?php

// add class argument to menu <li>
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


// add class to menu item link
add_filter( 'nav_menu_link_attributes', function($atts) {
    $atts['class'] = 'nav-link';
    return $atts;
}, 100, 1 );