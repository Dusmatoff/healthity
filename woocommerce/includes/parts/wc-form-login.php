<?php
    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly.
    }
    wc_print_notices(); ?>
<form class="" method="post">
    <div class="input-field-wrapp type-2 fail1">
        <input class="input-field" type="text" placeholder="<?php esc_html_e('Username or email address', 'healthity'); ?>" name="username" id="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>">
        <span class="input-icon">
            <svg xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                xml:space="preserve">
                <g>
                    <g>
                        <path d="M469.835,66.259H42.165C18.914,66.259,0,85.173,0,108.424v295.153c0,23.245,18.914,42.165,42.165,42.165h427.671 			c23.245,0,42.165-18.92,42.165-42.165V108.424C512,85.173,493.08,66.259,469.835,66.259z M475.859,403.576 			c0,3.265-2.759,6.024-6.023,6.024H42.165c-3.265,0-6.024-2.759-6.024-6.024V171.761l207.685,122.103 			c5.59,3.289,12.517,3.331,18.143,0.108l213.89-122.543V403.576z M475.859,129.777l-222.75,127.615L36.141,129.831v-21.408 			c0-3.265,2.759-6.023,6.024-6.023h427.671c3.265,0,6.023,2.759,6.023,6.023V129.777z"/>
                    </g>
                </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
            </svg>
        </span>
    </div>
    <div class="input-field-wrapp type-2">
        <input class="input-field" type="password" name="password" id="password" placeholder="<?php esc_html_e('Password *', 'healthity'); ?>">
        <span class="input-icon">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                xml:space="preserve">
                <g>
                    <g>
                        <path d="M400,188h-36.037v-82.23c0-58.322-48.449-105.77-108-105.77c-59.551,0-108,47.448-108,105.77V188H112 			c-33.084,0-60,26.916-60,60v204c0,33.084,26.916,60,60,60h288c33.084,0,60-26.916,60-60V248C460,214.916,433.084,188,400,188z 			 M187.963,105.77c0-36.266,30.505-65.77,68-65.77s68,29.504,68,65.77V188h-136V105.77z M420,452c0,11.028-8.972,20-20,20H112 			c-11.028,0-20-8.972-20-20V248c0-11.028,8.972-20,20-20h288c11.028,0,20,8.972,20,20V452z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M256,286c-20.435,0-37,16.565-37,37c0,13.048,6.76,24.51,16.963,31.098V398c0,11.045,8.954,20,20,20 			c11.045,0,20-8.955,20-20v-43.855C286.207,347.565,293,336.08,293,323C293,302.565,276.435,286,256,286z"/>
                    </g>
                </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
                <g> </g>
            </svg>
        </span>
    </div>
    <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
    <button type="submit" class="button full-width" name="login" value="<?php esc_attr_e('Login', 'healthity'); ?>"><?php esc_html_e('Login', 'healthity'); ?><span></span><i></i></button>
    <div class="popup-bottom-link">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="popup-link fl open-popup" data-rel="5">
                    <p>Forgot your password?</p>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="popup-link fr open-popup" data-rel="4"><span><?php esc_html_e('Create an account', 'healthity'); ?></span></div>
            </div>
        </div>
    </div>
</form>