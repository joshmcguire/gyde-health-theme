<?php
/**
 * ACF Field Groups - Homepage Sections
 *
 * Creates a tabbed admin interface for editing every section
 * of the Gyde Health homepage.
 *
 * @package Gyde_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register all ACF field groups for the homepage
 */
function gyde_register_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	/* =========================================================================
	   HOMEPAGE FIELDS (assigned to Front Page)
	   ========================================================================= */

	acf_add_local_field_group( array(
		'key'      => 'group_gyde_homepage',
		'title'    => 'Home page',
		'fields'   => array_merge(
			gyde_hero_fields(),
			gyde_our_belief_fields(),
			gyde_gyde_team_fields(),
			gyde_our_model_fields(),
			gyde_feature_cards_fields(),
			gyde_impact_fields(),
			gyde_become_partner_fields(),
			gyde_backed_by_fields(),
			gyde_blog_section_fields(),
			gyde_contact_section_fields()
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_type',
					'operator' => '==',
					'value'    => 'front_page',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => array(
			'the_content',
			'excerpt',
			'discussion',
			'comments',
			'revisions',
			'slug',
			'author',
			'format',
			'featured_image',
			'categories',
			'tags',
			'send-trackbacks',
		),
	) );

	/* =========================================================================
	   FOOTER / GLOBAL SETTINGS (Options page)
	   ========================================================================= */

	acf_add_local_field_group( array(
		'key'      => 'group_gyde_footer',
		'title'    => 'Footer & Global Settings',
		'fields'   => gyde_footer_fields(),
		'location' => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'gyde-theme-options',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
	) );
}
add_action( 'acf/init', 'gyde_register_acf_fields' );


/* =============================================================================
   SECTION FIELD DEFINITIONS
   ============================================================================= */

/**
 * Hero Section fields
 */
function gyde_hero_fields() {
	return array(
		// --- Tab ---
		array(
			'key'       => 'field_hero_tab',
			'label'     => 'Hero',
			'type'      => 'tab',
			'placement' => 'left',
		),
		array(
			'key'           => 'field_hero_enable',
			'label'         => 'Enable Section',
			'name'          => 'hero_enable',
			'type'          => 'true_false',
			'default_value' => 1,
			'ui'            => 1,
		),
		array(
			'key'           => 'field_hero_heading',
			'label'         => 'Heading',
			'name'          => 'hero_heading',
			'type'          => 'textarea',
			'rows'          => 3,
			'default_value' => "We're building the first AI native brokerage that delivers insurance, wealth, and health solutions at infinite scale.",
			'instructions'  => 'The main hero headline. Wrap words in &lt;em&gt; tags for italic styling (e.g. &lt;em&gt;infinite&lt;/em&gt;).',
		),
		array(
			'key'           => 'field_hero_button_text',
			'label'         => 'Button Text',
			'name'          => 'hero_button_text',
			'type'          => 'text',
			'default_value' => 'Become a Partner',
		),
		array(
			'key'           => 'field_hero_button_link',
			'label'         => 'Button Link',
			'name'          => 'hero_button_link',
			'type'          => 'url',
			'default_value' => '#',
		),
	);
}

/**
 * Our Belief Section fields
 */
function gyde_our_belief_fields() {
	return array(
		array(
			'key'       => 'field_belief_tab',
			'label'     => 'Our Belief',
			'type'      => 'tab',
			'placement' => 'left',
		),
		array(
			'key'           => 'field_belief_enable',
			'label'         => 'Enable Section',
			'name'          => 'belief_enable',
			'type'          => 'true_false',
			'default_value' => 1,
			'ui'            => 1,
		),
		array(
			'key'           => 'field_belief_label',
			'label'         => 'Section Label',
			'name'          => 'belief_label',
			'type'          => 'text',
			'default_value' => 'Our Belief',
		),
		array(
			'key'           => 'field_belief_heading',
			'label'         => 'Heading',
			'name'          => 'belief_heading',
			'type'          => 'textarea',
			'rows'          => 3,
			'default_value' => 'Brokers should be master lifetime guides, helping people make great coverage decisions, grow their wealth, and navigate healthcare with ease.',
			'instructions'  => 'Use &lt;mark&gt; tags for yellow highlight (e.g. &lt;mark&gt;master lifetime guides&lt;/mark&gt;).',
		),
	);
}

/**
 * The Gyde Team Section fields
 */
