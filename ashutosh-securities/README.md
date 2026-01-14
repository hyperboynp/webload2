# Ashutosh Brokerage and Securities WordPress Theme

## Description
A professional WordPress theme for Ashutosh Brokerage and Securities Pvt Ltd, featuring a modern design with a dark navy theme and golden accents (#d4a747). Perfect for financial services, investment companies, and brokerage firms.

## Features
- Fully responsive design
- Custom front page template
- Widget-ready footer (4 columns)
- Custom navigation menus
- **NEW: Fully Dynamic Sticky Bottom Banner** with backend controls
- **NEW: Fully Dynamic Footer Bottom Section** with backend controls
- Theme customizer options for:
  - Contact information (email, phone, address)
  - Social media links (Facebook, LinkedIn, Twitter, Instagram, YouTube, WhatsApp, and more)
  - Sticky banner (heading, text, button, image, colors)
  - Footer bottom (copyright, colors, social links, additional text)
- Clean and modern design
- SEO-friendly structure
- Cross-browser compatible
- Advanced animations and scroll effects
- Custom slider system
- Accessibility features (ARIA labels, skip links)
- Schema.org structured data

## Installation

1. Download the `ashutosh-securities` folder
2. Upload it to your WordPress installation at `wp-content/themes/`
3. Go to WordPress Admin > Appearance > Themes
4. Activate the "Ashutosh Brokerage and Securities" theme

## Setup Instructions

### 1. Set Front Page
1. Go to Settings > Reading
2. Select "A static page" for "Your homepage displays"
3. Create a new page called "Home"
4. Select the "Front Page" template from the Page Attributes
5. Set it as your homepage

### 2. Configure Menus
1. Go to Appearance > Menus
2. Create a new menu called "Primary Menu"
3. Add your pages/links:
   - Home
   - About Us
   - Services (with dropdown items: Broker Services, Literacy Sessions)
   - Downloads
   - Tools (with dropdown items: Share Calculator, Dividend Calculator, etc.)
   - Contact
   - Market (with dropdown items: Live Market, Trading Chart, etc.)
   - Market Place
4. Assign it to the "Primary Menu" location
5. Save the menu

### 3. Customize Contact Information
1. Go to Appearance > Customize > Contact Information
2. Enter your:
   - Email Address
   - Phone Number
   - Physical Address
3. Click "Publish"

### 4. Setup Social Media
1. Go to Appearance > Customize > Social Media
2. Enter URLs for:
   - Facebook
   - LinkedIn
   - Twitter
   - Instagram
3. Click "Publish"

### 5. Configure Footer Widgets
1. Go to Appearance > Widgets
2. You'll find 4 footer widget areas:
   - Footer - Column 1 (default: company info)
   - Footer - Column 2 (add "Quick Links" menu)
   - Footer - Column 3 (add "Our Services" menu)
   - Footer - Column 4 (reserved for contact info)
3. Drag and drop widgets into these areas

### 6. **NEW: Configure Sticky Bottom Banner**
1. Go to Appearance > Customize > Sticky Bottom Banner
2. Enable/disable the banner
3. Upload banner image (recommended: 100x100px)
4. Set heading and description text
5. Configure button text and URL
6. Customize background and text colors
7. Click "Publish"

**See detailed guide**: `BACKEND-CUSTOMIZATION-GUIDE.md`

### 7. **NEW: Configure Footer Bottom Section**
1. Go to Appearance > Customize > Footer Bottom Settings
2. Enable custom copyright text (optional)
3. Use placeholders: `{year}` for current year, `{site_name}` for site name
4. Set background, text, and link colors
5. Enable social links in footer (optional)
6. Add additional footer text or disclaimers
7. Click "Publish"

**See detailed guide**: `BACKEND-CUSTOMIZATION-GUIDE.md`

### 8. Recommended Widgets
- **Footer Column 2**: Custom Menu widget (Quick Links)
- **Footer Column 3**: Custom Menu widget (Services)

## File Structure
```
ashutosh-securities/
├── style.css           # Main stylesheet with theme info
├── functions.php       # Theme functions and features
├── header.php         # Header template
├── footer.php         # Footer template
├── index.php          # Main template (fallback)
├── front-page.php     # Homepage template
├── page.php           # Page template
├── single.php         # Single post template
├── js/
│   └── main.js        # JavaScript file
└── README.md          # This file
```

## Customization

### Colors
The theme uses these primary colors:
- Primary Gold: #d4a747
- Secondary Gold: #b8903d
- Dark Navy: #1a1d29
- Darker Navy: #2d3142

To change colors, edit the CSS variables in `style.css`.

### Fonts
The theme uses system fonts for optimal performance:
- `-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif`

To use custom fonts, add them in the `functions.php` file.

## Adding More Pages

Create pages for:
- About Us
- Services
- Contact
- Downloads
- Market tools pages

Use the default page template or customize `page.php` as needed.

## Browser Support
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- IE11+ (with graceful degradation)

## Credits
- Theme Design: Ashutosh Brokerage and Securities Team
- Icons: SVG inline icons
- Images: Stock photos (replace with your own)

## Support
For support, please contact: info@ashutoshbrokerage.com

## License
GPL v2 or later

## Changelog

### Version 2.1.0 (Latest)
- **NEW**: Fully dynamic Sticky Bottom Banner with comprehensive backend controls
- **NEW**: Fully dynamic Footer Bottom Section with backend controls
- Added enable/disable toggle for sticky banner
- Added image upload for sticky banner
- Added color customizers for sticky banner (background, text)
- Added custom copyright text with placeholders ({year}, {site_name})
- Added footer bottom color controls (background, text, links, hover)
- Added option to show social links in footer bottom
- Added additional footer text option for disclaimers
- Enhanced backend documentation with detailed guides
- Improved mobile responsiveness for footer sections

### Version 2.0.1
- Security enhancements and bug fixes
- Performance optimizations
- Enhanced SEO features

### Version 1.0.0
- Initial release
- Front page template
- Custom navigation menus
- Footer widget areas
- Theme customizer options
- Responsive design

## Documentation Files

This theme includes comprehensive documentation:

### 📖 Main Documentation
- **README.md** (this file) - General setup and features overview

### 🎨 Backend Customization Guides
- **BACKEND-CUSTOMIZATION-GUIDE.md** - Complete guide for sticky banner and footer customization
- **QUICK-REFERENCE.md** - Quick reference card for common tasks

### 📋 Content Management
- **BACKEND-CONTENT-MANAGEMENT-GUIDE.md** - Guide for managing homepage content

To access these guides, navigate to your theme folder:
`wp-content/themes/ashutosh-securities/`

## Notes

### Image Placeholders
The theme uses placeholder images from Pexels and Unsplash. Replace them with your own images:
- Hero slider images
- Service section images
- Feature icons

### Creating Menu Dropdowns
1. Go to Appearance > Menus
2. Drag menu items slightly to the right to create sub-items
3. The theme automatically styles dropdown menus

### Mobile Responsiveness
The theme is fully responsive and includes:
- Mobile menu toggle
- Responsive grid layouts
- Touch-friendly navigation
- Optimized images

## Future Enhancements
- Add more page templates
- Include shortcodes for common elements
- Add WooCommerce support (if needed for e-commerce)
- Implement page builder compatibility
- Add more customizer options

## Tips
1. Use high-quality images (at least 1920px wide for hero)
2. Keep menu items concise
3. Update contact info in the customizer
4. Add your logo via Appearance > Customize > Site Identity
5. Configure permalinks for SEO-friendly URLs

---

**Version:** 1.0.0  
**Last Updated:** January 2025  
**Author:** Ashutosh Brokerage and Securities Team