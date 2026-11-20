<?php
/**
 * Site content in one place: contact details, navigation, services, FAQs, industries.
 * Change text here once and it updates everywhere it appears.
 * A *word* wrapped in asterisks becomes the orange (or navy on orange) highlight.
 */
defined( 'ABSPATH' ) || exit;

$services = [
	'freight'  => [
		'slug'         => 'freight-cargo',
		'title'        => 'Freight & Cargo',
		'enquiry'      => 'freight',
		'tag'          => 'Freight & cargo',
		'card_img'     => 'card-freight',
		'card_text'    => 'Moving goods and cargo with transportation solutions for commercial and logistical needs.',
		'hero_img'     => 'svc-hero-freight',
		'hero_alt'     => 'A cargo truck in front of stacked shipping containers and port cranes',
		'hero_title'   => 'Moving goods beyond *borders.*',
		'hero_text'    => 'From commercial goods to larger cargo movements, Miles Logistics helps move what your business needs from one destination to another.',
		'detail_img'   => 'svc-detail-freight',
		'detail_alt'   => 'A container ship at sea',
		'detail_title' => 'More than moving *goods.* Keeping *business* moving.',
		'detail_text'  => 'When goods need to move, having the right transportation solution matters. We support freight and cargo transportation needs with a focus on getting goods where they need to go.',
		'supports'     => [ 'Commercial goods and cargo', 'Business stock and supplies', 'Movement of goods between locations' ],
		'cta_title'    => 'Have *cargo* to move?',
		'cta_text'     => 'Tell us what you\'re moving and where it needs to go.',
		'cta_button'   => 'Discuss your freight needs',
	],
	'road'     => [
		'slug'         => 'road-transportation',
		'title'        => 'Road Transportation',
		'enquiry'      => 'road',
		'tag'          => 'Road transportation',
		'card_img'     => 'card-road',
		'card_text'    => 'Transportation solutions for moving goods between locations.',
		'hero_img'     => 'svc-hero-road',
		'hero_alt'     => 'A freight truck driving along an open road',
		'hero_title'   => 'The road between *here and there.*',
		'hero_text'    => 'Transportation solutions for businesses that need goods moved between locations. Miles Logistics helps keep products, supplies and commercial goods on the move.',
		'detail_img'   => 'svc-detail-road',
		'detail_alt'   => 'The front of a freight truck',
		'detail_title' => 'Reliable *movement* starts with the right plan.',
		'detail_text'  => 'Every movement has a destination and a requirement. We support road transportation needs with solutions shaped around the goods being moved and the journey ahead.',
		'supports'     => [ 'Transportation of commercial goods', 'Movement of supplies between locations', 'Business-to-business transportation needs' ],
		'cta_title'    => 'Planning your next *movement?*',
		'cta_text'     => 'Share your transportation requirements with us.',
		'cta_button'   => 'Get a transport quote',
	],
	'business' => [
		'slug'         => 'business-deliveries',
		'title'        => 'Business Deliveries',
		'enquiry'      => 'business',
		'tag'          => 'Business deliveries',
		'card_img'     => 'card-business',
		'card_text'    => 'Helping businesses move products and fulfil delivery needs.',
		'hero_img'     => 'svc-hero-business',
		'hero_alt'     => 'A forklift moving stock inside a warehouse',
		'hero_title'   => 'Your business moves. *We help it go further.*',
		'hero_text'    => 'From products to everyday business essentials, Miles Logistics supports delivery needs that help businesses get goods to the people and places that matter.',
		'detail_img'   => 'svc-detail-business',
		'detail_alt'   => 'A courier loading boxes into a delivery van',
		'detail_title' => 'Deliveries that fit the way *business* works.',
		'detail_text'  => 'Getting products and supplies where they need to be is part of keeping business moving. Our delivery solutions support businesses with their day-to-day movement of goods.',
		'supports'     => [ 'Product deliveries', 'Business supplies and parcels', 'Deliveries to customers and other business locations' ],
		'cta_title'    => 'Let\'s make your next *delivery* happen.',
		'cta_text'     => 'Tell us what your business needs delivered.',
		'cta_button'   => 'Make a business enquiry',
	],
	'lastmile' => [
		'slug'         => 'last-mile-delivery',
		'title'        => 'Last-Mile Delivery',
		'enquiry'      => 'last-mile',
		'tag'          => 'Last-mile delivery',
		'card_img'     => 'card-lastmile',
		'card_text'    => 'Connecting businesses with dispatch partners for the final journey to their destination.',
		'hero_img'     => 'svc-hero-lastmile',
		'hero_alt'     => 'Dispatch riders standing beside a row of delivery motorbikes',
		'hero_title'   => 'The final stretch matters. *Connecting destinations.*',
		'hero_text'    => 'The last part of a delivery journey is just as important as the first. Miles Logistics connects deliveries with dispatch partners to help get goods to their final destination.',
		'detail_img'   => 'svc-detail-lastmile',
		'detail_alt'   => 'A dispatch rider on a Miles Logistics motorbike',
		'detail_title' => 'Bringing *deliveries* closer to their destination.',
		'detail_text'  => 'From the point goods are ready for delivery to their final destination, last-mile delivery helps bridge the gap between businesses and the people receiving their orders.',
		'supports'     => [ 'Customer order deliveries', 'Parcel and document deliveries', 'Final-stage delivery support for businesses' ],
		'cta_title'    => 'Need the *final mile* covered?',
		'cta_text'     => 'Let\'s talk about your delivery requirements.',
		'cta_button'   => 'Discuss last-mile delivery',
	],
];

