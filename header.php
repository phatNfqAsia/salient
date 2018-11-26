<!doctype html>


<html <?php language_attributes(); ?> >
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php $options = get_nectar_theme_options(); ?>

<?php if(!empty($options['responsive']) && $options['responsive'] == 1) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />

<?php } else { ?>
	<meta name="viewport" content="width=1200" />
<?php } ?>

<!--Shortcut icon-->
<?php if(!empty($options['favicon'])) { ?>
	<link rel="shortcut icon" type="image/png" sizes="192x192" href="<?php echo nectar_options_img($options['favicon']); ?>" />
<?php } ?>


<title> <?php wp_title("|",true, 'right'); ?> <?php if (!defined('WPSEO_VERSION')) { bloginfo('name'); } ?></title>

<?php wp_head(); ?>

<?php if(!empty($options['google-analytics'])) echo $options['google-analytics']; ?>

</head>

<?php
 global $post;
 global $woocommerce;


//check if parallax nectar slider is being used
$parallax_nectar_slider = using_nectar_slider();
$force_effect = get_post_meta($post->ID, '_force_transparent_header', true);

// header transparent option
$transparency_markup = null;
$activate_transparency = null;

$using_fw_slider = using_nectar_slider();
$using_fw_slider = (!empty($options['transparent-header']) && $options['transparent-header'] == '1') ? $using_fw_slider : 0;
if($force_effect == 'on') $using_fw_slider = '1';
$disable_effect = get_post_meta($post->ID, '_disable_transparent_header', true);

if(!empty($options['transparent-header']) && $options['transparent-header'] == '1') {

	$starting_color = (empty($options['header-starting-color'])) ? '#ffffff' : $options['header-starting-color'];
	$activate_transparency = using_page_header($post->ID);
	$remove_border = (!empty($options['header-remove-border']) && $options['header-remove-border'] == '1') ? 'true' : 'false';
	$transparency_markup = ($activate_transparency == 'true') ? 'data-transparent-header="true" data-remove-border="'.$remove_border.'" class="transparent"' : null ;
}

