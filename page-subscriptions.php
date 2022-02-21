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

		$header_color = 'bg-light';
		$button_color = 'btn-light';
		$header_text_color = '';

		if ($featured) {
			$button_color = 'btn-secondary';
			$header_color = 'bg-secondary';
			$header_text_color = 'text-white';
		} elseif ($name == 'Professional') {
			$button_color = 'btn-primary';
			$header_color = 'bg-primary';
			$header_text_color = 'text-white';
		}
	?>
        <div class="col-12 col-md-4">
            <div
                <?php echo ($featured) ? 'class="card mb-3 mb-md-0 shadow-lg border-secondary mt-3 mt-md-0" style="border-width: 5px;"' : 'class="card mb-3 mb-md-0" style="margin-top: 27px;"' ?>>
                <div
                    <?php echo ($featured) ? 'class="card-header text-center ' . $header_color . '" style="border-radius: 0;"' : 'class="card-header text-center ' . $header_color . '"' ?>>
                    <h2 class="card-title h3 mb-0 <?php echo $header_text_color;?>"><?php echo $name; ?>
                    </h2>
                    <?php echo ($featured) ? '<p class="text-white mb-0 text-center">' . get_field('featured_subscription_subtitle') . '</p>' : '';?>
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
                        class="btn <?php echo ($featured) ? 'btn-lg ' . $button_color . ' text-white font-weight-bold' : 'border ' . $button_color . ' font-weight-bold'; ?>">Get
                        Started <?php echo ($featured) ? 'Today!' : ''; ?></a>
                </div>
                <?php if ($featured) : ?>
                <div class="card-footer">
                    <p class="mb-0 text-center"><strong>MOST POPULAR</strong></p>
                </div>
                <?php endif; ?>
            </div>
            <p class="text-center mt-3 text-black-50" style="font-size: 12px;">
                <?php echo get_sub_field('disclaimer'); ?></p>
        </div>
        <?php endwhile; ?>
    </div>
    <div class="row mt-5">
        <div class="col-12">

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