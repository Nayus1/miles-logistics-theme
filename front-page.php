<?php
/**
 * Home page.
 */
$services   = miles_data( 'services' );
$industries = miles_data( 'industries' );
$faqs       = miles_data( 'faqs' );

// [ icon, title, text ]
$strip = [
	[ 'route', 'Flexible logistics', 'Solutions for different transportation and delivery needs.' ],
	[ 'network', 'Connected network', 'Bringing people, businesses and delivery partners together.' ],
	[ 'building-complex', 'Business-focused', 'Supporting the movement of goods for everyday and commercial needs.' ],
];
$why = [
	[ 'package', 'Multiple logistics needs', 'Different services under one logistics brand.' ],
	[ 'zap', 'Practical solutions', 'Options shaped around the requirements of each movement.' ],
	[ 'network', 'Connected delivery partners', 'A network that supports the final mile.' ],
	[ 'handshake', 'Business and personal needs', 'Services for commercial and everyday delivery requirements.' ],
];

get_header();
?>

<section class="hero">
	<div class="container">
		<div class="hero__grid">
			<div class="stack hero__copy">
				<p class="tag">Delivery, made simple</p>
				<h1><span>Your delivery.</span> <span class="accent">Your way.</span> <span>Right on the move.</span></h1>
				<p class="lead">Miles Logistics connects you with dispatch riders to get your deliveries moving. We're here to make the journey simpler.</p>
				<a class="btn btn--primary" href="#services">Explore our Services <?php miles_icon( 'arrow-right' ); ?></a>
			</div>

			<div class="hero__visual">
				<?= miles_img( 'truck', 'A Miles Logistics delivery truck beside a stack of parcels', [ 'class' => 'hero__truck', 'loading' => 'eager', 'fetchpriority' => 'high', 'sizes' => '(min-width: 900px) 560px, 90vw' ] ) ?>
				<div class="hero-badge hero-badge--top">
					<?php miles_icon( 'truck' ); ?>
					<strong>24/7</strong>
					<span class="hero-badge__title">Logistics that keeps moving</span>
					<span>Connecting deliveries across different destinations.</span>
				</div>
				<div class="hero-badge hero-badge--bottom">
					<?php miles_icon( 'box' ); ?>
					<span class="hero-badge__title">Shipment on the move</span>
					<span>Your delivery is progressing through its journey.</span>
					<span class="progress" aria-hidden="true"><i></i></span>
					<span>Delivery progress</span>
				</div>
			</div>
		</div>

		<ul class="strip">
			<?php foreach ( $strip as [ $icon, $title, $text ] ) : ?>
				<li><?php miles_icon( $icon ); ?><div><strong><?= esc_html( $title ) ?></strong><span><?= esc_html( $text ) ?></span></div></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="section section--peach" id="services">
	<div class="container split split--text-first">
		<div class="stack">
			<p class="tag">Our services</p>
			<h2><span class="accent">Logistics</span> solutions for every kind of movement.</h2>
			<p class="lead">Whether it's freight across locations or a delivery to someone's doorstep, find the service that fits your needs.</p>
			<a class="btn btn--primary" href="<?= miles_link( '/' . $services['freight']['slug'] . '/' ) ?>">View All Services</a>
		</div>
		<ul class="card-grid">
			<?php foreach ( $services as $s ) : ?>
				<li class="card">
					<div class="card__media"><?= miles_img( $s['card_img'], '', [ 'sizes' => '(min-width: 1100px) 280px, (min-width: 600px) 45vw, 90vw' ] ) ?></div>
					<div class="card__body">
						<h3><a class="card__link" href="<?= miles_link( '/' . $s['slug'] . '/' ) ?>"><?= esc_html( $s['title'] ) ?></a></h3>
						<p><?= esc_html( $s['card_text'] ) ?></p>
						<span class="more">Learn More <?php miles_icon( 'arrow-right' ); ?></span>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="section">
	<div class="container industries">
		<div class="stack">
			<p class="tag">Industries</p>
			<h2>Supporting the <span class="accent">industries</span> that keep things moving.</h2>
			<p class="lead">Different industries have different logistics demands. Our services are designed to support the movement of goods across different business environments.</p>
			<a class="btn btn--primary" href="<?= miles_link( miles_contact_path( 'quote' ) ) ?>">Find Your Logistics Solution</a>
		</div>
		<ul class="industry-list">
			<?php foreach ( $industries as [ $label, $image, $icon ] ) : ?>
				<li class="industry">
					<?= miles_img( $image, '', [ 'sizes' => '(min-width: 1100px) 150px, (min-width: 700px) 18vw, 55vw' ] ) ?>
					<a class="industry__body" href="<?= miles_link( miles_contact_path( 'quote' ) ) ?>">
						<?php miles_icon( $icon ); ?>
						<span><?= esc_html( $label ) ?></span>
						<?php miles_icon( 'circle-chevron-right', 'icon industry__go' ); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="why">
	<?= miles_img( 'why-miles', '', [ 'class' => 'why__bg', 'sizes' => '100vw' ] ) ?>
	<div class="container why__inner">
		<div class="stack">
			<p class="tag">Why Miles</p>
			<h2>A smarter way to move <span class="accent">what matters</span></h2>
			<p class="lead">Whether it's a business delivery or a personal parcel, Miles Logistics brings you reliable, flexible and connected logistics solutions.</p>
			<a class="btn btn--primary" href="#services">View All Services</a>
		</div>
		<ul class="why__grid">
			<?php foreach ( $why as [ $icon, $title, $text ] ) : ?>
				<li><?php miles_icon( $icon ); ?><h3><?= esc_html( $title ) ?></h3><p><?= esc_html( $text ) ?></p></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="join">
	<div class="container join__inner">
		<div class="stack join__copy">
			<p class="tag">Join the Miles network</p>
			<h2>Be part of <span class="accent">the journey.</span></h2>
			<p class="lead">We're building a network of delivery partners who help bring the final mile closer to customers. If you're a dispatch rider looking for opportunities to connect with delivery requests, we'd like to hear from you.</p>
			<a class="btn btn--primary" href="<?= miles_link( miles_contact_path( 'partner' ) ) ?>">Become a Delivery Partner</a>
		</div>
	</div>
	<?= miles_img( 'rider', 'A smiling Miles Logistics dispatch rider with an orange delivery bag', [ 'class' => 'join__img', 'sizes' => '(min-width: 900px) 62vw, 100vw' ] ) ?>
</section>

<section class="section" id="faq">
	<div class="container faq">
		<div class="faq__head stack">
			<p class="tag">Frequently asked questions</p>
			<h2>A few things you might want to know.</h2>
			<p class="lead">From choosing a service to understanding how deliveries work, here are answers to some common questions about Miles Logistics.</p>
		</div>
		<div class="faq__list">
			<?php foreach ( $faqs as [ $question, $answer ] ) : ?>
				<details class="faq__item" name="faq">
					<summary><?= esc_html( $question ) ?><?php miles_icon( 'chevron-down' ); ?></summary>
					<p><?= esc_html( $answer ) ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_template_part( 'template-parts/cta-band', null, [
	'title' => 'Let\'s get your goods *moving.*',
	'text'  => 'Tell us about your logistics needs and we\'ll find a way to get things moving.',
	'form'  => true,
] );

get_footer();
