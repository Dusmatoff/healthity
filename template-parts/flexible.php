<?php
    // Check if Flexible Content have blocks
    if( have_rows('flexible_content') ):
    while ( have_rows('flexible_content') ) : the_row();
    
    /* Block - Tip */
    if( get_row_layout() == 'tip' ):
     the_sub_field('tip_text');
     
    /* Block - Slider */
    elseif( get_row_layout() == 'slider' ): ?>
<div class="swiper-entry simple-slider arrow-pos-2">
    <div class="swiper-button-prev"><i></i></div>
    <div class="swiper-button-next"><i></i></div>
    <div class="swiper-container" data-options='{"loop":1, "autoplay": { "delay": 7000 }}'>
        <div class="swiper-wrapper">
            <?php $slider_images = get_sub_field('slider_images'); 
            if($slider_images): 
                foreach( $slider_images as $slider_image ): ?>
            <div class="swiper-slide parallax-bg">
                <div class="bg bg-lazy-load rellax" data-rellax-speed="1.4" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php echo $slider_image['url']; ?>"></div>
            </div>
            <?php 
                endforeach; 
            endif; ?>
        </div>
        <div class="swiper-pagination swiper-pagination-relative"></div>
    </div>
</div>
<?php /* Block - Video */
    elseif( get_row_layout() == 'video' ): ?>
<?php $video_thumbnail = get_sub_field('video_thumbnail'); $video_id = get_sub_field('video_id'); if($video_thumbnail && $video_id): ?>
<div class="simple-video">
    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php echo $video_thumbnail; ?>"></div>
    <a class="play-button video-open" href="https://www.youtube.com/embed/<?php echo $video_id; ?>?autoplay=1">
        <div class="bg" style="background-image: url(<?php bloginfo("template_directory"); ?>/icon/youtube.svg);"></div>
    </a>
</div>
<?php endif; ?>
<?php /* Block - Title */
    elseif( get_row_layout() == 'block_title' ): ?>
<div class="row">
    <div class="col-12 col-xl-10 offset-xl-1">
        <div class="simple-item text-center">
            <div class="title-decor size-2">
                <div class="title-wrapp">
                    <h2 class="title h2"><?php the_sub_field('title_text'); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /* Block - Blockquote */
    elseif( get_row_layout() == 'blockquote' ): ?>
<blockquote><?php the_sub_field('blockquote_text'); ?></blockquote>
<?php /* Block - Single image */
    elseif( get_row_layout() == 'single__image' ): ?>
<div class="row">
    <div class="col-12 col-xl-10 offset-xl-1">
        <div class="simple-item simple-page no-margin">
            <?php $image = get_sub_field('image'); if($image): ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="section-space"></div>
<?php /* Block - HEALTHY LIFESTYLE */
    elseif( get_row_layout() == 'healthy_lifestyle' ): ?>
<div class="row align-items-lg-center about-item">
    <div class="col-12 col-lg-5 offset-xl-1">
        <div class="about-block-img parallax-bg">
            <div class="bg bg-lazy-load rellax" data-rellax-speed="1.4" style="background-image: url(img/placeholder.jpg);" data-bg="<?php the_sub_field('healthy_lifestyle_image'); ?>"></div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-5">
        <div class="simple-item about-info simple-page">
            <?php the_sub_field('healthy_lifestyle_text'); ?>
        </div>
    </div>
</div>
<div class="section-space"></div>
<?php /* Block - OUR MISSION */
    elseif( get_row_layout() == 'our_mission' ): ?>
<div class="row">
    <div class="col-12 col-xl-8 offset-xl-2">
        <div class="simple-item">
            <div class="title-decor size-2 margin-2">
                <div class="title-wrapp">
                    <h3 class="title h3"><?php the_sub_field('our_mission_title'); ?></h3>
                </div>
            </div>
            <div class="simple-text size-2">
                <?php the_sub_field('our_mission_text'); ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-8 offset-xl-2">
        <div class="simple-item simple-page">
            <?php $our_mission_image = get_sub_field('our_mission_image'); if($our_mission_image): ?>
            <img src="<?php echo $our_mission_image['url'] ?>" alt="<?php echo $our_mission_image['alt'] ?>">
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="section-space"></div>
<?php /* Block - BENEFITS OF WORKING */
    elseif( get_row_layout() == 'benefits_of_working' ): ?>
