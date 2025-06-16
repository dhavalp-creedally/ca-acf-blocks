<?php
/**
 * Section block template for ACF block: Image with Content.
 *
 * @package CreedAlly\CA_ACF_Blocks
 * @author  CreedAlly
 * @since   1.0.0
 */

$section_one              = get_field( 'section_one' );
$section_two              = get_field( 'section_two' );
$section_background_image = get_field( 'section_background_image' );

$attributes = array();
if ( $section_background_image ) {
	$attributes['class'] = 'section-image-with-content';
	$attributes['style'] = '--section-bg: url(' . esc_url( $section_background_image ) . ');';
}

?>
<section <?php echo get_block_wrapper_attributes($attributes); // phpcs:ignore ?>>
	<div class="flex flex-col md:flex-row gap-10 md:gap-20 mb-12 bg-white">
		<div class="w-full md:w-[60%] p-0 md:p-6">
			<?php if ( ! empty( $section_one['title'] ) ) : ?>
				<h2 class="text-[28px] md:text-[36px] lg:text-[48px] text-[#284F89] font-hyperjump font-extrabold mb-4">
					<?php echo esc_html( $section_one['title'] ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( ! empty( $section_one['description'] ) ) : ?>
				<p class="text-[18px] md:text-[20px] lg:text-[24px] text-black font-hyperjump font-bold leading-[1.15] mb-4">
					<?php echo esc_html( $section_one['description'] ); ?>
				</p>
			<?php endif; ?>

			<div class="description mb-4">
				<?php if ( ! empty( $section_one['content'] ) ) : ?>
					<?php echo wp_kses_post( $section_one['content'] ); ?>
				<?php endif; ?>
			</div>

			<?php if ( ! empty( $section_one['button_label'] ) ) : ?>
				<a 
					class="bg-[#F79899] text-black font-extrabold py-2 px-5 rounded-full text-[16px] inline-block no-underline"
					href="<?php echo ! empty( $section_one['button_link']['url'] ) ? esc_url( $section_one['button_link']['url'] ) : '#'; ?>"
					target="<?php echo ! empty( $section_one['button_link']['target'] ) ? esc_attr( $section_one['button_link']['target'] ) : '_self'; ?>"
				>
					<?php echo esc_html( $section_one['button_label'] ); ?>
				</a>
			<?php endif; ?>
		</div>

		<div class="w-full md:w-[40%] pt-0 md:pt-6">
			<?php if ( ! empty( $section_one['image']['url'] ) ) : ?>
				<img class="w-full h-auto" src="<?php echo esc_url( $section_one['image']['url'] ); ?>" alt="<?php echo esc_attr( $section_one['image']['alt'] ); ?>" />
			<?php endif; ?>
		</div>
	</div>

	<div class="flex flex-col md:flex-row gap-10 items-start xl:items-end">
		<div class="w-full md:w-1/3">
			<?php if ( ! empty( $section_two['image']['url'] ) ) : ?>
				<img class="w-full h-auto max-w-sm mx-auto" src="<?php echo esc_url( $section_two['image']['url'] ); ?>" alt="<?php echo esc_attr( $section_two['image']['alt'] ); ?>" />
			<?php endif; ?>
		</div>

		<div class="w-full md:w-2/3">
			<div class="card description pt-8 md:pt-12 pb-8 xl:pb-0 px-6 md:px-8 rounded-2xl bg-cover bg-no-repeat mb-4 bg-no-repeat bg-cover xl:[background-size:100%] [background-position:top_center]"
				style="<?php echo ! empty( $section_two['background_image'] ) ? 'background-image: url(' . esc_url( $section_two['background_image'] ) . ');' : ''; ?>">

				<?php if ( ! empty( $section_two['title'] ) ) : ?>
					<h3 class="text-[24px] sm:text-[28px] md:text-[36px] lg:text-[48px] text-black font-extrabold font-hyperjump mb-2 leading-snug">
						<?php echo esc_html( $section_two['title'] ); ?>
					</h3>
				<?php endif; ?>

				<?php if ( ! empty( $section_two['description'] ) ) : ?>
					<div class="text-[16px] sm:text-[17px] md:text-[18px] text-black leading-relaxed mb-6">
						<?php echo wp_kses_post( $section_two['description'] ); ?>
					</div>
				<?php endif; ?>

				<div class="card-sub bg-[#F79899] rounded-2xl p-4 md:p-6 md:w-[85%] mx-auto">
					<?php if ( ! empty( $section_two['sub_title'] ) ) : ?>
						<h4 class="text-[18px] md:text-[20px] lg:text-[24px] text-black font-extrabold font-hyperjump mb-1 leading-snug">
							<?php echo esc_html( $section_two['sub_title'] ); ?>
						</h4>
					<?php endif; ?>

					<?php if ( ! empty( $section_two['sub_description'] ) ) : ?>
						<div class="text-[15px] sm:text-[16px] md:text-[18px] text-black leading-relaxed">
							<?php echo wp_kses_post( $section_two['sub_description'] ); ?>
						</div>
					<?php endif; ?>
				</div>

			</div>
		</div>

	</div>
</section>
