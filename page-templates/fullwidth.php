<?php
/**
 * Template Name: Full Width Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

 // Exit if accessed directly.
 defined( 'ABSPATH' ) || exit;

 get_header();

 $container = get_theme_mod( 'understrap_container_type' );

 ?>

 <div id="page-wrapper">

   	<?php get_template_part( 'global-templates/page-title');;?>


 			<?php insert_modules();?>


 </div><!-- #page-wrapper -->

 <?php get_footer(); ?>