//header vars
$sideWidgetArea = (!empty($options['header-slide-out-widget-area'])) ? $options['header-slide-out-widget-area'] : 'off';
$userSetSideWidgetArea = $sideWidgetArea;
$logo_class = (!empty($options['use-logo']) && $options['use-logo'] == '1') ? null : 'class="no-image"';
$sideWidgetArea = (!empty($options['header-slide-out-widget-area'])) ? $options['header-slide-out-widget-area'] : 'off';
$sideWidgetIconAnimation = (!empty($options['header-slide-out-widget-area-icon-animation'])) ? $options['header-slide-out-widget-area-icon-animation'] : 'spin-and-transform';
// if($sideWidgetClass == 'slide-out-from-right-hover') $sideWidgetIconAnimation = 'simple-transform';
$fullWidthHeader = (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? 'true' : 'false';
$headerSearch = (!empty($options['header-disable-search']) && $options['header-disable-search'] == '1') ? 'false' : 'true';
$headerFormat = (!empty($options['header_format'])) ? $options['header_format'] : 'default';
$mobile_fixed = (!empty($options['header-mobile-fixed'])) ? $options['header-mobile-fixed'] : 'false';
$fullWidthHeader = (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? 'true' : 'false';
$headerColorScheme = (!empty($options['header-color'])) ? $options['header-color'] : 'light';
$userSetBG = (!empty($options['header-background-color']) && $headerColorScheme == 'custom') ? $options['header-background-color'] : '#ffffff';
$trans_header = (!empty($options['transparent-header']) && $options['transparent-header'] == '1') ? $options['transparent-header'] : 'false';
$bg_header = (!empty($post->ID) && $post->ID != 0) ? using_page_header($post->ID) : 0;
$bg_header = ($bg_header == 1) ? 'true' : 'false'; //convert to string for references in css
$perm_trans = (!empty($options['header-permanent-transparent']) && $trans_header != 'false' && $bg_header == 'true') ? $options['header-permanent-transparent'] : 'false';
$headerLinkHoverEffect = (!empty($options['header-hover-effect'])) ? $options['header-hover-effect'] : 'default';
$hideHeaderUntilNeeded = (!empty($options['header-hide-until-needed'])) ? $options['header-hide-until-needed'] : '0';
$headerResize = (!empty($options['header-resize-on-scroll']) && $perm_trans != '1') ? $options['header-resize-on-scroll'] : '0';
$page_transition_effect = (!empty($options['transition-effect'])) ? $options['transition-effect'] : 'standard';
if($hideHeaderUntilNeeded == '1') $headerResize = '0';
$lightbox_script = (!empty($options['lightbox_script'])) ? $options['lightbox_script'] : 'pretty_photo';
$button_styling = (!empty($options['button-styling'])) ? $options['button-styling'] : 'default';
$form_style = (!empty($options['form-style'])) ? $options['form-style'] : 'default';
$fancy_rcs = (!empty($options['form-fancy-select'])) ? $options['form-fancy-select'] : 'default';
$footer_reveal = (!empty($options['footer-reveal'])) ? $options['footer-reveal'] : 'false';
$footer_reveal_shadow = (!empty($options['footer-reveal-shadow']) && $footer_reveal == '1') ? $options['footer-reveal-shadow'] : 'none';
$icon_style = (!empty($options['theme-icon-style'])) ? $options['theme-icon-style'] : 'inherit';
$has_main_menu = (has_nav_menu('top_nav')) ? 'true' : 'false';
$animate_in_effect = (!empty($options['header-animate-in-effect'])) ? $options['header-animate-in-effect'] : 'none';
if($headerColorScheme == 'dark') { $userSetBG = '#1f1f1f'; }
$userSetSideWidgetArea = $sideWidgetArea;
if($has_main_menu == 'true' && $mobile_fixed == '1') $sideWidgetArea = '1';
if($headerFormat == 'centered-menu-under-logo') $fullWidthHeader = 'false';
$column_animation_easing = (!empty($options['column_animation_easing'])) ? $options['column_animation_easing'] : 'linear';
$column_animation_duration = (!empty($options['column_animation_timing'])) ? $options['column_animation_timing'] : '650';
$prependTopNavMobile = (!empty($options['header-slide-out-widget-area-top-nav-in-mobile']) && $userSetSideWidgetArea == '1') ? $options['header-slide-out-widget-area-top-nav-in-mobile'] : 'false';
$smooth_scrolling = (!empty($options['smooth-scrolling'])) ? $options['smooth-scrolling'] : '0';
$page_full_screen_rows = (isset($post->ID)) ? get_post_meta($post->ID, '_nectar_full_screen_rows', true) : '';
if($page_full_screen_rows == 'on') $smooth_scrolling = '0';

?>
<body <?php body_class(); ?> data-footer-reveal="<?php echo $footer_reveal; ?>" data-footer-reveal-shadow="<?php echo $footer_reveal_shadow; ?>" data-cae="<?php echo $column_animation_easing; ?>" data-cad="<?php echo $column_animation_duration; ?>" data-aie="<?php echo $animate_in_effect; ?>" data-ls="<?php echo $lightbox_script;?>" data-apte="<?php echo $page_transition_effect;?>" data-hhun="<?php echo $hideHeaderUntilNeeded; ?>" data-fancy-form-rcs="<?php echo $fancy_rcs; ?>" data-form-style="<?php echo $form_style; ?>" data-is="<?php echo $icon_style; ?>" data-button-style="<?php echo $button_styling; ?>" data-header-inherit-rc="<?php echo (!empty($options['header-inherit-row-color']) && $options['header-inherit-row-color'] == '1' && $perm_trans != 1) ? "true" : "false"; ?>" data-header-search="<?php echo $headerSearch; ?>" data-animated-anchors="<?php echo (!empty($options['one-page-scrolling']) && $options['one-page-scrolling'] == '1') ? 'true' : 'false'; ?>" data-ajax-transitions="<?php echo (!empty($options['ajax-page-loading']) && $options['ajax-page-loading'] == '1') ? 'true' : 'false'; ?>" data-full-width-header="<?php echo $fullWidthHeader; ?>" data-slide-out-widget-area="<?php echo ($sideWidgetArea == '1') ? 'true' : 'false';  ?>" data-user-set-ocm="<?php echo $userSetSideWidgetArea; ?>" data-loading-animation="<?php echo (!empty($options['loading-image-animation'])) ? $options['loading-image-animation'] : 'none'; ?>" data-bg-header="<?php echo $bg_header; ?>" data-ext-responsive="<?php echo (!empty($options['responsive']) && $options['responsive'] == 1 && !empty($options['ext_responsive']) && $options['ext_responsive'] == '1') ? 'true' : 'false'; ?>" data-header-resize="<?php echo $headerResize; ?>" data-header-color="<?php echo (!empty($options['header-color'])) ? $options['header-color'] : 'light' ; ?>" <?php echo (!empty($options['transparent-header']) && $options['transparent-header'] == '1') ? null : 'data-transparent-header="false"'; ?> data-smooth-scrolling="<?php echo $smooth_scrolling; ?>" data-permanent-transparent="<?php echo $perm_trans; ?>" data-responsive="<?php echo (!empty($options['responsive']) && $options['responsive'] == 1) ? '1'  : '0' ?>" >

<?php if(!empty($options['boxed_layout']) && $options['boxed_layout'] == '1') { echo '<div id="boxed">'; } ?>
<?php if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend') { get_template_part('includes/header-search'); } ?>


<?php
	if(empty($options['theme-skin'])) {
		get_template_part('includes/header-search');
	}
	elseif(!empty($options['theme-skin']) && $options['theme-skin'] != 'ascend')  {
		 get_template_part('includes/header-search');
	} ?>
	<div class="header-mod">
		<div class="sub-logo">
				<div class="header-mod-logo">
						<a href="/">
							<img src="/wp-content/themes/salient/img/logo.svg"/>
						</a>
					</div>
				<div class="seperator"></div>
				<div class="member-head-logo">Members</div>
		</div>
		<div class="menu">
			<div id="navBar" class="group">
				<a href="https://www.trueprofile.io/member">Start</a>
				<a href="https://www.trueprofile.io/member/benefits">Info</a>
				<a class="active" href="/">Blog</a>
				<a href="https://www.trueprofile.io/validate/" target="_blank">Validate</a>
				<a href="https://www.trueprofile.io/member/login">Login</a>
			</div>
		</div>
		<div onclick="toggleNav()" class="sidenav-btn">
			<img src="/wp-content/themes/salient/img/menu.svg" />
		</div>
	</div>
	<div class="header-secondary-mod">
		<ul>
			<?php
			if($has_main_menu == 'true') {
					wp_nav_menu( array('walker' => new Nectar_Arrow_Walker_Nav_Menu, 'theme_location' => 'top_nav', 'container' => '', 'items_wrap' => '%3$s' ) );
				} else {
					echo '<li class="no-menu-assigned"><a href="#">No menu assigned</a></li>';
				}?>
		</ul>
		<div id="search-btn">
			<a href="#searchbox">
				<img src='/wp-content/themes/salient/img/search.svg'>
			</a>
		</div>
	</div>


	<div onclick="hideHam()" id="overlay">
	</div>
	<div class="object-hide" id="hamburger">
		<div id="side-menu">
				<ul class="link-side-menu">
					<a href="https://www.trueprofile.io/member" class="side-char">
						Start
					</a>
				</ul>
				<ul class="link-side-menu">
					<a href="https://www.trueprofile.io/member/benefits" class="side-char">
						Info
					</a>
				</ul>
				<ul class="link-side-menu">
					<a href="/" class="side-char side-char-active">
						Blog
					</a>
				</ul>
				<ul class="secondary-header-nav">
					<?php
					if($has_main_menu == 'true') {
							wp_nav_menu( array('walker' => new Nectar_Arrow_Walker_Nav_Menu, 'theme_location' => 'top_nav', 'container' => '', 'items_wrap' => '%3$s' ) );
						} else {
							echo '<li class="no-menu-assigned"><a href="#">No menu assigned</a></li>';
						}?>
				</ul>
		</div>
		<div class="side-btn-container">
			<a href="https://www.trueprofile.io/validate/" class="side-btn">
				<div>
					Validate
				</div>
			</a>
			<a href="https://www.trueprofile.io/member/login" class="side-btn">
				<div>
					Login
				</div>
			</a>
		</div>

	</div>

<?php
echo "<script>
function toggleNav() {
	document.getElementById('overlay').className = 'hamburger-wrapper-overlay';
	document.getElementById('hamburger').className = 'hamburger-bar';
}
function hideHam() {
	document.getElementById('overlay').className = 'object-hide';
	document.getElementById('hamburger').className = 'object-hide';

}
</script>";

?>
