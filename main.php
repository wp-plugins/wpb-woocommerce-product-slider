<?php
/**
Plugin Name: WPB Woocommarce Product slider
Plugin URI: http://wpbean.com/wpb-woocommarce-product-slider/
Description: WPB Woocommarce Product slider is a nice and cool carousel product slider. It has lots of cool feature like shortcode control, widget,custom settings etc. Shortcodes: For latest product slider &nbsp;&nbsp;&nbsp;&nbsp;[wpb-latest-product title="Latest Product"]&nbsp;&nbsp;&nbsp;&nbsp; & &nbsp;&nbsp; For feature product slider &nbsp;&nbsp;&nbsp;&nbsp; [wpb-feature-product title="Feature Products"] &nbsp;&nbsp;&nbsp;&nbsp; jQuery Plugin by: <a href="http://owlgraphic.com/owlcarousel/">owlcarousel</a> & animation script by <a href="http://tympanus.net/codrops/2013/06/18/caption-hover-effects/">MARY LOU</a>. &nbsp;&nbsp;&nbsp;&nbsp; WordPress Settings API PHP Class by: <a href="https://github.com/tareq1988/wordpress-settings-api-class" >Wedevs</a>.
Author: wpbean
Version: 1.0
Author URI: http://wpbean.com
*/

//--------- settings scripts & style file---------------- //

require_once dirname( __FILE__ ) . '/wpb-wps.php';


//--------- setup widgets for this plugin ---------------- //

require_once dirname( __FILE__ ) . '/wpb-wps-widgets.php';

//--------- setup widgets for this plugin ---------------- //

require_once dirname( __FILE__ ) . '/wpb-wps-shortcodes.php';

//--------- settings framework install ---------------- //

require_once dirname( __FILE__ ) . '/wpb-wps-settings.php';


//--------- trigger setting api class---------------- //

function wpb_ez_get_option( $option, $section, $default = '' ) {
 
    $options = get_option( $section );
 
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
 
    return $default;
}


//--------- trigger owl carousel ---------------- //

