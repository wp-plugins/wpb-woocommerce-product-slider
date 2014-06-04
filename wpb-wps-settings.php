<?php
//--------- settings class install ---------------- //

require_once dirname( __FILE__ ) . '/class.settings-api.php';

/**
 * installing setting api class by wedevs
 */
if ( !class_exists('WPB_wps_main_Settings_API' ) ):
class WPB_wps_main_Settings_API {

    private $settings_api;

    function __construct() {
        $this->settings_api = new WPB_wps_mother_class;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }
	
    function admin_menu() {
        add_options_page( 'WPB Woo Product Slider', 'WPB Woo Product Slider', 'delete_posts', 'wpb_wps_zoom', array($this, 'wpb_plugin_page') );
    }
	// setings tabs
    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'wpb_wps_general',
                'title' => __( 'General Settings', 'wedevs' )
            ),
            array(
                'id' => 'wpb_wps_sidebar',
                'title' => __( 'Sidebar Settings', 'wedevs' )
            ),
            array(
                'id' => 'wpb_wps_style',
                'title' => __( 'Style Settings', 'wpuf' )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'wpb_wps_general' => array(
				array(
                'name' => 'wpb_num_col',
                'label' => __( 'Number Of column', 'wedevs' ),
                'desc' => __( 'Tell the plugin how many column you want. For best result use 3 to 5 column.Default value 4.', 'wedevs' ),
                'type' => 'number',
                'default' => '4'
				),
				array(
                'name' => 'wpb_num_pro',
                'label' => __( 'Number Of Product', 'wedevs' ),
                'desc' => __( 'Tell the plugin how many Product you want in your slider. Default value 12.', 'wedevs' ),
                'type' => 'number',
                'default' => '12'
				),
				array(
                'name' => 'wpb_slider_auto',
                'label' => __( 'Slider Auto Play', 'wedevs' ),
                'desc' => __( 'Tell the plugin your slider need auto play or not. Default NO.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'false',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
				array(
                'name' => 'wpb_stop_hover_i',
                'label' => __( 'Slider Stop on Hover', 'wedevs' ),
                'desc' => __( 'Tell the plugin your slider need stop on mouse hover or not. Default NO.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'true',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
				array(
                'name' => 'wpb_stop_nav',
                'label' => __( 'Navigation', 'wedevs' ),
                'desc' => __( 'Tell the plugin your slider need navigation on top or not. Default Yes.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'true',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
				array(
                'name' => 'wpb_nav_speed',
                'label' => __( 'Navigation Speed', 'wedevs' ),
                'desc' => __( 'Tell the plugin navigation speed in millisecond. Default value 1000.', 'wedevs' ),
                'type' => 'number',
                'default' => '1000'
				),
				array(
                'name' => 'wpb_stop_pagi',
                'label' => __( 'Pagination', 'wedevs' ),
                'desc' => __( 'Tell the plugin your slider need pagination on bottom or not. Default NO.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'false',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
				array(
                'name' => 'wpb_pagi_speed',
                'label' => __( 'Pagination Speed', 'wedevs' ),
                'desc' => __( 'Tell the plugin pagination speed in millisecond. Default value 1000.', 'wedevs' ),
                'type' => 'number',
                'default' => '1000'
				),
				array(
                'name' => 'wpb_num_count',
                'label' => __( 'Pagination Number Counting', 'wedevs' ),
                'desc' => __( 'Tell the plugin your slider need pagination need counting or not. Default NO.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'false',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
				array(
                'name' => 'wpb_touch_drag',
                'label' => __( 'Touch Drag', 'wedevs' ),
                'desc' => __( 'Tell the plugin your slider need touch drag or not. Default Yes.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'true',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
				array(
                'name' => 'wpb_mouse_drag',
                'label' => __( 'Mouse Drag', 'wedevs' ),
                'desc' => __( 'Tell the plugin your slider need mouse drag or not. Default Yes.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'true',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
				
            ),
			
            'wpb_wps_sidebar' => array(
				array(
                'name' => 'wpb_slider_auto_side_i',
                'label' => __( 'Slider Auto Play', 'wedevs' ),
                'desc' => __( 'Tell the plugin your slider need auto play on sidebar or not. Default NO.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'true',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
				array(
                'name' => 'wpb_stop_hover_side',
                'label' => __( 'Slider Stop on Hover', 'wedevs' ),
                'desc' => __( 'Tell the plugin your sidebar slider need stop on mouse hover or not. Default Yes.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'true',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
				array(
                'name' => 'wpb_stop_nav_side',
                'label' => __( 'Navigation', 'wedevs' ),
                'desc' => __( 'Tell the plugin your sidebar slider need navigation on top or not. Default NO.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'false',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
				array(
                'name' => 'wpb_nav_speed_side',
                'label' => __( 'Navigation Speed', 'wedevs' ),
                'desc' => __( 'Tell the plugin navigation speed for sidebar slider in millisecond. Default value 1000.', 'wedevs' ),
                'type' => 'number',
                'default' => '1000'
				),
				array(
                'name' => 'wpb_stop_pagi_side',
                'label' => __( 'Pagination', 'wedevs' ),
                'desc' => __( 'Tell the plugin your sidebar slider need pagination on bottom or not. Default Yes.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'true',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
				array(
                'name' => 'wpb_pagi_speed_side',
                'label' => __( 'Pagination Speed', 'wedevs' ),
                'desc' => __( 'Tell the plugin pagination speed for sidebar slider in millisecond. Default value 1000.', 'wedevs' ),
                'type' => 'number',
                'default' => '1000'
				),
				array(
                'name' => 'wpb_num_count_side',
                'label' => __( 'Pagination Number Counting', 'wedevs' ),
                'desc' => __( 'Tell the plugin your slider need pagination need counting or not. Default NO.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'false',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
				array(
                'name' => 'wpb_touch_drag_side',
                'label' => __( 'Touch Drag', 'wedevs' ),
                'desc' => __( 'Tell the plugin your slider need touch drag or not. Default Yes.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'true',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
				array(
                'name' => 'wpb_mouse_drag_side',
                'label' => __( 'Mouse Drag', 'wedevs' ),
                'desc' => __( 'Tell the plugin your slider need mouse drag or not. Default Yes.', 'wedevs' ),
                'type' => 'radio',
				'default' => 'true',
                'options' => array(
                    'true' => 'Yes',
                    'false' => 'No'
                )
				),
            ),
            'wpb_wps_style' => array(
				array(
                'name' => 'wpb_slider_type_gen_lat',
                'label' => __( 'General latest product Slider type', 'wedevs' ),
                'desc' => __( 'Your plugin support two different type style slider, tell the plugin which style You Need for latest product general slider.', 'wedevs' ),
                'type' => 'select',
                'default' => 'grid cs-style-3',
                'options' => array(
                      'grid cs-style-3' => 'Hover Animation',
					'grid_no_animation' => 'No Animation'
					)
				),
				array(
                'name' => 'wpb_slider_type_gen_fea',
                'label' => __( 'General feature product Slider type', 'wedevs' ),
                'desc' => __( 'Your plugin support two different type style slider, tell the plugin which style You Need for feature product general slider.', 'wedevs' ),
                'type' => 'select',
                'default' => 'grid cs-style-3',
                'options' => array(
                      'grid cs-style-3' => 'Hover Animation',
					'grid_no_animation' => 'No Animation'
					)
				),
				array(
                'name' => 'wpb_slider_type_sid_lat',
                'label' => __( 'Sidebar latest product Slider type', 'wedevs' ),
                'desc' => __( 'Your plugin support two different type style slider, tell the plugin which style You Need for latest product sidebar slider.', 'wedevs' ),
                'type' => 'select',
                'default' => 'grid cs-style-3',
                'options' => array(
                      'grid cs-style-3' => 'Hover Animation',
					'grid_no_animation' => 'No Animation'
					)
				),
				array(
                'name' => 'wpb_slider_type_sid_fea',
                'label' => __( 'Sidebar feature product Slider type', 'wedevs' ),
                'desc' => __( 'Your plugin support two different type style slider, tell the plugin which style You Need for feature product sidebar slider.', 'wedevs' ),
                'type' => 'select',
                'default' => 'grid cs-style-3',
                'options' => array(
                      'grid cs-style-3' => 'Hover Animation',
					'grid_no_animation' => 'No Animation'
					)
				),
				array(
                'name' => 'wpb_title_mx_ch',
                'label' => __( 'Product Title max character', 'wedevs' ),
                'desc' => __( 'Tell the plugin how many character you want to show in product title. For best result use 10. Default value 10.', 'wedevs' ),
                'type' => 'number',
                'default' => '10'
				),
				array(
                    'name' => 'wpb_pro_price_color_i',
                    'label' => __( 'Product price color (only for No animation style slider)', 'wedevs' ),
                    'desc' => __( 'Select a color for product price. Default #16A085', 'wedevs' ),
                    'type' => 'color',
                    'default' => '#16A085'
                ),
				array(
                    'name' => 'wpb_wps_btn_bg',
                    'label' => __( 'Button Background Color', 'wedevs' ),
                    'desc' => __( 'Select a color for your buttons background color. Default #1abc9c', 'wedevs' ),
                    'type' => 'color',
                    'default' => '#1abc9c'
                ),
				array(
                    'name' => 'wpb_wps_btn_bg_hover',
                    'label' => __( 'Button Background Hover Color', 'wedevs' ),
                    'desc' => __( 'Select a color for your buttons background hover color. Default #16a085', 'wedevs' ),
                    'type' => 'color',
                    'default' => '#16a085'
                ),
				array(
                    'name' => 'wpb_pagi_btn_bg',
                    'label' => __( 'Pagination Button Background Color', 'wedevs' ),
                    'desc' => __( 'Select a color for your pagination buttons background color. Default #8BCFC2', 'wedevs' ),
                    'type' => 'color',
                    'default' => '#8BCFC2'
                ),
				array(
                    'name' => 'wpb_pagi_btn_bg_ac',
                    'label' => __( 'Pagination Button Background Hover & active Color', 'wedevs' ),
                    'desc' => __( 'Select a color for your pagination buttons background hover & active color. Default #16A085', 'wedevs' ),
                    'type' => 'color',
                    'default' => '#16A085'
                ),
				array(
                    'name' => 'wpb_nav_btn_bg',
                    'label' => __( 'Navigation Button Background Color', 'wedevs' ),
                    'desc' => __( 'Select a color for your navigation buttons background color. Default #CCCCCC', 'wedevs' ),
                    'type' => 'color',
                    'default' => '#CCCCCC'
                ),
				array(
                    'name' => 'wpb_nav_btn_bg_ac',
                    'label' => __( 'Navigation Button Background Hover & active Color', 'wedevs' ),
                    'desc' => __( 'Select a color for your navigation buttons background hover & active color. Default #999999', 'wedevs' ),
                    'type' => 'color',
                    'default' => '#999999'
                ),
            )
        );
		return $settings_fields;
    }
	
	// warping the settings
    function wpb_plugin_page() {
        echo '<div class="wrap">';
			$this->settings_api->show_navigation();
			$this->settings_api->show_forms();
		echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }
        return $pages_options;
    }
}
endif;

$settings = new WPB_wps_main_Settings_API();