<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();
$home_page_id = get_option( 'page_on_front' );
$term = get_queried_object();
$phone_number = get_field('location_phone_number', $term);
$form_subtitle = get_field('hero_discount_subtitle', $home_page_id) . ': ' . get_field('hero_discount_amount', $home_page_id) . ' ' . get_field('hero_discount_label', $home_page_id);
?>


<div id="primary" class="content-area py-5">
    <main id="main" class="site-main">

        <?php if ( have_posts() ) : ?>
        <div class="container">
            <h1 class="text-center mb-3"><?php echo single_cat_title('', false); ?> Service Locations</h1>
            <?php the_archive_description( '<div class="archive-description text-center mb-3">', '</div>' ); ?>
            <h2 class="h4 text-center mb-5"> Call for free estimate: <a class="text-secondary"
                    href="tel:<?php echo esc_attr($phone_number); ?>"><?php echo esc_attr($phone_number); ?></a></h2>
            <div class="row mt-3 mt-lg-5">
                <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/location-city', get_post_type() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
        ?>
            </div>



        </div>

        <section class="services bg-light-blue py-5 mt-5">
            <div class="container">
                <div class="row pb-5">
                    <div class="col-12">
                        <h2 class="text-center">Our Services</h2>
                    </div>
                </div>
                <div class="row justify-content-center">

                    <?php while( have_rows('services', $home_page_id) ): the_row(); 
					$service_page = get_sub_field('service_page');
					$title = get_field('hero_title', $service_page->ID);

					if (!$title) {
						$title = get_the_title($service_page->ID);
					}

					$featured_img = get_the_post_thumbnail_url($service_page->ID);
					$text = get_the_excerpt($service_page->ID); 
					$link = get_the_permalink($service_page->ID);
					?>

                    <div class="col-12 col-lg-4 pb-4">
                        <div class="card shadow-sm h-100">
                            <?php if ($featured_img) : ?>
                            <img data-src="<?php echo esc_url($featured_img); ?>" class="card-img-top lazy" alt="">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php echo esc_url($link); ?>"><?php echo $title ?></a>
                                </h5>
                                <p class="card-text"><?php echo $text ?></p>
                                <a href="<?php echo esc_url($link); ?>" class="">Learn more about
                                    <?php echo $title ?></a>
                            </div>
                        </div>
                    </div>


                    <?php endwhile; ?>

                </div>

            </div>

        </section>

        <div class="container">
            <div class="row pt-5 pb-3">
                <div class="col-12 text-center">
                    <h2 class="text-primary">Schedule Your FREE Estimate</h2>
                    <h3 class="h5 mb-3"><?php echo esc_attr($form_subtitle); ?></h3>
                </div>
            </div>
            <div class="row justify-content-center mb-5">
                <div class="col-12 col-md-8">
                    <div class="card shadow-sm bg-light-blue">
                        <div class="card-body">
                            <?php gravity_form( 1, false, false, false, '', true, 12 ); ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <?php 
                    $embed_social_shortcode = get_field('location_embed_social_shortcode', $term);

                    if ($embed_social_shortcode) {
                        echo do_shortcode($embed_social_shortcode); 
                    }
                ?>
                </div>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();