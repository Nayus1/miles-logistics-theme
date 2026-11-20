<?php
/**
 * Contact Us page: details, map and the enquiry form.
 */
$site  = miles_data( 'site' );
$items = [
	[ 'mail', $site['email'], 'mailto:' . $site['email'] ],
	[ 'phone', $site['phone'], 'tel:' . miles_phone_href( $site['phone'] ) ],
	[ 'map-pin', $site['address'], '' ],
];

get_header();
?>

<section class="section">
	<div class="container split">
		<div class="stack">
			<p class="tag">Get in touch</p>
			<h1>Let's get things moving.</h1>
			<p class="lead">Have a delivery to arrange, goods to transport or a question about our services? We'd be glad to hear from you. We're just a message away.</p>
			<ul class="contact-list">
				<?php foreach ( $items as [ $icon, $text, $href ] ) : ?>
					<li>
						<span class="contact-list__icon"><?php miles_icon( $icon ); ?></span>
						<?php if ( $href ) : ?>
							<a href="<?= esc_url( $href ) ?>"><?= esc_html( $text ) ?></a>
						<?php else : ?>
							<span><?= esc_html( $text ) ?></span>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<iframe class="map" src="<?= esc_url( $site['map'] ) ?>" title="Map of Lagos, Nigeria" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
</section>

<section class="section section--peach" id="enquiry">
	<div class="container form-section">
		<div class="stack">
			<h2>Send us a <span class="accent">message.</span></h2>
			<p class="lead">Tell us what you need moved and our team will get back to you with the next steps.</p>
		</div>
		<?php get_template_part( 'template-parts/enquiry-form', null, [ 'id' => 'contact', 'default' => 'general' ] ); ?>
	</div>
</section>

<?php
get_template_part( 'template-parts/cta-band', null, [
	'title'   => 'Have something that needs *moving?*',
	'text'    => 'Whether it\'s cargo, commercial goods or an everyday delivery, let\'s talk about what you need.',
	'buttons' => [ [ 'Explore Our Services', '/#services', 'navy' ] ],
] );

get_footer();