$service_links = array_map(
	static fn( $s ) => [ 'label' => $s['title'], 'url' => "/{$s['slug']}/", 'current' => $s['slug'] ],
	$services
);

return [
	'site' => [
		'email'    => 'hello@mileslogistics.com',
		'phone'    => '+234 800 000 0000', // Placeholder: replace with the real number.
		'address'  => 'Lagos, Nigeria',
		'form_key' => 'YOUR_WEB3FORMS_ACCESS_KEY', // Free key from web3forms.com (safe to keep in the theme).
		'map'      => 'https://www.openstreetmap.org/export/embed.html?bbox=3.2792%2C6.4244%2C3.4792%2C6.6244&layer=mapnik&marker=6.5244%2C3.3792',
		'socials'  => [
			[ 'Facebook', 'facebook', 'https://www.facebook.com/' ],
			[ 'Instagram', 'instagram', 'https://www.instagram.com/' ],
			[ 'X', 'x', 'https://x.com/' ],
			[ 'LinkedIn', 'linkedin', 'https://www.linkedin.com/' ],
			[ 'YouTube', 'youtube', 'https://www.youtube.com/' ],
		],
	],

	'services' => $services,

	// Primary navigation. "current" decides which item is highlighted.
	'nav' => [
		[ 'label' => 'Home', 'url' => '/', 'current' => 'front' ],
		[ 'label' => 'About Us', 'url' => '/about-us/', 'current' => 'about-us' ],
		[ 'label' => 'Services', 'url' => '/#services', 'current' => array_column( $services, 'slug' ), 'children' => array_values( $service_links ) ],
		[ 'label' => 'FAQs', 'url' => '/#faq', 'current' => '' ],
		[ 'label' => 'Contact Us', 'url' => '/contact-us/', 'current' => 'contact-us' ],
	],

	'footer' => [
		'Explore'      => [
			[ 'Home', '/' ],
			[ 'About Us', '/about-us/' ],
			[ 'Our Services', '/#services' ],
			[ 'Contact', '/contact-us/' ],
			[ 'FAQs', '/#faq' ],
		],
		'Our Services' => array_map( static fn( $s ) => [ $s['title'], "/{$s['slug']}/" ], array_values( $services ) ),
		'Get Involved' => [
			[ 'Become a Delivery Partner', miles_contact_path( 'partner' ) ],
			[ 'Business Enquiries', miles_contact_path( 'business' ) ],
			[ 'Contact Us', '/contact-us/' ],
		],
	],

	// Options in the enquiry form: key (used in links) => label (sent in the email).
	'enquiry_types' => [
		'general'   => 'General enquiry',
		'quote'     => 'Request a quote',
		'freight'   => 'Freight & Cargo',
		'road'      => 'Road Transportation',
		'business'  => 'Business Deliveries',
		'last-mile' => 'Last-Mile Delivery',
		'partner'   => 'Become a delivery partner',
	],

	// [ label, image, icon ]
	'industries' => [
		[ 'Retail & E-commerce', 'ind-retail', 'shopping-cart' ],
		[ 'Manufacturing', 'ind-manufacturing', 'settings' ],
		[ 'Wholesale & Distribution', 'ind-wholesale', 'package' ],
		[ 'Food & Consumer Goods', 'ind-food', 'utensils' ],
		[ 'Individual', 'ind-individual', 'user' ],
	],

	// [ question, answer ]
	'faqs' => [
		[ 'What services does Miles Logistics offer?', 'Miles Logistics offers a range of transportation and delivery solutions. Each service supports different transportation and delivery requirements. Explore our service pages to find the option that best fits your needs.' ],
		[ 'Who can use Miles Logistics services?', 'Our services are designed to support both businesses and individuals. Businesses can enquire about moving commercial goods, transporting supplies and arranging deliveries. Individuals can also enquire about personal parcel requests and delivery needs.' ],
		[ 'How do I arrange a delivery or transportation service?', 'Getting started is simple. Explore our services to identify what you need, then contact our team with the relevant details. We\'ll be able to understand your requirements and discuss the appropriate solution.' ],
		[ 'Can I request transportation for commercial goods?', 'Yes. Miles Logistics provides freight, cargo and road transportation services for commercial transportation needs. Contact our team with information about the goods, collection point and destination so we can discuss your requirements.' ],
		[ 'Does Miles Logistics handle last-mile deliveries?', 'Yes. Last-mile delivery is one of our services. It focuses on the final stage of getting goods from their dispatch point to their intended destination, connecting businesses and recipients through delivery partners.' ],
		[ 'How much do your logistics services cost?', 'Pricing depends on the type of service, the goods being transported, the distance involved and other requirements. Contact Miles Logistics with your delivery or transportation details to request a quote.' ],
	],
];
