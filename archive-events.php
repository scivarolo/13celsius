<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celsius
 */

get_header();
?>
<?php $masthead_image = get_field('background_image');
	if($masthead_image) : ?>
		<div class="masthead masthead--page" style="background: linear-gradient(to top, rgba(29, 0, 25, 0.5), rgba(29, 0, 25, 0.5)), url('<?php echo $masthead_image['sizes']['masthead']; ?>') fixed center/cover;">
	<?php else : ?>
		<div class="masthead masthead--page">
	<?php endif; ?>
		<div class="masthead__content">
			<div class="grid-wrapper">
				<h1 class="masthead__title">Events</h1>
			</div>
		</div>
	</div>
	<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
			
			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

			else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar(); ?>
		</div>


<?php
get_footer();
