<?php
/**
 * Gyde Health Theme Functions
 *
 * @package Gyde_Health
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'GYDE_THEME_VERSION', '1.0.0' );
define( 'GYDE_THEME_DIR', get_template_directory() );
define( 'GYDE_THEME_URI', get_template_directory_uri() );

/**
 * Theme setup
 */
function gyde_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'gyde-health' ),
	) );
}
add_action( 'after_setup_theme', 'gyde_theme_setup' );

/**
 * Enqueue scripts and styles
 */
function gyde_enqueue_assets() {
	// Main stylesheet
	$main_css = GYDE_THEME_DIR . '/assets/css/main.css';
	$main_css_uri = GYDE_THEME_URI . '/assets/css/main.css';
	$main_css_version = file_exists( $main_css ) ? filemtime( $main_css ) : GYDE_THEME_VERSION;

	wp_enqueue_style(
		'gyde-main',
		$main_css_uri,
		array(),
		$main_css_version
	);

	// Google Fonts (Inter, Poppins)
	wp_enqueue_style(
		'gyde-google-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);

	// Custom fonts (Season Serif, Fellix) - add font files to assets/fonts/
	$season_serif = GYDE_THEME_URI . '/assets/fonts/SeasonSerif-Regular.woff2';
	$season_serif_italic = GYDE_THEME_URI . '/assets/fonts/SeasonSerif-Italic.woff2';
	if ( file_exists( GYDE_THEME_DIR . '/assets/fonts/SeasonSerif-Regular.woff2' ) ) {
		wp_add_inline_style( 'gyde-main', "
			@font-face {
				font-family: 'Season Serif';
				src: url('" . esc_url( $season_serif ) . "') format('woff2');
				font-weight: 400;
				font-style: normal;
			}
			@font-face {
				font-family: 'Season Serif';
				src: url('" . esc_url( $season_serif_italic ) . "') format('woff2');
				font-weight: 400;
				font-style: italic;
			}
		" );
	}

	// Main script
	$main_js = GYDE_THEME_DIR . '/assets/js/main.js';
	$main_js_uri = GYDE_THEME_URI . '/assets/js/main.js';
	$main_js_version = file_exists( $main_js ) ? filemtime( $main_js ) : GYDE_THEME_VERSION;

	wp_enqueue_script(
		'gyde-main',
		$main_js_uri,
		array( 'jquery' ),
		$main_js_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'gyde_enqueue_assets' );

/**
 * Include ACF fields if file exists
 */
$acf_fields_file = GYDE_THEME_DIR . '/inc/acf-fields.php';
if ( file_exists( $acf_fields_file ) ) {
	require_once $acf_fields_file;
}

/**
 * Force Classic Editor on the front page so ACF tabs display properly.
 * This disables Gutenberg only for the static front page.
 */
function gyde_disable_gutenberg_for_front_page( $use_block_editor, $post ) {
	if ( ! empty( $post->ID ) && (int) get_option( 'page_on_front' ) === (int) $post->ID ) {
		return false;
	}
	return $use_block_editor;
}
add_filter( 'use_block_editor_for_post', 'gyde_disable_gutenberg_for_front_page', 10, 2 );

/**
 * Show admin notice if ACF is not installed
 */
function gyde_acf_admin_notice() {
	if ( ! function_exists( 'get_field' ) ) {
		$install_url = admin_url( 'plugin-install.php?s=Advanced+Custom+Fields&tab=search&type=term' );
		echo '<div class="notice notice-warning is-dismissible">';
		echo '<p><strong>Gyde Health Theme:</strong> This theme requires the <a href="' . esc_url( $install_url ) . '">Advanced Custom Fields</a> plugin to enable the homepage editor. ';
		echo '<a href="' . esc_url( $install_url ) . '" class="button button-primary" style="margin-left:10px;">Install ACF Now</a></p>';
		echo '</div>';
	}
}
add_action( 'admin_notices', 'gyde_acf_admin_notice' );

/**
 * Register ACF Options page (if ACF is active)
 */
function gyde_register_acf_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( array(
			'page_title' => __( 'Gyde Theme Options', 'gyde-health' ),
			'menu_title' => __( 'Theme Options', 'gyde-health' ),
			'menu_slug'  => 'gyde-theme-options',
			'capability' => 'edit_posts',
			'redirect'   => false,
		) );
	}
}
add_action( 'acf/init', 'gyde_register_acf_options_page' );

/**
 * Helper function to get ACF field with fallback
 *
 * @param string $field   ACF field name.
 * @param mixed  $default Default value if field is empty or ACF inactive.
 * @param mixed  $post_id Optional post ID.
 * @return mixed Field value or default.
 */
function gyde_get_field( $field, $default = '', $post_id = null ) {
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $field, $post_id );
		return ( $value !== false && $value !== null && $value !== '' ) ? $value : $default;
	}
	return $default;
}

/**
 * Output an ACF field allowing safe HTML tags (em, mark, strong, a, br).
 * Use this for fields where the admin should be able to add formatting.
 *
 * @param string $field   ACF field name.
 * @param string $default Default value.
 * @param mixed  $post_id Optional post ID.
 */
function gyde_the_field_html( $field, $default = '', $post_id = null ) {
	$value = gyde_get_field( $field, $default, $post_id );
	echo wp_kses( $value, array(
		'em'     => array(),
		'i'      => array(),
		'mark'   => array(),
		'strong' => array(),
		'b'      => array(),
		'br'     => array(),
		'a'      => array( 'href' => array(), 'target' => array(), 'rel' => array() ),
		'span'   => array( 'class' => array(), 'style' => array() ),
	) );
}
