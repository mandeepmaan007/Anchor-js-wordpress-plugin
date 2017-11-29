<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.upwork.com/freelancers/~01598dc6019a788cd6
 * @since      1.0.0
 *
 * @package    Anchor_Js_Wordpress_Plugin
 * @subpackage Anchor_Js_Wordpress_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Anchor_Js_Wordpress_Plugin
 * @subpackage Anchor_Js_Wordpress_Plugin/includes
 * @author     Mandeep <Mandeep Singh Mann>
 */
class Anchor_Js_Wordpress_Plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'anchor-js-wordpress-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
