<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package healthity
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function healthity_woocommerce_setup()
{
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'healthity_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
/*function healthity_woocommerce_scripts() {
	wp_enqueue_style( 'healthity-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'healthity-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'healthity_woocommerce_scripts' );*/

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function healthity_woocommerce_active_body_class($classes)
{
    $classes[] = 'woocommerce-active';

    return $classes;
}

add_filter('body_class', 'healthity_woocommerce_active_body_class');

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function healthity_woocommerce_products_per_page()
{
    return 12;
}

add_filter('loop_shop_per_page', 'healthity_woocommerce_products_per_page');

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function healthity_woocommerce_thumbnail_columns()
{
    return 4;
}

add_filter('woocommerce_product_thumbnails_columns', 'healthity_woocommerce_thumbnail_columns');

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function healthity_woocommerce_loop_columns()
{
    return 3;
}

add_filter('loop_shop_columns', 'healthity_woocommerce_loop_columns');

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function healthity_woocommerce_related_products_args($args)
{
    $defaults = array(
        'posts_per_page' => 3,
        'columns' => 3,
    );

    $args = wp_parse_args($defaults, $args);

    return $args;
}

add_filter('woocommerce_output_related_products_args', 'healthity_woocommerce_related_products_args');

if (!function_exists('healthity_woocommerce_product_columns_wrapper')) {
    /**
     * Product columns wrapper.
     *
     * @return  void
     */
    function healthity_woocommerce_product_columns_wrapper()
    {
        $columns = healthity_woocommerce_loop_columns();
        echo '<div class="columns-' . absint($columns) . '">';
    }
}
add_action('woocommerce_before_shop_loop', 'healthity_woocommerce_product_columns_wrapper', 40);

if (!function_exists('healthity_woocommerce_product_columns_wrapper_close')) {
    /**
     * Product columns wrapper close.
     *
     * @return  void
     */
    function healthity_woocommerce_product_columns_wrapper_close()
    {
        echo '</div>';
    }
}
add_action('woocommerce_after_shop_loop', 'healthity_woocommerce_product_columns_wrapper_close', 40);

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('healthity_woocommerce_wrapper_before')) {
    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function healthity_woocommerce_wrapper_before()
    {
        ?>
        <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <?php
    }
}
add_action('woocommerce_before_main_content', 'healthity_woocommerce_wrapper_before');

if (!function_exists('healthity_woocommerce_wrapper_after')) {
    /**
     * After Content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function healthity_woocommerce_wrapper_after()
    {
        ?>
        </main><!-- #main -->
        </div><!-- #primary -->
        <?php
    }
}
add_action('woocommerce_after_main_content', 'healthity_woocommerce_wrapper_after');

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
 * <?php
 * if ( function_exists( 'healthity_woocommerce_header_cart' ) ) {
 * healthity_woocommerce_header_cart();
 * }
 * ?>
 */

if (!function_exists('healthity_woocommerce_cart_link_fragment')) {
    /**
     * Cart Fragments.
     *
     * Ensure cart contents update when products are added to the cart via AJAX.
     *
     * @param array $fragments Fragments to refresh via AJAX.
     * @return array Fragments to refresh via AJAX.
     */
    function healthity_woocommerce_cart_link_fragment($fragments)
    {
        ob_start();
        healthity_woocommerce_cart_link();
        $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }
}
add_filter('woocommerce_add_to_cart_fragments', 'healthity_woocommerce_cart_link_fragment');

if (!function_exists('healthity_woocommerce_cart_link')) {
    /**
     * Cart Link.
     *
     * Displayed a link to the cart including the number of items present and the cart total.
     *
     * @return void
     */
    function healthity_woocommerce_cart_link()
    {
        ?>
        <div class="header-cart-inner">
            <div class="cart-icon">
                <img src="<?php bloginfo("template_directory"); ?>/icon/shopping-cart.svg" alt="shopping-cart">
                <div class="header-cart-amount-product"><?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?></div>
            </div>
            <div class="header-cart-price">
                <i></i><span><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span></div>
        </div>
        <?php

    }
}

if (!function_exists('healthity_woocommerce_header_cart')) {
    /**
     * Display Header Cart.
     *
     * @return void
     */
    function healthity_woocommerce_header_cart()
    {
        if (is_cart()) {
            $class = 'current-menu-item';
        } else {
            $class = '';
        }
        ?>
        <ul id="site-header-cart" class="site-header-cart">
            <li class="<?php echo esc_attr($class); ?>">
                <?php healthity_woocommerce_cart_link(); ?>
            </li>
            <li>
                <?php
                $instance = array(
                    'title' => '',
                );

                the_widget('WC_Widget_Cart', $instance);
                ?>
            </li>
        </ul>
        <?php
    }
}

add_action('woocommerce_template_loop_product_title', 'product_title');
add_action('woocommerce_after_shop_loop_item_title', 'product_title', 1);


function product_title()
{
    $WC_Product = new WC_Product(get_the_ID());
    $var = $WC_Product->get_short_description();
    echo '<div class="simple-text product-detail"><p>' . $var . '</p></div>';
}

add_action('woocommerce_after_shop_loop_item_title', 'product_price', 10);


function product_price()
{
    global $product;

    if ($product->is_on_sale()) {
        $price = $product->get_sale_price();
        $priceSale = $product->get_regular_price();
    } else {
        $priceSale = 0;
        $price = $product->get_regular_price();
    }

    $content = '<div class="price-product-wrapp"><span class="product-price" itemprop="price"><i itemprop="priceCurrency" content="USD">$</i>' . $price . '</span>';
    if ($priceSale) {
        $content .= '<span class="old-price"><i>$</i>' . $priceSale . '</span>';
    }
    $content .= '</div>';
    echo $content;
}

//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
//add_action('woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30);

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

function woocommerce_ajax_add_to_cart()
{
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

        do_action('woocommerce_ajax_added_to_cart', $product_id);

        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }

        WC_AJAX:: get_refreshed_fragments();
    } else {

        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

        echo wp_send_json($data);
    }

    wp_die();
}


add_action('wp_ajax_woocommerce_ajax_update_to_cart', 'woocommerce_ajax_update_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_update_to_cart', 'woocommerce_ajax_update_to_cart');

function woocommerce_ajax_update_to_cart()
{
    $cartKeySanitized = filter_var($_POST['cart_item_key'], FILTER_SANITIZE_STRING);
    $cartQtySanitized = filter_var($_POST['cart_item_qty'], FILTER_SANITIZE_STRING);
    if (WC()->cart->set_quantity($cartKeySanitized, $cartQtySanitized)) {
        WC_AJAX:: get_refreshed_fragments();
    } else {

        $data = array(
            'error' => true
        );
        echo wp_send_json($data);
    }

    wp_die();
}


add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $checkout_fields ) {
    unset($checkout_fields['order']['order_comments']);
    $checkout_fields['billing']['billing_email']['priority'] = 30;
    $checkout_fields['billing']['billing_company']['priority'] = 40;
    $checkout_fields['billing']['billing_address_1']['priority'] = 50;
    $checkout_fields['billing']['billing_address_2']['priority'] = 60;
    $checkout_fields['billing']['billing_city']['priority'] = 70;
    $checkout_fields['billing']['billing_country']['priority'] = 80;
    $checkout_fields['billing']['billing_state']['priority'] = 90;
    $checkout_fields['billing']['billing_postcode']['priority'] = 100;
    $checkout_fields['billing']['billing_address_1']['label'] = 'Address';
    return $checkout_fields;
}
