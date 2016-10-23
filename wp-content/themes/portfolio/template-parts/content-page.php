<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'portfolio' ),
				'after'  => '</div>',
			) );
		?>

		<!-- Resume -->
		<?php if(have_rows('resume_section')): ?>
		
			<div class='resume-wrap'>
				<?php while(have_rows('resume_section')): the_row(); ?>
					<div class='res-block'>
						<h2><?php the_sub_field('section_title');?></h2>

						<div class='res-block-content'>
							<?php the_sub_field('section_content');?>
						</div>

						<div class='res-items'>
							<?php if(have_rows('resume_items')):?> 
								<?php while(have_rows('resume_items')): the_row(); ?>
									<h3><?php the_sub_field('title');?></h3>
									<div class='date'><?php the_sub_field('date');?></div>
									<div class='res-item-description'>
										<?php the_sub_field('description');?>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div><!-- .entry-content -->

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
