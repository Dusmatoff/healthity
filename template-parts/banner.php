<!-- DETAIL BANNER -->
<div class="section detail-banner">
   <div class="bg bg-lazy-load banner-bg" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/bg-banner.jpg"></div>
   <div class="container">
      <div class="banner">
         <div class="banner-inner">
            <div class="banner-align align-bottom size-2 parallax-bg">
               <div class="bg bg-lazy-load rellax" data-rellax-speed="2" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php echo get_the_post_thumbnail_url(); ?>"></div>
               <div class="opacity"></div>
               <div class="row">
                  <div class="col-12 col-xl-10 offset-xl-1">
                     <div class="simple-item banner-info">
                        <h1 class="h1 title color-2"><?php the_title(); ?></h1>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>