<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package c2c
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="c2c-site">
	<header class="header">
		<div class="header__container container-fluid">
			<div class="header__decor">
				<img src="<?php echo get_template_directory_uri(); ?>/img/decor.svg" alt="" aria-hidden="true" loading="lazy">
			</div>
			<div class="header__brand">
				<?php
				the_custom_logo();
				?>
			</div>
			<nav class="header__menu nav-menu">
				<button class="nav-menu__toggle hamburger" aria-label="<?php esc_html_e( 'Open menu', 'c2c' ); ?>"><span class="hamburger__inner"></span></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'nav-menu__list',
						'container_class' => 'nav-menu__container',
					)
				);
				?>
			</nav>
		</div>
	</header>