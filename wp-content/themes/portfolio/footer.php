<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portfolio
 */

?>
			</div><!--.section-inner-->
		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class='section-inner'>
				<div class="site-info">
					<?php $date = new DateTime(); ?>
					&copy; <?php echo $date->format('Y') ?> Eoin O'Dwyer
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'portfolio' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'portfolio' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'portfolio' ), 'Portfolio', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
				</div><!-- .site-info -->
			</div>
		</footer><!-- #colophon -->
	</div><!-- site-inner -->
</div><!-- #page -->

<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
<script>
  WebFont.load({
    google: {
      families: ['Telex']
    }
  });
</script>

<?php wp_footer(); ?>

</body>
</html>
