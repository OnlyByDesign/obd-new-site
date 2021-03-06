<?php
	$mobile_menu_link_animation = ot_get_option( 'mobile_menu_link_animation', 'link-fill');
	$mobile_menu_style = ot_get_option( 'mobile_menu_style', 'style1');
	$secondary_menu_style = ot_get_option( 'secondary_menu_style', '2');
	$class[] = ot_get_option( 'mobile_menu_color', 'dark');
	$class[] = $mobile_menu_style;
?>
<!-- Start Content Click Capture -->
<div class="click-capture"></div>
<!-- End Content Click Capture -->
<!-- Start Mobile Menu -->
<nav id="mobile-menu" class="<?php echo esc_attr(implode(' ', $class)); ?>" data-behaviour="<?php echo esc_attr(ot_get_option( 'submenu_behaviour', 'thb-default')); ?>" data-animation="<?php echo esc_attr(ot_get_option( 'mobile_menu_text_animation', 'style1')); ?>">
	<a href="#" class="thb-close"><?php get_template_part( 'assets/svg/arrows_remove.svg'); ?></a>
	<?php if ($mobile_menu_style === 'style2') { do_action( 'thb_language_switcher_mobile' ); } ?>
	<?php if ($mobile_menu_link_animation == 'bg-fill') { ?>
		<div class="menubg-placeholder"></div>
	<?php } ?>
	<div class="custom_scroll" id="menu-scroll">
		<div>
			<div class="mobile-menu-container">
			<div class="mobile-menu-top">
				<?php if (in_array($mobile_menu_style, array('style1', 'style3'))) {  do_action( 'thb_language_switcher_mobile' ); } ?>
				<?php
					if ($mobile_menu_link_animation == 'link-fill') {
						if (has_nav_menu('nav-menu')) {
							wp_nav_menu( array( 'theme_location' => 'nav-menu', 'depth' => 3, 'container' => false, 'menu_class' => 'thb-mobile-menu', 'link_before' => '<span class="nav-link-mask"><span class="nav-link-mask-text">', 'link_after' => '</span></span>', 'walker' => new thb_mobileDropdown ) );
						}
					} else {
						if (has_nav_menu('nav-menu')) {
							wp_nav_menu( array( 'theme_location' => 'nav-menu', 'depth' => 3, 'container' => false, 'menu_class' => 'thb-mobile-menu', 'walker' => new thb_mobileDropdown ) );
						}
					}
				?>
				<?php if (ot_get_option( 'header_button_mobile', 'off') == 'on') { do_action( 'thb_header_button' ); }  ?>
			</div>
			<?php if (in_array($mobile_menu_style, array('style1', 'style3'))) { ?>
				<div class="mobile-menu-bottom">
					<?php if (has_nav_menu('secondary-menu')) { wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'depth' => 1, 'container' => false, 'menu_class' => 'thb-secondary-menu row '.(in_array($mobile_menu_style, array('style1', 'style3')) ? 'small-up-'.$secondary_menu_style.'' : '').'', 'walker' => new thb_mobileSecondary  ) ); } ?>
					<?php if ($menu_footer = ot_get_option( 'menu_footer')) { ?>
					<div class="menu-footer">
						<div>
							<?php echo do_shortcode($menu_footer); ?>
						</div>
					</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
		</div>
	</div>
	<?php if ($mobile_menu_style === 'style2') { ?>
		<div class="mobile-menu-bottom">
			<?php if (has_nav_menu('secondary-menu')) { wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'depth' => 1, 'container' => false, 'menu_class' => 'thb-secondary-menu row '.($mobile_menu_style === 'style1' ? 'small-up-2' : '').'', 'walker' => new thb_mobileSecondary  ) ); } ?>
		</div>
		<?php if ($menu_footer = ot_get_option( 'menu_footer')) { ?>
			<div class="menu-footer">
				<div>
					<?php echo do_shortcode($menu_footer); ?>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
</nav>
<!-- End Mobile Menu -->