function gyde_gyde_team_fields() {
	return array(
		array(
			'key'       => 'field_team_tab',
			'label'     => 'Gyde Team',
			'type'      => 'tab',
			'placement' => 'left',
		),
		array(
			'key'           => 'field_team_enable',
			'label'         => 'Enable Section',
			'name'          => 'team_enable',
			'type'          => 'true_false',
			'default_value' => 1,
			'ui'            => 1,
		),
		array(
			'key'           => 'field_team_label',
			'label'         => 'Section Label',
			'name'          => 'team_label',
			'type'          => 'text',
			'default_value' => 'The Gyde Team',
		),
		array(
			'key'           => 'field_team_heading',
			'label'         => 'Heading',
			'name'          => 'team_heading',
			'type'          => 'text',
			'default_value' => 'We know insurance and AI—inside and out.',
		),
		array(
			'key'           => 'field_team_image',
			'label'         => 'Team Photo',
			'name'          => 'team_image',
			'type'          => 'image',
			'return_format' => 'array',
			'preview_size'  => 'medium',
			'instructions'  => 'The team group photo displayed on the left panel.',
		),
		array(
			'key'           => 'field_team_description',
			'label'         => 'Image Overlay Text',
			'name'          => 'team_description',
			'type'          => 'textarea',
			'rows'          => 3,
			'default_value' => 'Our growing team includes market leading talent from top insurance, technology, and brokerage firms.',
		),
		array(
			'key'           => 'field_team_link_text',
			'label'         => 'Link Text',
			'name'          => 'team_link_text',
			'type'          => 'text',
			'default_value' => 'Explore open positions',
		),
		array(
			'key'           => 'field_team_link_url',
			'label'         => 'Link URL',
			'name'          => 'team_link_url',
			'type'          => 'url',
			'default_value' => '#',
		),
		// Right panel
		array(
			'key'   => 'field_team_right_divider',
			'label' => 'Right Panel (Red)',
			'type'  => 'message',
			'message' => '<hr><strong>Right Panel Settings</strong> — The red panel next to the team photo.',
		),
		array(
			'key'           => 'field_team_right_heading',
			'label'         => 'Right Panel Heading',
			'name'          => 'team_right_heading',
			'type'          => 'textarea',
			'rows'          => 2,
			'default_value' => 'You need more than just capital or tech to grow your insurance business.',
		),
		array(
			'key'           => 'field_team_right_description',
			'label'         => 'Right Panel Description',
			'name'          => 'team_right_description',
			'type'          => 'textarea',
			'rows'          => 2,
			'default_value' => 'We are experienced insurance, healthcare and technology experts with a track record that includes—',
		),
		array(
			'key'        => 'field_team_right_list',
			'label'      => 'Bullet Points',
			'name'       => 'team_right_list',
			'type'       => 'repeater',
			'layout'     => 'table',
			'min'        => 1,
			'max'        => 8,
			'button_label' => 'Add Bullet Point',
			'sub_fields' => array(
				array(
					'key'   => 'field_team_right_list_item',
					'label' => 'Text',
					'name'  => 'text',
					'type'  => 'text',
				),
			),
		),
	);
}

/**
 * Our Model Section fields
 */
function gyde_our_model_fields() {
	return array(
		array(
			'key'       => 'field_model_tab',
			'label'     => 'Our Model',
			'type'      => 'tab',
			'placement' => 'left',
		),
		array(
			'key'           => 'field_model_enable',
			'label'         => 'Enable Section',
			'name'          => 'model_enable',
			'type'          => 'true_false',
			'default_value' => 1,
			'ui'            => 1,
		),
		array(
			'key'           => 'field_model_label',
			'label'         => 'Section Label',
			'name'          => 'model_label',
			'type'          => 'text',
			'default_value' => 'Our Model',
		),
		array(
			'key'           => 'field_model_heading',
			'label'         => 'Heading',
			'name'          => 'model_heading',
			'type'          => 'textarea',
			'rows'          => 2,
			'default_value' => 'Today, growth brings operational burdens that put service and scale at odds.',
			'instructions'  => 'Use &lt;mark&gt; tags for yellow highlight (e.g. &lt;mark&gt;growth&lt;/mark&gt;).',
		),
		array(
			'key'           => 'field_model_description',
			'label'         => 'Description',
			'name'          => 'model_description',
			'type'          => 'textarea',
			'rows'          => 3,
			'default_value' => 'We built Gyde AI to change that. Our broker-controlled AI assistants automate the busy work so you can focus on what matters—serving clients and growing your business.',
		),
	);
}

/**
 * Feature Cards Section fields
 */
