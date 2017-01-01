<?php
/**
 * Template part for displaying post thumbnails.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class='article-inner'>
		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} 
		?>
		<header class="entry-header">
			<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title">', '</h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php portfolio_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

				the_excerpt( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'portfolio' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'portfolio' ),
					'after'  => '</div>',
				) );
			?>

			<a class='readmore' rel="bookmark" href='<?php echo get_permalink(); ?>'>Read More</a>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
		</footer><!-- .entry-footer -->
	</div><!--.article-inner -->
</article><!-- #post-## -->
