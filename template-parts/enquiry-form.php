<?php
/**
 * Enquiry form (sent through Web3Forms). Args: id (unique per page), default (enquiry type key).
 */
$args = wp_parse_args( $args, [ 'id' => 'contact', 'default' => 'general' ] );
$id   = esc_attr( $args['id'] );
$site = miles_data( 'site' );
?>
<form class="form-card enquiry-form" action="https://api.web3forms.com/submit" method="post">
	<input type="hidden" name="access_key" value="<?= esc_attr( $site['form_key'] ) ?>">
	<input type="hidden" name="subject" value="New enquiry from the Miles Logistics website">
	<input type="hidden" name="from_name" value="Miles Logistics Website">
	<input class="hp" type="checkbox" name="botcheck" tabindex="-1" autocomplete="off" aria-hidden="true">

	<div class="form-grid">
		<div class="field">
			<label for="<?= $id ?>-name">Full name</label>
			<input id="<?= $id ?>-name" name="name" type="text" autocomplete="name" required>
		</div>
		<div class="field">
			<label for="<?= $id ?>-email">Email</label>
			<input id="<?= $id ?>-email" name="email" type="email" autocomplete="email" required>
		</div>
		<div class="field">
			<label for="<?= $id ?>-phone">Phone <span>(optional)</span></label>
			<input id="<?= $id ?>-phone" name="phone" type="tel" autocomplete="tel">
		</div>
		<div class="field">
			<label for="<?= $id ?>-type">Enquiry type</label>
			<select id="<?= $id ?>-type" name="enquiry_type">
				<?php foreach ( miles_data( 'enquiry_types' ) as $key => $label ) : ?>
					<option value="<?= esc_attr( $label ) ?>" data-key="<?= esc_attr( $key ) ?>"<?= selected( $args['default'], $key, false ) ?>><?= esc_html( $label ) ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="field field--full">
			<label for="<?= $id ?>-message">Message</label>
			<textarea id="<?= $id ?>-message" name="message" rows="5" required></textarea>
		</div>
	</div>

	<button class="btn btn--primary" type="submit">Send enquiry</button>
	<p class="form-status" role="status" aria-live="polite"></p>
</form>
