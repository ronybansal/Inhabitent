<?php
/**
 * The template for displaying all single posts.
 *
 * @package inhabitent_Theme
 */

get_header(); ?>
<div class="single-product-content">

	<div id="primary" class="product-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'large' ); ?>
					<?php endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<div class="price">
						<?php echo CFS()->get( 'price' ); ?>
					</div>
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->


			</article><!-- #post-## -->

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .single-product-content -->

<?php get_footer(); ?>
