<?php
/**
 * Main plugin class for CreedAlly ACF Blocks.
 *
 * This file contains the class that registers all ACF JSON-based blocks
 * and adds a custom block category in the editor.
 *
 * @package    CreedAlly\CA_ACF_Blocks
 * @since      1.0.0
 */

if ( ! class_exists( 'CA_ACF_Blocks' ) ) {

	/**
	 * Main plugin class for CreedAlly ACF Blocks.
	 *
	 * Handles ACF block registration and block category.
	 *
	 * @since 1.0.0
	 */
	final class CA_ACF_Blocks {

		/**
		 * Constructor. Hook into ACF and block category filters.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			add_filter( 'block_categories_all', array( $this, 'blocks_categories' ) );
			add_action( 'acf/init', array( $this, 'register_blocks' ) );
		}

		/**
		 * Add a custom block category for CreedAlly ACF Blocks.
		 *
		 * @since 1.0.0
		 *
		 * @param array $categories Existing block categories.
		 * @return array Modified block categories.
		 */
		public function blocks_categories( $categories ) {

			return array_merge(
				$categories,
				array(
					array(
						'slug'  => 'ca-acf-blocks',
						'title' => __( 'CreedAlly Blocks', 'ca-acf-blocks' ),
					),
				)
			);
		}

		/**
		 * Register all ACF blocks located in the blocks directory.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function register_blocks() {

			if ( file_exists( CA_ACF_BLOCKS_DIR ) && function_exists( 'acf_register_block_type' ) ) {

				$block_json_files = glob( CA_ACF_BLOCKS_DIR . '*/block.json' );

				if ( ! empty( $block_json_files ) ) {

					foreach ( $block_json_files as $block_json_file ) {

						$block_folder = dirname( $block_json_file );

						$block_data = json_decode( file_get_contents( $block_json_file ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

						if ( ! empty( $block_data ) && is_array( $block_data ) && isset( $block_data['name'], $block_data['title'] ) ) {

							$block_folder = dirname( $block_json_file );

							$block_data['render_template'] = $block_folder . '/template.php';
							$block_data['enqueue_style']   = CA_ACF_BLOCKS_URL . '/assets/build/style.min.css';

							acf_register_block_type( $block_data );
						}
					}
				}
			}
		}
	}
}
