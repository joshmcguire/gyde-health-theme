<?php
/**
 * Template part: Blog section (The Gyde Wire)
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$img_dir       = get_template_directory_uri() . '/assets/images/';
$blog_heading  = gyde_get_field( 'blog_heading', 'The Gyde Wire' );
$blog_subtitle = gyde_get_field( 'blog_subtitle', 'The latest news, stories, and insights on how AI is transforming health insurance brokerages for good.' );

// Fallback blog card data with real images
$fallback_cards = array(
	array(
		'title'   => 'A better buy out for broker businesses',
		'excerpt' => 'Lorem ipsum dolor sit amet consectetur. Porttitor maecenas adipiscing est nisi.',
		'image'   => $img_dir . 'raw-Frame-5-6.png',
	),
	array(
		'title'   => 'Why AI will make your agency better',
		'excerpt' => 'Lorem ipsum dolor sit amet consectetur. Porttitor maecenas adipiscing est nisi.',
		'image'   => $img_dir . 'raw-Frame-5-7.png',
	),
	array(
		'title'   => 'Announcement: Gyde Acquires XYZ',
		'excerpt' => 'Lorem ipsum dolor sit amet consectetur. Porttitor maecenas adipiscing est nisi.',
		'image'   => $img_dir . 'raw-Frame-5-8.png',
	),
	array(
		'title'   => 'The future of insurance brokerage',
		'excerpt' => 'Lorem ipsum dolor sit amet consectetur. Porttitor maecenas adipiscing est nisi.',
		'image'   => $img_dir . 'raw-Frame-5-6.png',
	),
);

// Try to get real posts
$blog_query = new WP_Query( array(
	'post_type'      => 'post',
	'posts_per_page' => 4,
	'post_status'    => 'publish',
) );
?>
<section class="blog-section">
	<div class="blog-section__inner">
		<div class="blog-section__header">
			<div class="blog-section__header-left">
				<div class="blog-section__title-wrap">
					<h2 class="blog-section__heading"><?php echo esc_html( $blog_heading ); ?></h2>
					<p class="blog-section__subtitle"><?php echo esc_html( $blog_subtitle ); ?></p>
				</div>
			</div>

			<div class="blog-section__signup">
				<div class="blog-section__input-wrap">
					<input type="email" class="blog-section__input" placeholder="<?php esc_attr_e( 'Enter your email', 'gyde-health' ); ?>">
					<span class="blog-section__hint">We care about your data in our privacy policy.</span>
				</div>
				<button type="button" class="blog-section__subscribe">Subscribe</button>
			</div>
		</div>

		<div class="blog-section__cards">
			<?php if ( $blog_query->have_posts() ) : ?>
				<?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
					<article class="blog-card">
						<div class="blog-card__image-wrap">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'medium_large', array( 'class' => 'blog-card__image' ) ); ?>
							<?php else : ?>
								<div class="blog-card__image-placeholder"></div>
							<?php endif; ?>
							<div class="blog-card__image-overlay">
								<div class="blog-card__tags">
									<span class="blog-card__tag">AI</span>
									<span class="blog-card__tag">Business</span>
								</div>
							</div>
						</div>
						<div class="blog-card__content">
							<h3 class="blog-card__title"><?php the_title(); ?></h3>
							<p class="blog-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 12 ) ); ?></p>
						</div>
					</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<?php foreach ( $fallback_cards as $card ) : ?>
					<article class="blog-card">
						<div class="blog-card__image-wrap">
							<img src="<?php echo esc_url( $card['image'] ); ?>" alt="" class="blog-card__image">
							<div class="blog-card__image-overlay">
								<div class="blog-card__tags">
									<span class="blog-card__tag">AI</span>
									<span class="blog-card__tag">Business</span>
								</div>
							</div>
						</div>
						<div class="blog-card__content">
							<h3 class="blog-card__title"><?php echo esc_html( $card['title'] ); ?></h3>
							<p class="blog-card__excerpt"><?php echo esc_html( $card['excerpt'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<div class="blog-section__nav">
			<button type="button" class="blog-section__nav-btn blog-section__nav-btn--prev" aria-label="Previous">
				<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
			</button>
			<button type="button" class="blog-section__nav-btn" aria-label="Next">
				<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
			</button>
		</div>
	</div>
</section>
