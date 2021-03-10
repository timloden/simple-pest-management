<?php
/**
 * Template Name: Restricted
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simple-pest
 */

get_header();
?>
<section class="py-lg-5 restricted-page">
    <div class="container">
        <div class="row justify-content-center">
            <?php
                if (!is_user_logged_in()) {
                    echo '<div class="col-10 col-lg-5 pb-5">';
                    wp_login_form();
                } else {
                    echo '<div class="col-12">';
                    while ( have_posts() ) :
                        the_post();
    
                        get_template_part( 'template-parts/content', 'page' );
    
                    endwhile; // End of the loop.
                }
               
                ?>
        </div>
    </div>
    </div>
</section>
<?php
get_footer();