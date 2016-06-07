<?php
/**
 * The template for displaying archive product page.
 *
 * @package inhabitent_Theme
 */

get_header(); ?>
<div class="shop-page">

	<div id="primary" class="product-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

		<header class="product-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>

			<ul class="product-links">
				<?php $terms = get_terms(
					array(
					'taxonomy' => 'product_type',
					'hide_empty' => false,) );

					foreach ( $terms as $product_type) : ?>
						<li>
							<a href="<?php home_url(); ?>/wordpress/product-type/<?php echo $product_type->slug; ?>"><?php echo $product_type->name; ?></a>
						</li>
				<?php endforeach; ?>
			</ul><!-- .product-links -->
		</header><!-- .product-header -->

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
