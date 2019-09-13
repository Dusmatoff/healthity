<?php
   /*
   Template Name: Template
   */
   ?>
<?php 
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header(); ?>
        <?php if( get_the_post_thumbnail_url() ): ?>
		<!-- DETAIL BANNER -->
		<div class="section detail-banner">
			<div class="bg bg-lazy-load banner-bg" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/bg-banner.jpg"></div>
			<div class="container">
				<div class="banner">
					<div class="banner-inner">
						<div class="banner-align size-2 parallax-bg">
							<div class="bg bg-lazy-load rellax" data-rellax-speed="2" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php echo get_the_post_thumbnail_url(); ?>"></div>
							<div class="opacity"></div>
							<div class="row">
								<div class="col-12 col-xl-6 offset-xl-3">
									<div class="simple-item text-center banner-info">
										<h1 class="h1 title color-2"><?php the_field('title'); ?></h1>
										<div class="sub-title"><?php the_field('subtitle'); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

<div class="section">
	<div class="container">
	    
        <?php get_template_part('template-parts/flexible'); ?>
    </div>
</div>


<?php get_footer(); ?>