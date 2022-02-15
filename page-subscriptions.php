<?php
/**
 * Template Name: Subscription
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simple-pest
 */

get_header();
?>

<div class="container py-3 py-lg-5">
    <h1 class="py-3 mb-3 title-border text-center"><?php the_title(); ?></h1>
    <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile;
	?>
    <?php 
	// start packages
	if( have_rows('service_packages') ) :
	?>
    <div class="row justify-content-center">
        <?php
		while( have_rows('service_packages') ): the_row();
		$name = get_sub_field('service_title');
		$service_id = get_sub_field('service_id');
		$price = get_sub_field('service_price');
		$billing = get_sub_field('billing_cycle');
		$featured = get_sub_field('featured');
	?>
        <div class="col-12 col-md-4">
            <div class="card mb-3 mb-md-0 <?php echo ($featured) ? 'shadow' : '' ?>">
                <div class="card-header text-center <?php echo ($featured) ? 'bg-secondary' : 'bg-primary' ?>">
                    <h2 class="card-title h3 mb-0 text-white"><?php echo $name; ?></h2>
                </div>
                <div class="card-body text-center pt-2 pb-2 border-bottom">
                    <p class="mb-0 font-weight-bold" style="font-size: 30px;">$<?php echo $price; ?> <span
                            class="text-black-50 font-weight-normal"
                            style="font-size: 16px;"><?php echo $billing; ?></span></p>
                    <p class="mb-0 text-black-50" style="font-size: 12px;">*Initial Fee Applies</p>
                </div>
                <?php 
		// start list of services
		if( have_rows('services_included') ): ?>
                <ul class="list-group list-group-flush">
                    <?php
			while( have_rows('services_included') ) : the_row();
				$service_name = get_sub_field('service_name');
		?>
                    <li class="list-group-item text-center"><?php echo $service_name; ?></li>

                    <?php endwhile; ?>
                </ul>
                <?php endif;?>
                <div class="card-body text-center">
                    <a onclick="openSubscriptionForm('<?php echo $service_id; ?>');" href="javascript:void(0)"
                        class="btn <?php echo get_sub_field('featured') ? 'btn-secondary' : 'btn-primary'; ?> text-white font-weight-bold">Get
                        Started</a>
                </div>
                <?php if ($featured) : ?>
                <div class="card-footer text-muted">
                    <p class="mb-0 text-center"><strong>MOST POPULAR</strong></p>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <?php echo the_field('services_disclaimer'); ?>
        </div>
    </div>
    <?php endif; ?>
</div><!-- #primary -->

<div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subscribeModalLabel">Sign up today</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php gravity_form( get_field('subscribe_form'), false, false, false, '', true, 12 ); ?>
                <p class="text-black-50 small text-right mb-0 mt-2"><?php echo get_field('subscription_disclaimer'); ?>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function openSubscriptionForm(plan) {
    var selectedPlan = plan;
    jQuery('.selected-service select').val(plan);
    jQuery('#subscribeModal').modal('show');
}
</script>

<?php
get_footer();