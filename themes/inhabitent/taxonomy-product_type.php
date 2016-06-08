<?php
/**
 * The template for displaying product type pages.
 *
 * @package inhabitent_Theme
 */

get_header(); ?>
<div class="page-content">

	<div id="primary" class="product-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="product-header">
				<div class="product-tax-page">
					<h1><?php single_term_title(); ?></h1>
					<p>
						<?php echo term_description(); ?>
					</p>
				</div>
			</header><!-- .page-header -->

			<div class="product-grid">

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
							get_template_part( 'template-parts/content', 'product' );
						?>
					<?php endwhile; ?>

					<?php else : ?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; ?>

			</div><!-- .product-grid-item -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .page-content -->

<?php get_footer(); ?>
