<?php
/**
 * Main plugin file.
 * Use Jetpack with proper German translations. Approved for client usage.
 * Jetpack endlich in vernünftigem Deutsch. Kliententauglich.
 *
 * @package   Jetpack German (de_DE)
 * @author    David Decker
 * @link      http://deckerweb.de/twitter
 * @copyright Copyright (c) 2012-2013, David Decker - DECKERWEB
 *
 * Plugin Name: Jetpack German (de_DE)
 * Plugin URI: http://genesisthemes.de/en/wp-plugins/jetpack-de/
 * Description: Use Jetpack with proper German translations. Approved for client usage. Jetpack endlich in vernünftigem Deutsch. Kliententauglich.
 * Version: 1.5.1
 * Author: David Decker - DECKERWEB
 * Author URI: http://deckerweb.de/
 * License: GPL-2.0+
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 * Text Domain: jetpack-german
 * Domain Path: /languages/
 *
 * Copyright (c) 2012-2013 David Decker - DECKERWEB
 *
 *     This file is part of Jetpack German (de_DE),
 *     a plugin for WordPress.
 *
 *     Jetpack German (de_DE) is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 2 of the License, or (at your option)
 *     any later version.
 *
 *     Jetpack German (de_DE) is distributed in the hope that
 *     it will be useful, but WITHOUT ANY WARRANTY; without even the
 *     implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *     PURPOSE. See the GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with WordPress. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Exit if accessed directly
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Setting constants.
 *
 * @since 1.0.0
 */
/** Set constant for the plugin directory */
define( 'JPDE_PLUGIN_DIR', dirname( __FILE__ ) );

/** Set constant path to the Plugin basename (folder) */
define( 'JPDE_PLUGIN_BASEDIR', dirname( plugin_basename( __FILE__ ) ) );

/** Set constant path to the Plugin URI */
define( 'JPDE_PLUGIN_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );


add_action( 'init', 'ddw_jpde_init' );
/**
 * Load the text domain for translation of the plugin.
 * Load admin helper functions - only within 'wp-admin'.
 * 
 * @since 1.0.0
 *
 * @uses  load_plugin_textdomain()
 * @uses  is_admin()
 * @uses  current_user_can()
 */
function ddw_jpde_init() {

	/** Set filter for plugin's languages directory */
	$jpde_lang_dir = JPDE_PLUGIN_BASEDIR . '/jpde-languages/';
	$jpde_lang_dir = apply_filters( 'jpde_filter_lang_dir', $jpde_lang_dir );

	/** If 'wp-admin' include translations plus admin helper functions */
	if ( is_admin() ) {

		/** Load plugin textdomain plus translation files */
		load_plugin_textdomain( 'jetpack-german', false, $jpde_lang_dir );

		require_once( JPDE_PLUGIN_DIR . '/includes/jpde-admin.php' );

	}  // end-if is_admin() check

	/** Add "Settings Page" link to plugin page - only within 'wp-admin' */
	if ( is_admin() && current_user_can( 'manage_options' ) ) {

		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ) , 'ddw_jpde_settings_page_link' );

	}  // end-if is_admin() & cap check

}  // end of function ddw_jpde_init


add_action( 'plugins_loaded', 'ddw_jpde_load_textdomain' );
/**
 * Load the German Jetpack translations by DECKERWEB.
 *
 * @since  1.0.0
 *
 * @uses   get_locale()
 * @uses   load_textdomain()
 *
 * @param  $mofile
 *
 * @return string Strings from .mo file for loading & displaying translations.
 */
function ddw_jpde_load_textdomain() {

	/** Check for formal version */
	if ( is_readable( WP_LANG_DIR . '/jetpack-de/formal/jetpack-de_DE.mo' ) ) {

		$mofile = WP_LANG_DIR . '/jetpack-de/formal/' . apply_filters( 'jpde_jetpack_formal_locale', 'jetpack-' . get_locale() ) . '.mo';

	}

	/** Then check for custom version */
	elseif ( is_readable( WP_LANG_DIR . '/jetpack-de/custom/jetpack-de_DE.mo' ) ) {

		$mofile = WP_LANG_DIR . '/jetpack-de/custom/' . apply_filters( 'jpde_jetpack_custom_locale', 'jetpack-' . get_locale() ) . '.mo';

	}

	/** Otherwise load plugin default */
	else {

		$mofile = WP_PLUGIN_DIR . '/jetpack-de/jp-pomo/' . apply_filters( 'jpde_jetpack_plugin_locale', 'jetpack-' . get_locale() ) . '.mo';

	}  // end-if file checks

	/** Finally, load the translations */
	if ( file_exists( $mofile ) ) {

		return load_textdomain( 'jetpack', $mofile );

	}  // end-if $mofile check

}  // end of function ddw_jpde_load_textdomain


