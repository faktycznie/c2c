<?php
/**
 * The front-page file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package c2c
 */

get_header();

$hero = array(
	'heading'   => c2c_get_option('hero_heading', 'option', __('Mad hattters...', 'c2c')),
	'subtitle'  => c2c_get_option('hero_subtitle', 'option', __('Introducing', 'c2c')),
	'photo'     => c2c_get_option('hero_photo'),
	'photo2'    => c2c_get_option('hero_photo_2'),
	'link'      => c2c_get_option('hero_link'),
	'link_name' => c2c_get_option('hero_link_name', 'option', __('Learn more', 'c2c'))
);
get_template_part('template-parts/hero', null, $hero);

$features = array(
	'items' => c2c_get_option('features'),
	//we can pass here for example grid class :)
);
get_template_part('template-parts/features', null, $features);

$promo = array(
	'heading'   => c2c_get_option('promo_heading', 'option', __('Mad love for fire headwear', 'c2c')),
	'subtitle'  => c2c_get_option('promo_subtitle', 'option', __('Become sexy', 'c2c')),
	'photo'     => c2c_get_option('promo_photo'),
	'link'      => c2c_get_option('promo_link'),
	'link_name' => c2c_get_option('promo_link_name', 'option', __('Learn more', 'c2c'))
);
get_template_part('template-parts/promo', null, $promo);

get_template_part('template-parts/loop');

$quote = array(
	'quote' => c2c_get_option('quote'),
);
get_template_part('template-parts/quote', null, $quote);

$newsletter = array(
	'heading'   => __('Newsletter', 'c2c'),
	'subtitle'  => __('Keep up-to-date on us', 'c2c'),
	'contact_form_id' => '65' //we can get this value from field if needed
);
get_template_part('template-parts/newsletter', null, $newsletter);

get_footer();
