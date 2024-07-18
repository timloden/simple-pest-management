<?php

/**
 * Template Name: Careers
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simple-pest
 */

get_header();
?>
<section class="py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-5">Simple Pest Careers</h1>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-12 col-lg-10">

                <?php if (have_rows('job_listings')) : ?>

                <?php while (have_rows('job_listings')) : the_row(); ?>

                <?php
                        $job_title = get_sub_field('job_title');
                        $job_short_description = get_sub_field('job_short_description');
                        $job_description = get_sub_field('job_description');
                        $job_form_id = get_sub_field('apply_form');
                        $row_id
                        ?>

                <div class="row job-listing mb-5 pb-5 border-bottom">
                    <div class="col-12">
                        <h2 class="text-primary font-weight-bold"><?php echo $job_title; ?></h2>
                        <p><?php echo $job_short_description; ?></p>
                        <div class="d-flex flex-wrap">
                            <div class="col-12 col-lg text-center text-lg-left mb-3 mb-lg-0">
                                <a data-target=".job-<?php echo get_row_index(); ?>"
                                    class="btn btn-outline-primary font-weight-bold" data-toggle="collapse"
                                    role="button" aria-expanded="false"
                                    aria-controls="description-<?php echo get_row_index(); ?>">Read full
                                    description</a>
                            </div>
                            <div class="col-12 col-lg text-center text-lg-right">
                                <a href="#apply-<?php echo get_row_index(); ?>" class="btn btn-orange font-weight-bold"
                                    data-toggle="collapse" aria-expanded="false"
                                    aria-controls="apply-<?php echo get_row_index(); ?>">Apply for the
                                    <?php echo $job_title; ?>
                                    position</a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 col-12 collapse job-<?php echo get_row_index(); ?>"
                        id="description-<?php echo get_row_index(); ?>">
                        <h3 class="h5">Full <?php echo $job_title; ?> description</h3>
                        <?php echo $job_description; ?>
                    </div>

                    <div class="mt-4 col-12 collapse job-<?php echo get_row_index(); ?>"
                        id="apply-<?php echo get_row_index(); ?>">
                        <div class="bg-light p-3 border rounded">
                            <h3 class="h5">Submit your resume</h3>
                            <?php
                                    if ($job_form_id) {
                                        gravity_form($job_form_id, false, false, false, '', true, 12);
                                    }
                                    ?>
                        </div>

                    </div>

                </div>

                <?php endwhile; ?>

                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<?php
get_footer();