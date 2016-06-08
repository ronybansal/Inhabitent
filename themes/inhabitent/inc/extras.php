<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RED_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );

// Changes Login Logo from WP to Inhabitent
function inhabitent_login_logo() { ?>
  <style type="text/css">
    #login h1 a, .login h1 a {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logos/inhabitent-logo-text-dark.svg);
			background-size: contain;
			width: 100%;
		}
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'inhabitent_login_logo' );

function inhabitent_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'inhabitent_login_logo_url' );

function inhabitent_login_logo_url_title() {
    return 'Inhabitent Camping co';
}
add_filter( 'login_headertitle', 'inhabitent_login_logo_url_title' );


// About Header CSS //
function about_header_styles_method() {

	if ( !is_page_template( 'about.php' ) ) {
		return ;
	}

	$image = CFS()->get( 'header_image' );
  $custom_css = "
		.about-header {
			background: linear-gradient( to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.4) 100% ), url(" . $image . ") no-repeat center bottom;
			background-size: cover, cover;
		}";

	wp_add_inline_style( 'inhabitent-style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'about_header_styles_method' );


// Sorts Product Archive Page

function inhabitent_filter_product_query( $query ) {

	if ( is_post_type_archive() && !is_admin() && $query->is_main_query() ) {
		$query->set( 'orderby', 'title');
		$query->set( 'order', 'ASC');
		$query->set( 'posts_per_page', 16 );
	}

}
add_action( 'pre_get_posts', 'inhabitent_filter_product_query' );

// ARCHIVE PRODUCTS AND ADVENTURE TITLES //

function inhabitent_filter_titles() {
	if (is_post_type_archive('product')) {
		return 'Shop Stuff';
	} else if (is_post_type_archive('adventure')){
		return 'Latest Adventures';
	}
}
add_filter('get_the_archive_title', 'inhabitent_filter_titles');
