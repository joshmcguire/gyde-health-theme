<?php
/**
 * Template part for displaying a message when no posts exist
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="no-results">
	<header class="no-results__header">
		<h2 class="no-results__title"><?php esc_html_e( 'Nothing Found', 'gyde-health' ); ?></h2>
	</header>
	<div class="no-results__content">
		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'gyde-health' ); ?></p>
	</div>
</section>
