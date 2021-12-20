<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package underscores
 */

get_header();
$city = get_field('city');
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
                               ?>

                        <div class="service-area-content">

                            <h1 class="mb-5 text-center">Your local and best pest control service in
                                <br><?php echo $city; ?>, California</h1>

                            <p>Simple Pest Management provides the <?php echo $city; ?> area with reliable & effective
                                elimination of insects
                                and rodents. We
                                have pest control programs for all different types of residences including single family
                                homes, condos, and
                                apartment buildings. We also service commercial properties including food processing
                                facilities,
                                restaurants, schools, office buildings and many other types of locations. At Simple Pest
                                Management, we go
                                out of our way to tailor service to our customer’s specific needs; whether they are
                                looking for year-round
                                protection or a one-time service.</p>

                            <p>Simple Pest Management strives to exceed our client’s expectations, from the moment our
                                technicians arrive.
                                All of our technicians are uniformed; are licensed, bonded and insured. But beyond these
                                basics, you will
                                find that they are professionals and will treat your home as they would that if their
                                own family. We use the
                                latest technology available in the pest control industry and have the experience to
                                understand how and when
                                to use the advanced tools and when to use basic, old fashioned hard work.</p>

                            <p>This is the difference with our company. We understand that technology won’t always solve
                                the problem if you
                                don’t have skilled technicians in control.</p>

                            <h2 class="text-center mb-4 text-primary">100% satisfaction Guaranteed</h2>

                            <?php the_content(); ?>

                        </div>
                        <?php

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