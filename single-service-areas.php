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
?>
<div id="primary" class="content-area services-single">
    <main id="main" class="site-main">

        <section class="service-hero">


            <div class="container py-5">
                <div class="row">
                    <div class="col-12 mb-5 mb-lg-0">
                        <?php
                            while ( have_posts() ) :
                                the_post();
                                //echo '<h1 class="mb-4">' . get_the_title() . '</h1>';
                                get_template_part( 'template-parts/content-service-area', get_post_type() );
                                //echo '<div class="text-center text-lg-left"><a class="btn btn-primary mt-4" href="/free-estimate">Get your FREE Estimate!</a></div>';

                            endwhile; // End of the loop.
                            ?>
                    </div>
                </div>
            </div>

        </section>






    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();