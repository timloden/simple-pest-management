<?php
/**
 * Template Name: Contact
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simple-pest
 */

get_header();
?>
<section class="bg-light-blue py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-5">Contact us</h1>
            </div>
        </div>
        <div class="row ">

            <div class="col-12 col-lg-4">
                <h2>Santee Location</h2>
                <p><?php echo esc_attr(the_field('address', 'option')) ?></p>
                <p><strong><?php echo esc_attr(get_field('phone_number', 'option')) ?></strong></p>
                <p class="mb-1">M-F: <?php echo esc_attr(get_field('hours_m-f', 'option')) ?></p>
                <p class="mb-1">Sat: <?php echo esc_attr(get_field('hours_saturday', 'option')) ?></p>
                <p class="mb-0">Sun: <?php echo esc_attr(get_field('hours_sunday', 'option')) ?></p>
            </div>
            <div class="col-12 col-lg-8">
                <div class="hero-form shadow-sm rounded bg-white p-3 border position-relative mb-5"
                    style="z-index: 999;">
                    <p class="mb-2 text-center hero-form-title mb-0 d-none">Get a free estimate today!</p>
                    <?php gravity_form( 2, false, false, false, '', true, 12 ); ?>
                </div>

            </div>
        </div>
    </div>
</section>
<?php
get_footer();