<?php
/**
 * The frontpage template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celsius
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


		<?php
		if ( have_posts() ) : ?>


        <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */ ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="masthead">
						<img class="masthead__logo" alt="13 Celsius" src="<?php echo get_template_directory_uri(); ?>/images/celsiuslogo.svg" />
						<div class="masthead__details">
							<div class="masthead__location">
								<p>3000 Caroline</p>
								<p>Houston, TX 77004</p>
							</div>
							<div class="masthead__hours">
								<p>Monday–Saturday 4 pm–2 am</p>
								<p>Sunday 1 pm–2 am</p>
							</div>
						</div>
          </div>


         	<div class="entry-content">

					  <div class="home-block --dark">
							<div class="home-block__wrapper container">
								<div class="home-block__heading">
									<h2>Philosophia</h2>
								</div>
								<div class="home-block__content">
									<p>At 13, it is our mission to select wines of unique character and superior quality from all over the world. We store these wines in a climate-controlled cellar at 13 degrees celsius and serve them to our patrons by the bottle, glass, half-glass and taste.</p>
								</div>
							</div>
						</div>
						<div class="home-block --dark --has-bg-image" style="--background-url: url('https://picsum.photos/1920/1080/?random');">
							<div class="home-block__wrapper container">
								<div class="home-block__heading">
									<h2>Philosophia</h2>
								</div>
								<div class="home-block__content">
									<p>At 13, it is our mission to select wines of unique character and superior quality from all over the world. We store these wines in a climate-controlled cellar at 13 degrees celsius and serve them to our patrons by the bottle, glass, half-glass and taste.</p>
									<a class="text-link">View our Menus <span class="link-arrow">→</span></a>
								</div>
							</div>
						</div>
						<div class="home-events container">
							<div class="home-events__wrapper">
								<h2 class="home-events__heading">Events</h2>
								<ul class="home-events__list">
									<li class="home-event">
										<div class="home-event__date">
											<span class="date__month">NOV</span>
											<span class="date__day">23</span>
										</div>
										<h3 class="event__heading">Portuguese Wine Week</h3>
										<p class="event__description">Join us for Portuguese wine week.</p>
									</li>
									<li class="home-event">
										<div class="home-event__date">
											<span class="date__month">NOV</span>
											<span class="date__day">23</span>
										</div>
										<h3 class="event__heading">Portuguese Wine Week</h3>
										<p class="event__description">Join us for Portuguese wine week.</p>
									</li>
									<li class="home-event">
										<div class="home-event__date">
											<span class="date__month">NOV</span>
											<span class="date__day">23</span>
										</div>
										<h3 class="event__heading">Portuguese Wine Week</h3>
										<p class="event__description">Join us for Portuguese wine week.</p>
									</li>
									<li class="home-event">
										<div class="home-event__date">
											<span class="date__month">NOV</span>
											<span class="date__day">16</span>
										</div>
										<h3 class="event__heading">Portuguese Wine Week</h3>
										<p class="event__description">Join us for Portuguese wine week.</p>
									</li>
									<li class="home-event">
										<div class="home-event__date">
											<span class="date__month">NOV</span>
											<span class="date__day">23</span>
										</div>
										<h3 class="event__heading">Portuguese Wine Week</h3>
										<p class="event__description">Join us for Portuguese wine week.</p>
									</li>
									<li class="home-event">
										<div class="home-event__date">
											<span class="date__month">NOV</span>
											<span class="date__day">23</span>
										</div>
										<h3 class="event__heading">Portuguese Wine Week</h3>
										<p class="event__description">Join us for Portuguese wine week.</p>
									</li>
									<li class="home-event">
										<div class="home-event__date">
											<span class="date__month">NOV</span>
											<span class="date__day">23</span>
										</div>
										<h3 class="event__heading">Portuguese Wine Week</h3>
										<p class="event__description">Join us for Portuguese wine week.</p>
									</li>
									<li class="home-event">
										<div class="home-event__date">
											<span class="date__month">NOV</span>
											<span class="date__day">16</span>
										</div>
										<h3 class="event__heading">Portuguese Wine Week</h3>
										<p class="event__description">Join us for Portuguese wine week.</p>
									</li>
								</ul>
							</div>
						</div>
         		<?php
         		// the_content();

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

			<?php endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();