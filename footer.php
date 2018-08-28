<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package celsius
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="footer-details --light">
			<div class="container">
				<div class="footer-hours">
					<h2 class="footer-label">Hours</h2>
					<?php if(have_rows('hours', 'site_options') ) : 
						while(have_rows('hours', 'site_options') ) : the_row(); ?>
					<p><?php the_sub_field('days'); ?><br><?php the_sub_field('time'); ?></p>
					<?php endwhile; ?>
					<?php endif; ?>
					
				</div>
				<div class="footer-location">
					<h2 class="footer-label">Location</h2>
					<p><?php the_field('address', 'site_options'); ?></p>
					
					<p><img src="<?php echo get_template_directory_uri(); ?>/images/map-temp.png" /></p>
				</div>
				<div class="footer-contact">
					<h2 class="footer-label">Contact Us</h2>
					<p><a href="mailto:<?php echo antispambot( 'info@13celsius.com' ); ?>"><?php echo antispambot('info@13celsius.com'); ?></a></p>
				</div>
				<div class="footer-family">
					<h2 class="footer-label">Our Family</h2>
					<div class="family-logo">
						<a href="//mongooseversuscobra.com">
							<img src="<?php echo get_template_directory_uri(); ?>/images/mvscpurple.svg" />
						</a>
					</div>
					<div class="family-logo">
						<a href="//weights-measures.com/">
							<img src="<?php echo get_template_directory_uri(); ?>/images/wmpurple.svg" />
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-section footer-section__main --dark">
			<div class="container">
				<div class="footer-13logo">
					<img src="<?php echo get_template_directory_uri(); ?>/images/thirteenonly.svg" />
				</div>
				<div class="footer-social">

					<div class="footer-wordmark">
						<img src="<?php echo get_template_directory_uri(); ?>/images/wordmark.svg" />
					</div>	
					<?php if(have_rows('social_media', 'site_options')): ?>
						<ul class="social-icons">
							<?php while(have_rows('social_media', 'site_options')): the_row(); ?>
								<li class="social-icon">
									<a href="<?php the_sub_field('url'); ?>">
										<?php the_sub_field('icon'); ?>
									</a>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
						
				</div>
				<div class="footer-middle">
					<div class="footer-newsletter">
						<label for="newsletter">Sign up for our newsletter</label>
						<input type="text" id="newsletter" />
					</div>
					<div class="footer-nav">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</div>
				</div>
			</div>
		</div>
				
		<div class="site-info">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Site by: %1s', 'celsius' ), '<a href="http://coredesignstudio.com">CORE Design Studio</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
