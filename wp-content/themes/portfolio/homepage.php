<?php
/**
 * Homepage
 *
 *
 * Template Name: Homepage
 *
 * @package portfolio
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					

					<div class="entry-content">

						<div class='img-clip'>
							<?php 
								if(get_field('portrait', 'option')): 
									$portPic=get_field('portrait', 'option');
							?>
								<img src='<?php echo $portPic['sizes']['large']; ?>' alt='' />
							<?php endif; ?>
						</div>	
						<?php
							the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'portfolio' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->

					<nav id="home-navigation" class="main-navigation effect-layla" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'walker' => new icon_walker() ) ); ?>
					</nav><!-- #site-navigation -->

					<?php if ( get_edit_post_link() ) : ?>
						<footer class="entry-footer">
							<?php
								edit_post_link(
									sprintf(
										/* translators: %s: Name of current post */
										esc_html__( 'Edit %s', 'portfolio' ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									),
									'<span class="edit-link">',
									'</span>'
								);
							?>
						</footer><!-- .entry-footer -->
					<?php endif; ?>
				</article><!-- #post-## -->

				

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
