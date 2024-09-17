<?php

/**
 * Template Name: Free Estimate
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simple-pest
 */

get_header();
?>
<section class="bg-light-blue py-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="text-center mb-4"> <?php echo get_field('page_title'); ?></h1>
                <?php echo get_field('before_form_text'); ?>
                <div class="hero-form shadow-sm rounded bg-white p-3 border position-relative mb-5"
                    style="z-index: 999;">
                    <p class="mb-2 text-center hero-form-title mb-0 d-none">Get a free estimate today!</p>
                    <?php gravity_form(1, false, false, false, '', true, 12); ?>
                </div>

                <?php echo get_field('after_form_text'); ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();