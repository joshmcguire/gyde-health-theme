<?php
/**
 * Template part for displaying posts
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry__header">
		<?php the_title( '<h2 class="entry__title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
		<div class="entry__meta">
			<span class="entry__date"><?php echo esc_html( get_the_date() ); ?></span>
		</div>
	</header>
	<div class="entry__content">
		<?php the_excerpt(); ?>
	</div>
</article>
