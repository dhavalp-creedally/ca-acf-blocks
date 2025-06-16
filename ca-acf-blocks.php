<?php
/**
 * Plugin Name: CreedAlly ACF Blocks
 * Description: Create custom blocks using Advanced Custom Fields (ACF) Pro.
 * Version: 1.0.0
 * Author: CreedAlly
 * Author URI: https://creedally.com/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: ca-acf-blocks
 * Domain Path: /languages
 *
 * @package CreedAlly_ACF_Blocks
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define plugin path constant.
 */
if ( ! defined( 'CA_ACF_BLOCKS_PATH' ) ) {
	define( 'CA_ACF_BLOCKS_PATH', plugin_dir_path( __FILE__ ) );
}

/**
 * Define plugin URL constant.
 */
if ( ! defined( 'CA_ACF_BLOCKS_URL' ) ) {
	define( 'CA_ACF_BLOCKS_URL', plugin_dir_url( __FILE__ ) );
}

/**
 * Define plugin block directory constant.
 */
if ( ! defined( 'CA_ACF_BLOCKS_DIR' ) ) {
	define( 'CA_ACF_BLOCKS_DIR', CA_ACF_BLOCKS_PATH . 'blocks/' );
}

/**
 * Check if ACF PRO is active, else show admin notice and deactivate plugin.
 */
add_action(
	'admin_init',
	function () {

		// Check if ACF PRO is active.
		if ( ! class_exists( 'acf_pro' ) ) {

			/**
			 * Display admin notice if ACF PRO is not active.
			 */
			add_action(
				'admin_notices',
				function () {
					?>
			<div class="notice notice-error is-dismissible">
				<p>
						<?php
						echo wp_kses_post(
							sprintf(
								// Translators: %s is a link to the Advanced Custom Fields PRO plugin website.
								__(
									'CreedAlly ACF Blocks requires the %s plugin to be installed and active.',
									'ca-acf-blocks'
								),
								'<a href="https://www.advancedcustomfields.com/pro/" target="_blank">Advanced Custom Fields PRO</a>'
							)
						);
						?>
				</p>
			</div>
					<?php
				}
			);

			// Deactivate this plugin.
			deactivate_plugins( plugin_basename( __FILE__ ) );
		}
	}
);

require_once CA_ACF_BLOCKS_PATH . 'inc/class-ca-acf-blocks.php';

/**
 * Load the plugin after all plugins are loaded.
 *
 * @since 1.0.0
 */
add_action(
	'plugins_loaded',
	function () {

		if ( class_exists( 'acf_pro' ) && class_exists( 'CA_ACF_Blocks' ) ) {
			new CA_ACF_Blocks();
		}
	}
);
