<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<?php if (is_shop()): //show filter open container only in shop page  ?>
<div <?php wc_product_class("grid-item filter-2"); ?>>
    <div class="col-12 col-sm-6 col-lg-4">
        <?php endif;
        $isSale = '';
        if ($product->is_on_sale() || get_field('product_badge_bg')) {
            $isSale = 'product-promotion';
        }
        ?>
        <div class="product-item <?= $isSale; ?>">
            <?php if ($product->is_on_sale()) : ?>

                <?php echo apply_filters('woocommerce_sale_flash', '<div class="promotion-label">' . esc_html__('Sale!', 'healthity') . '</div>', $post, $product); ?>

            <?php endif;
            if ( get_field('product_badge_bg') ): ?>
            
                <div class="promotion-label custom-badge" style="background-color: <?php the_field('product_badge_bg'); ?>"><?php the_field('product_badge_text'); ?></div>
                
             <?php endif; 


            /**
             * Hook: woocommerce_before_shop_loop_item.
             *
             * @hooked woocommerce_template_loop_product_link_open - 10
             */
            do_action('woocommerce_before_shop_loop_item');

            /**
             * Hook: woocommerce_before_shop_loop_item_title.
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
            do_action('woocommerce_before_shop_loop_item_title');

            /**
             * Hook: woocommerce_shop_loop_item_title.
             *
             * @hooked woocommerce_template_loop_product_title - 10
             */
            do_action('woocommerce_shop_loop_item_title');

            /**
             * Hook: woocommerce_after_shop_loop_item_title.
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action('woocommerce_after_shop_loop_item_title');

            /**
             * Hook: woocommerce_after_shop_loop_item.
             *
             * @hooked woocommerce_template_loop_product_link_close - 5
             * @hooked woocommerce_template_loop_add_to_cart - 10
             */
            do_action('woocommerce_after_shop_loop_item');
            ?>
        </div>
        <?php if (is_shop()): ?>
    </div>
</div>

<?php endif;

//show filter close container only in shop page ?>
