<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout"
      action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

    <div class="tabs-content">
        <div class="tab-info active">
            <div class="order-wrapp">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                        <div class="order-wrapp-left-column">
                            <div class="order-contact-information">
                                <div class="order-top-caption">
                                    <div class="h4 title"><?php esc_html_e( 'Contact information', 'healthity' ) ?></div>
                                    <?php if (!is_user_logged_in()) { ?>
                                        <div class="popup-link"><?php esc_html_e( 'Already have account ?', 'healthity' ) ?> <span class="open-popup" data-rel="3">  <?php esc_html_e( 'Log in', 'healthity' ) ?></span> </div>
                                    <?php } ?>
                                </div>
                                <div class="contact-information-form">
                                    <?php do_action('woocommerce_checkout_billing'); ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="button full-width"><?php esc_html_e( 'continue to shipping method', 'healthity' ) ?><span></span><i></i></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/shop" class="button-link style-2"><?php esc_html_e( 'Return to shop', 'healthity' ) ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <?php wc_get_template( 'checkout/order-view.php'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-info">
            <div class="order-wrapp">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                        <div class="order-wrapp-left-column">
                            <div class="order-shipping-information">


                                <div class="shipping-information-form">
                                    <div class="shipping-address">
                                        <?php do_action('woocommerce_checkout_shipping'); ?>
                                    </div>
                                    <div class="shipping-method">
                                        <div class="order-top-caption">
                                            <div class="h4 title"><?php esc_html_e( 'Shipping method', 'healthity' ) ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="shipping-method-wrapp">
                                                    <?php
                                                    if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                                                        <table class="my-custom-shipping-table">
                                                            <tbody>
                                                            <?php wc_cart_totals_shipping_html(); ?>
                                                            </tbody>
                                                        </table>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="button full-width"><?php esc_html_e( 'continue to payment method', 'healthity' ) ?><span></span><i></i></div>
                                            </div>
                                        </div>
                                    </div>
</form>
</div>
<a href="" class="button-link style-2"><?php esc_html_e( 'Return to customer information', 'healthity' ) ?></a>
</div>
</div>
</div>
<div class="col-12 col-lg-5">
    <?php wc_get_template( 'checkout/order-view.php'); ?>
</div>
</div>
</div>
</div>
<div class="tab-info">
    <div class="order-wrapp">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                <div class="order-wrapp-left-column">
                    <div class="order-payment-information">
                        <div class="order-top-caption">
                            <div class="h4 title"><?php esc_html_e( 'Payment', 'healthity' ) ?></div>
                        </div>
                        <div class="paymet-data-order">
                            <div class="table-wrapp">
                                <table>
                                    <tr>
                                        <td><?php esc_html_e( 'Contact', 'healthity' ) ?></td>
                                        <td>
                                            <div class="input-field-wrapp disabled"><input class="input-field" name="email" type="email" value="mary-bonita@gmail.com"></div>
                                        </td>
                                        <td class="change-personal-data change">
                                            <span><?php esc_html_e( 'Change', 'healthity' ) ?></span><span class="save"><?php esc_html_e( 'Save', 'healthity' ) ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Ship to</td>
                                        <td>
                                            <div class="input-field-wrapp disabled"><input class="input-field" name="address" type="text" value="ul. Lenina 9, MD-2001, Chisinau, st. Tigina 37, of. 2">
                                            </div>
                                        </td>
                                        <td class="change-personal-data change">
                                            <span><?php esc_html_e( 'Change', 'healthity' ) ?></span><span class="save"><?php esc_html_e( 'Save', 'healthity' ) ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Method</td>
                                        <td>
                                            <div class="paymet-ship">International Sipping
                                                <div class="cost-total"><i>$</i><span>50</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="payment-information-form">

                            <div class="paymet-method-wrapp">
                                <div id="payment" class="woocommerce-checkout-payment">
                                    <?php if (WC()->cart->needs_payment()) : ?>
                                        <ul class="wc_payment_methods payment_methods methods">
                                            <?php
                                            if (!empty($available_gateways)) {
                                                foreach ($available_gateways as $gateway) {
                                                    wc_get_template('checkout/payment-method.php', array('gateway' => $gateway));
                                                }
                                            } else {
                                                echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters('woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__('Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce') : esc_html__('Please fill in your details above to see available payment methods.', 'woocommerce')) . '</li>'; // @codingStandardsIgnoreLine
                                            }
                                            ?>
                                        </ul>
                                    <?php endif; ?>
                                    <div class="form-row place-order">
                                        <noscript>
                                            <?php
                                            /* translators: $1 and $2 opening and closing emphasis tags respectively */
                                            printf(esc_html__('Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce'), '<em>', '</em>');
                                            ?>
                                            <br/>
                                            <button type="submit" class="button alt"
                                                    name="woocommerce_checkout_update_totals"
                                                    value="<?php esc_attr_e('Update totals', 'woocommerce'); ?>"><?php esc_html_e('Update totals', 'woocommerce'); ?></button>
                                        </noscript>
                                        <?php wc_get_template('checkout/terms.php'); ?>

                                        <?php do_action('woocommerce_review_order_before_submit'); ?>
                                        <?php echo apply_filters('woocommerce_order_button_html', '<button type="submit" class="button alt button full-width" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr('Pay now') . '" data-value="' . esc_attr('Pay now') . '">' . esc_html('Pay now') . '<span></span><i></i></button>'); // @codingStandardsIgnoreLine ?>
                                        <?php do_action('woocommerce_review_order_after_submit'); ?>

                                        <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
                                        <!--                                                <a href="index.html" class="button full-width">Pay-->
                                        <!--                                                    now<span></span><i></i></a>-->

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="" class="button-link style-2"><?php esc_html_e( 'Return to customer information', 'healthity' ) ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <?php wc_get_template('checkout/order-view.php'); ?>
            </div>
        </div>
    </div>
</div>
</div>

</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
