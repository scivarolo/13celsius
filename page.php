<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
		while ( have_posts() ) :
			the_post();

			/* Page Masthead */ ?>
			<?php $masthead_image = get_field('background_image');
					if($masthead_image) : ?>
						<div class="masthead masthead--page" style="background: linear-gradient(to top, rgba(29, 0, 25, 0.5), rgba(29, 0, 25, 0.5)), url('<?php echo $masthead_image['sizes']['masthead']; ?>') fixed center/cover;">
					<?php else : ?>
						<div class="masthead masthead--page">
					<?php endif; ?>
						<div class="masthead__content">
							<div class="grid-wrapper">
								<h1 class="masthead__title"><?php the_title(); ?></h1>
								<div class="masthead__intro"><?php the_content(); ?></div>
							</div>
						</div>
					</div>
					
			<?php if(is_page(get_page_by_title('Menu') ) ) {
				get_template_part( 'template-parts/content', 'menu' );
			} elseif(is_page(get_page_by_title('About Thirteen') ) ) {
				get_template_part( 'template-parts/content', 'about' );
			} elseif(is_page(get_page_by_title('Inquiries') ) ) { 
				get_template_part( 'template-parts/content', 'inquiries' );
			} else {
			  get_template_part( 'template-parts/content', 'page' );
			}	
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
