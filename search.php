<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="search-wrapper">

		<section id="search-main">

			<div class="container py-5">

				<div class="row">

					<div class="col-md-8">

					<?php if ( have_posts() ) : ?>

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'loop-templates/content', 'search' );
							?>

						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

						</div>

						<div class="col-md-4">

							<?php get_template_part( 'inc/modules/layout', 'sidebar-product-menu' ); ?>

							<?php get_template_part( 'inc/modules/layout', 'sidebar-contact' ); ?>

						</div>

				</div>

			</div>

		</section>

		<section id="search-pagination" class="py-3">

			<div class="container">

					<div class="row">

						<div class="col-12 d-flex justify-content-center">

							<!-- The pagination component -->
							<?php understrap_pagination(); ?>

						</div>

					</div>

				</div>

		</section>

</div><!-- #search-wrapper -->

<?php get_footer(); ?>
