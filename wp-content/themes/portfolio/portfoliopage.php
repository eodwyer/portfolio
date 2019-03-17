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
			<?php if(have_rows('websites')): $index=1; ?>
				<div id='portfolio'>
					<?php while(have_rows('websites')): the_row(); ?>
						<div class='portfolio-item modal' tabindex='0'>
							
							<img class='thumbnail' src='<?php 
								$img=get_sub_field('thumbnail'); 
								echo $img['sizes']['thumbnail'];
							?>'?>
							<label class='port-title' for="modal-<?php echo $index; ?>">
								<div class="modal-trigger">
									<span><?php the_sub_field('title'); ?></span>
								</div>
							</label>
							
							<input class="modal-state modal-switch" name='portfolio' id="modal-<?php echo $index; ?>" type="checkbox" />
							<div class="portfolio-modal modal-fade-screen">
						    <div class="modal-inner">
						      <div class="modal-close" for="modal-1"></div>
						      <h2><?php the_sub_field('title'); ?></h2>
						      <div class="portfolio-modal__content">
							      <a href='<?php the_sub_field('site_url'); ?>' target='_blank'>
							      	<img src='<?php echo $img['sizes']['large']; ?>' alt='' />
							      </a>
							      <?php the_sub_field('description'); ?>
							      <a href='<?php the_sub_field('site_url'); ?>' target='_blank' class='button site-link'>
							      	View Live Site
							      </a>
							    </div>
						    </div>
							</div>
							
						</div>
						<?php $index++; ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>


			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
