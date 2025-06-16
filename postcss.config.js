/**
 * PostCSS Configuration File
 *
 * This config sets up PostCSS with Tailwind CSS, autoprefixer, and postcss-import.
 *
 * @see https://tailwindcss.com/docs/using-with-preprocessors#post-css
 * @package CreedAlly_ACF_Blocks
 */

module.exports = {
	plugins: {
		'postcss-import': {},
		tailwindcss: {},
		autoprefixer: {},
	}
}