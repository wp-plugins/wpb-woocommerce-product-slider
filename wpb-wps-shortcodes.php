<?php

// add image size
add_image_size( 'wpb-pro-thumb', 300 );

// register shortcode for latest product

function wpb_wps_shortcode($atts){
	extract(shortcode_atts(array(
		  'title' => 'Latest Products',
	   ), $atts));
?>
<div class="wpb_slider_area wpb_latest_pro_sli">
	<h2 class="wpb_area_title"><?php echo $title;?></h2>
	<div id="owl-demo" class="owl-carousel">
		<?php
			$args = array(
				'post_type' => 'product',
		   'posts_per_page' => wpb_ez_get_option( 'wpb_num_pro', 'wpb_wps_general', 12 )
					);
					
			$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) {
					while ( $loop->have_posts() ) : $loop->the_post();
			global $product;	
		?>
		
		<div class="item">
			<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
				global $post, $product;
			?>
			<figure>
				<a href="<?php the_permalink();?>" class="wpb_pro_img_url">
					<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID,'wpb-pro-thumb', array('class' => "wpb_pro_img")); else echo '<img id="place_holder_thm" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
				</a>
				<figcaption>
					<h3 class="pro_title"><?php if (strlen($post->post_title) > 20) {echo substr(the_title($before = '', $after = '', FALSE), 0, wpb_ez_get_option( 'wpb_title_mx_ch', 'wpb_wps_style', 10 )) . '...'; } else {the_title();} ?></h3>
					<div class="pro_price_area"><?php echo $product->get_price_html(); ?></div>
					<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
				</figcaption>
			</figure>
		</div><!-- item --->
				
		<?php
			endwhile;
				} else {
			echo __( 'No products found' );
				}
			wp_reset_postdata();
		?>

    </div><!--- owl-carousel ---->
</div><!-- wpb_slider_area --->
<?php
}

function wpb_wps_register_shortcodes(){
   add_shortcode('wpb-latest-product', 'wpb_wps_shortcode');
}
add_action( 'init', 'wpb_wps_register_shortcodes');

// register shortcode for feature product

function wpb_wps_feature_shortcode($atts){
	extract(shortcode_atts(array(
			  'title' => 'Feature Products',
		   ), $atts));
?>
<div class="wpb_slider_area wpb_feature_pro_sli">
		<h2 class="wpb_area_title"><?php echo $title;?></h2>
	<div id="owl-demo-feature" class="owl-carousel">
			
		<?php
					$args = array(
							 'post_type' => 'product',
							 'meta_key' => '_featured',
							 'meta_value' => 'yes', 
						'posts_per_page' => 12
					);
					$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) : $loop->the_post();
					global $product;	
				?>
		
		<div class="item">
			<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
				global $post, $product;
			?>
			<figure>
				<a href="<?php the_permalink();?>" class="wpb_pro_img_url">
					<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID,'wpb-pro-thumb', array('class' => "wpb_pro_img")); else echo '<img id="place_holder_thm" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
				</a>
				<figcaption>
					<h3 class="pro_title"><?php if (strlen($post->post_title) > 20) {echo substr(the_title($before = '', $after = '', FALSE), 0, wpb_ez_get_option( 'wpb_title_mx_ch', 'wpb_wps_style', 10 )) . '...'; } else {the_title();} ?></h3>
					<div class="pro_price_area"><?php echo $product->get_price_html(); ?></div>
					<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
				</figcaption>
			</figure>
		</div><!-- item --->
				
		<?php
			endwhile;
				} else {
			echo __( 'No products found' );
				}
			wp_reset_postdata();
		?>

    </div><!--- owl-carousel ---->
</div><!-- wpb_slider_area --->
<?php
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
?>
<div class="wpb_slider_area wpb_sidebar_slider owl-text-center">
	
	<div id="owl-demo-side" class="owl-carousel">
		
		<?php
			$args = array(
				'post_type' => 'product',
		   'posts_per_page' => $posts
					);
					
			$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) {
					while ( $loop->have_posts() ) : $loop->the_post();
			global $product;	
		?>
		
        <div class="item">
			<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
				global $post, $product;
			?>
			<figure>
				<a href="<?php the_permalink();?>" class="wpb_pro_img_url">
					<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID,'wpb-pro-thumb', array('class' => "wpb_pro_img")); else echo '<img id="place_holder_thm" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
				</a>	
				<figcaption>
					<h3 class="pro_title"><?php if (strlen($post->post_title) > 20) {echo substr(the_title($before = '', $after = '', FALSE), 0, wpb_ez_get_option( 'wpb_title_mx_ch', 'wpb_wps_style', 10 )) . '...'; } else {the_title();} ?></h3>
					<div class="pro_price_area"><?php echo $product->get_price_html(); ?></div>
					<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
				</figcaption>
			</figure>
		</div><!-- item -->
		
		<?php
			endwhile;
				} else {
			echo __( 'No products found' );
				}
			wp_reset_postdata();
		?>
		
    </div><!-- owl-carousel -->
</div><!-- wpb_slider_area -->
<?php
}
function wpb_wps_side_register_shortcodes(){
   add_shortcode('wpb-sidebar-latest-product', 'wpb_wps_sideber_shortcode');
}
add_action('init','wpb_wps_side_register_shortcodes');

// register shortcode for sidebar feature product

function wpb_wps_sideber_feature_shortcode($atts){
	extract(shortcode_atts(array(
		  'posts' => 5,
	   ), $atts));
?>
<div class="wpb_slider_area wpb_sidebar_slider owl-text-center">
	<div id="owl-demo-side-feature" class="owl-carousel">
		
		<?php
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
		?>
		
        <div class="item">
			<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
				global $post, $product;
			?>
			<figure>
				<a href="<?php the_permalink();?>" class="wpb_pro_img_url">
					<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID,'wpb-pro-thumb', array('class' => "wpb_pro_img")); else echo '<img id="place_holder_thm" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
				</a>
				<figcaption>
					<h3 class="pro_title"><?php if (strlen($post->post_title) > 20) {echo substr(the_title($before = '', $after = '', FALSE), 0, wpb_ez_get_option( 'wpb_title_mx_ch', 'wpb_wps_style', 10 )) . '...'; } else {the_title();} ?></h3>
					<div class="pro_price_area"><?php echo $product->get_price_html(); ?></div>
					<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
				</figcaption>
			</figure>
		</div><!-- item -->
		
		<?php
			endwhile;
				} else {
			echo __( 'No products found' );
				}
			wp_reset_postdata();
		?>
		
    </div><!-- owl-carousel -->
</div><!-- wpb_slider_area -->
<?php
}
function wpb_wps_side_fea_register_shortcodes(){
   add_shortcode('wpb-sidebar-feature-product', 'wpb_wps_sideber_feature_shortcode');
}
add_action('init','wpb_wps_side_fea_register_shortcodes');