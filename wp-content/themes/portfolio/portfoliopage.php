<?php
/**
 * Template for showing Portfolio
 * Template Name: Portfolio
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portfolio
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
			<?php if(have_rows('websites')): ?>
				<div id='portfolio'>
					<?php while(have_rows('websites')): the_row(); ?>
						<div class='portfolio-item'>
							<h2><?php the_sub_field('title'); ?></h2>
							<img src='<?php 
								$img=get_sub_field('thumbnail'); 
								echo $img['sizes']['thumbnail'];
							?>'?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>


			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
