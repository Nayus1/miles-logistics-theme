</main>

<?php
$site = miles_data( 'site' );
?>
<footer class="site-footer">
	<div class="container footer-grid">

		<div class="footer-brand stack">
			<a href="<?= miles_link( '/' ) ?>">
				<?= miles_img( 'logo-dark', 'Miles Logistics', [ 'class' => 'footer-logo', 'sizes' => '245px' ] ) ?>
			</a>
			<p class="footer-slogan">Moving What Matters.<br>Connecting What’s Next.</p>
			<p>A connected logistics business supporting transportation, freight and delivery needs.</p>
			<ul class="social">
				<?php foreach ( $site['socials'] as [ $label, $icon, $url ] ) : ?>
					<li><a href="<?= esc_url( $url ) ?>" aria-label="<?= esc_attr( $label ) ?>" target="_blank" rel="noopener noreferrer"><?php miles_icon( $icon ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>

		<?php foreach ( miles_data( 'footer' ) as $heading => $links ) : ?>
			<nav class="footer-col" aria-label="<?= esc_attr( $heading ) ?>">
				<h2 class="footer-title"><?= esc_html( $heading ) ?></h2>
				<ul>
					<?php foreach ( $links as [ $label, $url ] ) : ?>
						<li><a href="<?= miles_link( $url ) ?>"><?= esc_html( $label ) ?></a></li>
					<?php endforeach; ?>
				</ul>
			</nav>
		<?php endforeach; ?>

		<div class="footer-col">
			<h2 class="footer-title">Contact</h2>
			<ul class="footer-contact">
				<li><?php miles_icon( 'mail' ); ?><a href="mailto:<?= esc_attr( $site['email'] ) ?>"><?= esc_html( $site['email'] ) ?></a></li>
				<li><?php miles_icon( 'phone' ); ?><a href="tel:<?= esc_attr( miles_phone_href( $site['phone'] ) ) ?>"><?= esc_html( $site['phone'] ) ?></a></li>
				<li><?php miles_icon( 'map-pin' ); ?><span><?= esc_html( $site['address'] ) ?></span></li>
			</ul>
		</div>

	</div>

	<div class="container footer-bottom">
		<p>© <?= esc_html( gmdate( 'Y' ) ) ?> Miles Logistics. All rights reserved.</p>
		<p><a href="<?= miles_link( '/privacy-policy/' ) ?>">Privacy Policy</a><span aria-hidden="true">|</span>Designed By: Nayus Creative</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