function gyde_feature_cards_fields() {
	return array(
		array(
			'key'       => 'field_features_tab',
			'label'     => 'Feature Cards',
			'type'      => 'tab',
			'placement' => 'left',
		),
		array(
			'key'           => 'field_features_enable',
			'label'         => 'Enable Section',
			'name'          => 'features_enable',
			'type'          => 'true_false',
			'default_value' => 1,
			'ui'            => 1,
		),
		array(
			'key'          => 'field_features_items',
			'label'        => 'Features',
			'name'         => 'features_items',
			'type'         => 'repeater',
			'layout'       => 'block',
			'min'          => 1,
			'max'          => 6,
			'button_label' => 'Add Feature',
			'sub_fields'   => array(
				array(
					'key'           => 'field_feature_title',
					'label'         => 'Title',
					'name'          => 'feature_title',
					'type'          => 'text',
				),
				array(
					'key'           => 'field_feature_description',
					'label'         => 'Description',
					'name'          => 'feature_description',
					'type'          => 'textarea',
					'rows'          => 2,
				),
				array(
					'key'           => 'field_feature_link',
					'label'         => 'Link URL',
					'name'          => 'feature_link',
					'type'          => 'url',
				),
			),
		),
		// Chat mockup fields
		array(
			'key'     => 'field_features_chat_divider',
			'label'   => 'Chat Mockup',
			'type'    => 'message',
			'message' => '<hr><strong>Chat Mockup Settings</strong> — The conversation displayed on the right panel.',
		),
		array(
			'key'          => 'field_features_chat_messages',
			'label'        => 'Chat Messages',
			'name'         => 'features_chat_messages',
			'type'         => 'repeater',
			'layout'       => 'block',
			'min'          => 1,
			'max'          => 10,
			'button_label' => 'Add Message',
			'sub_fields'   => array(
				array(
					'key'           => 'field_chat_sender',
					'label'         => 'Sender',
					'name'          => 'sender',
					'type'          => 'select',
					'choices'       => array(
						'bot'  => 'Gyde Assistant (Bot)',
						'user' => 'Client (User)',
					),
					'default_value' => 'bot',
				),
				array(
					'key'   => 'field_chat_sender_name',
					'label' => 'Sender Name',
					'name'  => 'sender_name',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_chat_message',
					'label' => 'Message',
					'name'  => 'message',
					'type'  => 'textarea',
					'rows'  => 2,
				),
			),
		),
	);
}

/**
 * Impact Section fields
 */
function gyde_impact_fields() {
	return array(
		array(
			'key'       => 'field_impact_tab',
			'label'     => 'Impact',
			'type'      => 'tab',
			'placement' => 'left',
		),
		array(
			'key'           => 'field_impact_enable',
			'label'         => 'Enable Section',
			'name'          => 'impact_enable',
			'type'          => 'true_false',
			'default_value' => 1,
			'ui'            => 1,
		),
		array(
			'key'           => 'field_impact_label',
			'label'         => 'Section Label',
			'name'          => 'impact_label',
			'type'          => 'text',
			'default_value' => 'Impact',
		),
		array(
			'key'           => 'field_impact_heading',
			'label'         => 'Heading',
			'name'          => 'impact_heading',
			'type'          => 'text',
			'default_value' => 'Drive your insurance business forward',
		),
		array(
			'key'           => 'field_impact_description_left',
			'label'         => 'Description (Left Column)',
			'name'          => 'impact_description_left',
			'type'          => 'textarea',
			'rows'          => 2,
			'default_value' => 'Gyde moves the metrics that matter for growth and client satisfaction.',
		),
		array(
			'key'           => 'field_impact_description_right',
			'label'         => 'Description (Right Column)',
			'name'          => 'impact_description_right',
			'type'          => 'textarea',
			'rows'          => 2,
			'default_value' => 'Together, modest improvements can stack to create outsized revenue gains.',
		),
		array(
			'key'          => 'field_impact_stats',
			'label'        => 'Statistics',
			'name'         => 'impact_stats',
			'type'         => 'repeater',
			'layout'       => 'table',
			'min'          => 1,
			'max'          => 6,
			'button_label' => 'Add Stat',
			'sub_fields'   => array(
				array(
					'key'   => 'field_stat_label',
					'label' => 'Label',
					'name'  => 'stat_label',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_stat_value',
					'label' => 'Value',
					'name'  => 'stat_value',
					'type'  => 'text',
					'instructions' => 'e.g. 20%, 60%',
				),
			),
		),
	);
}

/**
 * Become a Partner Section fields
 */
