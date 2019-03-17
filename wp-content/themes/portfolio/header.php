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

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'portfolio' ); ?></a>

  <div class="site-inner-wrap">
  	<header id="masthead" class="site-header" role="banner">
  		<?php if ( !is_page_template("homepage.php")) : ?>
  			<div class='section-inner'>
  				<div class="site-branding">
  					<a class="site-title h1" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
  						<div class='img-clip'>
  							<img 
  	              src='<?php echo get_stylesheet_directory_uri(); ?>/dist/img/starbucks_in_the_woods.jpg' 
  	              alt="Eoin O'Dwyer"
  	            />
  						</div>
  						<div class='name'><?php bloginfo( 'name' ); ?></div>
  					</a>
  				</div><!-- .site-branding -->
  			</div><!-- .section-inner -->
  			<nav id="site-navigation" class="site-navigation" role="navigation">
  				
  				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
  					<?php esc_html_e( 'Primary Menu', 'portfolio' ); ?>

  				</button>
  				<?php 
  					wp_nav_menu(
  						array(
  							'theme_location' => 'primary', 
  							'menu_id' => 'primary-menu', 
  							'menu_class' => 'site-navigation__menu',
  							'walker' => new icon_walker()
  						)
  					); 
  				?>
  			</nav><!-- #site-navigation -->
  		<?php else: ?>
  			<div class="home-logo">
  		    <div class='img-clip'>
  		      <img 
  		        src='<?php echo get_stylesheet_directory_uri(); ?>/dist/img/starbucks_in_the_woods.jpg' 
  		        alt="Eoin O'Dwyer"
  		      />
  		    </div>
  		  </div>
  		  <nav id="home-navigation" class="site-navigation site-navigation--home" role="navigation">
  		    <?php 
  		      wp_nav_menu(
  		        array(
  		          'theme_location' => 'primary', 
  		          'menu_id' => 'primary-menu', 
  		          'menu_class' => 'site-navigation__menu site-navigation__menu--home',
  		          'walker' => new icon_walker()
  		        )); 
  		    ?>
  		  </nav><!-- #site-navigation -->
  		<?php endif; ?>
  	</header><!-- #masthead -->
  	<div id="content" class="site-content">
  		<div class='section-inner'>
			