<?php
/**
 * Template part: Contact / Get In Touch section
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$img_dir             = get_template_directory_uri() . '/assets/images/';
$contact_heading     = gyde_get_field( 'contact_heading', 'Get in touch' );
$contact_description = gyde_get_field( 'contact_description', 'Book a consultation to learn why elite brokers are moving their business to Gyde' );
$contact_button_text = gyde_get_field( 'contact_button_text', 'Contact Us' );
$contact_button_link = gyde_get_field( 'contact_button_link', '#' );
$contact_bg          = gyde_get_field( 'contact_background_image' );
$contact_bg_url      = is_array( $contact_bg ) ? ( $contact_bg['url'] ?? '' ) : ( $contact_bg ?: '' );

if ( ! $contact_bg_url ) {
	$contact_bg_url = $img_dir . 'raw-Image-10.png';
}
?>
<section class="contact-section">
	<div class="contact-section__bg">
		<img src="<?php echo esc_url( $contact_bg_url ); ?>" alt="" class="contact-section__bg-image">
	</div>
	<div class="contact-section__overlay">
		<div class="contact-section__container">
			<div class="contact-section__inner">
				<h2 class="contact-section__heading"><?php gyde_the_field_html( 'contact_heading', 'Get <em>in</em> touch' ); ?></h2>
				<div class="contact-section__right">
					<p class="contact-section__description"><?php echo esc_html( $contact_description ); ?></p>
					<a href="<?php echo esc_url( $contact_button_link ); ?>" class="contact-section__cta"><?php echo esc_html( $contact_button_text ); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
