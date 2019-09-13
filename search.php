<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package healthity
 */

get_header();
?>
<div class="section margin-section">
    <div class="page-decor review-decor-left">
        <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/review-decor-left.png"></div>
    </div>
    <div class="container">
        <div class="row">
         <div class="col">
            <div class="simple-item">
               <div class="title-decor">
                  <div class="title-wrapp">
                     <h2 class="title h2"><?php printf( esc_html__( 'Search Results for: %s', 'healthity' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="news-wrapp">
          <div class="row row-60">

		<?php if ( have_posts() ) : ?>

			

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div>
	</div>
	</div>
    <div class="section-space"></div>
</div>
<?php
get_sidebar();
get_footer();
