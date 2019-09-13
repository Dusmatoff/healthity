<?php
   /*
   Template Name: Contact
   */
   ?>
<?php 
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header(); ?>
<!-- DETAIL BANNER -->
<?php 
//Get fields
$image = get_field('map_image');
$map_address_text = get_field('map_address_text');
$form_title = get_field('form_title');
$form_shortcode = get_field('form_shortcode');
$lat = get_field('lat');
$lng = get_field('lng');
?>
<div class="section detail-banner">
   <div class="bg bg-lazy-load banner-bg" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/bg-banner.jpg"></div>
   <div class="container">
       <?php if( $lat && $lng): ?>
      <div class="map-block" id="map" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" data-zoom="12"></div>
      <?php endif; ?>
      <div class="addresses-block">
         <a data-lat="<?php the_field('lat'); ?>" data-lng="<?php the_field('lng'); ?>" data-marker="<?php bloginfo("template_directory"); ?>/img/marker.png" data-string="
            <div class='map-content-wrapp'>
            <div class='map-content'>
            <?php if( $image ): ?> ?>
            <img src='<?php echo $image["url"]; ?>' alt='<?php echo $image["alt"]; ?>'>
            <?php endif; ?>
            <?php if( $map_address_text ): ?> ?>
            <div class='marker-title'><?php the_field('map_address_text'); ?></div>
            <?php endif; ?>
            </div>
            </div>">
         </a>
      </div>
   </div>
</div>
<!-- CONTACT -->
<div class="section">
   <div class="container">
      <div class="row">
         <div class="col-12 col-xl-3 offset-xl-1">
            <div class="contact-info-wrapp">
                <?php if(get_field('address_value', 'option') ): ?>
               <div class="contact-info-item">
                  <div class="contact-title"><span class="icon img-lazy-load"><img src="<?php bloginfo("template_directory"); ?>/img/placeholder.jpg" data-src="<?php bloginfo("template_directory"); ?>/icon/place.svg" alt="place"></span><?php esc_html_e( 'Address:', 'healthity' ) ?></div>
                  <div class="contact-info">
                     <p><?php the_field('address_value', 'option'); ?></p>
                  </div>
               </div>
               <?php endif; ?>
               
               
               <?php if( have_rows('tel_or_fax', 'option') ): ?>
               <div class="contact-info-item">
                    <?php while( have_rows('tel_or_fax', 'option') ): the_row(); 
                        $label = get_sub_field('tel_or_fax_label', 'option');
                        $icon = get_sub_field('tel_or_fax_icon', 'option');
                        $value = get_sub_field('tel_or_fax_value', 'option');
                    ?>
                        <div class="contact-title"><span class="icon img-lazy-load"><img src="<?php bloginfo("template_directory"); ?>/img/placeholder.jpg" data-src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"></span><?php echo $label; ?></div>
                        <div class="contact-info"><a href="tel:<?php echo str_replace(array('(',')','-',' '), '', $value); ?>"><?php echo $value; ?></a></div>
                    <?php endwhile; ?>
               </div>
               <?php endif; ?>
               
               
               <?php if( get_field('e-mail', 'option')): ?>
               <div class="contact-info-item">
                  <div class="contact-title"><span class="icon img-lazy-load"><img src="<?php bloginfo("template_directory"); ?>/img/placeholder.jpg" data-src="<?php bloginfo("template_directory"); ?>/icon/mail.svg" alt="mail"></span><?php esc_html_e( 'E-mail:', 'healthity' ) ?></div>
                  <div class="contact-info"><a href="mailto:<?php the_field('e-mail', 'option'); ?>"><?php the_field('e-mail', 'option'); ?></a></div>
               </div>
               <?php endif; ?>
            </div>
         </div>
         <div class="col-12 col-xl-5 offset-xl-1">
            <div class="contact-form">
                <?php if( $form_title ): ?>
                <div class="simple-item">
                  <div class="h4 title"><?php the_field('form_title'); ?></div>
                </div>
                <?php endif; ?>
                <?php   
                    $form_shortcode = get_field('form_shortcode');
                    echo $form_shortcode ? do_shortcode($form_shortcode) : ''; 
                ?>
               
            </div>
         </div>
      </div>
   </div>
   <div class="section-space"></div>
</div>
<?php get_footer(); ?>