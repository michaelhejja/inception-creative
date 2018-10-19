<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inception
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'inception' ); ?></a>
	<header id="masthead" class="site-header">
	    <div class="Container site-header__container">
	        
			<div class="site-header__logo">
				<?php
				the_custom_logo();
				?>
			</div><!-- .site-branding -->
	        <div class="site-header__hamburger-btn">
		        <div class="line1"></div>
		        <div class="line2"></div>
		        <div class="line3"></div>
		    </div>
			<nav id="site-navigation" class="site-header__navigation">
				<!--<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'inception' ); ?></button>-->
				<?php

				$menu_data = get_field("selected_menu");
				$menu = wp_get_nav_menu_object($menu_data->name);
				$menu_items = wp_get_nav_menu_items($menu->term_id);

				foreach ((array) $menu_items as $key => $menu_item) {
					$title = $menu_item->title;
					$url = $menu_item->url;
					echo('<button class="site-header__navigation-button" data-target="'.$url.'">'.$title.'</button>');
				}
				// var_dump($menu);
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