<div class="row align-items-lg-center about-item">
    <div class="col-12 col-lg-5 order-lg-2">
        <div class="swiper-entry hide-arrow">
            <div class="swiper-button-prev"><i></i></div>
            <div class="swiper-button-next"><i></i></div>
            <div class="swiper-container" data-options='{"loop":1, "autoplay": { "delay": 7000 }}'>
                <div class="swiper-wrapper">
                    <?php $benefits_of_working_slider = get_sub_field('benefits_of_working_slider'); 
                        if($benefits_of_working_slider): 
                            foreach( $benefits_of_working_slider as $benefits_of_working_slider_image ): ?>
                    <div class="swiper-slide">
                        <div class="about-block-img parallax-bg">
                            <div class="bg bg-lazy-load rellax" data-rellax-speed="1.4" style="background-image: url(img/placeholder.jpg);" data-bg="<?php echo $benefits_of_working_slider_image['url']; ?>"></div>
                        </div>
                    </div>
                    <?php 
                            endforeach; 
                        endif; ?>
                </div>
                <div class="swiper-pagination swiper-pagination-relative"></div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1 order-lg-1">
        <div class="simple-item about-info info-left simple-page">
            <?php the_sub_field('benefits_of_working_text'); ?>
        </div>
    </div>
</div>
<div class="section-space"></div>
<?php /* Block - OUR BENEFITS */
    elseif( get_row_layout() == 'our_benefits' ): ?>
<div class="row">
    <div class="col-12 col-xl-10 offset-xl-1">
        <div class="simple-item text-center">
            <div class="title-decor size-2">
                <div class="title-wrapp">
                    <h3 class="title h3"><?php the_sub_field('our_benefits_title'); ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-10 offset-xl-1">
        <div class="swiper-entry">
            <div class="swiper-button-prev"><i></i></div>
            <div class="swiper-button-next"><i></i></div>
            <div class="swiper-container" data-options='{"loop":1, "speed":700, "slidesPerView":"auto", "autoplay": { "delay": 7000 }, "autoHeight": true, "slidesPerView": 3, "spaceBetween": 20, "breakpoints":{"767":{"slidesPerView": 1}, "991":{"slidesPerView": 2}, "1399":{"slidesPerView": 3}, "1799":{"slidesPerView": 3} } }'>
                <div class="swiper-wrapper">
                    <?php while ( have_rows('benefits_carousel') ) : the_row(); 
                        $benefits_carousel_svg_icon = get_sub_field('benefits_carousel_svg_icon');
                        $benefits_carousel_top_icon = get_sub_field('benefits_carousel_top_icon');
                    ?>
                    <div class="swiper-slide">
                        <div class="benefits-item">
                            <div class="benefits-img img-lazy-load">
                                <?php if($benefits_carousel_svg_icon): ?>
                                <div class="vertical-align">
                                    <img src="<?php bloginfo('template_directory'); ?>/img/placeholder.jpg" data-src="<?php echo $benefits_carousel_svg_icon['url']; ?>"  alt="<?php echo $benefits_carousel_svg_icon['alt']; ?>">
                                </div>
                                <?php endif; ?>
                                <?php if($benefits_carousel_top_icon): ?>
                                <div class="benefits-top-icon img-lazy-load">
                                    <img src="<?php bloginfo('template_directory'); ?>/img/placeholder.jpg" data-src="<?php echo $benefits_carousel_top_icon['url']; ?>"  alt="<?php echo $benefits_carousel_top_icon['alt']; ?>">
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="benefits-content">
                                <div class="h4 title"><?php the_sub_field('benefits_carousel_title'); ?></div>
                                <div class="simple-text">
                                    <p><?php the_sub_field('benefits_carousel_description'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-pagination d-xl-none"></div>
            </div>
        </div>
    </div>
</div>
<div class="section-space"></div>
<?php /* Block - HOW WE CREATE PRODUCTS */
    elseif( get_row_layout() == 'how_we_create_products' ): ?>
<div class="row">
    <div class="col-12 col-xl-10 offset-xl-1">
        <div class="simple-item text-center">
            <div class="title-decor size-2">
                <div class="title-wrapp">
                    <h3 class="title h3"><?php the_sub_field('how_we_create_products_title'); ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-10 offset-xl-1">
        <div class="swiper-entry simple-slider arrow-pos-2">
            <div class="swiper-button-prev"><i></i></div>
            <div class="swiper-button-next"><i></i></div>
            <div class="swiper-container" data-options='{"loop":1, "autoplay": { "delay": 7000 }}'>
                <div class="swiper-wrapper">
                    <?php while ( have_rows('how_we_create_products_slider') ) : the_row(); ?>
                    <div class="swiper-slide parallax-bg">
                        <div class="bg bg-lazy-load rellax" data-rellax-speed="1.4" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/placeholder.jpg);" data-bg="<?php the_sub_field('how_we_create_products_slider_image'); ?>"></div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-pagination d-xl-none"></div>
            </div>
        </div>
    </div>
