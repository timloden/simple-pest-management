<?php

// tab index with multiple forms fix
add_filter( 'gform_tabindex', 'change_tabindex' , 10, 2 );
function change_tabindex( $tabindex, $form ) {
    return false;
}