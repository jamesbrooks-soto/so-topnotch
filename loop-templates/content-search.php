<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title(
			sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h3>'
		);
		?>

		<?php if ( 'post' == get_post_type() ) : ?>

			<!-- <div class="entry-meta">

				<?php understrap_posted_on(); ?>

			</div> -->
			<!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-summary">

		<?php the_excerpt(); ?>

	</div><!-- .entry-summary -->

	<div class="entry-button">

		<?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . 'View Result' . '</a>'; ?>

	</div>

	<!-- <footer class="entry-footer">

		<?php understrap_entry_footer(); ?> -->

	<!-- </footer> --><!-- .entry-footer -->

</article><!-- #post-## -->
