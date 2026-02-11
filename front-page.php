<?php
/**
 * Front Page Template
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main class="site-main">
	<?php if ( gyde_get_field( 'hero_enable', true ) ) : ?>
		<?php get_template_part( 'template-parts/hero' ); ?>
	<?php endif; ?>

	<?php if ( gyde_get_field( 'belief_enable', true ) ) : ?>
		<?php get_template_part( 'template-parts/our-belief' ); ?>
	<?php endif; ?>

	<?php if ( gyde_get_field( 'team_enable', true ) ) : ?>
		<?php get_template_part( 'template-parts/gyde-team' ); ?>
	<?php endif; ?>

	<?php if ( gyde_get_field( 'model_enable', true ) ) : ?>
		<?php get_template_part( 'template-parts/our-model' ); ?>
	<?php endif; ?>

	<?php if ( gyde_get_field( 'features_enable', true ) ) : ?>
		<?php get_template_part( 'template-parts/feature-cards' ); ?>
	<?php endif; ?>

	<?php if ( gyde_get_field( 'impact_enable', true ) ) : ?>
		<?php get_template_part( 'template-parts/impact' ); ?>
	<?php endif; ?>

	<?php if ( gyde_get_field( 'partner_enable', true ) ) : ?>
		<?php get_template_part( 'template-parts/become-partner' ); ?>
	<?php endif; ?>

	<?php if ( gyde_get_field( 'backed_enable', true ) ) : ?>
		<?php get_template_part( 'template-parts/backed-by' ); ?>
	<?php endif; ?>

	<?php if ( gyde_get_field( 'blog_enable', true ) ) : ?>
		<?php get_template_part( 'template-parts/blog-section' ); ?>
	<?php endif; ?>

	<?php if ( gyde_get_field( 'contact_enable', true ) ) : ?>
		<?php get_template_part( 'template-parts/contact-section' ); ?>
	<?php endif; ?>
</main>
<?php
get_footer();
