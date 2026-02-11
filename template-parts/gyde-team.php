<?php
/**
 * Template part: Gyde Team section
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$img_dir = get_template_directory_uri() . '/assets/images/';

$team_label             = gyde_get_field( 'team_label', 'The Gyde Team' );
$team_heading           = gyde_get_field( 'team_heading', 'We know insurance and AI—inside and out.' );
$team_description       = gyde_get_field( 'team_description', 'Our growing team includes market leading talent from top insurance, technology, and brokerage firms.' );
$team_image             = gyde_get_field( 'team_image' );
$team_right_heading     = gyde_get_field( 'team_right_heading', 'You need more than just capital or tech to grow your insurance business.' );
$team_right_description = gyde_get_field( 'team_right_description', 'We are experienced insurance, healthcare and technology experts with a track record that includes—' );
$team_link_text         = gyde_get_field( 'team_link_text', 'Explore open positions' );
$team_link_url          = gyde_get_field( 'team_link_url', '#' );

// Image URL
$team_image_url = is_array( $team_image ) ? ( $team_image['url'] ?? '' ) : ( $team_image ?: '' );
if ( ! $team_image_url ) {
	$team_image_url = $img_dir . 'raw-Frame-53-0.png';
}

// Bullet points from ACF repeater or defaults
$team_right_list = gyde_get_field( 'team_right_list', array() );
if ( empty( $team_right_list ) ) {
	$team_right_list = array(
		array( 'text' => 'Building broker distribution at scale' ),
		array( 'text' => 'Structuring partnerships with carriers and FMOs' ),
		array( 'text' => 'Advising growth strategy and operational excellence' ),
		array( 'text' => 'Designing, developing, and deploying new systems and platforms' ),
	);
}
?>
<section class="gyde-team-section">
	<div class="gyde-team-section__inner">
		<div class="gyde-team-section__header">
			<div class="gyde-team-section__header-text">
				<p class="gyde-team-section__label"><?php echo esc_html( $team_label ); ?></p>
				<h2 class="gyde-team-section__heading"><?php echo esc_html( $team_heading ); ?></h2>
			</div>
		</div>

		<div class="gyde-team-section__divider"></div>

		<div class="gyde-team-section__grid">
			<!-- Left: Image with overlay text -->
			<div class="gyde-team-section__left">
				<div class="gyde-team-section__image-wrap">
					<img src="<?php echo esc_url( $team_image_url ); ?>" alt="The Gyde Team" class="gyde-team-section__image">
					<div class="gyde-team-section__image-overlay">
						<p class="gyde-team-section__description"><?php echo esc_html( $team_description ); ?></p>
						<a href="<?php echo esc_url( $team_link_url ); ?>" class="gyde-team-section__link">
							<?php echo esc_html( $team_link_text ); ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M7 7h10v10"/></svg>
						</a>
					</div>
				</div>
			</div>

			<!-- Right: Red panel with content -->
			<div class="gyde-team-section__right">
				<div class="gyde-team-section__right-circle"></div>
				<div class="gyde-team-section__right-content">
					<h3 class="gyde-team-section__right-heading"><?php echo esc_html( $team_right_heading ); ?></h3>
					<p class="gyde-team-section__right-description"><?php echo esc_html( $team_right_description ); ?></p>
					<?php if ( ! empty( $team_right_list ) ) : ?>
						<ul class="gyde-team-section__right-list">
							<?php foreach ( $team_right_list as $item ) :
								$text = is_array( $item ) ? ( $item['text'] ?? '' ) : (string) $item;
								if ( $text ) :
							?>
								<li><?php echo esc_html( $text ); ?></li>
							<?php endif; endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
