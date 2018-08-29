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

    <div class="page-section page-section--history">
      <div class="container">
				<h2 class="section__header history__header">History</h2>
				<img class="image1" src="//picsum.photos/1920/1080/?random&blur">
				<div class="history__intro">
					<p>Our goal is to not only emulate the wine bars and enotecas of Europe, but to surpass them in quality and range of selection.</p>
				</div>
				<div class="history__content">
					<p>13 is house in a 1920s era Mediterranean-style building in an often forgotten portion of Midtown in Houston, Texas. The building was originally constructed as Jenning's Cleaners and Dyeing Shoppe and operated as such until 2004. Rather than raze this aging structure and build anew, we chose to harness the underlying beauty of its original character by preserving key components to the space such as an entirely intact pressed tin ceiling and an open-air courtyard created (by the building's own volition) when a portion of the roof fell. We built a 40-foot bar of antiqued white Carrera marble and furnished the space with furniture salvaged from an historic Houston institution, the Warwick Hotel.</p>
					<p>We complement our wines with a dynamic cheese and charcuterie program, fill empty bellies with impressive panini and satisfy a sweet tooth with handmade truffles.</p>
					<p>We also cultivate an aggressive hops and water program with over 30 bottled beers and a continually rotating draught selection highlighting seasonal and miniscule production brews.</p>
					<p>We design wine flights, host wine tastings and make our entire collection available for retail purchase. We also partner with outstanding local chefs to create wine-centric dinner and special events throughout the year.</p>
				</div>
				<img class="image2" src="//picsum.photos/1080/1920/?random&blur">
			</div>
      
		</div>

		<?php echo get_template_part('template-parts/sections', 'page'); ?>

		
    <div class="page-section page-section--people">
			<div class="container">
				<h2 class="section__header">People</h2>
				<ul class="people__list">
					<li class="person">
						<img class="person__photo" src="//picsum.photos/400/400/?random&blur">
						<h3 class="person__name">Adele Corrigan</h3>
						<span class="person__title">General Manager &amp; Sommelier</span>
						<div class="person__bio">
							<p>13 is housed in a 1920s era Mediterranean-style building in an often forgotten portion of Midtown in Houston, Texas. The building was originally constructed as Jenning's Cleaners and Dyeing Shoppe and operated as such until 2004.</p>
						</div>
					</li>
					<li class="person">
						<img class="person__photo" src="//picsum.photos/400/400/?random&blur">
						<h3 class="person__name">Adele Corrigan</h3>
						<span class="person__title">General Manager &amp; Sommelier</span>
						<div class="person__bio">
							<p>13 is housed in a 1920s era Mediterranean-style building in an often forgotten portion of Midtown in Houston, Texas. The building was originally constructed as Jenning's Cleaners and Dyeing Shoppe and operated as such until 2004.</p>
						</div>
					</li>
					<li class="person">
						<img class="person__photo" src="//picsum.photos/400/400/?random&blur">
						<h3 class="person__name">Adele Corrigan</h3>
						<span class="person__title">General Manager &amp; Sommelier</span>
						<div class="person__bio">
							<p>13 is housed in a 1920s era Mediterranean-style building in an often forgotten portion of Midtown in Houston, Texas. The building was originally constructed as Jenning's Cleaners and Dyeing Shoppe and operated as such until 2004.</p>
						</div>
					</li>
					<li class="person">
						<img class="person__photo" src="//picsum.photos/400/400/?random&blur">
						<h3 class="person__name">Adele Corrigan</h3>
						<span class="person__title">General Manager &amp; Sommelier</span>
						<div class="person__bio">
							<p>13 is housed in a 1920s era Mediterranean-style building in an often forgotten portion of Midtown in Houston, Texas. The building was originally constructed as Jenning's Cleaners and Dyeing Shoppe and operated as such until 2004.</p>
						</div>
					</li>
				</ul>
			</div>
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
