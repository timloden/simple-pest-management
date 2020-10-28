<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package underscores
 */

get_header();
?>
<div class="container py-3 py-lg-5">


    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <section class="error-404 not-found">
                <header class="page-header pt-3 text-center">
                    <h1 class="page-title pb-3">
                        <?php esc_html_e( 'Oops! It looks like something went wrong!', 'underscores' ); ?>
                    </h1>
                    <img alt="dead cockroach"
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/dead-cockroach-small.png">
                    <h2>Don't worry we can still help with all your pest control needs!</h2>
                </header><!-- .page-header -->

                <div class="page-content">

                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->
</div>
<?php
get_footer();