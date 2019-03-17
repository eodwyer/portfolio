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

<div class="home-grid">
  <div id="primary" class="content-area content-area--home">
    <main id="main" class="site-main" role="main">
      <?php
      while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-content">
            <h1><?php bloginfo( 'name' ); ?></h1>
            <?php
              the_content();

              wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'portfolio' ),
                'after'  => '</div>',
              ) );
            ?>
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
      <?php endwhile; // End of the loop. ?>
    </main><!-- #main -->
  </div><!-- #primary -->
</div><!--home-grid-->
<?php
get_footer();
