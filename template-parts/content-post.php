<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celsius
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if(!is_singular()): ?>
	<?php celsius_post_thumbnail(); ?>
	<header class="entry-header">
	<!-- <div class="entry-date"><?php the_date(); ?></div> -->

	<?php if(get_field('url')): ?>
		<?php if (get_field('source')): ?>
			<div class="entry-date"><a href="<?php echo esc_url(get_field('url')); ?>"><?php the_field('source'); ?></a></div>
		<?php endif; ?>
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_field('url') ) . '" rel="bookmark">', '</a></h2>' );
	else: ?>
		<?php if(get_field('source')): ?>
			<div class="entry-date"><?php the_field('source'); ?></div>
		<?php endif; ?>
		<?php the_title('<h2 class="entry-title">', '</h2>'); ?>

	<?php endif; ?>
	</header><!-- .entry-header -->
	<?php endif; ?>


	<div class="entry-content">

		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'celsius' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'celsius' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<!-- <?php celsius_entry_footer(); ?> -->
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
