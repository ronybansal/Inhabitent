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

    <!-- Sorts Journal Logs on Front Page -->

      <?php
         $args = array( 'post_type' => 'post', 'posts_per_page' => 3 );
         $journal_posts = get_posts( $args ); // returns an array of posts
      ?>
      <?php foreach ( $journal_posts as $post ) : setup_postdata( $post ); ?>
         <?php the_title(); ?>
      <?php endforeach; wp_reset_postdata(); ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
