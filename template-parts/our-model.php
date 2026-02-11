<?php
/**
 * Template part: Our Model section
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$model_label       = gyde_get_field( 'model_label', 'Our Model' );
$model_description = gyde_get_field( 'model_description', "We built Gyde AI to change that. Our broker-controlled AI assistants automate the busy work so you can focus on what matters—serving clients and growing your business." );
?>
<section class="our-model-section">
	<div class="our-model-section__inner">
		<p class="our-model-section__label"><?php echo esc_html( $model_label ); ?></p>
		<div class="our-model-section__headings">
			<h2 class="our-model-section__heading-left"><?php gyde_the_field_html( 'model_heading', 'Today, <mark>growth</mark> brings operational burdens that put service and scale at odds.' ); ?></h2>
			<p class="our-model-section__heading-right"><?php echo esc_html( $model_description ); ?></p>
		</div>
	</div>
</section>
