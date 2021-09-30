<?php
/**
 * Template Name: Right Sidebar
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

<div class="wrapper" id="page-wrapper">

	<?php get_template_part( 'global-templates/page-title');?>

	<div class="container">

		<div class="row">

			<div class="col-12 col-lg-8" id="primary">

				<?php insert_modules();?>

			</div>

			<div class="col-lg-4 widget-area" id="right-sidebar" role="complementary">

				<?php insert_sidebar_modules();?>

			</div><!-- #right-sidebar -->

		</div><!-- .row -->

			</div>

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
