<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscores
 */
$logo = get_field('logo', 'option');
$phone_number = get_field('phone_number', 'option');
?>

<?php if (!is_front_page()) : ?>
<section class="clients border-top">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                <div class="position-sticky" style="top: 200px;">
                    <h2 class="border-bottom mb-3 pb-3">Hear from some of our clients</h2>
                    <p>We want you to feel confident in your pest service so please take a look at what some of our
                        satisfied customers are saying!</p>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <?php if (have_rows('review_sites', 'option')): ?>
                <div class="row">
                    <?php while (have_rows('review_sites', 'option')): the_row();
                                $image = get_sub_field('image');
                                $link = get_sub_field('link');
                            ?>
                    <div class="col-6 col-lg-3">
                        <a href="<?php echo $link; ?>" target="_blank">
                            <img src="<?php echo $image['url']; ?>" class="img-fluid px-1">
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

</div><!-- #content -->

<footer class="site-footer border-top bg-white">
    <div class="jumbotron jumbotron-fluid footer-hero mb-0 position-relative lazy"
        data-bg="<?php echo get_template_directory_uri(); ?>/assets/images/footer-form-bg.jpg"
        style="background-size: cover; background-position: center;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 hero-text mb-3 text-center text-lg-left text-center">
                    <p class="text-white text-center h5 font-weight-normal">Simple Pest Management</p>
                    <p class="h1 text-white text-center mb-3">100% Satisfaction Guaranteed</p>
                    <p class="h2 text-success text-center footer-phone-number">
                        <?php
                        echo '<a class="text-white btn btn-orange btn-lg hero-phone-btn shadow" href="tel:' . preg_replace('/[^0-9]/', '', $phone_number) . '"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
</svg> Call ' . $phone_number . '</a>';
                        ?>
                    </p>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="py-3 text-center text-primary">
                        <p class="mb-0 h4 text-white font-weight-normal">Get a FREE estimate today!</p>
                    </div>
                    <div class="hero-form shadow-sm rounded bg-white p-3 border position-relative">
                        <p class="mb-2 text-center hero-form-title mb-0 d-none">Get a free estimate today!</p>
                        <?php gravity_form(3, false, false, false, '', true, 12); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5 pb-5 text-center text-lg-left">
        <div class="row">
            <div class="col-12 col-lg-7 mb-3">
                <div class="d-flex flex-wrap">
                    <div class="col-12 col-lg-5 pl-0">
                        <img class="img-fluid lazy" data-src="<?php echo esc_url($logo['url']); ?>"
                            alt="Simple Pest Management Logo">

                        <?php echo esc_attr(the_field('address', 'option')) ?>
                    </div>
                    <div class="col-12 col-lg-7 px-0">
                        <?php wp_nav_menu(array('theme_location' => 'footer-primary', 'container' => 'div', 'container_id' => 'footer-header-menu', 'container_class' => 'px-0 px-lg-4', 'menu_class' => 'nav flex-column', 'add_li_class'  => 'nav-item', 'depth' => 2)); ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 footer-text">
                <?php the_field('footer_message', 'option'); ?>

            </div>
        </div>

    </div>
    <div class="copyright bg-primary">
        <div class="container">
            <p class="text-white m-0 p-2 text-center">&copy; Simple Pest Management <?php echo date('Y'); ?> |
                License, Bonded and Insured | PR 8436</p>
        </div>
    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
<?php echo get_field('footer_embed', 'option'); ?>
</body>

</html>