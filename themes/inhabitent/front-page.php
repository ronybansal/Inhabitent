<?php
/**
* The template for the front page.
*
* @package Inhabitent
*/


get_header(); ?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <div class= "herobanner">
        <div class= "herologo">
          <img src=
            "<?php echo get_template_directory_uri(); ?>/img/logos/inhabitent-logo-full.svg"
            class= "logo" alt= "Inhabitent Logo" />
        </div>
      </div>


      <!-- SHOP SECTION -->

      <section class= "fp-shop">
        <h1 class= "fp-header"> Shop Stuff </h1>
        <?php
          $terms = get_terms( array (
            'taxonomy' => 'product_type',
            'hide_empty' => false,
          ));
        ?>


        <!-- BOXES FOR SHOP CATEGORIES -->

        <div class= "fp-shop-box container">
          <?php foreach ($terms as $term): ?>
          <div class= "fp-shop-ctg">
              <img    src="wp-content/themes/inhabitent/img/product-type-icons/<?php echo $term->slug . '.svg'; ?>" alt= "icons"
              />

              <p> <?php echo $term->description; ?> </p>
              <a class="green-btn" href=
              "<?php echo get_term_link($term, 'product-type') ?>"> <?php echo $term->name?> Stuff
              </a>
            </div>

            <?php endforeach; wp_reset_postdata(); ?>
          </div>
        </section>


        <!-- SORTS JOURNALS TO POST 3 PIECES-->

      <section class= "fp-journal container">
				<h1 class= "fp-header">Inhabitent Journal</h1>

        <div class="fp-journal-wrapper">
					<?php
					   $args = array( 'post_type' => 'post', 'posts_per_page' => 3 );
					   $journal_posts = get_posts( $args ); // returns an array of posts
					?>

          <?php foreach ( $journal_posts as $post ) : setup_postdata( $post ); ?>

					<div class="fp-journal-box">
						<?php the_post_thumbnail(); ?>

            <div class="fp-journal-info">
						  <p> <?php the_date('j F Y') ?> /
                <?php echo comments_number(); ?>
              </p>

              <h3>
                <a href=
                  "<?php echo get_permalink(); ?>"><?php the_title(); ?>
                </a>
              </h3>
							<a class= "black-btn" href=
                "<?php echo get_permalink();   ?>">Read Entry
              </a>
						</div>
					</div> <!-- .FP-JOURNAL-BOX -->

					<?php endforeach; wp_reset_postdata(); ?>
				</div> <!-- .FP-JOURNAL -->
			</section>


      <!-- Latest Adventures -->

      <section class="adventures container">
        <h1 class= "fp-header">Latest Adventures</h1>

        <ul class="clearfix">
          <?php
            $query = new WP_Query( array(
              'post_type' => 'adventure',
              'order' => 'ASC',
              'orderby' => 'date',
              'posts_per_page' => 4)
            );

            while ( $query->have_posts() ) : $query->the_post();
          ?>

          <li>
            <div class="story-wrap">

              <div class="adventure-img">
                <?php the_post_thumbnail( 'full' ); ?>
              </div>

              <div class="story-info">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <a class="white-btn" href="<?php the_permalink(); ?>"> Read More </a>
              </div>
            </div>
          </li>

          <?php endwhile; wp_reset_postdata(); ?>
        </ul>

        <p class="clearfix">
          <a href="adventures" class="green-btn"> More Adventures </a>
        </p>
      </section><!-- .adventures -->

    </main> <!-- #main -->
  </div> <!-- #primary -->

<?php get_footer(); ?>
