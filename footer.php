<?php
	$footer           = ot_get_option( 'footer', 'on' );
	$footer_columns   = ot_get_option( 'footer_columns', 'fourcolumns' );
	$footer_effect    = ot_get_option( 'footer_effect', 'off' );
	$footer_max_width = ot_get_option( 'footer_max_width', 'off' );
	$disable_footer   = get_post_meta( get_the_ID(), 'disable_footer', true );
	$footer_color     = ot_get_option( 'footer_color', 'light' );

	$subfooter        = ot_get_option( 'subfooter', 'off' );
	$subfooter_style  = ot_get_option( 'subfooter_style', 'style1' );

	$footer_classes[] = 'footer';
	$footer_classes[] = 'on' === $subfooter ? 'subfooter-enabled' : false;
	$footer_classes[] = $footer_color;
	$footer_classes[] = 'off' === $footer_max_width ? 'full-width-footer' : false;

	$cond             = ( 'off' !== $footer && 'on' !== $disable_footer ) && ! is_page_template( 'template-fullscreen.php' );
	$onepage          = ( 'off' !== $footer && 'on' !== $disable_footer ) && is_page_template( 'template-onepage.php' );
?>
		</div><!-- End role["main"] -->
<?php if ( $onepage ) { ?>
	<div class="footer-container wpb_row fp-auto-height" id="fp-footer">
<?php } elseif ( 'on' === $footer_effect && ! is_page_template( 'template-fullscreen.php ') ) { ?>
	<div class="fixed-footer-container">
<?php } ?>
	<?php if ( $cond || $onepage ) { ?>
	<!-- Start Footer -->
	<footer id="footer" class="<?php echo esc_attr( implode( ' ', $footer_classes ) ); ?>">
		<div class="row">
			<?php get_template_part( 'inc/templates/footer/cta' ); ?>
			<?php if ( 'fourcolumns' === $footer_columns ) { ?>
				<div class="small-12 medium-6 large-3 columns">
					<?php dynamic_sidebar( 'footer1' ); ?>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<?php dynamic_sidebar( 'footer2' ); ?>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<?php dynamic_sidebar( 'footer3' ); ?>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<?php dynamic_sidebar( 'footer4' ); ?>
				</div>
		  <?php } elseif ( 'threecolumns' === $footer_columns ) { ?>
				<div class="small-12 medium-6 large-4 columns">
					<?php dynamic_sidebar( 'footer1' ); ?>
				</div>
				<div class="small-12 medium-6 large-4 columns">
					<?php dynamic_sidebar( 'footer2' ); ?>
				</div>
				<div class="small-12 large-4 columns">
					<?php dynamic_sidebar( 'footer3' ); ?>
				</div>
		  <?php } elseif ( 'twocolumns' === $footer_columns ) { ?>
				<div class="small-12 medium-6 columns">
					<?php dynamic_sidebar( 'footer1' ); ?>
				</div>
				<div class="small-12 medium-6 columns">
					<?php dynamic_sidebar( 'footer2' ); ?>
				</div>
		  <?php } elseif ( 'doubleleft' === $footer_columns ) { ?>
				<div class="small-12 large-6 columns">
					<?php dynamic_sidebar( 'footer1' ); ?>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<?php dynamic_sidebar( 'footer2' ); ?>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<?php dynamic_sidebar( 'footer3' ); ?>
				</div>
		  <?php } elseif ( 'doubleright' === $footer_columns ) { ?>
				<div class="small-12 medium-6 large-3 columns">
					<?php dynamic_sidebar( 'footer1' ); ?>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<?php dynamic_sidebar( 'footer2' ); ?>
				</div>
				<div class="small-12 large-6 columns">
					<?php dynamic_sidebar( 'footer3' ); ?>
				</div>
		  <?php } elseif ( 'fivecolumns' === $footer_columns ) { ?>
				<div class="small-12 medium-6 large-2 columns">
					<?php dynamic_sidebar( 'footer1' ); ?>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<?php dynamic_sidebar( 'footer2' ); ?>
				</div>
				<div class="small-12 medium-6 large-2 columns">
					<?php dynamic_sidebar( 'footer3' ); ?>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<?php dynamic_sidebar( 'footer4' ); ?>
				</div>
				<div class="small-12 large-2 columns">
					<?php dynamic_sidebar( 'footer5' ); ?>
				</div>
		  <?php } elseif ( 'onecolumns' === $footer_columns ) { ?>
				<div class="small-12 columns">
					<?php dynamic_sidebar( 'footer1' ); ?>
				</div>
		  <?php } elseif ( 'sixcolumns' === $footer_columns ) { ?>
				<div class="small-6 medium-4 large-2 columns">
					<?php dynamic_sidebar( 'footer1' ); ?>
				</div>
				<div class="small-6 medium-4 large-2 columns">
					<?php dynamic_sidebar( 'footer2' ); ?>
				</div>
				<div class="small-6 medium-4 large-2 columns">
					<?php dynamic_sidebar( 'footer3' ); ?>
				</div>
				<div class="small-6 medium-4 large-2 columns">
					<?php dynamic_sidebar( 'footer4' ); ?>
				</div>
				<div class="small-6 medium-4 large-2 columns">
					<?php dynamic_sidebar( 'footer5' ); ?>
				</div>
				<div class="small-6 medium-4 large-2 columns">
					<?php dynamic_sidebar( 'footer6' ); ?>
				</div>
			<?php } elseif ( 'fivelargerightcolumns' === $footer_columns ) { ?>
			  <div class="small-6 medium-4 large-2 columns">
			  	<?php dynamic_sidebar( 'footer1' ); ?>
			  </div>
			  <div class="small-6 medium-4 large-2 columns">
			  	<?php dynamic_sidebar( 'footer2' ); ?>
			  </div>
			  <div class="small-6 medium-4 large-2 columns">
			  	<?php dynamic_sidebar( 'footer3' ); ?>
			  </div>
			  <div class="small-6 medium-4 large-2 columns">
			  	<?php dynamic_sidebar( 'footer4' ); ?>
			  </div>
			  <div class="small-6 medium-8 large-4 columns">
			  	<?php dynamic_sidebar( 'footer5' ); ?>
			  </div>
		  <?php } ?>
		</div>
	</footer>
	<!-- End Footer -->
	<?php } ?>
	<?php if ( ( 'off' !== $subfooter && 'on' !== $disable_footer) && ! is_page_template( 'template-fullscreen.php' ) ) { ?>
	<?php get_template_part('inc/templates/footer/subfooter-' . $subfooter_style); ?>
	<?php } ?>
	<?php if ( ( 'on' === $footer_effect && ! is_page_template( 'template-fullscreen.php' ) ) || $onepage ) { ?>
		</div> <!-- End .fixed-footer-container -->
	<?php } ?>
	<?php do_action( 'thb_wrapper_end' ); ?>
</div> <!-- End #wrapper -->

<?php

	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	 wp_footer();
?>
<?php do_action( 'thb_after_wrapper' ); ?>
</body>
</html>