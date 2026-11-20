<?php
/**
 * Small helper functions used by the templates.
 */
defined( 'ABSPATH' ) || exit;

/** Returns one block of content from inc/data.php (loaded once). */
function miles_data( string $key ) {
	static $data = null;
	$data ??= require get_theme_file_path( 'inc/data.php' );
	return $data[ $key ] ?? null;
}

/** Escaped, absolute URL for a path such as "/about-us/". */
function miles_link( string $path ): string {
	return esc_url( home_url( $path ) );
}

/** Path to the contact form with an enquiry type pre-selected. */
function miles_contact_path( string $type = 'general' ): string {
	return "/contact-us/?enquiry=$type#enquiry";
}

/** "+234 800 000 0000" becomes "+2348000000000" for tel: links. */
function miles_phone_href( string $phone ): string {
	return preg_replace( '/[^\d+]/', '', $phone );
}

/** Turns "Moving *goods*" into "Moving <span class="accent">goods</span>" (safely escaped). */
function miles_accent( string $text ): string {
	return preg_replace( '/\*(.+?)\*/', '<span class="accent">$1</span>', esc_html( $text ) );
}

/** Prints an inline SVG from assets/icons/ so CSS can colour it with currentColor. */
function miles_icon( string $name, string $class = 'icon' ): void {
	static $cache = [];
	$cache[ $name ] ??= (string) file_get_contents( get_theme_file_path( "assets/icons/$name.svg" ) );
	echo str_replace( '<svg ', '<svg class="' . esc_attr( $class ) . '" aria-hidden="true" focusable="false" ', $cache[ $name ] ); // phpcs:ignore WordPress.Security.EscapeOutput
}

/**
 * Builds a responsive <img> from assets/img/{name}-{width}.webp files.
 * Width/height are set so the page never jumps while images load.
 */
function miles_img( string $name, string $alt = '', array $args = [] ): string {
	static $sets = [];

	if ( ! isset( $sets[ $name ] ) ) {
		$sets[ $name ] = [];
		foreach ( glob( get_theme_file_path( 'assets/img/*.webp' ) ) ?: [] as $file ) {
			if ( preg_match( '/^' . preg_quote( $name, '/' ) . '-(\d+)\.webp$/', basename( $file ), $m ) ) {
				$sets[ $name ][ (int) $m[1] ] = basename( $file );
			}
		}
		ksort( $sets[ $name ] );
	}

	$set = $sets[ $name ];
	if ( ! $set ) {
		return '';
	}

	$widest = array_key_last( $set );
	$srcset = [];
	foreach ( $set as $width => $file ) {
		$srcset[] = get_theme_file_uri( "assets/img/$file" ) . " {$width}w";
	}
	[ , $height ] = getimagesize( get_theme_file_path( 'assets/img/' . $set[ $widest ] ) );

	$a     = wp_parse_args( $args, [ 'class' => '', 'sizes' => '100vw', 'loading' => 'lazy', 'fetchpriority' => '' ] );
	$attrs = [
		'src'           => get_theme_file_uri( 'assets/img/' . $set[ $widest ] ),
		'srcset'        => implode( ', ', $srcset ),
		'sizes'         => $a['sizes'],
		'width'         => $widest,
		'height'        => $height,
		'alt'           => $alt,
		'class'         => $a['class'],
		'loading'       => $a['loading'],
		'decoding'      => 'async',
		'fetchpriority' => $a['fetchpriority'],
	];

	$html = '';
	foreach ( $attrs as $key => $value ) {
		if ( '' !== $value || 'alt' === $key ) {
			$html .= sprintf( ' %s="%s"', $key, esc_attr( $value ) );
		}
	}
	return "<img$html>";
}

/** True when a nav item matches the page being viewed. */
function miles_is_current( $match ): bool {
	if ( 'front' === $match ) {
		return is_front_page();
	}
	return $match && is_page( $match );
}

/** Which page-specific stylesheet to load ("" = none). */
function miles_page_key(): string {
	if ( is_front_page() ) {
		return 'home';
	}
	if ( is_page( 'about-us' ) ) {
		return 'about';
	}
	if ( is_page( 'contact-us' ) ) {
		return 'contact';
	}
	if ( is_page( array_column( miles_data( 'services' ), 'slug' ) ) ) {
		return 'service';
	}
	return '';
}
