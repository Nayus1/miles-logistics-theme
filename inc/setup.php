<?php
/**
 * One-time setup: creates the site's pages, sets the static front page and clean URLs.
 * Runs the first time you open WP Admin after activating the theme. Safe to re-run.
 */
defined( 'ABSPATH' ) || exit;

add_action( 'admin_init', static function () {
	if ( get_option( 'miles_setup_done' ) ) {
		return;
	}

	$pages = [ 'home' => 'Home', 'about-us' => 'About Us', 'contact-us' => 'Contact Us', 'privacy-policy' => 'Privacy Policy' ];
	foreach ( miles_data( 'services' ) as $service ) {
		$pages[ $service['slug'] ] = $service['title'];
	}

	$ids = [];
	foreach ( $pages as $slug => $title ) {
		$existing    = get_page_by_path( $slug );
		$ids[ $slug ] = $existing ? $existing->ID : wp_insert_post( [
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => $title,
			'post_name'    => $slug,
			'post_content' => 'privacy-policy' === $slug ? miles_privacy_text() : '',
		] );
	}

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $ids['home'] );

	global $wp_rewrite;
	$wp_rewrite->set_permalink_structure( '/%postname%/' );
	flush_rewrite_rules();

	update_option( 'miles_setup_done', 1 );
} );

/** Draft privacy policy. Have it reviewed before launch. */
function miles_privacy_text(): string {
	$email = esc_html( miles_data( 'site' )['email'] );
	return <<<HTML
<p>This draft explains how Miles Logistics handles information you share through this website.</p>
<h2>Information we collect</h2>
<p>When you send an enquiry we collect your name, email address, phone number (optional) and the details of your message.</p>
<h2>How we use it</h2>
<p>We use this information only to respond to your enquiry and to arrange the services you ask about.</p>
<h2>Sharing</h2>
<p>We do not sell your information. It is processed by our form and email providers solely to deliver your message to us.</p>
<h2>Your choices</h2>
<p>You can ask us to correct or delete the information you have sent us at any time.</p>
<h2>Contact</h2>
<p>Questions about this policy can be sent to {$email}.</p>
HTML;
}
