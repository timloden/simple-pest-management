<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package underscores
 */

get_header();
$post_date = get_the_date( 'F j, Y' );
?>

<div id="primary" class="content-area article-single">
    <main id="main" class="site-main">

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <p class="small"><a href="<?php echo site_url();?>/resources"><i class="las la-angle-left"></i> Back
                            to resources</a></p>
                    <h1><?php the_title(); ?></h1>
                    <div class="mb-3">
                        <small class="muted">Posted on: <?php echo $post_date ?> in
                            <?php the_category(', '); ?>
                        </small>
                    </div>

                    <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content-single', get_post_type() );

                    endwhile; // End of the loop.
                    ?>
                </div>

            </div>

        </div>



    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();