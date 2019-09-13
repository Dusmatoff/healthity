<?php
    /*
    Template Name: Homepage
    */
    ?>
<?php 
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header(); ?>
<?php if( have_rows('banners') ): ?>
<!-- MAIN BANNER -->
<div class="section detail-banner">
    <div class="page-decor main-slider-decor">
        <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/main-slider-decor.png"></div>
    </div>
    <div class="bg bg-lazy-load banner-bg" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/bg-banner.jpg"></div>
    <div class="container">
        <div class="swiper-entry main-swiper">
            <div class="arrow-wrapp">
                <div class="swiper-button-prev"><i></i></div>
                <div class="swiper-button-next"><i></i></div>
            </div>
            <div class="swiper-container" data-options='{"loop":1, "autoplay": { "delay": 7000 }}'>
                <div class="swiper-wrapper">
                    <?php while( have_rows('banners') ): the_row();
                        $banner_img = get_sub_field('banner_img');
                        $title = get_sub_field('banner_title');
                        $sub_title = get_sub_field('banner_subtitle');
                        $btn_text = get_sub_field('banner_button_text');
                        $btn_link = get_sub_field('banner_button_link');
                        ?>
                    <div class="swiper-slide">
                        <div class="banner-inner">
                            <div class="banner-align size-2">
                                <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php echo $banner_img ? $banner_img : ''; ?>"></div>
                                <span class="opacity opacity-main-banner"></span>
                                <div class="row">
                                    <div class="col-12 col-xl-10 offset-xl-1">
                                        <div class="simple-item banner-info">
                                            <?php if( $title ): ?>
                                            <h1 class="h1 title color-2"><?php echo $title; ?></h1>
                                            <?php endif; ?>
                                            <?php if( $sub_title ): ?>
                                            <div class="sub-title"><?php echo $sub_title; ?></div>
                                            <?php endif; ?>
                                            <?php if( $btn_text && $btn_link ): ?><a href="<?php echo $btn_link; ?>" class="button style-2"><?php echo $btn_text; ?><span></span><i></i></a>
											<?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-pagination swiper-pagination-relative"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>		
<!-- PRODUCTS -->
<div class="section">
    <div class="page-decor product-decor-top">
        <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/product-decor-top.png"></div>
    </div>
    <div class="page-decor product-decor-left">
        <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/product-decor-left.png"></div>
    </div>
    <div class="page-decor product-decor-right">
        <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/product-decor-right.png"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="simple-item">
                    <div class="title-decor">
                        <div class="title-wrapp">
                            <h2 class="title h2"><?php the_field('our_products_title'); ?></h2>
                        </div>
                        <div class="motto-text"><?php the_field('our_products_subtitle'); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-wrapps" itemscope itemtype="http://schema.org/Product">
            <div class="row row-60">
                <?php
		            $args = array(
			            'post_type' => 'product',
			            'posts_per_page' => 5
			        );
		            $loop = new WP_Query( $args );
		            if ( $loop->have_posts() ) {
			            while ( $loop->have_posts() ) : $loop->the_post(); ?>
			                <div class="col-12 col-sm-6 col-lg-4">
				                <?php wc_get_template_part( 'content', 'product' ); ?>
			                </div>
			        <?php endwhile;
		            } else {
		                echo __( 'No products found' );
		            }
		            wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
    <div class="section-space size-2"></div>
</div>
<!-- NEWS -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="simple-item">
                    <div class="title-decor">
                        <div class="title-wrapp">
                            <h2 class="title h2"><?php the_field('our_blog_title'); ?></h2>
                        </div>
                        <div class="motto-text"><?php the_field('our_blog_subtitle'); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="news-wrapp">
            <div class="row row-60">
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status'=>'publish',
                        'posts_per_page' => 2
                    );
                        $the_query = new WP_Query($args);
                    ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col-12 col-sm-6">
                    <div class="news-item">
                        <a href="<?php the_permalink(); ?>" class="product-link"></a>
                        <div class="news-img parallax-bg">
                            <div class="bg bg-lazy-load rellax" data-rellax-speed="1.4" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php echo get_the_post_thumbnail_url(); ?>"></div>
                        </div>
                        <div class="news-contents">
                            <h4 class="title h4"><?php the_title(); ?></h4>
                            <div class="simple-text size-2">
                                <p><?php the_field('short_text'); ?></p>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="button-link"><?php esc_html_e( 'View more', 'healthity' ) ?></a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="simple-item text-center">
                    <a href="<?php the_field('our_blog_button_link'); ?>" class="button"><?php the_field('our_blog_button_text'); ?><span></span><i></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-space"></div>
</div>
<!-- ABOUT -->
<div class="section">
    <div class="page-decor main-about-decor-left">
        <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/main-about-decor-left.png"></div>
    </div>
    <div class="page-decor main-about-decor-right">
        <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/main-about-decor-right.png"></div>
    </div>
    <div class="container">
        <div class="row align-items-lg-center">
            <div class="col-12 col-lg-6 col-xl-4 offset-xl-1">
                <div class="simple-item about-info">
                    <div class="title-decor">
                        <div class="title-wrapp">
                            <h2 class="title h2"><?php the_field('about_us_title'); ?></h2>
                        </div>
                        <div class="motto-text"><?php the_field('about_us_subtitle'); ?></div>
                    </div>
                    <div class="simple-text size-2">
                        <p><?php the_field('about_us_text'); ?></p>
                    </div>
                    <a href="<?php the_field('about_us_button_link'); ?>" class="button"><?php the_field('about_us_button_text'); ?><span></span><i></i></a>
                </div>
            </div>
            <?php 
                $about_us_big_image = get_field('about_us_big_image');
                $about_us_small_image = get_field('about_us_small_image');
                if( $about_us_big_image || $about_us_small_image ):
            ?>
            <div class="col-12 col-lg-6 offset-xl-1">
                <div class="main-about-img img-lazy-load">
                    <img src="<?php bloginfo("template_directory"); ?>/img/placeholder.jpg" data-src="<?php echo $about_us_big_image['url']; ?>" alt="<?php echo $about_us_big_image['alt']; ?>">
                    <img src="<?php bloginfo("template_directory"); ?>/img/placeholder.jpg" data-src="<?php echo $about_us_small_image['url']; ?>" alt="<?php echo $about_us_small_image['alt']; ?>">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="section-space"></div>
</div>
<?php get_footer(); ?>