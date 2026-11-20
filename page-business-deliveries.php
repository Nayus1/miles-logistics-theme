<?php
/**
 * Service page: business-deliveries (content lives in inc/data.php, layout in template-parts/service-page.php).
 */
get_header();
get_template_part( 'template-parts/service-page', null, miles_data( 'services' )['business'] );
get_footer();
