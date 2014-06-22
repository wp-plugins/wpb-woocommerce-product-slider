<?php

// add image size
add_image_size( 'wpb-pro-thumb', 300 );

// register shortcode for latest product

function wpb_wps_shortcode($atts){
	extract(shortcode_atts(array(
		  'title' => 'Latest Products'
	   ), $atts));

	$return_string = '<div class="wpb_slider_area wpb_latest_pro_sli wpb_fix_cart">';
	
	$return_string .= '<h3 class="wpb_area_title">'.$title.'</h3>';
    $return_string .= '<div id="owl-demo" class="owl-carousel">';
	
    $args = array(
				'post_type' => 'product',
		   'posts_per_page' => wpb_ez_get_option( 'wpb_num_pro', 'wpb_wps_general', 12 )
					);
					
	$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
	global $product;
        $return_string .= '<div class="item">';
		$return_string .= '<figure>';
		if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
		global $post, $product;
		
		$return_string .= '<a href="'.get_permalink().'" class="wpb_pro_img_url">';
		if (has_post_thumbnail( $loop->post->ID )){
			$return_string .= get_the_post_thumbnail($loop->post->ID,'wpb-pro-thumb', array('class' => "wpb_pro_img"));
		}else{
		    $return_string .= '<img id="place_holder_thm" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />';
		}
		$return_string .='</a>';
		
		$return_string .='<figcaption>';
		$return_string .='<h3 class="pro_title">';
		if (strlen($post->post_title) > 20) {
			$return_string .= substr(the_title($before = '', $after = '', FALSE), 0, wpb_ez_get_option( 'wpb_title_mx_ch', 'wpb_wps_style', 10 )) . '...';
		}else{
			$return_string .= get_the_title();
		}
		$return_string .='</h3>';

		$return_string .= '<div class="price_area_fix">'.do_shortcode('[add_to_cart id="'.get_the_ID().'"]').'</div>'; // call cart btn and price 
		
		$return_string .='</figcaption>';
		
		$return_string .= '</figure>';
		$return_string .= '</div>';
		 
    endwhile;
	} else {
	echo __( 'No products found' );
	}
	wp_reset_postdata();
			
    $return_string .= '</div>';
    $return_string .= '</div>';

    wp_reset_query();
    return $return_string;   
	   
	   
}

function wpb_wps_register_shortcodes(){
   add_shortcode('wpb-latest-product', 'wpb_wps_shortcode');
}
add_action( 'init', 'wpb_wps_register_shortcodes');


// register shortcode for feature product


function wpb_wps_feature_shortcode($atts){
	extract(shortcode_atts(array(
		  'title' => 'Feature Products'
	   ), $atts));

	$return_string = '<div class="wpb_slider_area wpb_feature_pro_sli wpb_fix_cart">';
	
	$return_string .= '<h3 class="wpb_area_title">'.$title.'</h3>';
    $return_string .= '<div id="owl-demo-feature" class="owl-carousel">';
	
    $args = array(
				'post_type' => 'product',
				 'meta_key' => '_featured',
			   'meta_value' => 'yes', 
		   'posts_per_page' => wpb_ez_get_option( 'wpb_num_pro', 'wpb_wps_general', 12 )
				);
					
	$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
	global $product;
        $return_string .= '<div class="item">';
		$return_string .= '<figure>';
		if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
		global $post, $product;
		
		$return_string .= '<a href="'.get_permalink().'" class="wpb_pro_img_url">';
		if (has_post_thumbnail( $loop->post->ID )){
			$return_string .= get_the_post_thumbnail($loop->post->ID,'wpb-pro-thumb', array('class' => "wpb_pro_img"));
		}else{
		    $return_string .= '<img id="place_holder_thm" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />';
		}
		$return_string .='</a>';
		
		$return_string .='<figcaption>';
		$return_string .='<h3 class="pro_title">';
		if (strlen($post->post_title) > 20) {
			$return_string .= substr(the_title($before = '', $after = '', FALSE), 0, wpb_ez_get_option( 'wpb_title_mx_ch', 'wpb_wps_style', 10 )) . '...';
		}else{
			$return_string .= get_the_title();
		}
		$return_string .='</h3>';

		$return_string .= '<div class="price_area_fix">'.do_shortcode('[add_to_cart id="'.get_the_ID().'"]').'</div>'; // call cart btn and price 
		
		$return_string .='</figcaption>';
		
		$return_string .= '</figure>';
		$return_string .= '</div>';
		 
    endwhile;
	} else {
	echo __( 'No products found' );
	}
	wp_reset_postdata();
			
    $return_string .= '</div>';
    $return_string .= '</div>';

    wp_reset_query();
    return $return_string;   
	   
	   
}

