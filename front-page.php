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
						<img class="masthead__logo" alt="13 Celsius" src="<?php echo get_template_directory_uri(); ?>/images/celsiuslogocopy.png" />
						<div class="masthead__details">
							<div class="masthead__location">
								<h2 class="masthead__label">Location</h2>
								<p><?php the_field('address', 'site_options'); ?></p>
							</div>
							<div class="masthead__hours">
								<h2 class="masthead__label">Hours</h2>
								<?php if(have_rows('hours', 'site_options') ) :
									while(have_rows('hours', 'site_options') ) : the_row(); ?>
										<p><?php the_sub_field('days'); ?> <?php the_sub_field('time'); ?></p>
									<?php endwhile; ?>
								<?php endif; ?>

							</div>
						</div>
          </div>


         	<div class="entry-content">

					<?php echo get_template_part('template-parts/sections', 'page'); ?>

					<!-- Events Loop -->
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

										<?php $event_image = get_field('background_image'); ?>
										<?php if($event_image): ?>
											<a href="<?php the_permalink(); ?>"><img class="event-thumbnail" src="<?php echo $event_image['sizes']['medium_large'] ?>" /></a>
										<?php endif; ?>
										<div class="home-event__wrapper">
											<div class="home-event__date">
												<?php the_field('event_date'); ?>
											</div>
											<h3 class="event__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<p class="event__description"><?php the_excerpt(); ?></p>
										</div>
									</li>

									<?php endforeach; ?>


								</ul>
								<div class="all-events-link">
								<a class="text-link" href="<?php echo get_post_type_archive_link('events'); ?>">All Events</a>
								</div>
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
