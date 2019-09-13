<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package healthity
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();
?>

<!-- 404 -->
		<div class="section">
			<div class="banner">
				<div class="banner-align full size-2">
					<div class="container">
						<div class="row">
							<div class="col-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
								<div class="simple-item not-found">
									<div class="not-found-img">
										<img src="<?php bloginfo("template_directory"); ?>/img/not-found-img.png" alt="">
									</div>
									<div class="title h3"><?php esc_html_e( 'Page not found', 'healthity' ) ?></div>
									<div class="simple-text">
										<p><?php esc_html_e( 'Sorry, but we have trouble finding the page you are requesting', 'healthity' ) ?></p>
									</div>
									<a href="/" class="button"><?php esc_html_e( 'back to main page', 'healthity' ) ?><span></span><i></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
get_footer();
