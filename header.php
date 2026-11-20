<?php
/**
 * Site header: <head>, skip link, logo and primary navigation. Opens <main>, which footer.php closes.
 */
$nav = miles_data( 'nav' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header">
	<div class="container site-header__inner">

		<a class="site-logo" href="<?= miles_link( '/' ) ?>">
			<?= miles_img( 'logo-light', 'Miles Logistics', [ 'loading' => 'eager', 'sizes' => '175px' ] ) ?>
		</a>

		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" aria-label="Open menu">
			<span class="nav-toggle__bars"></span>
		</button>

		<nav id="site-nav" class="site-nav" aria-label="Primary">
			<ul class="site-nav__list">
				<?php foreach ( $nav as $item ) : ?>
					<li<?= ! empty( $item['children'] ) ? ' class="has-sub"' : '' ?>>
						<a href="<?= miles_link( $item['url'] ) ?>"<?= miles_is_current( $item['current'] ) ? ' aria-current="page"' : '' ?>>
							<?= esc_html( $item['label'] ) ?>
							<?php if ( ! empty( $item['children'] ) ) { miles_icon( 'chevron-down' ); } ?>
						</a>
						<?php if ( ! empty( $item['children'] ) ) : ?>
							<ul class="sub-menu">
								<?php foreach ( $item['children'] as $child ) : ?>
									<li><a href="<?= miles_link( $child['url'] ) ?>"<?= miles_is_current( $child['current'] ) ? ' aria-current="page"' : '' ?>><?= esc_html( $child['label'] ) ?></a></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<a class="btn btn--primary" href="<?= miles_link( miles_contact_path( 'quote' ) ) ?>">Get Started</a>
		</nav>

	</div>
</header>

<main id="main">
