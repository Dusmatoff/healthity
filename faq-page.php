<?php
   /*
   Template Name: FAQ
   */
   ?>
<?php 
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header(); ?>


<!-- FAQ -->
		<div class="section margin-section">
			<div class="page-decor faq-decor-top">
				<div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/faq-decor-top.png"></div>
			</div>
			<div class="page-decor faq-decor-bottom">
				<div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/faq-decor-bottom.png"></div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="simple-item text-center">
							<div class="title-decor">
								<div class="title-wrapp">
									<h2 class="title h2"><?php the_title(); ?></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-xl-10 offset-xl-1">
						<div class="faq-search-wrapp">
							<div class="input-field-wrapp search-input">
								<input class="input-field size-2" type="text" placeholder="<?php esc_html_e( 'Search Here...', 'healthity' ) ?>" name="search" id="filter" value="">
								<span class="search-icon">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512">   <g>     <path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5   S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9   C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z"/>   </g> </svg>
								</span>
							</div>
						</div>
						<?php if( have_rows('faq') ): ?>
						<div class="tab-wrapper">
							<div class="row">
								<div class="col-12 col-lg-4 col-xl-3">
									<div class="tab-nav-wrapper">                                     
										<div class="nav-tab">
										    <?php $class=0; while( have_rows('faq') ): the_row(); $class++; ?>
											<div class="nav-tab-item <?php if ($class==1) echo 'active'; ?>"><div class="nav-tab-item-caption"><?php the_sub_field('faq_category'); ?></div></div>
											<?php endwhile; ?>
										</div>
									</div>
								</div>
								<div class="col-12 col-lg-8 col-xl-9">
									<div class="tabs-content">
										<?php $c=0 ;while( have_rows('faq') ): the_row(); $c++;?>
										<div class="tab-info <?php if ($c==1) echo 'active'; ?>">
											<div class="accordion">
											    <?php  if( have_rows('faq_item') ): while( have_rows('faq_item') ): the_row(); ?>
												<div class="accordion-item">
													<div class="accordion-title"><?php the_sub_field('faq_item_title'); ?></div>
													<div class="accordion-inner">
														<div class="simple-text">
															<p><?php the_sub_field('faq_item_text'); ?></p>
														</div>
													</div>
												</div>
												<?php endwhile; endif; ?>
											</div>
										</div>
										<?php endwhile; ?>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="section-space size-2"></div>
		</div>
<?php get_footer(); ?>