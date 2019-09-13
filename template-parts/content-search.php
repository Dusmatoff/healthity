<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package healthity
 */

?>

<div class="col-12 col-sm-6" id="post-<?php the_ID(); ?>">
    <div class="news-item">
        <a href="<?php the_permalink(); ?>" class="product-link"></a>
        <div class="news-img parallax-bg">
            <div class="bg bg-lazy-load rellax" data-rellax-speed="1.4" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php echo get_the_post_thumbnail_url(); ?>"></div>
        </div>
        <div class="news-contents">
            <h4 class="title h4"><?php the_title(); ?></h4>
            <div class="simple-text size-2">
                <p><?php the_excerpt(); ?></p>
            </div>
            <a href="<?php the_permalink(); ?>" class="button-link"><?php esc_html_e( 'View more', 'healthity' ) ?></a>
        </div>
    </div>
</div>
