<?php
    if ( ! defined( 'ABSPATH' ) ) {
    	exit; // Exit if accessed directly.
    }
    wc_print_notices();
    ?>
<form method="post" class="register">
    <?php do_action( 'woocommerce_register_form_start' ); ?>
    <div class="row row-10">
        <div class="col-12 col-sm-6">
            <div class="input-field-wrapp">
                <input class="input-field" type="text" placeholder="<?php esc_html_e('Name *', 'healthity'); ?>" name="billing_first_name" id="reg_billing_first_name" value="<?php //if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" required="required">
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="input-field-wrapp">
                <input class="input-field" type="text" placeholder="<?php esc_html_e('Last Name *', 'healthity'); ?>" name="billing_last_name" id="reg_billing_last_name" value="<?php //if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" required="required">
            </div>
        </div>
    </div>
    <div class="row row-10">
        <div class="col-12">
            <div class="input-field-wrapp">
                <input class="input-field" type="email" placeholder="E-mail *" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" required="required">
            </div>
        </div>
    </div>
    <div class="row row-10">
        <div class="col-12 col-sm-6">
            <div class="input-field-wrapp">
                <input class="input-field" type="password" required="required" placeholder="<?php esc_html_e('Password *', 'healthity'); ?>" name="password" id="reg_password">
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="input-field-wrapp">
                <input class="input-field" type="password" required="required" placeholder="<?php esc_html_e('Repeat Password *', 'healthity'); ?>" name="repeat-password">
            </div>
        </div>
    </div>
    <?php do_action( 'woocommerce_register_form' ); ?>
    <button type="submit" class="button full-width" name="login" value="<?php esc_html_e('Create', 'healthity'); ?>"><?php esc_html_e('Create', 'healthity'); ?><span></span><i></i></button>
    <div class="popup-bottom-link">
        <div class="row">
            <div class="col-12">
                <div class="popup-link"><?php esc_html_e('Already have account?', 'healthity'); ?> <span class="open-popup" data-rel="3"><?php esc_html_e('Sing in here', 'healthity'); ?></span></div>
            </div>
        </div>
    </div>
</form>