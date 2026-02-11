<?php
/**
 * Theme header
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$logo_url = get_template_directory_uri() . '/assets/images/logo-on-light.svg';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
	<div class="site-header__inner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__logo" rel="home">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="130" height="44">
			<?php endif; ?>
		</a>

		<nav class="site-header__nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'gyde-health' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'site-header__nav-list',
					'container'      => false,
				) );
			} else {
				?>
				<ul class="site-header__nav-list">
					<li><a href="<?php echo esc_url( home_url( '/#why-gyde' ) ); ?>"><?php esc_html_e( 'Why Gyde', 'gyde-health' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#partners' ) ); ?>"><?php esc_html_e( 'Partners', 'gyde-health' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#solution' ) ); ?>"><?php esc_html_e( 'Solution', 'gyde-health' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#about' ) ); ?>"><?php esc_html_e( 'About', 'gyde-health' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#careers' ) ); ?>"><?php esc_html_e( 'Careers', 'gyde-health' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#resources' ) ); ?>"><?php esc_html_e( 'Resources', 'gyde-health' ); ?></a></li>
				</ul>
				<?php
			}
			?>
			<button class="site-header__menu-toggle" aria-label="<?php esc_attr_e( 'Toggle menu', 'gyde-health' ); ?>">
				<span class="site-header__menu-icon"></span>
			</button>
		</nav>

		<div class="site-header__cta">
			<a href="<?php echo esc_url( gyde_get_field( 'header_contact_link', home_url( '/contact' ), 'option' ) ); ?>" class="site-header__cta-button"><?php esc_html_e( 'Contact', 'gyde-health' ); ?></a>
		</div>
	</div>
</header>
