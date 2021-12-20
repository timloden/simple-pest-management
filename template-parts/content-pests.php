<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package restoration-performance
 */
?>
<div class="col mb-3">
    <a class="text-dark text-decoration-none" href="<?php the_permalink(); ?>">
        <div class="card h-100 post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_post_thumbnail('medium', ['class' => 'card-img-top lazy', 'title' => 'Feature image']);?>
            <div class="card-body">
                <h5 class="card-title text-dark"><?php the_title(); ?></h5>
                <p class="card-text text-dark"><?php the_excerpt(); ?></p>
            </div>
        </div>
    </a>

</div>