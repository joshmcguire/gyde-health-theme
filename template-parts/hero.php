<?php
/**
 * Template part: Hero section
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_heading     = gyde_get_field( 'hero_heading', "We're building the first AI native brokerage that delivers insurance, wealth, and health solutions at <em>infinite</em> scale." );
$hero_button_text = gyde_get_field( 'hero_button_text', 'Become a Partner' );
$hero_button_link = gyde_get_field( 'hero_button_link', '#' );
?>
<section class="hero-section">
	<div class="hero-section__inner">
		<h1 class="hero-section__heading"><?php gyde_the_field_html( 'hero_heading', "We're building the first AI native brokerage that delivers insurance, wealth, and health solutions at <em>infinite</em> scale." ); ?></h1>
		<a href="<?php echo esc_url( $hero_button_link ); ?>" class="hero-section__cta"><?php echo esc_html( $hero_button_text ); ?></a>
	</div>
</section>
