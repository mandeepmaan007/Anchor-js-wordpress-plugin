<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.upwork.com/freelancers/~01598dc6019a788cd6
 * @since             1.0.0
 * @package           Anchor_Js_Wordpress_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Anchor JS Wordpress Plugin
 * Plugin URI:        http://www.jobdeoz.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Mandeep Singh Maan
 * Author URI:        https://www.upwork.com/freelancers/~01598dc6019a788cd6
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       anchor-js-wordpress-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// plugin base name
define( 'STA_BASE', plugin_basename( __FILE__ ) );

/**
 * Init the plugin
 */
function sta_init() {
	require_once( dirname( __FILE__ ) . '/includes/sta-enqueue-js.php' );
	require_once( dirname( __FILE__ ) . '/includes/sta-shortcode.php' );
	if ( is_admin() ) {
		require_once( dirname( __FILE__ ) . '/settings/sta-settings.php' );
		require_once( dirname( __FILE__ ) . '/admin/sta-tinymce-button.php' );
	};

	load_plugin_textdomain( 'scroll-to-anchor', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'sta_init' );

/**
 * Add option with intial values
 */
if ( ! function_exists( 'sta_initial_options' ) ) {
	function sta_initial_options() {
		//check if option is already present
		if ( ! get_option( 'scroll_to_anchor' ) ) {
			//not present, so add
			$op = array(
				'speed'    => 5000,
				'distance' => 50,
				'label'    => 'Anchor',
			);
			add_option( 'scroll_to_anchor', $op );
		}
	}
}
register_activation_hook( __FILE__, 'sta_initial_options' );

function my_styles_method() {
	wp_enqueue_style(
		'custom-style',
		'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'
	);
        $color = get_theme_mod( 'my-custom-color' ); //E.g. #FF0000
        $custom_css = "
               .sta-anchor:hover .helli {
	color: #000;
	display: inline-block;

}

h2:hover a.helli i {
color: #dd3333 !important;
}

a.helli:hover {
    border-bottom: dotted #dd3333 5px;
    color:#dd3333;
}

.helli {
    width: 31px;
    height: 30px;
    padding: 0px !important;
    margin-left: 10px;
    color: #ccc;
    box-shadow: unset !important;

}

.fa.fa-link {
    transform: rotate(-90deg) !important;
    color: #ccc;
}

.sta-anchor {

}
               
               ";
        wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'my_styles_method' );
