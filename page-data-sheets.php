<?php
/**
 * Template Name: Safety Data Sheets
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simple-pest
 */

get_header();
?>
<section class="bg-white py-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <h1 class="text-center mb-4">Safety Data Sheets</h1>
                <p class="text-center">If you have any questions, please call us at
                    <strong><?php echo get_field('phone_number', 'option'); ?></strong></p>
                <?php if( have_rows('data_sheets') ): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <?php while( have_rows('data_sheets') ): the_row(); 
                    $sheet = get_sub_field('file');
                    $label = get_sub_field('label');
                    ?>
                    <tr>
                        <td><?php the_sub_field('name'); ?></td>
                        <td><a href="<?php echo $sheet; ?>" target="_blank">Safety Data Sheet</a></td>
                        <td><a href="<?php echo $label; ?>" target="_blank">Label</a></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();