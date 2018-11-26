<?php

$options = get_nectar_theme_options();
global $post;
$cta_link = ( !empty($options['cta-btn-link']) ) ? $options['cta-btn-link'] : '#';
$using_footer_widget_area = (!empty($options['enable-main-footer-area']) && $options['enable-main-footer-area'] == 1) ? 'true' : 'false';
$disable_footer_copyright = (!empty($options['disable-copyright-footer-area']) && $options['disable-copyright-footer-area'] == 1) ? 'true' : 'false';
$footer_reveal = (!empty($options['footer-reveal'])) ? $options['footer-reveal'] : 'false';
$midnight_non_reveal = ($footer_reveal != 'false') ? null : 'data-midnight="light"';


$exclude_pages = (!empty($options['exclude_cta_pages'])) ? $options['exclude_cta_pages'] : array();

?>


	<?php if(!empty($options['cta-text']) && current_page_url() != $cta_link && !in_array($post->ID, $exclude_pages)) {
		$cta_btn_color = (!empty($options['cta-btn-color'])) ? $options['cta-btn-color'] : 'accent-color'; ?>

		<div id="call-to-action">
			<div class="container">
				<div class="triangle"></div>
				<span> <?php echo $options['cta-text']; ?> </span>
				<a class="nectar-button <?php if($cta_btn_color != 'see-through') echo 'regular-button '; ?> <?php echo $cta_btn_color;?>" data-color-override="false" href="<?php echo $cta_link ?>"><?php if(!empty($options['cta-btn'])) echo $options['cta-btn']; ?> </a>
			</div>
		</div>

	<?php } ?>


  <div class="footer-mod">
        <div class='news-letter'>
            <?php
                $instance = [
                    'title' => 'Newsletter',
                    'text' => ''
                ];
                the_widget('SendGrid_NLVX_Widget', $instance);
            ?>
            <p class="note">Sign-up for our FREE newsletter and keep up-to-date on topics like document verification, blockchain technology, tips for successfully building a career abroad, and many more…</p>
        </div>
        <div class="offset">
            <div class="tp-container nav">
                <ul>
                    <li key="Newsletter">
                            <a target="_blank" href="https://trueprofile.io/member/newsletter">
                                Newsletter
                            </a>

                    </li>
                    <li key="Contact Us">
                        <a target="_blank" href="https://trueprofile.io/member/contact-us">
                            Contact Us
                        </a>
                    </li>
                    <li key="About Us">
                            <a target="_blank" href="https://trueprofile.io/member/about-us">
                                About Us
                            </a>
                    </li>
                    <li key="FAQs">
                        <a target="_blank" href="https://trueprofile.io/member/faq">
                            FAQs
                        </a>
                    </li>
                    <li key="Privacy Policy">
                        <a target="_blank" href="https://trueprofile.io/privacy-policy">
                            Privacy Policy
                        </a>
                    </li>
                    <li key="Terms & Conditions">
                        <a target="_blank" href="https://trueprofile.io/terms-and-conditions">
                            Terms & Conditions
                        </a>
                    </li>
                    <li key="Terms of Use">
                            <a target="_blank" href="https://trueprofile.io/terms-of-use">
                                Terms of Use
                            </a>
                    </li>
                </ul>
            </div>
            <div class="tp-container SOC2-logo">
                <img src="/wp-content/themes/salient/img/soc-siegel.png" alt="" />
            </div>
            <div class="tp-container SOC2">
              <div>
                <strong>SOC2 Certified</strong> - Developed by the American Institute of CPAs (AICPA), SOC 2 defines criteria for managing customer data based on five “trust service principles”— security, availability, processing integrity, confidentiality and privacy. <a class="linklm" href="https://www.aicpa.org/interestareas/frc/assuranceadvisoryservices/aicpasoc2report.html">Learn more ›</a>
              </div>
            </div>
            <div class="logo-container">
              <div class="logo-item">
                <a href="https://trueprofile.io/member">
                  <img src="/wp-content/themes/salient/img/logo.svg" alt=""/>
                </a>
                              </div>
                              <div class="seperator"></div>
                              <div class="member-head-logo">Members</div>
                          </div>

                          <div class="copyright-container">
                              TrueProfile.io® is a registered trademark of DataFlow Verification Services (Hong Kong) Ltd. © DataFlow Verification Services (Hong Kong) Ltd. 2018 All rights reserved.</div>
                          </div>
            <div class="social-container-fixed">
              <a target="_blank"
              href="https://www.facebook.com/trueprofile.io/">
                <div class="item-fixed btn-facebook">
                  <img src="/wp-content/themes/salient/img/facebook.svg" />
                </div>
              </a>
              <a target="_blank"
              href="https://twitter.com/trueprofile_io">
                <div class="item-fixed btn-twitter">
                  <img src="/wp-content/themes/salient/img/twitter.svg" />
                </div>
              </a>
              <a target="_blank"
              href="https://www.linkedin.com/company/18454801/">
                <div class="item-fixed btn-linkedin">
                  <img src="/wp-content/themes/salient/img/linkedin.svg" />
                </div>
              </a>
            </div>
  </div>



