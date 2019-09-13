<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */
if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_mini_cart');
?>

<?php if (!WC()->cart->is_empty()) : ?>

    <div class=" woocommerce-mini-cart cart_list product_list_widget cart-list-product <?php echo esc_attr($args['list_class']); ?>">
        <?php
        do_action('woocommerce_before_mini_cart_contents');

        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
                $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
                $thumbnail = wp_get_attachment_image_src($_product->get_image_id())[0];
//                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key)[0];
                $product_price = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                if ($_product->is_on_sale()) {
                    $price = $_product->get_sale_price();
                    $priceSale = $_product->get_regular_price();
                } else {
                    $priceSale = 0;
                    $price = $_product->get_regular_price();
                }

                ?>
                <div class="woocommerce-mini-cart-item cart-product-item product-promotion"
                     data-price-product="<?= $price; ?>"
                     data-cart-item-key="<?= $cart_item_key; ?>"
                >

                    <div class="left-block">
                        <a href="<?php echo esc_url($product_permalink); ?>">

                            <span class="bg bg-lazy-load"
                                  style="background-image: url(<?= $thumbnail; ?>);"
                                  data-bg="<?= $thumbnail; ?>">
                            </span>
                        </a>
                    </div>
                    <div class="right-block">
                        <div class="product-info">
                            <h4 class="title h4 product-title"><a
                                        href="<?php echo esc_url($product_permalink); ?>"><?= $_product->get_title(); ?></a>
                            </h4>
                            <div class="product-desc"><?= $_product->get_short_description(); ?></div>
                        </div>
                        <div class="cart-product-price">

                            <span class="product-price"><i>$</i><?= $price; ?></span>
                            <?php if ($_product->is_on_sale()) { ?>
                                <span class="old-price"><i>$</i><?= $priceSale; ?></span>
                            <?php } ?>
                        </div>
                        <div class="select-quantity-wrapp">
                            <div class="select-quantity">
                                <div class="current-quantity"

                                     data-quantity="<?= $cart_item['quantity']; ?>"><?= $cart_item['quantity']; ?> pack
                                </div>
                                <!--                                --><?php //echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf('%s &times; %s', $cart_item['quantity'], $product_price) . '</span>', $cart_item, $cart_item_key); ?>
                                <?php
                                $packs = [1, 3, 6];
                                ?>
                                <ul>
                                    <?php foreach ($packs as $pack) { ?>
                                        <li <?= $pack == $cart_item['quantity'] ? 'class="active"' : ''; ?>data-quantity="<?= $pack; ?>"><?= $pack; ?>
                                            pack
                                        </li>
                                    <?php }
                                    if (!in_array($cart_item['quantity'], $packs)) { ?>
                                        <li class="active"
                                            data-quantity="<?= $cart_item['quantity']; ?>"><?= $cart_item['quantity']; ?>
                                            pack
                                        </li>
                                    <?php }
                                    ?>
                                </ul>
                            </div>
                            <?php echo wc_get_formatted_cart_item_data($cart_item); ?>
                        </div>
                        <div class="cost-total"><i>$</i><span><?= wc_get_price_excluding_tax($_product); ?></span></div>
                    </div>
                    <a
                            href="<?= esc_url(wc_get_cart_remove_url($cart_item_key)); ?>"
                            aria-label="<?= __('Remove this item', 'woocommerce'); ?>"
                            data-product_id="<?= esc_attr($product_id); ?>"
                            data-cart_item_key="<?= esc_attr($cart_item_key); ?>"
                            data-product_sku="<?= esc_attr($_product->get_sku()); ?>"
                            class="remove remove-product remove_from_cart_button">
                    </a>
                </div>

                <?php
            }
        }

        do_action('woocommerce_mini_cart_contents');
        ?>
    </div>
    <div class="cart-product-total">
        <div class="product-total-wrapp">
            <div class="product-total-text"><?php esc_html_e( 'Cart Totals:', 'healthity' ) ?></div>
            <div class="order-amount"><span><?php echo WC()->cart->get_cart_total(); ?></span></div>
        </div>
        <div class="continue-shopping">
            <div class="continue-shopping-text">continue shopping</div>
            <!--            --><?php //do_action('woocommerce_widget_shopping_cart_before_buttons'); ?>
            <!--            --><?php //do_action('woocommerce_widget_shopping_cart_buttons'); ?>
            <a href="/checkout/" class="button">proceed to checkout<span></span><i></i></a>
        </div>
    </div>

    <?php else : ?>

        <p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'healthity' ) ?></p>

    <?php endif; ?>

    <?php do_action('woocommerce_after_mini_cart'); ?>

