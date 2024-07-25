<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package restoration-performance
 */

?>
<article class="mb-5 job-posting">

    <div class="row justify-content-center post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="col-12 col-lg-8">

            <h2 class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
            <p><?php the_excerpt(); ?></p>
            <p class="mb-0 text-right"><a href="<?php the_permalink(); ?>">Learn more about this position <i class="las la-angle-right"></i></a></p>
        </div>
    </div>


</article>