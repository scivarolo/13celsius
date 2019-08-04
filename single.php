<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package celsius
 */

get_header();
?>
<?php
		while ( have_posts() ) :
			the_post(); ?>

<?php $masthead_image = get_field('background_image');
	if($masthead_image) : ?>
		<div class="masthead masthead--page" style="background: linear-gradient(to top, rgba(29, 0, 25, 0.5), rgba(29, 0, 25, 0.5)), url('<?php echo $masthead_image['sizes']['masthead']; ?>') fixed top/100%;">
	<?php else : ?>
		<div class="masthead masthead--page">
	<?php endif; ?>
		<div class="masthead__content">
			<div class="grid-wrapper">
				<div class="masthead__date"><?php the_date(); ?></div>
				<h1 class="masthead__title"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>

	<div class="container blog-grid">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


			<?php get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(); ?>
</div>

	<?php endwhile; // End of the loop.
		?>

<?php get_footer();
