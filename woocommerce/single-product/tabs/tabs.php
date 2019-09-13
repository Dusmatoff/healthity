<?php
    /**
     * Single Product tabs
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
     *
     * HOWEVER, on occasion WooCommerce will need to update template files and you
     * (the theme developer) will need to copy the new files to your theme to
     * maintain compatibility. We try to do this as little as possible, but it does
     * happen. When this occurs the version of the template file will be bumped and
     * the readme will list any important changes.
     *
     * @see 	https://docs.woocommerce.com/document/template-structure/
     * @package WooCommerce/Templates
     * @version 2.4.0
     */
    
    if ( ! defined( 'ABSPATH' ) ) {
    	exit;
    }
    
    /**
     * Filter tabs and allow third parties to add their own.
     *
     * Each tab is an array containing title, callback and priority.
     * @see woocommerce_default_product_tabs()
     */
    $tabs = apply_filters( 'woocommerce_product_tabs', array() );
    
    if ( ! empty( $tabs ) ) : ?>
<!-- PRODUCT DETAIL INFORMATION -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8 offset-xl-2">
                <div class="tab-wrapper style-2">
                    <div class="tab-nav-wrapper">
                        <div class="nav-tab">
                            <div class="nav-tab-item active">
                                <div class="nav-tab-item-caption"><?php esc_html_e( 'How to apply', 'healthity' ) ?></div>
                            </div>
                            
                            <?php if( have_rows('benefit_tab') ): ?>
                            <div class="nav-tab-item">
                                <div class="nav-tab-item-caption"><?php esc_html_e( 'Benefit of the supplements', 'healthity' ) ?></div>
                            </div>
                            <?php endif; ?>
                            
                            <?php if( have_rows('faq_tab') ): ?>
                            <div class="nav-tab-item">
                                <div class="nav-tab-item-caption"><?php esc_html_e( 'FAQ', 'healthity' ) ?></div>
                            </div>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                    <div class="tabs-content">
                        <div class="tab-info active">
                            <?php the_content(); ?>
                        </div>
                        <?php 
                            if( have_rows('benefit_tab') ):
                        ?>
                        <div class="tab-info">
                            <?php 
                                while ( have_rows('benefit_tab') ) : the_row(); 
                                if( get_row_layout() == 'benefit_text_block' ): ?>
                            <div class="simple-item simple-page">
                                <?php the_sub_field('benefit_text'); ?>
                            </div>
                            <div class="section-space size-5"></div>
                            <?php 
                                endif;
                                endwhile; 
                            ?>
                        </div>
                        <?php 
                            else :
                            // Not found block
                            endif;
                        ?>
                        
                        <?php 
                            if(have_rows('faq_tab') ):
                        ?>
                        <div class="tab-info">
                            <?php 
                                while ( have_rows('faq_tab') ) : the_row(); 
                                if( get_row_layout() == 'faq_text_block' ): ?>
                            <div class="simple-item simple-page">
                                <?php the_sub_field('faq_text'); ?>
                            </div>
                            <div class="section-space size-5"></div>
                            <?php 
                                endif;
                                endwhile; 
                            ?>
                        </div>
                        <?php 
                            else :
                            // Not found block
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-space"></div>
</div>
<?php endif; ?>