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
						<?php
						$logo = get_field('logo', 'option');
						?>

						<?php if ($logo): ?>
							<a href="<?= esc_url(home_url('/')); ?>">
								<img src="<?= esc_url($logo['url']); ?>" alt="<?= esc_attr($logo['alt']); ?>">
							</a>
						<?php endif; ?>

					</div>
				</div>

				<div class="header-menu">
					<div class="nav-link-wrapper">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'Main',
							'container' => false,
							'menu_class' => '',
							'items_wrap' => '<ul>%3$s</ul>',
							'fallback_cb' => false,
						));
						?>
					</div>

					<div class="header-right">
						<div class="language-wrapper">
							<?php
							$languages = pll_the_languages(array(
								'raw' => 1
							));

							if (!empty($languages)):
								?>

								<ul>
									<?php foreach ($languages as $lang): ?>
										<li>
											<a href="<?= esc_url($lang['url']); ?>"
												class="<?= $lang['current_lang'] ? 'active' : ''; ?>">
												<?= strtoupper($lang['slug']); ?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>

						<div class="call-wrapper">
							<a href="tel:<?= the_field('phone_number', 'option'); ?>">
								<?= the_field('left_btn_text', 'option'); ?>
							</a>
						</div>
						<div class="request-wrapper">
							<button class="btn btn-main">
								<?= the_field('right_btn_text', 'option'); ?>
							</button>
						</div>
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