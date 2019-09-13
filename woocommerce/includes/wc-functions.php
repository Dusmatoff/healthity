<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Remove default woocommerce blocks
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20); // Remove default woocommerce breadcrumb
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40); // Remove product meta

add_filter('wc_add_to_cart_message_html', 'remove_add_to_cart_message'); // Remove added to cart message
function remove_add_to_cart_message()
{
    return;
}

/**
 * Short description
 */
add_filter('woocommerce_short_description', 'healthity_woocommerce_short_description'); // Short description in product page
function healthity_woocommerce_short_description($content)
{
    ?>
    <div class="product-description">
        <div class="simple-text">
            <?php echo $content; ?>
        </div>
    </div>
    <?php
}

/**
 * Remove default open and close link in content product
 */
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);


/**
 * Link and image in content product
 */
add_action('woocommerce_before_shop_loop_item_title', 'healthity_woocommerce_template_loop_product_thumbnail_open', 5);
function healthity_woocommerce_template_loop_product_thumbnail_open()
{
    ?>
    <a href="<?php echo get_permalink(); ?>" class="product-link"></a>
    <div class="product-item-top">
    <div class="product-item-img img-lazy-load">

    <?php
}

add_action('woocommerce_before_shop_loop_item_title', 'healthity_woocommerce_template_loop_product_thumbnail_close', 30);
function healthity_woocommerce_template_loop_product_thumbnail_close()
{
    ?>
    </div>
    <div class="quick-view open-popup" data-rel="<?= get_the_ID(); ?>"><?php esc_html_e( 'quick View', 'healthity' ) ?></div>
    </div>

    <?php
}

/**
 * Title in content product
 */
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10); // Remove default display title
add_action('woocommerce_shop_loop_item_title', 'healthity_woocommerce_template_loop_product_title', 10);
function healthity_woocommerce_template_loop_product_title()
{
    echo '<div class="product-item-bottom"> <div class="middle-title"><div class="title h4" itemprop="name">' . get_the_title() . '</div></div>';
}

/**
 * Add </div> for <div class="product-item-bottom">
 */
add_action('woocommerce_after_shop_loop_item', 'healthity_add_product_item_bottom_div');
function healthity_add_product_item_bottom_div()
{
    echo '</div>';
}

/**
 * Remove add to cart from content product
 */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


/**
 * OTHER PRODUCTS slider in product page
 */
add_action('woocommerce_after_single_product', 'healthity_woocommerce_after_single_product', 5);
function healthity_woocommerce_after_single_product()
{
    ?>
    <!-- OTHER PRODUCTS -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-10 offset-xl-1">
                    <div class="simple-item text-center">
                        <div class="title-decor size-2">
                            <div class="title-wrapp">
                                <h2 class="title h2"><?php esc_html_e( 'Other Products', 'healthity' ) ?></h2>
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
                        <div class="swiper-container"
                             data-options='{"speed":700, "slidesPerView":"auto", "autoHeight": true, "slidesPerView": 3, "spaceBetween": 40, "breakpoints":{"767":{"slidesPerView": 1}, "1199":{"slidesPerView": 2}, "1399":{"slidesPerView": 3}, "1799":{"slidesPerView": 3} } }'>
                            <div class="swiper-wrapper">
                                <?php
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => 12
                                );
                                $loop = new WP_Query($args);
                                if ($loop->have_posts()) {
                                    while ($loop->have_posts()) : $loop->the_post(); ?>
                                        <div class="swiper-slide">
                                            <?php wc_get_template_part('content', 'product'); ?>
                                        </div>
                                    <?php endwhile;
                                } else {
                                    echo __('No products found');
                                }
                                wp_reset_postdata(); ?>
                            </div>
                            <div class="swiper-pagination swiper-pagination-relative margin-top-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-space"></div>
    </div>

    <?php
}

/**
 * Price in content product
 */
/*remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10); 
add_action('woocommerce_after_shop_loop_item_title', 'healthity_woocommerce_template_loop_price');
function healthity_woocommerce_template_loop_price($regular_price, $sale_price){
    echo '<div class="price-product-wrapp"><span class="product-price">' . ( is_numeric( $regular_price ) ? wc_price( $regular_price ) : $regular_price ) . '</span> <span class="old-price">' . ( is_numeric( $sale_price ) ? wc_price( $sale_price ) : $sale_price ) . '</span></div>';
}*/


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'product_price', 5);
add_action('woocommerce_single_product_summary', 'get_single_add_to_cart', 30);
function get_single_add_to_cart() {
    global $product;
    $id = get_the_ID();
//    $product = new WC_Product($id);

    if ($product->is_on_sale()) {
        $price = $product->get_sale_price();
        $priceSale = $product->get_regular_price();
    } else {
        $priceSale = 0;
        $price = $product->get_regular_price();
    }
    ?>
    <form>

        <div class="product-detail-quantity">
            <span class="quantity-label">Quantity</span>
            <div class="quantity-wrapp">
                <span data-quantity="1" class="active">1 <?php esc_html_e( 'pack', 'healthity' ) ?></span>
                <span data-quantity="3">3 <?php esc_html_e( 'pack', 'healthity' ) ?></span>
                <span data-quantity="6">6 <?php esc_html_e( 'pack', 'healthity' ) ?></span>
            </div>

            <div class="total-summ-quantity"><i>$</i><span><?= $price; ?></span>
            </div>
        </div>
        <div class="button full-width add-cart"><?php esc_html_e( 'add to cart', 'healthity' ) ?><span></span><i></i>
        </div>
        <input type="hidden" name="product_id" value="<?= $id; ?>">
        <input type="hidden" name="quantity" value="1">

    </form>
<?php
}

