<?php
   /*
   Template Name: About
   */
   ?>
<?php 
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header(); ?>

<?php get_template_part('template-parts/banner'); ?>

<div class="section">
	<div class="container">
        <?php get_template_part('template-parts/flexible'); ?>
    </div>
</div>


<?php get_footer(); ?>