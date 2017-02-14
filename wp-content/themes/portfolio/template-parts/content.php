<?php
/**
 * Template part for displaying post content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class='article-inner'>
		
		<header class="entry-header">
			<a class='blog-back' href='/blog'>&larr; Back to Blog</a>
			<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php portfolio_posted_on(); ?>
			</div><!-- .entry-meta -->
			<!--<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} 

				endif; 
			?>-->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'portfolio' ),
					'after'  => '</div>',
				) );
			?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">
		</footer><!-- .entry-footer -->
	</div><!--.article-inner -->
</article><!-- #post-## -->
