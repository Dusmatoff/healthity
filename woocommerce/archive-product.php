<?php
    /**
     * The Template for displaying product archives, including the main shop page which is a post type archive
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
     *
     * HOWEVER, on occasion WooCommerce will need to update template files and you
     * (the theme developer) will need to copy the new files to your theme to
     * maintain compatibility. We try to do this as little as possible, but it does
     * happen. When this occurs the version of the template file will be bumped and
     * the readme will list any important changes.
     *
     * @see https://docs.woocommerce.com/document/template-structure/
     * @package WooCommerce/Templates
     * @version 3.4.0
     */
    
    defined( 'ABSPATH' ) || exit;
    
    get_header( 'shop' );
    
    /**
     * Hook: woocommerce_before_main_content.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     * @hooked WC_Structured_Data::generate_website_data() - 30
     */
    do_action( 'woocommerce_before_main_content' );
    
    ?>
<div class="section margin-section">
    <div class="page-decor catalog-decor">
        <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/catalog-decor.png"></div>
    </div>
    <div class="container">
        <?php if( get_field('our_products_title', '277') ): ?>
        <div class="row">
            <div class="col-12">
                <div class="simple-item text-center">
                    <div class="title-decor">
                        <div class="title-wrapp">
                            <h2 class="title h2"><?php the_field('our_products_title', '277'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="product-wrapps izotope-block">
            <div class="filter-list">
                <div class="select-izotop-category"><?php esc_html_e( 'All', 'healthity' ) ?></div>
                <ul>
                    <li data-filter="*" class="active all"><span><?php esc_html_e( 'All', 'healthity' ) ?></span></li>
                    <?php
                        $taxonomy     = 'product_cat';
                        $orderby      = 'name';  
                        $show_count   = 0;      // 1 for yes, 0 for no
                        $pad_counts   = 0;      // 1 for yes, 0 for no
                        $hierarchical = 0;      // 1 for yes, 0 for no  
                        $title        = '';  
                        $empty        = 1;
                        
                        $args = array(
                               'taxonomy'     => $taxonomy,
                               'orderby'      => $orderby,
                               'show_count'   => $show_count,
                               'pad_counts'   => $pad_counts,
                               'hierarchical' => $hierarchical,
                               'title_li'     => $title,
                               'hide_empty'   => $empty
                        );
                        $all_categories = get_categories( $args );
                        foreach ($all_categories as $cat) {
                          if($cat->category_parent == 0) {
                              $category_id = $cat->term_id;       
                              echo '<li data-filter=".product_cat-'. $cat->slug .'">'. $cat->name .'</li>';
                        
                              $args2 = array(
                                      'taxonomy'     => $taxonomy,
                                      'child_of'     => 0,
                                      'parent'       => $category_id,
                                      'orderby'      => $orderby,
                                      'show_count'   => $show_count,
                                      'pad_counts'   => $pad_counts,
                                      'hierarchical' => $hierarchical,
                                      'title_li'     => $title,
                                      'hide_empty'   => $empty
                              );
                              $sub_cats = get_categories( $args2 );
                              if($sub_cats) {
                                  foreach($sub_cats as $sub_category) {
                                      echo  $sub_category->name ;
                                  }   
                              }
                          }       
                        }
                        ?>
                </ul>
            </div>
            <?php
                if ( woocommerce_product_loop() ) {
                
                	/**
                	 * Hook: woocommerce_before_shop_loop.
                	 *
                	 * @hooked woocommerce_output_all_notices - 10
                	 * @hooked woocommerce_result_count - 20
                	 * @hooked woocommerce_catalog_ordering - 30
                	 */
                	//do_action( 'woocommerce_before_shop_loop' );
                	
                	woocommerce_product_loop_start();
                
                	if ( wc_get_loop_prop( 'total' ) ) {
                		while ( have_posts() ) {
                			the_post();
                
                			/**
                			 * Hook: woocommerce_shop_loop.
                			 *
                			 * @hooked WC_Structured_Data::generate_product_data() - 10
                			 */
                			do_action( 'woocommerce_shop_loop' );
                
                			wc_get_template_part( 'content', 'product' );
                		}
                	}
                
                	woocommerce_product_loop_end();
                
                	/**
                	 * Hook: woocommerce_after_shop_loop.
                	 *
                	 * @hooked woocommerce_pagination - 10
                	 */
                	do_action( 'woocommerce_after_shop_loop' );
                } else {
                	/**
                	 * Hook: woocommerce_no_products_found.
                	 *
                	 * @hooked wc_no_products_found - 10
                	 */
                	do_action( 'woocommerce_no_products_found' );
                }
                
                /**
                 * Hook: woocommerce_after_main_content.
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action( 'woocommerce_after_main_content' ); ?>
        </div>
    </div>
    <div class="section-space size-2"></div>
</div>
<?php
/**
* Hook: woocommerce_sidebar.
*
* @hooked woocommerce_get_sidebar - 10
*/
do_action( 'woocommerce_sidebar' );
get_footer( 'shop' );