function gyde_become_partner_fields() {
	return array(
		array(
			'key'       => 'field_partner_tab',
			'label'     => 'Become Partner',
			'type'      => 'tab',
			'placement' => 'left',
		),
		array(
			'key'           => 'field_partner_enable',
			'label'         => 'Enable Section',
			'name'          => 'partner_enable',
			'type'          => 'true_false',
			'default_value' => 1,
			'ui'            => 1,
		),
		array(
			'key'           => 'field_partner_label',
			'label'         => 'Section Label',
			'name'          => 'partner_label',
			'type'          => 'text',
			'default_value' => 'Become a Gyde Partner',
		),
		array(
			'key'           => 'field_partner_heading',
			'label'         => 'Heading',
			'name'          => 'partner_heading',
			'type'          => 'text',
			'default_value' => "Hosting Agency? It's a Buy In, Not a Buyout",
		),
		array(
			'key'           => 'field_partner_description',
			'label'         => 'Description',
			'name'          => 'partner_description',
			'type'          => 'textarea',
			'rows'          => 3,
			'default_value' => "Growing alone is hard. Join the Gyde network and get the AI tools, support, and community you need to scale—without giving up control of your business.",
		),
		array(
			'key'           => 'field_partner_image',
			'label'         => 'Image',
			'name'          => 'partner_image',
			'type'          => 'image',
			'return_format' => 'array',
			'preview_size'  => 'medium',
			'instructions'  => 'Photo displayed to the right of the card.',
		),
		array(
			'key'           => 'field_partner_link_text',
			'label'         => 'Link Text',
			'name'          => 'partner_link_text',
			'type'          => 'text',
			'default_value' => 'Learn more',
		),
		array(
			'key'           => 'field_partner_link',
			'label'         => 'Link URL',
			'name'          => 'partner_link',
			'type'          => 'url',
			'default_value' => '#',
		),
	);
}

/**
 * Backed By Section fields
 */
function gyde_backed_by_fields() {
	return array(
		array(
			'key'       => 'field_backed_tab',
			'label'     => 'Backed By',
			'type'      => 'tab',
			'placement' => 'left',
		),
		array(
			'key'           => 'field_backed_enable',
			'label'         => 'Enable Section',
			'name'          => 'backed_enable',
			'type'          => 'true_false',
			'default_value' => 1,
			'ui'            => 1,
		),
		array(
			'key'           => 'field_backed_label',
			'label'         => 'Section Label',
			'name'          => 'backed_by_label',
			'type'          => 'text',
			'default_value' => 'Backed By',
		),
		array(
			'key'          => 'field_backed_logos',
			'label'        => 'Partner Logos',
			'name'         => 'backed_by_logos',
			'type'         => 'repeater',
			'layout'       => 'block',
			'min'          => 1,
			'max'          => 10,
			'button_label' => 'Add Logo',
			'sub_fields'   => array(
				array(
					'key'   => 'field_backed_logo_name',
					'label' => 'Company Name',
					'name'  => 'logo_name',
					'type'  => 'text',
				),
				array(
					'key'           => 'field_backed_logo_image',
					'label'         => 'Logo Image',
					'name'          => 'logo_image',
					'type'          => 'image',
					'return_format' => 'array',
					'preview_size'  => 'medium',
				),
			),
		),
	);
}

/**
 * Blog Section fields
 */
function gyde_blog_section_fields() {
	return array(
		array(
			'key'       => 'field_blog_tab',
			'label'     => 'Blog / Gyde Wire',
			'type'      => 'tab',
			'placement' => 'left',
		),
		array(
			'key'           => 'field_blog_enable',
			'label'         => 'Enable Section',
			'name'          => 'blog_enable',
			'type'          => 'true_false',
			'default_value' => 1,
			'ui'            => 1,
		),
		array(
			'key'           => 'field_blog_heading',
			'label'         => 'Heading',
			'name'          => 'blog_heading',
			'type'          => 'text',
			'default_value' => 'The Gyde Wire',
		),
		array(
			'key'           => 'field_blog_subtitle',
			'label'         => 'Subtitle',
			'name'          => 'blog_subtitle',
			'type'          => 'textarea',
			'rows'          => 2,
			'default_value' => 'The latest news, stories, and insights on how AI is transforming health insurance brokerages for good.',
		),
		array(
			'key'           => 'field_blog_posts_count',
			'label'         => 'Number of Posts to Show',
			'name'          => 'blog_posts_count',
			'type'          => 'number',
			'default_value' => 4,
			'min'           => 1,
			'max'           => 12,
		),
	);
}

/**
 * Contact / Get in Touch Section fields
 */
