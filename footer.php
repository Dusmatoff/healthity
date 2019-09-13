<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package healthity
 */

?>
</div><!-- #content -->
<?php if (!is_404()): ?>
    <!-- FOOTER -->
    <footer>
        <div class="footer-top">
            <div class="container">
                <?php if ( get_field('newsletter_shortcode', 'option') ): ?>
                <div class="row">
                    <div class="col-12">
                        <div class="subscribe-block">
                            <div class="subscribe-text"><?php esc_html_e( 'Join Our Newsletter Now', 'healthity' ) ?></div>
                            <div class="subscribe-form">
                                <?php echo do_shortcode( get_field('newsletter_shortcode', 'option') ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <?php if ( get_field('address_value', 'option') ): ?>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="footer-item">
                                <div class="footer-title"><?php esc_html_e( 'Address:', 'healthity' ) ?></div>
                                <div class="footer-info">
                                    <span class="icon img-lazy-load"><img src="<?php bloginfo("template_directory"); ?>/img/placeholder.jpg" data-src="<?php bloginfo("template_directory"); ?>/icon/place.svg" alt="place"></span>
                                    <p><?php the_field('address_value', 'option'); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if( have_rows('tel_or_fax', 'option') ): ?>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <?php while( have_rows('tel_or_fax', 'option') ): the_row(); 
                                $label = get_sub_field('tel_or_fax_label', 'option');
                                $icon = get_sub_field('tel_or_fax_icon', 'option');
                                $value = get_sub_field('tel_or_fax_value', 'option');
                            ?>
                            <div class="footer-item">
                                <div class="footer-title"><?php echo $label; ?></div>
                                <div class="footer-info">
                                    <span class="icon img-lazy-load"><img src="<?php bloginfo("template_directory"); ?>/img/placeholder.jpg" data-src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"></span>
                                    <a href="tel:<?php echo str_replace(array('(',')','-',' '), '', $value); ?>"><?php echo $value; ?></a>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (get_field('e-mail', 'option')): ?>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="footer-item">
                                <div class="footer-title">E-mail:</div>
                                <div class="footer-info">
                                    <span class="icon img-lazy-load"><img src="<?php bloginfo("template_directory"); ?>/img/placeholder.jpg" data-src="<?php bloginfo("template_directory"); ?>/icon/mail.svg" alt="mail"></span>
                                    <a href="mailto:<?php the_field('e-mail', 'option'); ?>"><?php the_field('e-mail', 'option'); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php 
                        $payment_systems = get_field('payment_systems', 'option');
                        if( $payment_systems ): ?>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-item text-right">
                            <div class="paymet-method">
                                <?php foreach( $payment_systems as $image ): ?>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-4 col-lg-3">
                        <div class="copyright">© <?php esc_html_e( 'Copyright', 'healthity' ) ?> <?php echo date('Y'); ?> <?php esc_html_e( 'Healthity', 'healthity' ) ?></div>
                    </div>
                    <div class="col-12 col-sm-5 col-lg-6">
                        <div class="privacy">
                            <?php
                            $menuParameters = array(
                                'theme_location'  => 'menu-footer',
                                'container'       => false,
                                'echo'            => false,
                                'items_wrap'      => '%3$s',
                                'depth'           => 0,
                            );
                            echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="develope">
                            <a href="http://redstone.media/"><span><?php esc_html_e( 'Development', 'healthity' ) ?> <img src="<?php bloginfo("template_directory"); ?>/img/redstone.svg" alt="REDSTONE"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>
<?php 
$show_privacy_window = get_field('show_privacy_window', 'option');
$privacy_text = get_field('privacy_text', 'option');
if( in_array('Show', $show_privacy_window) && $privacy_text ): ?>
<!-- COOKIES -->
<div class="cookies-informer">
    <div class="cookies-informer-inner">
        <div class="cookies-text"><?php echo $privacy_text; ?></div>
        <div class="close-cookies button-close"><span></span></div>
    </div>
</div>
<?php endif; ?>
<!-- POPUP -->
<div class="popup-wrapper">
    <div class="bg-popup-layer"></div>
    <div class="popup-content" data-rel="1">
        <div class="layer-close"></div>
        <div class="popup-container size-2">
            <div class="popup-align">
                <div class="popup-decor-top">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-top.png"></div>
                </div>
                <div class="popup-decor-bottom">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-bottom.png"></div>
                </div>
                <div class="simple-item text-center">
                    <div class="popup-top">
                        <div class="title-decor size-2">
                            <div class="title-wrapp">
                                <div class="title h3"><?php esc_html_e( 'Shopping cart', 'healthity' ) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="popup-bottom">
                        <div class="cart-list-product-wrapp widget_shopping_cart_content">
                            <?php woocommerce_mini_cart(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-close"><span></span></div>
        </div>
    </div>
    <?php
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) {
        while ($loop->have_posts()) : $loop->the_post();
            $id = get_the_ID();
            $product = new WC_Product($id);

            if ($product->is_on_sale()) {
                $price = $product->get_sale_price();
                $priceSale = $product->get_regular_price();
            } else {
                $priceSale = 0;
                $price = $product->get_regular_price();
            }
            ?>
            <div class="popup-content" data-rel="<?= $id; ?>">
                <div class="layer-close"></div>
                <div class="popup-container size-3">
                    <div class="popup-align">
                        <div class="popup-decor-top">
                            <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-top.png"></div>
                        </div>
                        <div class="popup-decor-bottom">
                            <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-bottom.png"></div>
                        </div>
                        <div class="product-detail-wrapp product-promotion" data-price-product="<?= $price; ?>">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-xl-5">
                                    <div class="swiper-thumbs-wrapper">
                                        <div class="product-detail-top-wrapp">
                                            <?php if ($product->is_on_sale()) { ?>
                                                <div class="promotion-label"><?php esc_html_e( 'sale', 'healthity' ) ?></div>
                                            <?php } ?>
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
                                                                        <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?= wp_get_attachment_url($item); ?>"></div>
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
                                                                <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?= wp_get_attachment_url($item); ?>"></div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-7">
                                    <div class="product-detail-info">
                                        <h3 class="title h3"><?= get_the_title(); ?></h3>
                                        <?= product_price(); ?>
                                        <div class="product-description">
                                            <div class="simple-text">
                                                <p>
                                                    <?= wpautop($product->get_short_description()); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <form>

                                            <div class="product-detail-quantity">
                                                <span class="quantity-label"><?php esc_html_e( 'Quantity', 'healthity' ) ?></span>
                                                <div class="quantity-wrapp">
                                                    <span data-quantity="1" class="active">1 <?php esc_html_e( 'pack', 'healthity' ) ?></span>
                                                    <span data-quantity="3">3 <?php esc_html_e( 'pack', 'healthity' ) ?></span>
                                                    <span data-quantity="6">6 <?php esc_html_e( 'pack', 'healthity' ) ?></span>
                                                </div>

                                                <div class="total-summ-quantity"><i>$</i><span><?= $price; ?></span>
                                                </div>
                                            </div>
                                            <?php if ( ! $product->is_in_stock() ): ?>
                                            <div class="button full-width open-popup" data-rel="10"><?php esc_html_e( 'pre-order', 'healthity' ) ?><span></span><i></i></div>
                                            <?php else: ?>
                                            <div class="button full-width add-cart"><?php esc_html_e( 'add to cart', 'healthity' ) ?><span></span><i></i></div>
                                            <?php endif; ?>
                                            <input type="hidden" name="product_id" value="<?= $id; ?>">
                                            <input type="hidden" name="quantity" value="1">

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-space size-3"></div>
                        <div class="popup-product-detail">
                            <div class="row">
                                <div class="col-12 col-xl-10 offset-xl-1">
                                    <?= get_the_content(); ?>
                                    <?php get_template_part('template-parts/share'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-close"><span></span></div>
                </div>
            </div>
        <?php endwhile;
    } else {
        esc_html_e( 'No products found', 'healthity' );
    }
    wp_reset_postdata(); ?>
    <div class="popup-content" data-rel="3">
        <div class="layer-close"></div>
        <div class="popup-container">
            <div class="popup-align">
                <div class="popup-decor-top">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-top.png"></div>
                </div>
                <div class="popup-decor-bottom">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-bottom.png"></div>
                </div>
                <div class="simple-item text-center">
                    <div class="popup-top">
                        <div class="title-decor size-2">
                            <div class="title-wrapp">
                                <div class="title h3"><?php esc_html_e( 'Login', 'healthity' ) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="popup-bottom">
                        <div class="popup-form-wrapp">
                            <div class="login-form">
                                <?php wc_get_template('includes/parts/wc-form-login.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-close"><span></span></div>
        </div>
    </div>
    <div class="popup-content" data-rel="4">
        <div class="layer-close"></div>
        <div class="popup-container">
            <div class="popup-align">
                <div class="popup-decor-top">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-top.png"></div>
                </div>
                <div class="popup-decor-bottom">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-bottom.png"></div>
                </div>
                <div class="simple-item text-center">
                    <div class="popup-top">
                        <div class="title-decor size-2">
                            <div class="title-wrapp">
                                <div class="title h3"><?php esc_html_e( 'Create Account', 'healthity' ) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="popup-bottom">
                        <div class="popup-form-wrapp">
                            <?php wc_get_template('includes/parts/wc-form-register.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-close"><span></span></div>
        </div>
    </div>
    <div class="popup-content" data-rel="5">
        <div class="layer-close"></div>
        <div class="popup-container">
            <div class="popup-align">
                <div class="popup-decor-top">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-top.png"></div>
                </div>
                <div class="popup-decor-bottom">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-bottom.png"></div>
                </div>
                <div class="simple-item text-center">
                    <div class="popup-top">
                        <div class="title-decor size-2">
                            <div class="title-wrapp">
                                <div class="title h3"><?php esc_html_e( 'Reset your password', 'healthity' ) ?></div>
                            </div>
                        </div>
                        <div class="simple-text">
                            <p><?php esc_html_e( 'We will send you an email to reset your password.', 'healthity' ) ?></p>
                        </div>
                    </div>
                    <div class="popup-bottom">
                        <div class="popup-form-wrapp">
                            <div class="reset-password-form">
                                <?php wc_get_template('includes/parts/wc-form-reset-password.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-close"><span></span></div>
        </div>
    </div>
    <div class="popup-content" data-rel="6">
        <div class="layer-close"></div>
        <div class="popup-container">
            <div class="popup-align">
                <div class="popup-decor-top">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-top.png"></div>
                </div>
                <div class="popup-decor-bottom">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-bottom.png"></div>
                </div>
                <div class="simple-item text-center">
                    <div class="popup-top">
                        <div class="title-decor size-2">
                            <div class="title-wrapp">
                                <div class="title h3"><?php esc_html_e( 'Thank you!', 'healthity' ) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="popup-bottom">
                        <div class="simple-text size-2">
                            <p><?php esc_html_e( 'Your message has been successfully sent. Our managers will contact you!', 'healthity' ) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-close"><span></span></div>
        </div>
    </div>
    <div class="popup-content" data-rel="7">
        <div class="layer-close"></div>
        <div class="popup-container">
            <div class="popup-align">
                <div class="popup-decor-top">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-top.png"></div>
                </div>
                <div class="popup-decor-bottom">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-bottom.png"></div>
                </div>
                <div class="simple-item text-center">
                    <div class="popup-top">
                        <div class="title-decor size-2">
                            <div class="title-wrapp">
                                <div class="title h3"><?php esc_html_e( 'Thank you!', 'healthity' ) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="popup-bottom">
                        <div class="simple-text size-2">
                            <p><?php esc_html_e( 'You have successfully subscribed to our newsletter.', 'healthity' ) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-close"><span></span></div>
        </div>
    </div>
    <div class="popup-content" data-rel="8">
        <div class="layer-close"></div>
        <div class="popup-container">
            <div class="popup-align">
                <div class="popup-decor-top">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-top.png"></div>
                </div>
                <div class="popup-decor-bottom">
                    <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-bottom.png"></div>
                </div>
                <div class="simple-item text-center">
                    <div class="popup-top">
                        <div class="title-decor size-2">
                            <div class="title-wrapp">
                                <div class="title h3"> <?php esc_html_e( 'You are logged as:', 'healthity' ) ?></div>
                                <div class="title h4"><?php $current_user = wp_get_current_user(); echo $current_user->user_login; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="popup-bottom">
                        <div class="simple-text size-2">
                            <div class="button full-width popup-close"><?php esc_html_e( 'Go to site', 'healthity' ) ?><span></span><i></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-close"><span></span></div>
        </div>
    </div>
    <div class="popup-content active" data-rel="10">
	    <div class="layer-close"></div>
	    <div class="popup-container">
	      <div class="popup-align">
	      	<div class="popup-decor-top">
				<div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-top.png"></div>
			</div>
			<div class="popup-decor-bottom">
				<div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/popup-decor-top.png"></div>
			</div>
      		<div class="simple-item text-center">
      			<div class="popup-top">
	      			<div class="title-decor size-2">
						<div class="title-wrapp">
							<div class="title h3"><?php esc_html_e( 'pre-order', 'healthity' ) ?></div>
						</div>
					</div>
				</div>
				<div class="popup-bottom">
					<div class="popup-form-wrapp">
					    <?php echo do_shortcode('[contact-form-7 id="437" title="Pre-order"]'); ?>
					</div>
				</div>
      		</div>
	      </div>
	      <div class="button-close"><span></span></div>
	    </div>
	  </div>
</div>
<!-- VIDEO POPUP -->
<div class="video-popup">
    <div class="video-popup-overlay"></div>
    <div class="video-popup-content">
        <div class="video-popup-layer"></div>
        <div class="video-popup-container">
            <div class="video-popup-align">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="about:blank"></iframe>
                </div>
            </div>
            <div class="video-popup-close button-close"><span></span></div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
<?php if (is_page_template( 'contact-page.php' )): ?>
    <!-- MAP -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDco0U55FmAwh-agzHOdEirnnduhdy7Nyo"></script>
    <script src="<?php bloginfo("template_directory"); ?>/js/map.js"></script>
    <!-- MAP -->
<?php endif; ?>
</body>
</html>