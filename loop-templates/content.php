<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="row">

		<div class="col-md-8">

			<?php the_post_thumbnail('full'); ?>

		</div>

		<div class="col-md-4">

			<header class="entry-header test">

					<?php
					the_title(
						sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
						'</a></h2>'
					);
					?>

					<?php if ( 'post' == get_post_type() ) : ?>

					<div class="entry-meta">
						<?php the_time('j F Y'); ?>
					</div><!-- .entry-meta -->

					<?php endif; ?>


			</header><!-- .entry-header -->

			<div class="entry-content">

				<?php the_excerpt(); ?>

				<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
						'after'  => '</div>',
					)
				);
				?>

			</div><!-- .entry-content -->

			<div class="entry-button">

				<?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . 'More' . '</a>'; ?>

			</div>

		</div>

		</div>

</article><!-- #post-## -->