function gyde_contact_section_fields() {
	return array(
		array(
			'key'       => 'field_contact_tab',
			'label'     => 'Contact',
			'type'      => 'tab',
			'placement' => 'left',
		),
		array(
			'key'           => 'field_contact_enable',
			'label'         => 'Enable Section',
			'name'          => 'contact_enable',
			'type'          => 'true_false',
			'default_value' => 1,
			'ui'            => 1,
		),
		array(
			'key'           => 'field_contact_heading',
			'label'         => 'Heading',
			'name'          => 'contact_heading',
			'type'          => 'text',
			'default_value' => 'Get in touch',
			'instructions'  => 'Use &lt;em&gt; tags for italic red text (e.g. Get &lt;em&gt;in&lt;/em&gt; touch).',
		),
		array(
			'key'           => 'field_contact_description',
			'label'         => 'Description',
			'name'          => 'contact_description',
			'type'          => 'textarea',
			'rows'          => 2,
			'default_value' => 'Book a consultation to learn why elite brokers are moving their business to Gyde',
		),
		array(
			'key'           => 'field_contact_button_text',
			'label'         => 'Button Text',
			'name'          => 'contact_button_text',
			'type'          => 'text',
			'default_value' => 'Contact Us',
		),
		array(
			'key'           => 'field_contact_button_link',
			'label'         => 'Button Link',
			'name'          => 'contact_button_link',
			'type'          => 'url',
			'default_value' => '#',
		),
		array(
			'key'           => 'field_contact_background_image',
			'label'         => 'Background Image',
			'name'          => 'contact_background_image',
			'type'          => 'image',
			'return_format' => 'array',
			'preview_size'  => 'medium',
			'instructions'  => 'The background photo for the contact section.',
		),
	);
}

/**
 * Footer / Global Settings fields (for Options page)
 */
function gyde_footer_fields() {
	return array(
		// --- Header Tab ---
		array(
			'key'       => 'field_header_options_tab',
			'label'     => 'Header',
			'type'      => 'tab',
			'placement' => 'left',
		),
		array(
			'key'           => 'field_header_contact_link',
			'label'         => 'Contact Button Link',
			'name'          => 'header_contact_link',
			'type'          => 'url',
			'default_value' => '/contact',
		),

		// --- Footer Tab ---
		array(
			'key'       => 'field_footer_tab',
			'label'     => 'Footer',
			'type'      => 'tab',
			'placement' => 'left',
		),
		array(
			'key'           => 'field_footer_supporting_text',
			'label'         => 'Footer Description',
			'name'          => 'footer_supporting_text',
			'type'          => 'textarea',
			'rows'          => 3,
			'default_value' => "We're building the first AI-native health insurance brokerage that delivers insurance, wealth, and health solutions at infinite scale.",
		),
		array(
			'key'           => 'field_footer_copyright',
			'label'         => 'Copyright Text',
			'name'          => 'footer_copyright',
			'type'          => 'text',
			'default_value' => '© 2025 Gyde. All rights reserved.',
		),
		array(
			'key'          => 'field_footer_links',
			'label'        => 'Footer Links',
			'name'         => 'footer_links',
			'type'         => 'repeater',
			'layout'       => 'table',
			'min'          => 1,
			'max'          => 12,
			'button_label' => 'Add Link',
			'sub_fields'   => array(
				array(
					'key'   => 'field_footer_link_label',
					'label' => 'Label',
					'name'  => 'label',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_footer_link_url',
					'label' => 'URL',
					'name'  => 'url',
					'type'  => 'url',
				),
			),
		),

		// --- Social Media Tab ---
		array(
			'key'       => 'field_social_tab',
			'label'     => 'Social Media',
			'type'      => 'tab',
			'placement' => 'left',
		),
		array(
			'key'   => 'field_social_twitter',
			'label' => 'Twitter / X URL',
			'name'  => 'social_twitter',
			'type'  => 'url',
		),
		array(
			'key'   => 'field_social_linkedin',
			'label' => 'LinkedIn URL',
			'name'  => 'social_linkedin',
			'type'  => 'url',
		),
		array(
			'key'   => 'field_social_facebook',
			'label' => 'Facebook URL',
			'name'  => 'social_facebook',
			'type'  => 'url',
		),
		array(
			'key'   => 'field_social_instagram',
			'label' => 'Instagram URL',
			'name'  => 'social_instagram',
			'type'  => 'url',
		),
		array(
			'key'   => 'field_social_youtube',
			'label' => 'YouTube URL',
			'name'  => 'social_youtube',
			'type'  => 'url',
		),
		array(
			'key'   => 'field_social_github',
			'label' => 'GitHub URL',
			'name'  => 'social_github',
			'type'  => 'url',
		),
	);
}
