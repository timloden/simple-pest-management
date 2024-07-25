<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();
$title = get_field('careers_title', 'option') ? get_field('careers_title', 'option') : 'Come work for Simple Pest Management!';
?>


<div id="primary" class="content-area py-5">
	<main id="main" class="site-main">

		<?php if (have_posts()) : ?>
			<div class="container jobs">
				<h1 class="text-center mb-5"><?php echo esc_attr($title); ?></h1>
			<?php
			/* Start the Loop */
			while (have_posts()) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part('template-parts/content', get_post_type());

			endwhile;

		else :

			get_template_part('template-parts/content', 'none');

		endif;
			?>
			</div>


	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
