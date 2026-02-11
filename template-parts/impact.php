<?php
/**
 * Template part: Impact section
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$impact_label             = gyde_get_field( 'impact_label', 'Impact' );
$impact_heading           = gyde_get_field( 'impact_heading', 'Drive your insurance business forward' );
$impact_description_left  = gyde_get_field( 'impact_description_left', 'Gyde moves the metrics that matter for growth and client satisfaction.' );
$impact_description_right = gyde_get_field( 'impact_description_right', 'Together, modest improvements can stack to create outsized revenue gains.' );

$impact_stats = gyde_get_field( 'impact_stats', array() );
if ( empty( $impact_stats ) ) {
	$impact_stats = array(
		array( 'stat_label' => 'Better Retention', 'stat_value' => '20%' ),
		array( 'stat_label' => 'Less time/client',  'stat_value' => '20%' ),
		array( 'stat_label' => 'Higher LTV',        'stat_value' => '15%' ),
		array( 'stat_label' => 'revenue growth',    'stat_value' => '60%' ),
	);
}
?>
<section class="impact-section">
	<div class="impact-section__inner">
		<div class="impact-section__header">
			<div class="impact-section__head-row">
				<p class="impact-section__label"><?php echo esc_html( $impact_label ); ?></p>
			</div>
			<div class="impact-section__headings">
				<h2 class="impact-section__heading"><?php echo esc_html( $impact_heading ); ?></h2>
				<div class="impact-section__descriptions">
					<p class="impact-section__desc-text"><?php echo esc_html( $impact_description_left ); ?></p>
					<p class="impact-section__desc-text"><?php echo esc_html( $impact_description_right ); ?></p>
				</div>
			</div>
		</div>

		<div class="impact-section__stats">
			<?php foreach ( $impact_stats as $stat ) :
				$label = is_array( $stat ) ? ( $stat['stat_label'] ?? '' ) : '';
				$value = is_array( $stat ) ? ( $stat['stat_value'] ?? '' ) : '';
			?>
				<div class="impact-section__stat">
					<span class="impact-section__stat-label"><?php echo esc_html( $label ); ?></span>
					<span class="impact-section__stat-value"><?php echo esc_html( $value ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