add_filter( 'load_textdomain_mofile', 'ddw_jpde_load_textdomain_file', 10, 2 );
/**
 * Additional filter 'load_textdomain_mofile' to enforce the loading of the
 *    German Jetpack translations by DECKERWEB.
 *
 * @since  1.4.2
 *
 * @uses   get_locale()
 * @uses   load_textdomain()
 *
 * @param  $moFile
 * @param  $domain
 * @param  $_is_jetpack_domain
 * @param  $_is_jetpack
 *
 * @return string Strings from .mo file for loading & displaying translations.
 */
function ddw_jpde_load_textdomain_file( $moFile, $domain ) {

	/** Set textdomain for filter to 'jetpack' */
	$_is_jetpack_domain = ( $domain == 'jetpack' );

	/** Load stuff only for Jetpack textdomain */
	if ( $_is_jetpack_domain ) {

		$_is_jetpack = strpos( $moFile, '/jetpack/' ) !== false;

		/** Only if Jetpack is active */
		if ( $_is_jetpack ) {

			/** Check for formal version */
			if ( is_readable( WP_LANG_DIR . '/jetpack-de/formal/jetpack-de_DE.mo' ) ) {

				$moFile = WP_LANG_DIR . '/jetpack-de/formal/' . apply_filters( 'jpde_jetpack_formal_locale', 'jetpack-' . get_locale() ) . '.mo';

			}

			/** Then check for custom version */
			elseif ( is_readable( WP_LANG_DIR . '/jetpack-de/custom/jetpack-de_DE.mo' ) ) {

				$moFile = WP_LANG_DIR . '/jetpack-de/custom/' . apply_filters( 'jpde_jetpack_custom_locale', 'jetpack-' . get_locale() ) . '.mo';

			}

			/** Otherwise load plugin default */
			else {

				$moFile = WP_PLUGIN_DIR . '/jetpack-de/jp-pomo/' . apply_filters( 'jpde_jetpack_plugin_locale', 'jetpack-' . get_locale() ) . '.mo';

			}  // end-if file checks

		}  // end-if Jetpack check

	}  // end-if textdomain check


	/** Finally, load the translations */
	if ( file_exists( $moFile ) ) {

		return $moFile;

	}  // end-if $moFile check

}  // end of function ddw_jpde_load_textdomain_file


add_action( 'plugins_loaded', 'ddw_jpde_load_textdomain_fixes' );
/**
 * To fix textdomain errors in Jetpack, load additional German Jetpack
 *    translations by DECKERWEB.
 *
 * @since 1.4.0
 *
 * @uses  get_locale()
 * @uses  load_textdomain()
 *
 * @param $mofile_shareto
 * @param $mofile_nextsaturday
 * @param $mofile_minileven
 * @param $mofile_default
 */
function ddw_jpde_load_textdomain_fixes() {

	/** Textdomain: 'share to' */
	$mofile_shareto = WP_PLUGIN_DIR . '/jetpack-de/jp-pomo/fixes/share-to-' . get_locale() . '.mo';

	if ( file_exists( $mofile_shareto ) ) {

		load_textdomain( 'share to', $mofile_shareto );

	}  // end-if $mofile_shareto check


	/** Textdomain: 'next-saturday' */
	$mofile_nextsaturday = WP_PLUGIN_DIR . '/jetpack-de/jp-pomo/fixes/next-saturday-' . get_locale() . '.mo';

	if ( file_exists( $mofile_nextsaturday ) ) {

		load_textdomain( 'next-saturday', $mofile_nextsaturday );

	}  // end-if $mofile_nextsaturday check


	/** Textdomain: 'minileven' */
	$mofile_minileven = WP_PLUGIN_DIR . '/jetpack-de/jp-pomo/fixes/minileven-' . get_locale() . '.mo';

	if ( file_exists( $mofile_minileven ) ) {

		load_textdomain( 'minileven', $mofile_minileven );

	}  // end-if $mofile_minileven check


	/** Textdomain: 'default' (none) */
	$mofile_default = WP_PLUGIN_DIR . '/jetpack-de/jp-pomo/fixes/default-' . get_locale() . '.mo';

	if ( file_exists( $mofile_default ) ) {

		load_textdomain( 'default', $mofile_default );

	}  // end-if $mofile_default check

}  // end of function ddw_jpde_load_textdomain_fixes


/**
 * Returns current plugin's header data in a flexible way.
 *
 * @since  1.0.0
 *
 * @uses   get_plugins()
 *
 * @param  $jpde_plugin_value
 * @param  $jpde_plugin_folder
 * @param  $jpde_plugin_file
 *
 * @return string Plugin data.
 */
function ddw_jpde_plugin_get_data( $jpde_plugin_value ) {

	/** Bail early if we are not in wp-admin */
	if ( ! is_admin() ) {
		return;
	}

	/** Include WordPress plugin data */
	if ( ! function_exists( 'get_plugins' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	$jpde_plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$jpde_plugin_file = basename( ( __FILE__ ) );

	return $jpde_plugin_folder[ $jpde_plugin_file ][ $jpde_plugin_value ];

}  // end of function ddw_jpde_plugin_get_data