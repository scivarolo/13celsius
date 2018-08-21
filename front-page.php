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
					<?php $masthead_image = get_field('background_image');
					if($masthead_image) : ?>
						<div class="masthead masthead--home" style="background: linear-gradient(to top, rgba(29, 0, 25, 0.5), rgba(29, 0, 25, 0.5)), url('<?php echo $masthead_image['sizes']['masthead']; ?>') fixed center/cover;">
					<?php else : ?>
						<div class="masthead masthead--home">
					<?php endif; ?>
						<img class="masthead__logo" alt="13 Celsius" src="<?php echo get_template_directory_uri(); ?>/images/celsiuslogo.svg" />
						<div class="masthead__details">
							<div class="masthead__location">
								<p><?php the_field('address', 'site_options'); ?></p>
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
						<div class="home-block --dark --has-bg-image" style="--background-url: url('https://picsum.photos/1920/1080/?random&blur');">
							<div class="home-block__wrapper container">
								<div class="home-block__heading">
									<h2>Menu</h2>
								</div>
								<div class="home-block__content">
									<p>At 13, it is our mission to select wines of unique character and superior quality from all over the world. We store these wines in a climate-controlled cellar at 13 degrees celsius and serve them to our patrons by the bottle, glass, half-glass and taste.</p>
									<a class="text-link">View our Menus <span class="link-arrow">→</span></a>
								</div>
							</div>
						</div>

						<?php $posts = get_posts(array(
							'numberposts' => 6,
							'post_type' => 'events',
							'orderby' => 'meta_value',
							'order' => 'ASC',
							'meta_key' => 'event_date',
							'meta_query' => array(
									array(
										'key' => 'event_date',
										'value' => date('Y-m-d h:i:s'),
										'compare' => '>=',
									),
								),
							)); ?>

						<?php if($posts): ?>

						<div class="home-events container">
							<div class="home-events__wrapper">
								<h2 class="home-events__heading">Events</h2>
								<ul class="home-events__list">

									<?php foreach($posts as $post) : setup_postdata($post); ?>

									<li class="home-event">
										<div class="home-event__date">
											<?php the_field('event_date'); ?>
										</div>
										<h3 class="event__heading"><?php the_title(); ?></h3>
										<p class="event__description"><?php the_excerpt(); ?></p>
									</li>

									<?php endforeach; ?>

									
								</ul>
							</div>
						</div>

							<?php wp_reset_postdata();
							endif; ?>

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
