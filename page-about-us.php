<?php
/**
 * About Us page.
 */
$pillars = [
	[ 'route', 'Movement with purpose', 'Every transportation and delivery requirement deserves a solution suited to the journey.' ],
	[ 'network', 'Connected solutions', 'Bringing different logistics needs and delivery services together.' ],
	[ 'handshake', 'People at the centre', 'Supporting the businesses, individuals and delivery partners involved in every movement.' ],
];

get_header();
?>

<section class="about-hero">
	<?= miles_img( 'hero-about', 'The Miles Logistics headquarters and fulfilment centre at sunset', [ 'class' => 'about-hero__bg', 'loading' => 'eager', 'fetchpriority' => 'high' ] ) ?>
	<div class="container">
		<div class="stack about-hero__copy">
			<p class="tag tag--solid">About Miles Logistics</p>
			<h1>Moving what matters. <span class="accent">Connecting what's next.</span></h1>
			<p>Miles Logistics supports the movement of goods through freight, transportation and delivery solutions designed around the needs of businesses and individuals.</p>
			<p>From larger cargo movements to everyday deliveries, we're focused on making the movement of goods simpler and more connected.</p>
			<a class="btn btn--primary" href="<?= miles_link( '/#services' ) ?>">Explore Our Services</a>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="split">
			<div class="stack approach">
				<p class="tag">Our approach</p>
				<h2>Every movement has <span class="accent">a&nbsp;purpose.</span></h2>
				<p>The movement of goods plays an important role in how businesses operate and how people stay connected. Miles Logistics exists to support that movement through transportation and delivery solutions that serve different needs.</p>
				<p>Our work spans freight and cargo, road transportation, business deliveries and last-mile delivery. Each service contributes to one bigger purpose: helping goods move between the places they need to be.</p>
				<p>We bring these services together under one logistics brand, giving customers a place to explore solutions for their transportation and delivery requirements.</p>
			</div>
			<div class="split__media">
				<?= miles_img( 'about-approach', 'A Miles Logistics truck at a container port', [ 'sizes' => '(min-width: 900px) 530px, 90vw' ] ) ?>
			</div>
		</div>

		<ul class="pillars">
			<?php foreach ( $pillars as [ $icon, $title, $text ] ) : ?>
				<li class="card pillar">
					<span class="pillar__icon"><?php miles_icon( $icon ); ?></span>
					<h3><?= esc_html( $title ) ?></h3>
					<p><?= esc_html( $text ) ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<?php
get_template_part( 'template-parts/cta-band', null, [
	'title'   => 'Have something that needs *moving?*',
	'text'    => 'Whether it\'s cargo, commercial goods or an everyday delivery, let\'s talk about what you need.',
	'buttons' => [
		[ 'Contact Miles Logistics', '/contact-us/', 'navy' ],
		[ 'Explore Our Services', '/#services', 'outline' ],
	],
] );

get_footer();
