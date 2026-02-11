<?php
/**
 * Template part: Our Belief section
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$belief_label = gyde_get_field( 'belief_label', 'Our Belief' );
?>
<section class="our-belief-section">
	<div class="our-belief-section__inner">
		<p class="our-belief-section__label"><?php echo esc_html( $belief_label ); ?></p>
		<h2 class="our-belief-section__heading"><?php gyde_the_field_html( 'belief_heading', 'Brokers should be <mark>master lifetime guides</mark>, helping people make great coverage decisions, grow their wealth, and navigate healthcare with ease.' ); ?></h2>
	</div>
</section>
