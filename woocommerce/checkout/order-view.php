<div class="order-wrapp-right-column">
    <div class="order-list-product-wrapp">
        <div class="change-order-wrapp">
            <div class="change-order open-popup" data-rel="1">Change order</div>
        </div>
        <div class="order-list-product">

            <?php
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
//                                                    dd($cart_item);
                $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

                if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
                    $thumbnail = wp_get_attachment_image_src($_product->get_image_id())[0];
                    ?>
                    <div class="order-product-item">
                        <div class="left-block">
                                                    <span class="bg bg-lazy-load"
                                                          style="background-image: url(img/placeholder.jpg);"
                                                          data-bg="<?= $thumbnail; ?>"></span>
                            <div class="product-quantity"><?= $cart_item['quantity']; ?></div>
                        </div>
                        <div class="right-block">
                            <div class="product-info">
                                <h6 class="title h6 product-title"><?= $_product->get_name(); ?></h6>
                                <div class="product-pack"><?= $cart_item['quantity']; ?>pack
                                </div>
                            </div>
                            <div class="cost-total"><?= WC()->cart->get_product_subtotal($_product, $cart_item['quantity']); ?></div>
                        </div>
                    </div>
                    <?php
                }
            } ?>
        </div>
        <div class="bottom-order-info">
            <div class="table-wrapp">
                <table>
                    <tr>
                        <td>
                            <div class="order-info-item-caption">Subtotal</div>
                        </td>
                        <td>
                            <div class="cost-total"><?php echo WC()->cart->get_cart_total(); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="order-info-item-caption">Shipping</div>
                        </td>
                        <td>
                            <div class="calculated-text">Calculated at next step
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="bottom-order-info total">
            <div class="table-wrapp">
                <table>
                    <tr>
                        <td>
                            <div class="order-info-item-caption">Total</div>
                        </td>
                        <td>
                            <div class="cost-total"><?php echo WC()->cart->get_cart_total(); ?></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
