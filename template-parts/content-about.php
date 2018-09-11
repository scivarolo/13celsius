<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celsius
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php $history = get_field('history_section'); ?>
    <div class="page-section page-section--history">
      <div class="container">
				<h2 class="section__header history__header"><?php echo $history['heading']; ?></h2>
				<img class="image1" src="<?php echo $history['right_image_horizontal']['sizes']['large']; ?>">
				<div class="history__intro">
					<p><?php echo $history['intro'] ?></p>
				</div>
				<div class="history__content">
					<?php echo $history['content']; ?>
				</div>
				<img class="image2" src="<?php echo $history['left_image_vertical']['sizes']['large']; ?>">
			</div>
      
		</div>

		<?php echo get_template_part('template-parts/sections', 'page'); ?>

		<?php if( have_rows('staff') ) : ?>
    <div class="page-section page-section--people">
			<div class="container">
				<h2 class="section__header">People</h2>
				<ul class="people__list">
				
				<?php while( have_rows('staff') ) : the_row(); ?>
				
					<li class="person">
						<?php if(get_sub_field('photo') ) : 
							$headshot = get_sub_field('photo');?>
							<img class="person__photo" src="<?php echo $headshot['sizes']['thumbnail']; ?>">
						<?php endif; ?>
						
						<div class="person__bio">
							<h3 class="person__name"><?php the_sub_field('name'); ?></h3>
							<span class="person__title"><?php the_sub_field('position'); ?></span>
							<p><?php the_sub_field('bio'); ?></p>
						</div>
					</li>
					
				<?php endwhile; ?>
					
				</ul>
			</div>
    </div>
    <?php endif; ?>
		
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
