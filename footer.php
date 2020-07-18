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
?>

</div><!-- #content -->

<footer class="site-footer border-top bg-white mt-5">
    <div class="guarantee">
        <div class="container">
            <div class="row border-bottom py-5">

                <div class="col-12 text-center">
                    <p class="h3">100% Satisfaction Guarantee</p>
                    <p class="mb-0">With our pest free guarantee, if the bugs come back, so do we, FREE of charge!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container pt-5 pb-5 text-center text-lg-left">
        <div class="row">
            <div class="col-12 col-lg-7 mb-3">
                <div class="d-flex flex-wrap">
                    <div class="col-12 col-lg-5 pl-0">
                        <img class="img-fluid"
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/simple-pest-logo-horizontal-color-expanded.png">
                        <p class="border-top mt-4 pt-4 mb-2">
                            <?php echo esc_attr(get_field('phone_number', 'option')) ?>
                        </p>
                        <?php echo esc_attr(the_field('address', 'option')) ?>
                    </div>
                    <div class="col-12 col-lg-7 px-0">
                        <?php wp_nav_menu( array( 'theme_location' => 'footer-primary', 'container' => 'div','container_id' => 'footer-header-menu', 'container_class' => 'px-0 px-lg-4', 'menu_class' => 'nav flex-column', 'add_li_class'  => 'nav-item', 'depth' => 2 ) ); ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 footer-text">
                <p>At Simple Pest Management, our customized maintenance programs are designed with you and your family
                    in mind to provide a protective barrier around your home and yard.</p>

                <p>No matter the type of infestation or problem, Simple Pest Management is your #1 choice in east county
                    San Diego. We offer excellent customer service and efficient treatments for any problem. Let us
                    customize the ultimate service plan for you.</p>

                <p><strong>We kill bug&hellip; It’s that SIMPLE&hellip; Call us today!</strong></p>

            </div>
        </div>

    </div>
    <div class="copyright bg-primary">
        <div class="container">
            <p class="text-white m-0 p-2 text-center">&copy; Simple Pest Management <?php echo date( 'Y' ); ?> |
                License, Bonded and Insured</p>
        </div>

    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
<?php the_field('footer_embed', 'option'); ?>
</body>

</html>