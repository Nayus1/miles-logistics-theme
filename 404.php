<?php
/**
 * 404 page.
 */
get_header();
?>

<section class="section">
	<div class="container prose">
		<p class="tag">Error 404</p>
		<h1>This page took a wrong turn.</h1>
		<p>The page you are looking for does not exist or has moved.</p>
		<a class="btn btn--primary" href="<?= miles_link( '/' ) ?>">Back to home</a>
	</div>
</section>

<?php get_footer();