<?php

$mobile_fixed = (!empty($options['header-mobile-fixed'])) ? $options['header-mobile-fixed'] : 'false';
$has_main_menu = (has_nav_menu('top_nav')) ? 'true' : 'false';

$sideWidgetArea = (!empty($options['header-slide-out-widget-area'])) ? $options['header-slide-out-widget-area'] : 'off';
$userSetSideWidgetArea = $sideWidgetArea;
if($has_main_menu == 'true' && $mobile_fixed == '1') $sideWidgetArea = '1';

$fullWidthHeader = (!empty($options['header-fullwidth']) && $options['header-fullwidth'] == '1') ? true : false;
$sideWidgetClass = (!empty($options['header-slide-out-widget-area-style'])) ? $options['header-slide-out-widget-area-style'] : 'slide-out-from-right';
$sideWidgetOverlayOpacity = (!empty($options['header-slide-out-widget-area-overlay-opacity'])) ? $options['header-slide-out-widget-area-overlay-opacity'] : 'dark';
$prependTopNavMobile = (!empty($options['header-slide-out-widget-area-top-nav-in-mobile'])) ? $options['header-slide-out-widget-area-top-nav-in-mobile'] : 'false';

if($sideWidgetArea == '1') {

	if($sideWidgetClass == 'fullscreen') echo '</div><!--blurred-wrap-->'; ?>

	<div id="slide-out-widget-area-bg" class="<?php echo $sideWidgetClass . ' '. $sideWidgetOverlayOpacity; ?>"><?php if($sideWidgetClass == 'fullscreen-alt') echo '<div class="bg-inner"></div>';?></div>
	<div id="slide-out-widget-area" class="<?php echo $sideWidgetClass; ?>" data-back-txt="<?php echo __('Back', NECTAR_THEME_NAME); ?>">

		<?php if($sideWidgetClass == 'fullscreen' || $sideWidgetClass == 'fullscreen-alt') echo '<div class="inner-wrap">'; ?>

		<div class="inner">

		  <a class="slide_out_area_close" href="#"><span class="icon-salient-x icon-default-style"></span></a>


		   <?php

		   if($userSetSideWidgetArea == 'off' || $prependTopNavMobile == '1' && $has_main_menu == 'true') { ?>
			   <div class="off-canvas-menu-container mobile-only">
			  		<ul class="menu">
					   <?php
					  		////use default top nav menu if ocm is not activated
					  	     ////but is needed for mobile when the mobile fixed nav is on
					   		wp_nav_menu( array('theme_location' => 'top_nav', 'container' => '', 'items_wrap' => '%3$s'));
					   ?>

					</ul>
				</div>
			<?php }

		  if(has_nav_menu('off_canvas_nav') && $userSetSideWidgetArea != 'off') { ?>
		 	 <div class="off-canvas-menu-container">
		  		<ul class="menu">
					    <?php wp_nav_menu( array('theme_location' => 'off_canvas_nav', 'container' => '', 'items_wrap' => '%3$s'));	?>
				</ul>
		    </div>

		  <?php }

		   //widget area
		   if($sideWidgetClass != 'slide-out-from-right-hover') {
			   if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Off Canvas Menu') ) : elseif(!has_nav_menu('off_canvas_nav') && $userSetSideWidgetArea != 'off') : ?>
			      <div class="widget">
				 	 <h4 class="widgettitle">Side Widget Area</h4>
				 	 <p class="no-widget-added"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign widgets to this area.</a></p>
			 	  </div>
			 <?php endif;

			} ?>

		</div>

		<?php

			$usingSocialOrBottomText = (!empty($options['header-slide-out-widget-area-social']) && $options['header-slide-out-widget-area-social'] == '1' || !empty($options['header-slide-out-widget-area-bottom-text'])) ? true : false;

			echo '<div class="bottom-meta-wrap">';

			if($sideWidgetClass == 'slide-out-from-right-hover') {
			   if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Off Canvas Menu') ) : elseif(!has_nav_menu('off_canvas_nav') && $userSetSideWidgetArea != 'off') : ?>
			      <div class="widget">
				 	 <h4 class="widgettitle">Side Widget Area</h4>
				 	 <p class="no-widget-added"><a href="<?php echo admin_url('widgets.php'); ?>">Click here to assign widgets to this area.</a></p>
			 	  </div>
			 <?php endif;

			}

			global $using_secondary;
		 	/*social icons*/
			 if(!empty($options['header-slide-out-widget-area-social']) && $options['header-slide-out-widget-area-social'] == '1') {
			 	$social_link_arr = array('twitter-url','facebook-url','vimeo-url','pinterest-url','linkedin-url','youtube-url','tumblr-url','dribbble-url','rss-url','github-url','behance-url','google-plus-url','instagram-url','stackexchange-url','soundcloud-url','flickr-url','spotify-url','vk-url','vine-url');
			 	$social_icon_arr = array('icon-twitter','icon-facebook','icon-vimeo','icon-pinterest','icon-linkedin','icon-youtube','icon-tumblr','icon-dribbble','icon-rss','icon-github-alt','icon-be','icon-google-plus','icon-instagram','icon-stackexchange','icon-soundcloud','icon-flickr','icon-salient-spotify','icon-vk','fa-vine');

			 	echo '<ul class="off-canvas-social-links">';

			 	for($i=0; $i<sizeof($social_link_arr); $i++) {

			 		if(!empty($options[$social_link_arr[$i]]) && strlen($options[$social_link_arr[$i]]) > 1) echo '<li><a target="_blank" href="'.$options[$social_link_arr[$i]].'"><i class="'.$social_icon_arr[$i].'"></i></a></li>';
			 	}

			 	echo '</ul>';
			 } else if (!empty($options['enable_social_in_header']) && $options['enable_social_in_header'] == '1' && $using_secondary != 'header_with_secondary') {
			 	echo '<ul class="off-canvas-social-links mobile-only">';
				nectar_header_social_icons('secondary-nav');
				echo '</ul>';
			 }

			 /*bottom text*/
			 if(!empty($options['header-slide-out-widget-area-bottom-text'])) {
			 	$desktop_social = (!empty($options['enable_social_in_header']) && $options['enable_social_in_header'] == '1') ? 'false' : 'true';
			 	echo '<p class="bottom-text" data-has-desktop-social="'. $desktop_social .'">'.$options['header-slide-out-widget-area-bottom-text'].'</p>';
			 }

			echo '</div><!--/bottom-meta-wrap-->';

			if($sideWidgetClass == 'fullscreen' || $sideWidgetClass == 'fullscreen-alt') echo '</div> <!--/inner-wrap-->'; ?>

	</div>
<?php } ?>


    </div> <!--/ajax-content-wrap-->

    <?php if(!empty($options['boxed_layout']) && $options['boxed_layout'] == '1') { echo '</div>'; } ?>

    <?php if(!empty($options['back-to-top']) && $options['back-to-top'] == 1) { ?>
        <a id="to-top" class="<?php if(!empty($options['back-to-top-mobile']) && $options['back-to-top-mobile'] == 1) echo 'mobile-enabled'; ?>"><i class="icon-angle-up"></i></a>
    <?php }

    $body_border = (!empty($options['body-border'])) ? $options['body-border'] : 'off';
    if($body_border == '1') {
        echo '<div class="body-border-top"></div>
            <div class="body-border-right"></div>
            <div class="body-border-bottom"></div>
            <div class="body-border-left"></div>';
    }

    wp_footer(); ?>

    </body>
</html>
