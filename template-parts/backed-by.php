<?php
/**
 * Template part: Backed By section
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$img_dir         = get_template_directory_uri() . '/assets/images/';
$backed_by_label = gyde_get_field( 'backed_by_label', 'Backed By' );
$backed_by_logos = gyde_get_field( 'backed_by_logos', array() );

// Fallback logos using exported images
if ( empty( $backed_by_logos ) ) {
	$backed_by_logos = array(
		array( 'logo_name' => 'Crystal Venture Partners', 'logo_image' => array( 'url' => $img_dir . 'backed-Frame-9.png' ) ),
		array( 'logo_name' => 'Lightspeed',               'logo_image' => array( 'url' => $img_dir . 'backed-Frame-8.png' ) ),
		array( 'logo_name' => 'virtue.',                   'logo_image' => array( 'url' => $img_dir . 'backed-Frame-7.png' ) ),
	);
}
?>
<section class="backed-by-section">
	<div class="backed-by-section__inner">
		<p class="backed-by-section__label"><?php echo esc_html( $backed_by_label ); ?></p>
		<div class="backed-by-section__logos">
			<?php foreach ( $backed_by_logos as $logo ) :
				$logo_img  = is_array( $logo ) ? ( $logo['logo_image'] ?? null ) : null;
				$logo_name = is_array( $logo ) ? ( $logo['logo_name'] ?? '' ) : '';
				$logo_url  = is_array( $logo_img ) ? ( $logo_img['url'] ?? '' ) : ( $logo_img ?: '' );
			?>
				<div class="backed-by-section__logo">
					<?php if ( $logo_url ) : ?>
						<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $logo_name ); ?>" class="backed-by-section__logo-img">
					<?php else : ?>
						<div class="backed-by-section__logo-placeholder"><?php echo esc_html( $logo_name ); ?></div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
