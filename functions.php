<?php
/**
 * Theme setup: features, assets and performance clean-up.
 */
defined( 'ABSPATH' ) || exit;

require_once get_theme_file_path( 'inc/helpers.php' );
require_once get_theme_file_path( 'inc/setup.php' );

// Features this theme supports.
add_action( 'after_setup_theme', static function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', [ 'style', 'script', 'search-form' ] );
} );

// Stylesheets and scripts. Each page loads only the files it needs.
add_action( 'wp_enqueue_scripts', static function () {
	$ver  = wp_get_theme()->get( 'Version' );
	$base = get_theme_file_uri( 'assets' );
	$page = miles_page_key();

	wp_enqueue_style( 'miles-base', "$base/css/base.css", [], $ver );
	if ( $page ) {
		wp_enqueue_style( "miles-$page", "$base/css/$page.css", [ 'miles-base' ], $ver );
	}

	$defer = [ 'strategy' => 'defer', 'in_footer' => true ];
	wp_enqueue_script( 'miles-navigation', "$base/js/navigation.js", [], $ver, $defer );
	if ( in_array( $page, [ 'home', 'contact' ], true ) ) {
		wp_enqueue_script( 'miles-form', "$base/js/form.js", [], $ver, $defer );
	}
}, 20 );

// Preload the two fonts and add a favicon.
add_action( 'wp_head', static function () {
	foreach ( [ 'manrope', 'inter' ] as $font ) {
		printf(
			'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
			esc_url( get_theme_file_uri( "assets/fonts/$font-latin-wght-normal.woff2" ) )
		);
	}
	if ( ! has_site_icon() ) {
		printf( '<link rel="icon" href="%s" type="image/png">' . "\n", esc_url( get_theme_file_uri( 'assets/img/favicon.png' ) ) );
	}
}, 1 );

// Remove WordPress extras this theme never uses (fewer requests, faster pages).
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );
add_action( 'wp_enqueue_scripts', static function () {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
}, 100 );
