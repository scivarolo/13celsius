<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celsius
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('menu-page'); ?>>

	<div class="entry-content menu-content">
		<div class="text-block intro-block --dark">
		  <div class="text-block__wrapper intro-block__wrapper container">
			  <div class="text-block__content intro-block__content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		<div class="subnav">
			<div class="container">
			<h3 class="subnav__label">Browse our Selection</h3>
			<!-- populated by Javascript -->
			</div>
		</div>
		<div id="wine-menu">
		<!-- populated by Javascript -->
		</div>
		
		<?php
		//the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'celsius' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'celsius' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
