<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portfolio
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<link href='http://fonts.googleapis.com/css?family=Telex' rel='stylesheet' type='text/css'>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'portfolio' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class='section-inner'>
			<div class="site-branding">
				<?php
				if ( is_front_page()) : ?>
					<h1 class="site-title">
						<a class='name' href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
						<a class="site-title h1" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<div class='img-clip'>
								<?php 
									if(get_field('portrait', 'option')): 
										$portPic=get_field('portrait', 'option');
								?>
									<img src='<?php echo $portPic['sizes']['medium']; ?>' alt='' />
								<?php endif; ?>
							</div>
							<div class='name'><?php bloginfo( 'name' ); ?></div>
						</a>
					
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<!--<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>-->
				<?php
				endif; ?>
			</div><!-- .site-branding -->
		</div><!-- .section-inner -->
		<?php if(!is_front_page()): ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<?php esc_html_e( 'Primary Menu', 'portfolio' ); ?>

				</button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'walker' => new icon_walker())); ?>
			</nav><!-- #site-navigation -->
		<?php endif; ?>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
		<div class='section-inner'>
			