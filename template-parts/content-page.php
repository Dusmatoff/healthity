<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package healthity
 */

?>

<!-- SIMPLE TEXT -->
		<div class="section margin-section">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="simple-item text-center">
							<div class="title-decor not-decor">
								<div class="title-wrapp">
									<h2 class="title h2"><?php  the_title(); ?></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                            <?php get_template_part('template-parts/flexible'); ?>
					</div>
				</div>
			</div>
			<div class="section-space size-3"></div>
		</div>
