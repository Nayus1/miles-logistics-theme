<?php
/**
 * Service page: last-mile-delivery (content lives in inc/data.php, layout in template-parts/service-page.php).
 */
get_header();
get_template_part( 'template-parts/service-page', null, miles_data( 'services' )['lastmile'] );
get_footer();
