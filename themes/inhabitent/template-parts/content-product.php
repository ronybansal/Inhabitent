<?php
/**
 * Template part for displaying posts.
 *
 * @package RED_Starter_Theme
 */

?>

<div class="product-grid-item">
	<div class="product-image">
    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'large' ); ?></a>
  </div><!-- .product-image -->

  <div class="product-info">
    <?php the_title( sprintf( '<h2 class="product-title"></h2>' )); ?>
		.......<div class="product-price">
      <?php echo CFS()->get( 'price' ); ?>
	  </div><!-- .product-price -->
  </div> <!-- .product-info -->
</div><!-- .product-grid-item -->
