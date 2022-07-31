<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package restoration-performance
 */

?>
<article class="col-12 col-lg-10 mb-5">

    <div class="row post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="col-12 col-lg-4 mb-4 mb-lg-0">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large', ['class' => 'img-fluid']);
 ?>
            </a>
        </div>
        <div class="col-12 col-lg-8">

            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h5>
            <p><?php the_excerpt(); ?></p>
            <p class="mb-0 text-right"><a href="<?php the_permalink(); ?>">Continue reading</a></p>
        </div>
    </div>


</article>