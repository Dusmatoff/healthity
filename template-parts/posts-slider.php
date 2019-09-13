<!-- SIMILAR POSTS -->
<?php
$args = array('post_type' => 'post', 'post_status'=>'publish', 'posts_per_page' => 4 );
$the_query = new WP_Query($args);
if ( $the_query->have_posts() ) : ?>
<div class="section">
   <div class="container">
      <div class="row">
         <div class="col-12 col-xl-10 offset-xl-1">
            <div class="simple-item text-center">
               <div class="title-decor size-2">
                  <div class="title-wrapp">
                     <h2 class="title h2"><?php esc_html_e( 'Similar Posts', 'healthity' ) ?></h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12 col-xl-10 offset-xl-1">
            <div class="swiper-entry arrow-pos-2">
               <div class="swiper-button-prev"><i></i></div>
               <div class="swiper-button-next"><i></i></div>
               <div class="swiper-container" data-options='{"loop":1, "speed":700, "slidesPerView":"auto", "autoplay": { "delay": 7000 }, "autoHeight": true, "slidesPerView": 2, "spaceBetween": 60, "breakpoints":{"767":{"slidesPerView": 1}, "991":{"slidesPerView": 2}, "1399":{"slidesPerView": 3}, "1799":{"slidesPerView": 2} } }'>
                  <div class="swiper-wrapper">
                     <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                     <div class="swiper-slide">
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
                     
                  </div>
                  <div class="swiper-pagination swiper-pagination-relative margin-top-2"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="section-space"></div>
</div>
<?php endif; ?>