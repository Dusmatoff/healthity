<?php
   /*
   Template Name: Blog
   */
   ?>
<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header(); ?>
<!-- NEWS -->
<div class="section margin-section">
   <div class="page-decor review-decor-left">
      <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/review-decor-left.png"></div>
   </div>
   <div class="container">
       <?php if( get_field('our_blog_title') ): ?>
      <div class="row">
         <div class="col">
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
      <?php endif; ?>
      <div class="news-wrapp">
         <div class="row row-60">
            <?php
                // Protect against arbitrary paged values
                $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                $posts_count = get_option('page_for_posts');
                $args = array(
                   'post_type' => 'post',
                   'post_status'=>'publish',
                   'posts_per_page' => $posts_count,
                   'paged' => $paged,
                );
                
                $the_query = new WP_Query($args);
            ?>
            <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="col-12 col-sm-6">
               <div class="news-item">
                  <a href="<?php the_permalink(); ?>" class="product-link"></a>
                  <div class="news-img parallax-bg">
                     <div class="bg bg-lazy-load rellax" data-rellax-speed="1.4" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php echo get_the_post_thumbnail_url(); ?>"></div>
                  </div>
                  <div class="news-contents">
                     <h4 class="title h4"><?php the_title(); ?></h4>
                     <?php if( get_field('short_text') ): ?>
                     <div class="simple-text size-2">
                        <p><?php the_field('short_text'); ?></p>
                     </div>
                     <?php endif; ?>
                     <a href="<?php the_permalink(); ?>" class="button-link"><?php esc_html_e( 'View more', 'healthity' ) ?></a>
                  </div>
               </div>
            </div>
            <?php endwhile; ?>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="custom-pagination">
                  <div class="pagination">
                     <?php
                        echo paginate_links( array(
                            'format'  => 'page/%#%',
                            'type'    => 'list',
                            'current' => $paged,
                            'total'   => $the_query->max_num_pages,
                            'show_all' => true,
                            'prev_next' => false,
                            'end_size'  => 5,
                            'mid_size' => 2,
                        ) );
                        ?>
                  </div>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="section-space"></div>
</div>
<?php get_footer(); ?>