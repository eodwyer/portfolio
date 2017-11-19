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
<style>
	.site-background{ 
		background-image: url(data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%0A%20%20%20%20%20xmlns%3Axlink%3D%22http%3A//www.w3.org/1999/xlink%22%0A%20%20%20%20%20width%3D%221500%22%20height%3D%22823%22%0A%20%20%20%20%20viewBox%3D%220%200%201500%20823%22%3E%0A%20%20%3Cfilter%20id%3D%22blur%22%20filterUnits%3D%22userSpaceOnUse%22%20color-interpolation-filters%3D%22sRGB%22%3E%0A%20%20%20%20%3CfeGaussianBlur%20stdDeviation%3D%2220%2020%22%20edgeMode%3D%22duplicate%22%20/%3E%0A%20%20%20%20%3CfeComponentTransfer%3E%0A%20%20%20%20%20%20%3CfeFuncA%20type%3D%22discrete%22%20tableValues%3D%221%201%22%20/%3E%0A%20%20%20%20%3C/feComponentTransfer%3E%0A%20%20%3C/filter%3E%0A%20%20%3Cimage%20filter%3D%22url%28%23blur%29%22%0A%20%20%20%20%20%20%20%20%20xlink%3Ahref%3D%22data%3Aimage/jpeg%3Bbase64%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%3D%3D%22%0A%20%20%20%20%20%20%20%20%20x%3D%220%22%20y%3D%220%22%0A%20%20%20%20%20%20%20%20%20height%3D%22100%25%22%20width%3D%22100%25%22/%3E%0A%3C/svg%3E);
	}
	.site-background-enhanced{
		background-image: url(<?php echo get_template_directory_uri(); ?>/dist/img/bg-main.jpg);
	}	
</style>

<!--<link href='http://fonts.googleapis.com/css?family=Telex' rel='stylesheet' type='text/css'>-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-32317010-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<div class='site-background'></div>
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
			