<?php
   /**
    * Template part for displaying posts
    *
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package healthity
    */
   
   ?>
<!-- DETAIL BANNER -->
<div class="section detail-banner">
   <div class="bg bg-lazy-load banner-bg" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo('template_directory'); ?>/img/bg-banner.jpg"></div>
   <div class="container">
      <div class="banner">
         <div class="banner-inner">
            <div class="banner-align align-bottom size-2 parallax-bg">
               <div class="bg bg-lazy-load rellax" data-rellax-speed="2" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/placeholder.jpg);" data-bg="<?php the_field('banner_for_single_post'); ?>"></div>
               <div class="opacity"></div>
               <div class="row">
                  <div class="col-12 col-xl-10 offset-xl-1">
                     <div class="simple-item banner-info">
                        <div class="news-date"><?php echo get_the_date( 'F j, Y' ); ?></div>
                        <h1 class="h1 title color-2"><?php the_title(); ?></h1>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <ul class="breadcrumbs xs-hide">
            <li><a href="<?php echo get_site_url(); ?>"><?php esc_html_e( 'Home', 'healthity' ) ?></a></li>
            <li><a href="<?php echo esc_url( get_page_link(66) ); ?>"><?php echo get_the_title(66); ?></a></li>
            <li><a href="#"><?php the_title(); ?></a></li>
         </ul>
      </div>
   </div>
</div>
<div class="section">
   <div class="container">
      <div class="row">
         <div class="col-12 col-xl-8 offset-xl-2">
            <div class="simple-item simple-page">
                <?php get_template_part('template-parts/flexible'); ?>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12 col-xl-8 offset-xl-2">
            <div class="section-space size-5"></div>
            <?php get_template_part('template-parts/share'); ?>
         </div>
      </div>
   </div>
   <div class="section-space"></div>
</div>
<?php get_template_part('template-parts/posts-slider'); ?>