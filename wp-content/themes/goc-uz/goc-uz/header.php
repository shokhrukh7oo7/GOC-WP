<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package goc-uz
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<!-- HEADER -->
	<header>
		<div class="container">
			<div class="header-wrapper">
				<div class="header-left">
					<div class="logo-wrapper">
						<a href="/index.html">
							<img src="<?= get_template_directory_uri() ?> /assets/images/logo.png" alt="
								logo" />
						</a>
					</div>
				</div>

				<div class="nav-link-wrapper">
					<ul>
						<li><a href="/index.html" class="active">О компании</a></li>
						<li><a href="/assets/pages/solution.html">Решения</a></li>
						<li><a href="/assets/pages/catalog.html">Каталог</a></li>
						<li><a href="/assets/pages/news.html">Новости</a></li>
						<li><a href="/assets/pages/gallery.html">Галерея</a></li>
						<li><a href="/assets/pages/contact.html">Контакты</a></li>
					</ul>
				</div>

				<div class="header-right">
					<div class="language-wrapper">
						<ul>
							<li><a href="#">RU</a></li>
							<li><a href="#">UZ</a></li>
							<li><a href="#">EN</a></li>
						</ul>
					</div>
					<div class="call-wrapper">
						<a href="tel:+998900000000">Позвонить</a>
					</div>
					<div class="request-wrapper">
						<button class="btn btn-main">Заявка ></button>
					</div>
				</div>

				<button class="burger-btn" aria-label="Открыть меню">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
		</div>
	</header>