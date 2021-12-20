<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package underscores
 */

get_header();
$featured_img = get_the_post_thumbnail_url();
$hero_title = get_field('hero_title');
?>
<div id="primary" class="content-area services-single">
    <main id="main" class="site-main">

        <section class="service-hero">
            <div class="jumbotron jumbotron-fluid bg-white mb-0">

                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-5 mb-lg-0">
                            <?php
                            while ( have_posts() ) :
                                the_post();
                                if ($hero_title) {
                                    echo '<h1 class="mb-4 text-center">' . $hero_title . '</h1>';
                                } else {
                                    echo '<h1 class="mb-4 text-center">' . get_the_title() . '</h1>';
                                }
                                
                                get_template_part( 'template-parts/content-single', get_post_type() );

                            endwhile; // End of the loop.
                            ?>
                        </div>

                    </div>
                </div>
            </div>

        </section>






    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();