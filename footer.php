<?php
/**
 * Theme footer
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$logo_url = get_template_directory_uri() . '/assets/images/logo-on-light.svg';
$footer_supporting_text = gyde_get_field( 'footer_supporting_text', "We're building the first AI-native health insurance brokerage that delivers insurance, wealth, and health solutions at infinite scale.", 'option' );
// Get footer links from ACF or use defaults
$acf_footer_links = gyde_get_field( 'footer_links', array(), 'option' );
if ( ! empty( $acf_footer_links ) ) {
	$footer_links = array();
	foreach ( $acf_footer_links as $link ) {
		$lbl = is_array( $link ) ? ( $link['label'] ?? '' ) : '';
		$url = is_array( $link ) ? ( $link['url'] ?? '#' ) : '#';
		if ( $lbl ) {
			$footer_links[ $lbl ] = $url;
		}
	}
} else {
	$footer_links = array(
		'Overview'  => '#overview',
		'Features'  => '#features',
		'Pricing'   => '#pricing',
		'Careers'   => '#careers',
		'Help'      => '#help',
		'Privacy'   => '#privacy',
	);
}
?>
<footer class="site-footer">
	<div class="site-footer__container">
		<div class="site-footer__main">
			<div class="site-footer__logo-section">
				<div class="site-footer__logo-block">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-footer__logo" rel="home">
						<?php if ( has_custom_logo() ) : ?>
							<?php the_custom_logo(); ?>
						<?php else : ?>
							<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="130" height="44">
						<?php endif; ?>
					</a>
					<p class="site-footer__description"><?php echo esc_html( $footer_supporting_text ); ?></p>
				</div>

				<div class="site-footer__links">
					<?php foreach ( $footer_links as $label => $url ) : ?>
						<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="site-footer__app-section">
				<h3 class="site-footer__app-heading"><?php esc_html_e( 'Get the app', 'gyde-health' ); ?></h3>
				<div class="site-footer__app-badges">
					<a href="#" class="site-footer__app-badge" aria-label="<?php esc_attr_e( 'Download on the App Store', 'gyde-health' ); ?>">
						<span style="display:flex;align-items:center;justify-content:center;width:100%;height:100%;font-size:11px;color:#fff;">App Store</span>
					</a>
					<a href="#" class="site-footer__app-badge" aria-label="<?php esc_attr_e( 'Get it on Google Play', 'gyde-health' ); ?>">
						<span style="display:flex;align-items:center;justify-content:center;width:100%;height:100%;font-size:11px;color:#fff;">Google Play</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="site-footer__bottom">
		<div class="site-footer__bottom-inner">
			<p class="site-footer__copyright"><?php echo esc_html( gyde_get_field( 'footer_copyright', '© 2025 Gyde. All rights reserved.', 'option' ) ); ?></p>
			<div class="site-footer__social">
				<a href="<?php echo esc_url( gyde_get_field( 'social_twitter', '#', 'option' ) ); ?>" aria-label="Twitter/X">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
				</a>
				<a href="<?php echo esc_url( gyde_get_field( 'social_linkedin', '#', 'option' ) ); ?>" aria-label="LinkedIn">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
				</a>
				<a href="<?php echo esc_url( gyde_get_field( 'social_facebook', '#', 'option' ) ); ?>" aria-label="Facebook">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
				</a>
				<a href="<?php echo esc_url( gyde_get_field( 'social_instagram', '#', 'option' ) ); ?>" aria-label="Instagram">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
				</a>
				<a href="<?php echo esc_url( gyde_get_field( 'social_youtube', '#', 'option' ) ); ?>" aria-label="YouTube">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
				</a>
				<a href="<?php echo esc_url( gyde_get_field( 'social_github', '#', 'option' ) ); ?>" aria-label="GitHub">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
				</a>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
