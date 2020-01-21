<?php
	$vars = $wp_query->query_vars;
	$thb_masonry = array_key_exists('thb_masonry', $vars) ? $vars['thb_masonry'] : false;
	$thb_grid_type = array_key_exists('thb_grid_type', $vars) ? $vars['thb_grid_type'] : 4;
	$thb_size = array_key_exists('thb_size', $vars) ? $vars['thb_size'] : false;
	$thb_title_position = array_key_exists('thb_title_position', $vars) ? $vars['thb_title_position'] : false;
	$thb_animation = array_key_exists('thb_animation', $vars) ? $vars['thb_animation'] : false;
	$thb_hover_style = array_key_exists('thb_hover_style', $vars) ? $vars['thb_hover_style'] : false;
	$thb_id = get_the_ID();
	$image_id = get_post_thumbnail_id($thb_id);
	$image_url = wp_get_attachment_image_src($image_id, 'full');
	$hover_id = get_post_meta($thb_id, 'main_hover_image', true);
  $aspect_ratio = $image_id ? (($image_url[2] / $image_url[1]) * 100).'%' : '100%';
  $aspect_ratio = $thb_masonry ? $aspect_ratio : '80%';
	$slug = get_post_field( 'post_name', get_post() );

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
	}

	$class[] = 'columns';
	$class[] = 'type-portfolio';
	$class[] = $thb_masonry !== 'custom' ? $thb_size : false;
	$class[] = $thb_title_position;
	$class[] = $thb_animation;
	$class[] = $main_color_title;
	$class[] = $cats;
	$class[] = $thb_hover_style;
	$class[] = 'style1';

	$main_listing_type = get_post_meta($thb_id, 'main_listing_type', true);
	$permalink = '';
	$link_class[] = 'portfolio-link';
	if ($main_listing_type == 'lightbox') {
		$permalink = $image_url[0];
		$link_class[] = 'mfp-image';
	} else if ($main_listing_type == 'link') {
		$permalink = get_post_meta($thb_id, 'main_listing_link', true);
	} else if ($main_listing_type == 'lightbox-video') {
		$permalink = get_post_meta($thb_id, 'main_listing_link', true);
		$link_class[] = 'mfp-video';
	} else {
		$permalink = get_the_permalink();
	}
	$image_size = 'werkstatt-masonry-3x';
	// Image sizes
	if ($thb_masonry === 'custom') {
		$masonry_size = get_post_meta($thb_id, 'masonry_size', true) ? get_post_meta($thb_id, 'masonry_size', true) : 'small';
		$thb_masonry_size = thb_get_masonry_size($masonry_size, $thb_grid_type);
		$class[] = $thb_masonry_size['class'];
		$image_size = $thb_masonry_size['image_size'];
	}
?>
<div <?php post_class($class); ?> id="portfolio-<?php the_ID(); ?>">
	<div class="portfolio-holder work__main--item <?php $slug ?>"<?php if ($thb_masonry && $thb_masonry !== 'custom') { ?> style="<?php echo esc_attr('padding-bottom: '.$aspect_ratio.';'); ?>"<?php } ?>>
		<?php if ($thb_hover_style === 'thb-image-hover') { ?>
			<div class="thb-placeholder first work__item work__item--first work__item--big"><?php the_post_thumbnail($image_size); ?></div>
			<div class="thb-placeholder second work__item work__item--second work__item--big"><?php echo wp_get_attachment_image($hover_id, $image_size); ?></div>
			<a href="<?php echo esc_url( $permalink ); ?>" class="<?php echo esc_attr(implode(' ', $link_class)); ?>">
				<h3><?php the_title(); ?></h3>
				<aside class="thb-categories"><span><?php echo esc_html($categories); ?></span></aside>
			</a>
		<?php } else { ?>
			<div class="thb-placeholder first work__item work__item--first work__item--small">
				<?php the_post_thumbnail($image_size); ?>
				<?php if ($thb_hover_style === 'thb-gradient-fill-hover') { ?>
					<div class="thb-gradient-fill"></div>
				<?php } ?>
			</div>
			<a href="<?php echo esc_url( $permalink ); ?>" class="work__item--link <?php echo esc_attr(implode(' ', $link_class)); ?>">
				<h3 class="work__link--title"><?php the_title(); ?></h3>
				<aside class="work__link--cat thb-categories"><span><?php echo esc_html($categories); ?></span></aside>
				<?php if ($thb_hover_style === 'thb-corner-arrow') { ?>
					<?php get_template_part('assets/img/svg/hover-arrow.svg'); ?>
				<?php } ?>
			</a>
		<?php } ?>
	</div>
</div>
