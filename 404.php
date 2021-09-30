<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?> py-5" id="content" tabindex="-1">

		<div class="row">

			<div class="col-12 col-md-8" id="primary">

				<section class="error-404 not-found">

					<h1 class="page-title">Page Not Found</h1>

					<p>Your search returned no results. Please try a different keyword or browse using categories & tags</p>

				</section><!-- .error-404 -->

			</div><!-- #primary -->

			<div class="col-md-4">

				<?php get_template_part( 'inc/modules/layout', 'sidebar-contact' ); ?>

			</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php get_footer(); ?>
