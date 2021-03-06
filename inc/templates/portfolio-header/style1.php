<?php
	$image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id, 'full');
	$portfolio_header_bg_type = get_post_meta(get_the_ID(), 'portfolio_header_bg_type', true);

	$attributes = thb_portfolio_video();
?>

<figure class="post-gallery parallax" <?php echo implode( ' ', $attributes ); ?>>

	<?php if ($portfolio_header_bg_type !== 'video') { ?>
	<div class="parallax_bg"><?php the_post_thumbnail('full'); ?></div>
	<?php } ?>
	<header class="folio__head portfolio-title style1 entry-header">
		<div class="row align-center">
			<div class="small-12 medium-10 large-7 columns">
				<?php the_title( '<h1 class="folio__head--main entry-title" itemprop="name headline">', '</h1>'); ?>
				<?php if ($portfolio_subtitle = get_post_meta(get_the_ID(), 'portfolio_subtitle', true)) { ?>
					<h4><?php echo wp_kses_post($portfolio_subtitle); ?></h4>
				<?php } ?>
				<?php if (get_post_meta(get_the_ID(), 'portfolio_header_attributes', true) !== 'off') { do_action( 'thb_portfolio_attributes'); } ?>
			</div>
		</div>
	</header>
	<?php if (get_post_meta(get_the_ID(), 'portfolio_header_arrow', true) !== 'off') {
		$arrow_style = get_post_meta(get_the_ID(), 'portfolio_header_arrow_style', true) ? get_post_meta(get_the_ID(), 'portfolio_header_arrow_style', true) : 'style1';
	?>
	<div class="scroll-bottom <?php echo esc_attr($arrow_style); ?>"><div></div></div>
	<?php } ?>
</figure>