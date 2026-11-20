<?php
/**
 * Orange call-to-action band.
 * Args: title, text, buttons [ [ label, path, style ] ], form (bool: show the enquiry form instead of buttons).
 */
$args = wp_parse_args( $args, [ 'title' => '', 'text' => '', 'buttons' => [], 'form' => false ] );
?>
<section class="cta<?= $args['form'] ? ' cta--form' : '' ?>">
	<div class="container">
		<div class="cta__copy">
			<h2><?= miles_accent( $args['title'] ) ?></h2>
			<p><?= esc_html( $args['text'] ) ?></p>
			<?php if ( $args['buttons'] ) : ?>
				<div class="cta__actions">
					<?php foreach ( $args['buttons'] as [ $label, $path, $style ] ) : ?>
						<a class="btn btn--<?= esc_attr( $style ) ?>" href="<?= miles_link( $path ) ?>"><?= esc_html( $label ) ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php
		if ( $args['form'] ) {
			get_template_part( 'template-parts/enquiry-form', null, [ 'id' => 'cta', 'default' => 'quote' ] );
		}
		?>
	</div>
</section>