</div>
<div class="section-space"></div>
<?php /* Block - WHAT AND HOW TO EAT? */
    elseif( get_row_layout() == 'what_and_how_to_eat' ): ?>
<div class="row">
    <div class="col-12 col-xl-8 offset-xl-2">
        <div class="simple-item simple-page">
            <?php the_sub_field('what_and_how_text'); ?>
        </div>
    </div>
</div>
<div class="section-space"></div>
<?php /* Block - BLOCK WITH BG IMAGE */
    elseif( get_row_layout() == 'block_with_bg_image' ): ?>
<div class="row">
    <div class="col-12">
        <div class="block-with-bg parallax-bg">
            <div class="bg bg-lazy-load rellax" data-rellax-speed="2" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php the_sub_field('bg_img'); ?>"></div>
            <div class="opacity"></div>
            <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <div class="simple-item content-block">
                        <div class="h3 title color-2"><?php the_sub_field('block_with_bg_image_title'); ?></div>
                        <div class="simple-text size-2 color-2">
                            <p><?php the_sub_field('block_with_bg_image_text'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /* Block - Simple item */
    elseif( get_row_layout() == 'simple_item_block' ): ?>
    <div class="simple-item simple-page">
        <?php the_sub_field('simple_item_text'); ?>
    </div>
<div class="section-space size-3"></div>
<?php /* Block - HOW TO COOK HEALTHY FOOD? */
    elseif( get_row_layout() == 'how_to_cook_healthy_food' ): ?>
<div class="row">
    <div class="col-12 col-xl-8 offset-xl-2">
        <div class="simple-item text-center">
            <div class="title-decor size-2">
                <div class="title-wrapp">
                    <h2 class="title h2"><?php the_sub_field('how_to_cook_healthy_food_title'); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-8 offset-xl-2">
        <div class="simple-item simple-page">
            <?php the_sub_field('how_to_cook_healthy_food_text'); ?>
            <?php $how_to_cook_healthy_food_video_thumbnail = get_sub_field('how_to_cook_healthy_food_video_thumbnail'); $how_to_cook_healthy_food_video_id = get_sub_field('how_to_cook_healthy_food_video_id'); if($how_to_cook_healthy_food_video_thumbnail && $how_to_cook_healthy_food_video_id): ?>
            <div class="simple-video">
                <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php the_sub_field('how_to_cook_healthy_food_video_thumbnail'); ?>"></div>
                <a class="play-button video-open" href="https://www.youtube.com/embed/<?php the_sub_field('how_to_cook_healthy_food_video_id'); ?>?autoplay=1">
                    <div class="bg" style="background-image: url(<?php bloginfo("template_directory"); ?>/icon/youtube.svg);"></div>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="section-space"></div>
<?php endif;
    endwhile;
    else :
    // Not found block
    endif;?>