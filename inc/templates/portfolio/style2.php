<?php
	$vars = $wp_query->query_vars;
	$thb_masonry = array_key_exists('thb_masonry', $vars) ? $vars['thb_masonry'] : false;
	$thb_size = array_key_exists('thb_size', $vars) ? $vars['thb_size'] : false;
	$thb_style = array_key_exists('thb_style', $vars) ? $vars['thb_style'] : false;
	$thb_animation = array_key_exists('thb_animation', $vars) ? $vars['thb_animation'] : false;
	$thb_hover_style = array_key_exists('thb_hover_style', $vars) ? $vars['thb_hover_style'] : false;
	$thb_id = get_the_ID();
	$image_id = get_post_thumbnail_id($thb_id);
	$image_url = wp_get_attachment_image_src($image_id, 'full');
	$aspect_ratio = $image_id ? (($image_url[2] / $image_url[1]) * 100).'%' : '100%';
	$aspect_ratio = $thb_masonry ? $aspect_ratio : '80%';
	$hover_id = get_post_meta($thb_id, 'main_hover_image', true);

	$main_color_title = get_post_meta($thb_id, 'main_color_title', true);

	if ('portfolio' == get_post_type($thb_id)) {
		$categories = get_the_term_list( $thb_id, 'portfolio-category', '', ', ', '' );
		if ($categories !== '' && !empty($categories)) {
			$categories = strip_tags($categories);
		}

		$terms = get_the_terms( $thb_id, 'portfolio-category' );
	} else {
		$categories = get_the_term_list( $thb_id, 'category', '', ', ', '' );
		if ($categories !== '' && !empty($categories)) {
			$categories = strip_tags($categories);
		}

		$terms = get_the_terms( $thb_id, 'category' );
	}

	$cats = '';
	if (!empty($terms)) {
		foreach ($terms as $term) { $cats .= ' thb-cat-'.strtolower($term->slug); }
	} else {
		$cats = '';
	}

	$class[] = 'columns';
	$class[] = 'type-portfolio';
	$class[] = $thb_size;
	$class[] = $thb_animation;
	$class[] = $thb_style;
	$class[] = $thb_hover_style;
	$class[] = $cats;
	$class[] = 'style2';

	$main_listing_type = get_post_meta($thb_id, 'main_listing_type', true);
	$permalink = '';
	if ($main_listing_type == 'lightbox') {
		$permalink = $image_url[0];
		$class[] = 'mfp-image';
	} else if ($main_listing_type == 'link') {
		$permalink = get_post_meta($thb_id, 'main_listing_link', true);
	} else if ($main_listing_type == 'lightbox-video') {
		$permalink = get_post_meta($thb_id, 'main_listing_link', true);
		$class[] = 'mfp-video';
	} else {
		$permalink = get_the_permalink();
	}
?>
<a href="<?php echo esc_url( $permalink ); ?>" <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>">
	<div class="portfolio-holder">
		<div class="portfolio-inner <?php echo esc_attr($thb_hover_style); ?>" style="<?php echo esc_attr('padding-bottom: '.$aspect_ratio.';'); ?>">
			<?php if ($thb_hover_style === 'thb-image-hover') { ?>
				<div class="thb-placeholder first"><?php the_post_thumbnail('werkstatt-masonry-3x'); ?></div>
				<div class="thb-placeholder second"><?php echo wp_get_attachment_image($hover_id, 'werkstatt-masonry-3x'); ?></div>
			<?php } else { ?>
				<div class="thb-placeholder">
					<?php the_post_thumbnail('werkstatt-masonry-3x'); ?>
					<?php if ($thb_hover_style === 'thb-gradient-fill-hover') { ?>
						<div class="thb-gradient-fill"></div>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if ($thb_hover_style === 'thb-corner-arrow') { ?>
				<?php get_template_part('assets/img/svg/hover-arrow.svg'); ?>
			<?php } ?>
		</div>
		<h2><span><?php the_title(); ?></span></h2>
		<aside class="thb-categories"><span><?php echo esc_html($categories); ?></span></aside>
	</div>
</a>
