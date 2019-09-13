<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
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
 * @global WC_Checkout $checkout
 */

defined('ABSPATH') || exit;
?>
<div class="woocommerce-shipping-fields">
    <div class="order-top-caption">
        <div class="h4 title">Shipping address</div>
    </div>
    <?php if (true === WC()->cart->needs_shipping_address()) : ?>
        <!--        <h3 id="ship-to-different-address">-->
        <!--            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">-->
        <!--                <input id="ship-to-different-address-checkbox"-->
        <!--                       class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" --><?php //checked(apply_filters('woocommerce_ship_to_different_address_checked', 'shipping' === get_option('woocommerce_ship_to_destination') ? 1 : 0), 1); ?>
        <!--                       type="checkbox" name="ship_to_different_address" value="1"/>-->
        <!--                <span>--><?php //esc_html_e('Ship to a different address?', 'woocommerce'); ?><!--</span>-->
        <!--            </label>-->
        <!--        </h3>-->

        <div class="shipping_address">

            <?php do_action('woocommerce_before_checkout_shipping_form', $checkout); ?>

            <div class="woocommerce-shipping-fields__field-wrapper">
                <?php

                $fields = $checkout->get_checkout_fields('billing');
                $allowed = ['billing_company', 'billing_country', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_phone', 'billing_postcode'];
                $filteredBilling = array_filter(
                    $fields,
                    function ($key) use ($allowed) {
                        return in_array($key, $allowed);
                    },
                    ARRAY_FILTER_USE_KEY
                );
                $i = 0;
                foreach ($filteredBilling

                         as $key => $field) {
                    //                    woocommerce_form_field($key, $field, $checkout->get_value($key));
                    if ($i >= 0 && $i <= 3 || $i == 7) {
                        if ($i === 0 || $i === 7) {
                            echo '<div class="row">';
                        } ?>
                        <div class="col-12">
                            <div class="input-field-wrapp">
                                <input class="input-field" type="text"
                                       placeholder="<?= $field['label']; ?>"
                                       name="<?= $key; ?>"
                                       required="<?= $field['required']; ?>"
                                       autocomplete="<?= $field['autocomplete']; ?>"
                                       value="<?= $checkout->get_value($key); ?>"
                                >
                            </div>
                        </div>
                        <?php if ($i === 3) {
                            echo '</div><div class="row row-10">';
                        }
                        if ($i === 7) {
                            echo '</div>';
                        }
                    } else { ?>
                        <div class="col-12 col-sm-4">
                            <div class="input-field-wrapp">
                                <input class="input-field" type="text"
                                       placeholder="<?= $field['label']; ?>"
                                       name="<?= $key; ?>"
                                       required="<?= $field['required']; ?>"
                                       autocomplete="<?= $field['autocomplete']; ?>"
                                       value="<?= $checkout->get_value($key); ?>"
                                >
                            </div>
                        </div>

                        <?php
                        if ($i === 6) {
                            echo '</div>';
                        }
                    }
                    $i++;
                } ?>
            </div>

            <?php do_action('woocommerce_after_checkout_shipping_form', $checkout); ?>

        </div>

    <?php endif; ?>
</div>
<div class="woocommerce-additional-fields">
    <?php do_action('woocommerce_before_order_notes', $checkout); ?>

    <?php if (apply_filters('woocommerce_enable_order_notes_field', 'yes' === get_option('woocommerce_enable_order_comments', 'yes'))) : ?>

        <?php if (!WC()->cart->needs_shipping() || wc_ship_to_billing_address_only()) : ?>

            <h3><?php esc_html_e('Additional information', 'woocommerce'); ?></h3>

        <?php endif; ?>

        <div class="woocommerce-additional-fields__field-wrapper">
            <?php foreach ($checkout->get_checkout_fields('order') as $key => $field) :
                ?>

                <?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

    <?php do_action('woocommerce_after_order_notes', $checkout); ?>
</div>
