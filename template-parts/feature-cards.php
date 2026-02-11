<?php
/**
 * Template part: Feature cards with chat UI
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$img_dir    = get_template_directory_uri() . '/assets/images/';
$avatar_url = $img_dir . 'Avatar.png';

// Get features from ACF or use defaults
$features = gyde_get_field( 'features_items', array() );
if ( empty( $features ) ) {
	$features = array(
		array(
			'feature_title'       => 'Proactive Outreach',
			'feature_description' => 'Design personalized, proactive campaigns to check in all year and send intelligent reminders during renewal and onboarding.',
			'feature_link'        => '#',
		),
		array(
			'feature_title'       => 'Responsive 24/7 Support',
			'feature_description' => 'Clients get instant answers day or night, while your team stays in control.',
			'feature_link'        => '#',
		),
		array(
			'feature_title'       => 'Confident Cross-selling',
			'feature_description' => 'AI identifies opportunities and presents them naturally in conversation.',
			'feature_link'        => '#',
		),
	);
}

// Get chat messages from ACF or use defaults
$chat_messages = gyde_get_field( 'features_chat_messages', array() );
if ( empty( $chat_messages ) ) {
	$chat_messages = array(
		array( 'sender' => 'bot',  'sender_name' => "George's Gyde Assistant", 'message' => "Hi Julie, this is George's Gyde Assistant, your plan is set to renew on January 15th. Would you like to review your options?" ),
		array( 'sender' => 'user', 'sender_name' => 'Julie',                    'message' => "I'd like to see my options" ),
		array( 'sender' => 'bot',  'sender_name' => "George's Gyde Assistant", 'message' => "Okay, let's set up a time to chat: How's next Tuesday at 2, 3, or 4pm?" ),
	);
}
?>
<section class="feature-cards-section">
	<div class="feature-cards-section__inner">
		<!-- Left: Feature list on red background -->
		<div class="feature-cards-section__left">
			<div class="feature-cards-section__left-circle"></div>
			<div class="feature-cards-section__list">
				<?php foreach ( $features as $index => $feature ) :
					$is_active = ( 0 === $index );
					$title = is_array( $feature ) ? ( $feature['feature_title'] ?? '' ) : '';
					$desc  = is_array( $feature ) ? ( $feature['feature_description'] ?? '' ) : '';
					$link  = is_array( $feature ) ? ( $feature['feature_link'] ?? '#' ) : '#';
				?>
					<div class="feature-cards-section__list-item <?php echo $is_active ? 'is-active' : ''; ?>">
						<div class="feature-cards-section__list-trigger">
							<span class="feature-cards-section__list-trigger-title"><?php echo esc_html( $title ); ?></span>
						</div>
						<?php if ( $desc ) : ?>
							<div class="feature-cards-section__list-content">
								<p class="feature-cards-section__list-description"><?php echo esc_html( $desc ); ?></p>
								<?php if ( $link ) : ?>
									<a href="<?php echo esc_url( $link ); ?>" class="feature-cards-section__list-link">Learn More</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Right: Chat conversation mockup -->
		<div class="feature-cards-section__right">
			<div class="chat-mockup">
				<?php foreach ( $chat_messages as $msg ) :
					$sender = is_array( $msg ) ? ( $msg['sender'] ?? 'bot' ) : 'bot';
					$name   = is_array( $msg ) ? ( $msg['sender_name'] ?? '' ) : '';
					$text   = is_array( $msg ) ? ( $msg['message'] ?? '' ) : '';
					$is_user = ( 'user' === $sender );
				?>
					<div class="chat-message <?php echo $is_user ? 'chat-message--user' : ''; ?>">
						<?php if ( ! $is_user ) : ?>
							<div class="chat-avatar">
								<img src="<?php echo esc_url( $avatar_url ); ?>" alt="Gyde" class="chat-avatar__img">
								<span class="chat-avatar__indicator"></span>
							</div>
						<?php endif; ?>
						<div class="chat-content">
							<span class="chat-name"><?php echo esc_html( $name ); ?></span>
							<div class="chat-bubble <?php echo $is_user ? 'chat-bubble--user' : ''; ?>">
								<p><?php echo esc_html( $text ); ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
