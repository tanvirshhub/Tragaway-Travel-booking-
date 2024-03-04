<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Themefic_Task
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'themefic-task'); ?></a>

		<header class="header">
			<div class="row">
				<!-- logo start -->
				<div class="col-md-3 logo">
					<a href="index.html"><img src="<?php

													$options = get_option('_prefix_my_options');
													echo $options['logo'];
													?>" alt="#"></a>
				</div>
				<!-- logo end -->
				<!-- header content start -->
				<div class="col-md-9 header-content">
					<div class="container">
						<div class="row">
							<!-- topbar start -->
							<div class="col-md-12 topbar">
								<div class="topbar-text">
									<ul>
										<li> <i class="fa-solid fa-location-dot" style="color: #FFFFFF;"></i><a href="#">
												<?php
												$options = get_option('_prefix_my_options');

												echo $options['top-address-text'];

												?></a></li>
										<li> <i class="fa-solid fa-envelope" style="color: #FFFFFF;"></i><a href="#">
												<?php
												$options = get_option('_prefix_my_options');

												echo $options['email'];
												?></a></li>
										<li> <i class="fa-solid fa-phone" style="color: #FFFFFF;"></i><a href="#">
												<?php
												$options = get_option('_prefix_my_options');

												echo $options['cell'];

												?></a></li>
									</ul>
								</div>
								<div class="topbar-button">
									<ul>
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="parking-zone.html" role="button" data-bs-toggle="dropdown" aria-expanded="false">
												English
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="#">English</a></li>
												<li><a class="dropdown-item" href="#">Bangla</a></li>
												<li><a class="dropdown-item" href="#">Hindi</a></li>
												<li><a class="dropdown-item" href="#">Urdu</a></li>
												<li><a class="dropdown-item" href="#">Dutch</a></li>
											</ul>
										</li>
									</ul>
									<button class="btn" type="submit">Login Now</button>
								</div>
							</div>
							<!-- topbar end -->
							<!-- menubar start -->
							<div class="col-md-8 menubar">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'mainmenu',
										'depth'          => 2, // 1 = no dropdowns, 2 = with dropdowns.
										'container'       => 'nav',
										'container_class' => 'navbar navbar-expand-lg',
										'container_id'      => 'navbarSupportedContent',
										'menu_class'      => 'navbar-nav',
										// 'li_class'  	 => 'active',							
										'link_class'       => 'nav-link',
										// 'fallback_cb'      => 'WP_Bootstrap_Navwalker::fallback',
										// 'walker'         => new WP_Bootstrap_Navwalker(),
									)
								);
								?>
							</div>
							<!-- menubar end -->
							<!-- nav-btns start -->
							<div class="col-md-4 nav-btns">
								<div class="cart">
									<a href="#"><i class="fa-solid fa-basket-shopping" style="color: #000000;"></i></a>
								</div>
								<div class="search-form">
									<a href="#"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></a>
								</div>

								<div>
									<button class="btn submit-btn" type="submit">Discover More</button>
								</div>
								<div class="nav-bar">
									<a href="#"><img src="assets/img/bar.png" alt=""></a>
								</div>
							</div>
							<!-- nav-btns end -->
						</div>
					</div>
				</div>
				<!-- header content end -->
			</div>

		</header><!-- #masthead -->