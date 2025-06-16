/**
 * Tailwind CSS Configuration File
 *
 * This file configures Tailwind CSS to scan PHP and JSON files inside the plugin's blocks directory,
 * extend default theme settings with custom fonts and colors, and apply project-specific styling.
 *
 * @see https://tailwindcss.com/docs/configuration
 * @package CreedAlly_ACF_Blocks
 */

module.exports = {
	content: [
	'./blocks/**/*.{php,json}',
	'./*.php'
	],
	theme: {
		extend: {
			fontFamily: {
				hyperjump: ['Hyperjump', 'sans-serif'],
			},
			colors:{
				'F79899': '#F79899',
				'284F89': '#284F89',
				'000000': '#000000',
				'FFFFFF': '#FFFFFF',
				'FCD114': '#FCD114',
			}
		},
	},
	plugins: [],
}