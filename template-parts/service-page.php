<?php
/**
 * Layout shared by the four service pages. Args: one service from inc/data.php.
 */
$s     = $args;
$strip = [
	[ 'shield-check', 'Safe & Secure', 'Your goods, our priority.' ],
	[ 'zap', 'On-Time Delivery', 'Keeping your business on track.' ],
	[ 'headset', 'Dedicated Support', 'Always here to help.' ],
];
$contact = miles_contact_path( $s['enquiry'] );
?>
<section class="svc-hero">
	<?= miles_img( $s['hero_img'], $s['hero_alt'], [ 'class' => 'svc-hero__img', 'loading' => 'eager', 'fetchpriority' => 'high', 'sizes' => '(min-width: 900px) 62vw, 100vw' ] ) ?>
	<div class="container svc-hero__inner">
		<div class="stack svc-hero__copy">
			<p class="tag"><?= esc_html( $s['tag'] ) ?></p>
			<h1><?= miles_accent( $s['hero_title'] ) ?></h1>
			<p class="lead"><?= esc_html( $s['hero_text'] ) ?></p>
			<a class="btn btn--primary" href="<?= miles_link( $contact ) ?>">Request a Quote</a>
			<ul class="strip strip--glass">
				<?php foreach ( $strip as [ $icon, $title, $text ] ) : ?>
					<li><?php miles_icon( $icon ); ?><div><strong><?= esc_html( $title ) ?></strong><span><?= esc_html( $text ) ?></span></div></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>

<section class="section section--peach">
	<div class="container split">
		<div class="stack">
			<h2><?= miles_accent( $s['detail_title'] ) ?></h2>
			<p class="lead"><?= esc_html( $s['detail_text'] ) ?></p>
			<div>
				<h3 class="supports-title">What this service supports:</h3>
				<ul class="supports">
					<?php foreach ( $s['supports'] as $item ) : ?>
						<li><?= esc_html( $item ) ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="split__media">
			<?= miles_img( $s['detail_img'], $s['detail_alt'], [ 'sizes' => '(min-width: 900px) 530px, 90vw' ] ) ?>
		</div>
	</div>
</section>

<?php
get_template_part( 'template-parts/cta-band', null, [
	'title'   => $s['cta_title'],
	'text'    => $s['cta_text'],
	'buttons' => [ [ $s['cta_button'], $contact, 'navy' ] ],
] );
