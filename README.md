# Gyde Health - Custom WordPress Theme

A pixel-perfect WordPress theme for Gyde Health, built from Figma designs with full ACF (Advanced Custom Fields) integration for easy content management.

## Features

- **Pixel-perfect design** - Extracted directly from Figma with exact colors, typography, and spacing
- **Fully editable via WordPress admin** - Every section has ACF fields with a tabbed interface
- **10 homepage sections**: Hero, Our Belief, Gyde Team, Our Model, Feature Cards, Impact, Become Partner, Backed By, Blog/Gyde Wire, Contact
- **Enable/disable toggles** for each section
- **Responsive design** - Breakpoints at 1440px, 1200px, 1024px, and 768px
- **Custom fonts** - Season Serif, Fellix, Inter, Poppins
- **SVG logo** with proper dark/light handling

## Requirements

- WordPress 6.0+
- [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/) plugin (free version works, Pro adds repeater fields)
- PHP 7.4+

## Installation

1. Upload the `gyde-health` folder to `/wp-content/themes/`
2. Activate the theme in WordPress Admin > Appearance > Themes
3. Install and activate the **Advanced Custom Fields** plugin
4. Create a page called "Home" and set it as the static front page (Settings > Reading)
5. Edit the Home page to see all the ACF section tabs

## Theme Structure

```
gyde-health/
├── assets/
│   ├── css/main.css          # All styles (design tokens, sections, responsive)
│   ├── js/main.js            # Accordion, carousel, smooth scroll, mobile menu
│   ├── images/               # Exported Figma assets (logos, photos, icons)
│   └── fonts/                # Custom font files (add .woff2 files here)
├── inc/
│   └── acf-fields.php        # All ACF field definitions (programmatic)
├── template-parts/
│   ├── hero.php
│   ├── our-belief.php
│   ├── gyde-team.php
│   ├── our-model.php
│   ├── feature-cards.php
│   ├── impact.php
│   ├── become-partner.php
│   ├── backed-by.php
│   ├── blog-section.php
│   └── contact-section.php
├── front-page.php            # Homepage template
├── header.php
├── footer.php
├── functions.php             # Theme setup, enqueues, helpers
├── index.php                 # Fallback template
└── style.css                 # Theme metadata
```

## ACF Admin Interface

The Home page editor shows left-side tabs for each section:

| Tab | Fields |
|-----|--------|
| Hero | Enable, Heading (supports `<em>` italic), Button text/link |
| Our Belief | Enable, Label, Heading (supports `<mark>` highlight) |
| Gyde Team | Enable, Label, Heading, Photo, Description, Link, Right panel content, Bullet points |
| Our Model | Enable, Label, Heading (supports `<mark>`), Description |
| Feature Cards | Enable, Features repeater, Chat messages repeater |
| Impact | Enable, Label, Heading, Descriptions, Stats repeater |
| Become Partner | Enable, Label, Heading, Description, Image, Link |
| Backed By | Enable, Label, Logos repeater |
| Blog | Enable, Heading, Subtitle, Posts count |
| Contact | Enable, Heading (supports `<em>`), Description, Button, Background image |

Global settings (Footer, Social links) are on the **Theme Options** page.

## Design Tokens

All colors, fonts, and spacing are defined as CSS custom properties in `main.css`:

```css
--color-red-dark: #991717;
--color-red: #ff2626;
--color-navy: #18313e;
--color-yellow: #ffe436;
--font-serif: 'Season Serif';
--font-sans: 'Fellix';
--content-width: 1280px;
```

## License

Custom theme built for Gyde Health.