function wpb_wps_register_feature_shortcodes(){
   add_shortcode('wpb-feature-product', 'wpb_wps_feature_shortcode');
}
add_action( 'init', 'wpb_wps_register_feature_shortcodes');


// register shortcode for sidebar latest product


function wpb_wps_sideber_shortcode($atts){
	extract(shortcode_atts(array(
		  'posts' => 5,
	   ), $atts));

	$return_string = '<div class="wpb_slider_area wpb_sidebar_slider owl-text-center wpb_fix_cart">';

    $return_string .= '<div id="owl-demo-side" class="owl-carousel">';
	
    $args = array(
				'post_type' => 'product',
		   'posts_per_page' => $posts
				);
					
	$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
	global $product;
        $return_string .= '<div class="item">';
		$return_string .= '<figure>';
		if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
		global $post, $product;
		
		$return_string .= '<a href="'.get_permalink().'" class="wpb_pro_img_url">';
		if (has_post_thumbnail( $loop->post->ID )){
			$return_string .= get_the_post_thumbnail($loop->post->ID,'wpb-pro-thumb', array('class' => "wpb_pro_img"));
		}else{
		    $return_string .= '<img id="place_holder_thm" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />';
		}
		$return_string .='</a>';
		
		$return_string .='<figcaption>';
		$return_string .='<h3 class="pro_title">';
		if (strlen($post->post_title) > 20) {
			$return_string .= substr(the_title($before = '', $after = '', FALSE), 0, wpb_ez_get_option( 'wpb_title_mx_ch', 'wpb_wps_style', 10 )) . '...';
		}else{
			$return_string .= get_the_title();
		}
		$return_string .='</h3>';

		$return_string .= '<div class="price_area_fix">'.do_shortcode('[add_to_cart id="'.get_the_ID().'"]').'</div>'; // call cart btn and price 
		
		$return_string .='</figcaption>';
		
		$return_string .= '</figure>';
		$return_string .= '</div>';
		 
    endwhile;
	} else {
	echo __( 'No products found' );
	}
	wp_reset_postdata();
			
    $return_string .= '</div>';
    $return_string .= '</div>';

    wp_reset_query();
    return $return_string;   
	   
	   
}

function wpb_wps_side_register_shortcodes(){
   add_shortcode('wpb-sidebar-latest-product', 'wpb_wps_sideber_shortcode');
}
add_action( 'init', 'wpb_wps_side_register_shortcodes');


// register shortcode for sidebar feature product



function wpb_wps_sideber_feature_shortcode($atts){
	extract(shortcode_atts(array(
		  'posts' => 5,
	   ), $atts));

	$return_string = '<div class="wpb_slider_area wpb_sidebar_slider owl-text-center wpb_fix_cart">';

    $return_string .= '<div id="owl-demo-side-feature" class="owl-carousel">';
	
    $args = array(
				'post_type' => 'product',
				 'meta_key' => '_featured',
			   'meta_value' => 'yes', 
		   'posts_per_page' => $posts
				);
					
	$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
	global $product;
        $return_string .= '<div class="item">';
		$return_string .= '<figure>';
		if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
		global $post, $product;
		
		$return_string .= '<a href="'.get_permalink().'" class="wpb_pro_img_url">';
		if (has_post_thumbnail( $loop->post->ID )){
			$return_string .= get_the_post_thumbnail($loop->post->ID,'wpb-pro-thumb', array('class' => "wpb_pro_img"));
		}else{
		    $return_string .= '<img id="place_holder_thm" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />';
		}
		$return_string .='</a>';
		
		$return_string .='<figcaption>';
		$return_string .='<h3 class="pro_title">';
		if (strlen($post->post_title) > 20) {
			$return_string .= substr(the_title($before = '', $after = '', FALSE), 0, wpb_ez_get_option( 'wpb_title_mx_ch', 'wpb_wps_style', 10 )) . '...';
		}else{
			$return_string .= get_the_title();
		}
		$return_string .='</h3>';

		$return_string .= '<div class="price_area_fix">'.do_shortcode('[add_to_cart id="'.get_the_ID().'"]').'</div>'; // call cart btn and price 
		
		$return_string .='</figcaption>';
		
		$return_string .= '</figure>';
		$return_string .= '</div>';
		 
    endwhile;
	} else {
	echo __( 'No products found' );
	}
	wp_reset_postdata();
			
    $return_string .= '</div>';
    $return_string .= '</div>';

    wp_reset_query();
    return $return_string;   
	   
	   
}

function wpb_wps_side_fea_register_shortcodes(){
   add_shortcode('wpb-sidebar-feature-product', 'wpb_wps_sideber_feature_shortcode');
}
add_action( 'init', 'wpb_wps_side_fea_register_shortcodes');