function wpb_wps_trigger_owl(){
?>
<script type="text/javascript">
jQuery.noConflict();
(function( $ ) {
  $(function() {
  
$(document).ready(function() {
	// carousel latest
    $("#owl-demo").owlCarousel({
		autoPlay: <?php echo wpb_ez_get_option( 'wpb_slider_auto', 'wpb_wps_general', 'false' );?>,
		stopOnHover: <?php echo wpb_ez_get_option( 'wpb_stop_hover_i', 'wpb_wps_general', 'true' );?>,
		navigation: <?php echo wpb_ez_get_option( 'wpb_stop_nav', 'wpb_wps_general', 'true' );?>,
		navigationText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i> "
        ],
		slideSpeed: <?php echo wpb_ez_get_option( 'wpb_nav_speed', 'wpb_wps_general', 1000 );?>,
		paginationSpeed: <?php echo wpb_ez_get_option( 'wpb_pagi_speed', 'wpb_wps_general', 1000 );?>,
		pagination:<?php echo wpb_ez_get_option( 'wpb_stop_pagi', 'wpb_wps_general', 'false' );?>,
		paginationNumbers: <?php echo wpb_ez_get_option( 'wpb_num_count', 'wpb_wps_general', 'false' );?>,
        items : <?php echo wpb_ez_get_option( 'wpb_num_col', 'wpb_wps_general', 4 );?>,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
		mouseDrag:<?php echo wpb_ez_get_option( 'wpb_mouse_drag', 'wpb_wps_general', 'true' );?>,
		touchDrag:<?php echo wpb_ez_get_option( 'wpb_touch_drag', 'wpb_wps_general', 'true' );?>,
	}); 
	// carousel feature
	$("#owl-demo-feature").owlCarousel({
		autoPlay: <?php echo wpb_ez_get_option( 'wpb_slider_auto', 'wpb_wps_general', 'false' );?>,
		stopOnHover: <?php echo wpb_ez_get_option( 'wpb_stop_hover_i', 'wpb_wps_general', 'true' );?>,
		navigation: <?php echo wpb_ez_get_option( 'wpb_stop_nav', 'wpb_wps_general', 'true' );?>,
		navigationText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i> "
        ],
		slideSpeed: <?php echo wpb_ez_get_option( 'wpb_nav_speed', 'wpb_wps_general', 1000 );?>,
		paginationSpeed: <?php echo wpb_ez_get_option( 'wpb_pagi_speed', 'wpb_wps_general', 1000 );?>,
		pagination:<?php echo wpb_ez_get_option( 'wpb_stop_pagi', 'wpb_wps_general', 'false' );?>,
		paginationNumbers: <?php echo wpb_ez_get_option( 'wpb_num_count', 'wpb_wps_general', 'false' );?>,
        items : <?php echo wpb_ez_get_option( 'wpb_num_col', 'wpb_wps_general', 4 );?>,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
		mouseDrag:<?php echo wpb_ez_get_option( 'wpb_mouse_drag', 'wpb_wps_general', 'true' );?>,
		touchDrag:<?php echo wpb_ez_get_option( 'wpb_touch_drag', 'wpb_wps_general', 'true' );?>,
	});
	
// sidebar carousel latest

    $("#owl-demo-side").owlCarousel({
        autoPlay: <?php echo wpb_ez_get_option( 'wpb_slider_auto_side_i', 'wpb_wps_sidebar', 'true' );?>,
		stopOnHover: <?php echo wpb_ez_get_option( 'wpb_stop_hover_side', 'wpb_wps_sidebar', 'true' );?>,
		navigation: <?php echo wpb_ez_get_option( 'wpb_stop_nav_side', 'wpb_wps_sidebar', 'false' );?>,
		navigationText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i> "
        ],
		slideSpeed: <?php echo wpb_ez_get_option( 'wpb_nav_speed_side', 'wpb_wps_sidebar', 1000 );?>,
		paginationSpeed: <?php echo wpb_ez_get_option( 'wpb_pagi_speed_side', 'wpb_wps_sidebar', 1000 );?>,
		pagination: <?php echo wpb_ez_get_option( 'wpb_stop_pagi_side', 'wpb_wps_sidebar', 'true' );?>,
		paginationNumbers: <?php echo wpb_ez_get_option( 'wpb_num_count_side', 'wpb_wps_sidebar', 'true' );?>,
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [979,1],
        itemsTablet: [768,1],
      	itemsMobile:[479,1],
		mouseDrag: <?php echo wpb_ez_get_option( 'wpb_mouse_drag_side', 'wpb_wps_sidebar', 'true' );?>,
		touchDrag: <?php echo wpb_ez_get_option( 'wpb_touch_drag_side', 'wpb_wps_sidebar', 'true' );?>,
    });
	
// sidebar carousel feature product
	
	$("#owl-demo-side-feature").owlCarousel({
        autoPlay: <?php echo wpb_ez_get_option( 'wpb_slider_auto_side_i', 'wpb_wps_sidebar', 'true' );?>,
		stopOnHover: <?php echo wpb_ez_get_option( 'wpb_stop_hover_side', 'wpb_wps_sidebar', 'true' );?>,
		navigation: <?php echo wpb_ez_get_option( 'wpb_stop_nav_side', 'wpb_wps_sidebar', 'false' );?>,
		navigationText: [
        "<i class='fa fa-angle-left'></i>",
        "<i class='fa fa-angle-right'></i> "
        ],
		slideSpeed: <?php echo wpb_ez_get_option( 'wpb_nav_speed_side', 'wpb_wps_sidebar', 1000 );?>,
		paginationSpeed: <?php echo wpb_ez_get_option( 'wpb_pagi_speed_side', 'wpb_wps_sidebar', 1000 );?>,
		pagination: <?php echo wpb_ez_get_option( 'wpb_stop_pagi_side', 'wpb_wps_sidebar', 'true' );?>,
		paginationNumbers: <?php echo wpb_ez_get_option( 'wpb_num_count_side', 'wpb_wps_sidebar', 'true' );?>,
        items : 1,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
    		itemsTablet: [768,1],
      	itemsMobile:[479,1],
		mouseDrag: <?php echo wpb_ez_get_option( 'wpb_mouse_drag_side', 'wpb_wps_sidebar', 'true' );?>,
		touchDrag: <?php echo wpb_ez_get_option( 'wpb_touch_drag_side', 'wpb_wps_sidebar', 'true' );?>,
    });
	
	// slider style type for latest product general
	$('.wpb_latest_pro_sli .owl-wrapper').addClass('<?php echo wpb_ez_get_option( 'wpb_slider_type_gen_lat', 'wpb_wps_style', 'grid cs-style-3' );?>');
	// slider style type for feature product general
	$('.wpb_feature_pro_sli .owl-wrapper').addClass('<?php echo wpb_ez_get_option( 'wpb_slider_type_gen_fea', 'wpb_wps_style', 'grid cs-style-3' );?>');
	// slider style type for latest product sidebar
	$('.widget_wpb_latest_class .owl-wrapper').addClass('<?php echo wpb_ez_get_option( 'wpb_slider_type_sid_lat', 'wpb_wps_style', 'grid cs-style-3' );?>');
	// slider style type for feature product sidebar
	$('.widget_wpb_feature_class .owl-wrapper').addClass('<?php echo wpb_ez_get_option( 'wpb_slider_type_sid_fea', 'wpb_wps_style', 'grid cs-style-3' );?>');
	
});	


});
})(jQuery);
</script>
<?php
}
add_action('wp_footer','wpb_wps_trigger_owl');

// widget shortcode support

add_filter('widget_text', 'do_shortcode'); 


// wpb settings style 
function wpb_settings_style(){
?>
<style type="text/css">
.grid figcaption a, div.grid_no_animation figcaption a.button {background: <?php echo wpb_ez_get_option( 'wpb_wps_btn_bg', 'wpb_wps_style', '#1abc9c' );?>!important;}
.grid figcaption a:hover, div.grid_no_animation figcaption a.button:hover {background: <?php echo wpb_ez_get_option( 'wpb_wps_btn_bg_hover', 'wpb_wps_style', '#16a085' );?>!important;}
.owl-theme .owl-controls .owl-page span {background: <?php echo wpb_ez_get_option( 'wpb_pagi_btn_bg', 'wpb_wps_style', '#8BCFC2' );?>;}
.owl-theme .owl-controls .owl-page.active span,
.owl-theme .owl-controls.clickable .owl-page:hover span{background: <?php echo wpb_ez_get_option( 'wpb_pagi_btn_bg_ac', 'wpb_wps_style', '#16A085' );?>;}
.owl-theme .owl-controls .owl-buttons div {background: <?php echo wpb_ez_get_option( 'wpb_nav_btn_bg', 'wpb_wps_style', '#CCCCCC' );?>;}
.owl-theme .owl-controls.clickable .owl-buttons div:hover{background:<?php echo wpb_ez_get_option( 'wpb_nav_btn_bg_ac', 'wpb_wps_style', '#999999' );?>;}
div.grid_no_animation figcaption .pro_price_area .amount {text-decoration: none;color: <?php echo wpb_ez_get_option( 'wpb_pro_price_color_i', 'wpb_wps_style', '#16A085' );?>;}
</style>
<?php
}
add_action('wp_head','wpb_settings_style');