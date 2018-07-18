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

    <div class="page-section page-section--inquiries">
      <div class="container">
				<!-- <h2 class="section__header">Special Requests</h2> -->
				<div class="left-column">
					<div class="inquiries__intro">
					<p>Interested in reserving some space or the patio for a large party or private function? Looking to order wine? Fill out the form and we'll get back to you.</p>
					</div>
					<div class="inquiries__text">
						<p>Submitting this form does not guarantee a reservation. We will contact you within 48 hours to discuss your request.</p>
					</div>
				</div>
				<div class="right-column">
					<form id="inquiries-form">
						<label for="your-name">Your Name</label>
						<input id="your-name" type="text" required>
						<label for="email">E-mail</label>
						<input id="email" type="email" required>
						<label for="phone-number">Phone Number</label>
						<input id="phone-number" type="tel" placeholder="713-123-4567" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
						<label for="request">Request:</label>
						<textarea id="request" rows="5" placeholder="Let us know how we can help."></textarea>
						<button type="submit" class="animated-submit">Submit <span class="link-arrow">→</span></button>
					</form>	
				</div>
			</div>
      
		</div>
		<div class="image-section" style="--background-url: url('https://picsum.photos/1920/1080/?random');">
			
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
