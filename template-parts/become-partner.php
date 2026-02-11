<?php
/**
 * Template part: Become Partner section
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$img_dir = get_template_directory_uri() . '/assets/images/';

$partner_label       = gyde_get_field( 'partner_label', 'Become a Gyde Partner' );
$partner_heading     = gyde_get_field( 'partner_heading', "Hosting Agency? It's a Buy In, Not a Buyout" );
$partner_description = gyde_get_field( 'partner_description', "Growing alone is hard. Join the Gyde network and get the AI tools, support, and community you need to scale—without giving up control of your business." );
$partner_image       = gyde_get_field( 'partner_image' );
$partner_link        = gyde_get_field( 'partner_link', '#' );
$partner_link_text   = gyde_get_field( 'partner_link_text', 'Learn more' );

$partner_image_url = is_array( $partner_image ) ? ( $partner_image['url'] ?? '' ) : ( $partner_image ?: '' );
if ( ! $partner_image_url ) {
	$partner_image_url = $img_dir . 'Stocksy_unlicensed_comp_watermarked_6479335-3.png';
}
?>
<section class="become-partner-section">
	<div class="become-partner-section__inner">
		<div class="become-partner-section__card">
			<p class="become-partner-section__label"><?php echo esc_html( $partner_label ); ?></p>
			<h2 class="become-partner-section__heading"><?php echo esc_html( $partner_heading ); ?></h2>
			<p class="become-partner-section__description"><?php echo esc_html( $partner_description ); ?></p>
			<a href="<?php echo esc_url( $partner_link ); ?>" class="become-partner-section__link"><?php echo esc_html( $partner_link_text ); ?></a>
		</div>
		<div class="become-partner-section__image-wrap">
			<img src="<?php echo esc_url( $partner_image_url ); ?>" alt="<?php echo esc_attr( $partner_heading ); ?>" class="become-partner-section__image">
		</div>
	</div>
</section>
