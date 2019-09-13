<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
    <div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-10 offset-xl-1">
                        <ul class="breadcrumbs product-detail-breadcrumbs style-2 xs-hide">
                            <li><a href="/"><?php esc_html_e( 'HOME', 'healthity' ) ?></a></li>
                            <li><a href="/shop/"><?php esc_html_e( 'CATALOG', 'healthity' ) ?></a></li>
                            <li><a href="#"><?php the_title(); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-detail-wrapp product-promotion"
                     data-price-product="<?php echo $product->get_price(); ?>">
                    <div class="row">
                        <div class="col-12 col-md-8 offset-md-2 col-lg-6 col-xl-5 offset-xl-1">
                            <div class="swiper-thumbs-wrapper">
                                <div class="product-detail-top-wrapp">
                                    <?php if ($product->is_on_sale()): ?>
                                        <div class="promotion-label"><?php esc_html_e( 'Sale!', 'healthity' ) ?></div>
                                    <?php endif; ?>
                                    <?php if ( get_field('product_badge_bg') ): ?>
                                        <div class="promotion-label custom-badge" style="background-color: <?php the_field('product_badge_bg'); ?>"><?php the_field('product_badge_text'); ?></div>
                                    <?php endif; ?>
                                    <div class="swiper-entry hide-arrow">
                                        <div class="swiper-button-prev"><i></i></div>
                                        <div class="swiper-button-next"><i></i></div>
                                        <div class="swiper-container swiper-thumbs-top"
                                             data-options='{"watchSlidesVisibility":true, "spaceBetween": 0}'>
                                            <div class="swiper-wrapper">
                                                <?php
                                                $attachment_ids = $product->get_gallery_image_ids();
                                                if (is_array($attachment_ids) && !empty($attachment_ids)) {
                                                    foreach ($attachment_ids as $item) {
                                                        ?>
                                                        <div class="swiper-slide">
                                                            <div class="product-top-img">
                                                                <div class="bg bg-lazy-load"
                                                                     style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);"
                                                                     data-bg="<?= wp_get_attachment_url($item); ?>"></div>
                                                            </div>
                                                        </div>
                                                    <?php }
                                                } // No images found
                                                else {

                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-entry hide-arrow">
                                    <div class="swiper-button-prev"><i></i></div>
                                    <div class="swiper-button-next"><i></i></div>
                                    <div class="swiper-container swiper-thumbs-bottom"
                                         data-options='{"slidesPerView": 6, "spaceBetween": 10,"breakpoints":{"767":{"slidesPerView": 4}, "1399":{"slidesPerView": 5}, "1799":{"slidesPerView": 6} }, "watchSlidesVisibility": true, "watchSlidesProgress": true}'>
                                        <div class="swiper-wrapper">
                                            <?php
                                            foreach ($attachment_ids as $item) {
                                                ?>
                                                <div class="swiper-slide">
                                                    <div class="product-bottom-preview">
                                                        <div class="bg bg-lazy-load"
                                                             style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);"
                                                             data-bg="<?= wp_get_attachment_url($item); ?>"></div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            /**
                             * Hook: woocommerce_before_single_product_summary.
                             *
                             * @hooked woocommerce_show_product_sale_flash - 10
                             * @hooked woocommerce_show_product_images - 20
                             */
                            //do_action( 'woocommerce_before_single_product_summary' );
                            ?>
                        </div>
                        <div class="summary entry-summary col-12 col-lg-6 col-xl-5">
                            <div class="product-detail-info">
                                <?php
                                /**
                                 * Hook: woocommerce_single_product_summary.
                                 *
                                 * @hooked woocommerce_template_single_title - 5
                                 * @hooked woocommerce_template_single_rating - 10
                                 * @hooked woocommerce_template_single_price - 10
                                 * @hooked woocommerce_template_single_excerpt - 20
                                 * @hooked woocommerce_template_single_add_to_cart - 30
                                 * @hooked woocommerce_template_single_meta - 40
                                 * @hooked woocommerce_template_single_sharing - 50
                                 * @hooked WC_Structured_Data::generate_product_data() - 60
                                 */
                                do_action('woocommerce_single_product_summary');
                                ?>

                                <?php get_template_part('template-parts/share'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-space size-2"></div>
        </div>
    </div>
<?php
/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
do_action('woocommerce_after_single_product_summary');
?>
<?php do_action('woocommerce_after_single_product'); ?>