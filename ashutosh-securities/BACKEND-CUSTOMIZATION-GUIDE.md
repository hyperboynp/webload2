# Backend Customization Guide
## Dynamic Sticky Banner & Footer Bottom Controls

This guide explains how to customize the Sticky Bottom Banner and Footer Bottom sections from the WordPress backend.

---

## 🎯 Accessing Customization Settings

1. Log in to WordPress Admin Dashboard
2. Go to **Appearance > Customize**
3. Look for the following sections:
   - **Sticky Bottom Banner** - Controls for the sticky banner at bottom of page
   - **Footer Bottom Settings** - Controls for footer copyright and bottom area

---

## 📋 Sticky Bottom Banner Settings

### Location in Customizer
**Appearance > Customize > Sticky Bottom Banner**

### Available Options

#### 1. **Enable Sticky Banner** (Checkbox)
- Turn the sticky banner on/off
- Default: Enabled

#### 2. **Banner Image** (Image Upload)
- Upload or select an image for the banner
- Recommended size: 100px x 100px
- Default: Placeholder coin image
- **How to use**: Click "Select Image" to upload or choose from media library

#### 3. **Banner Heading** (Text)
- Main heading text for the banner
- Default: "Balanced Advantage Funds"
- Example: "Special Offer", "New Launch", "Investment Plans"

#### 4. **Banner Text** (Text)
- Subtext or description below heading
- Default: "Ride market waves with confidence"
- Example: "Get started with zero brokerage", "Limited time offer"

#### 5. **Button Text** (Text)
- Text displayed on the action button
- Default: "EXPLORE"
- Example: "GET STARTED", "LEARN MORE", "SIGN UP"

#### 6. **Button URL** (URL)
- Link destination when button is clicked
- Default: "#"
- Example: "https://yoursite.com/offers", "/contact"

#### 7. **Background Color** (Color Picker)
- Banner background color
- Default: #ffffff (White)
- Click the color picker to choose any color

#### 8. **Text Color** (Color Picker)
- Color for heading and description text
- Default: #000000 (Black)
- Ensure good contrast with background color

---

## 🎨 Footer Bottom Settings

### Location in Customizer
**Appearance > Customize > Footer Bottom Settings**

### Available Options

#### 1. **Use Custom Copyright Text** (Checkbox)
- Enable to use your own copyright text
- Disable to use auto-generated copyright
- Default: Disabled (auto-generated)

#### 2. **Custom Copyright Text** (Textarea - HTML Allowed)
- Write your custom copyright message
- **Available Placeholders**:
  - `{year}` - Automatically replaced with current year
  - `{site_name}` - Automatically replaced with your site name
- **Example 1**: `© {year} {site_name}. All Rights Reserved.`
- **Example 2**: `Copyright {year} by {site_name} | Powered by Excellence`
- **Example 3**: `&copy; {year} {site_name}. <a href="/terms">Terms</a> | <a href="/privacy">Privacy</a>`

#### 3. **Footer Bottom Background Color** (Color Picker)
- Background color for footer bottom section
- Default: #1a1d29 (Dark Navy)

#### 4. **Footer Bottom Text Color** (Color Picker)
- Color for main text in footer bottom
- Default: #aaaaaa (Light Gray)

#### 5. **Footer Bottom Link Color** (Color Picker)
- Color for links in footer menu
- Default: #ffffff (White)

#### 6. **Footer Bottom Link Hover Color** (Color Picker)
- Color when hovering over links
- Default: #F58220 (Orange)

#### 7. **Show Social Links in Footer Bottom** (Checkbox)
- Display social media icons in footer bottom
- Default: Disabled
- Social links configured in: **Appearance > Customize > Social Media**

#### 8. **Additional Footer Text** (Textarea - HTML Allowed)
- Extra text to display before copyright
- Useful for disclaimers, legal notices, or additional info
- **Example 1**: `Trading involves risk. Please invest responsibly.`
- **Example 2**: `<small>SEBI Registered | Member of NSE & BSE</small>`

---

## 📝 Step-by-Step Examples

### Example 1: Changing Sticky Banner for Promotion

1. Go to **Appearance > Customize > Sticky Bottom Banner**
2. Set **Banner Heading**: "Limited Time Offer"
3. Set **Banner Text**: "Zero brokerage for 30 days"
4. Set **Button Text**: "CLAIM NOW"
5. Set **Button URL**: "/special-offer"
6. Set **Background Color**: #F58220 (Orange)
7. Set **Text Color**: #ffffff (White)
8. Click **Publish** to save

### Example 2: Custom Footer Copyright

1. Go to **Appearance > Customize > Footer Bottom Settings**
2. Check **Use Custom Copyright Text**
3. In **Custom Copyright Text**, enter:
   ```
   © {year} {site_name} | SEBI Reg. No. INZ000123456 | <a href="/disclaimer">Disclaimer</a>
   ```
4. Set **Footer Bottom Background Color**: #2d3142
5. Set **Footer Bottom Text Color**: #cccccc
6. Set **Footer Bottom Link Color**: #F58220
7. Check **Show Social Links in Footer Bottom**
8. Click **Publish** to save

### Example 3: Minimal Footer Design

1. Go to **Appearance > Customize > Footer Bottom Settings**
2. Check **Use Custom Copyright Text**
3. In **Custom Copyright Text**, enter:
   ```
   Made with ❤️ by {site_name}
   ```
4. Set **Footer Bottom Background Color**: #000000 (Black)
5. Set **Footer Bottom Text Color**: #ffffff (White)
6. Leave social links disabled
7. Click **Publish** to save

---

## 🎬 Live Preview

All changes in the Customizer show **instant live preview** before publishing:
- Make your changes
- See results immediately in the preview panel
- If satisfied, click **Publish**
- If not, click **X** to discard changes

---

## 🔧 Advanced Customization

### Using HTML in Text Fields

Both **Custom Copyright Text** and **Additional Footer Text** support HTML:

```html
© {year} <strong>{site_name}</strong> | 
<a href="/terms">Terms</a> | 
<a href="/privacy">Privacy Policy</a> | 
<a href="/disclaimer">Disclaimer</a>
```

### Using Custom CSS (if needed)

If you need further styling:
1. Go to **Appearance > Customize > Additional CSS**
2. Add custom CSS:

```css
/* Customize sticky banner padding */
.sticky-banner-content {
    padding: 20px !important;
}

/* Customize footer font size */
.footer-bottom {
    font-size: 13px !important;
}
```

---

## 📱 Mobile Responsiveness

Both sections are fully responsive:
- **Sticky Banner**: Automatically adjusts layout on mobile
- **Footer Bottom**: Stacks vertically on small screens
- All text remains readable on all devices

---

## 🆘 Troubleshooting

### Sticky Banner Not Showing
1. Check **Enable Sticky Banner** is checked
2. Go to **Appearance > Customize > Sticky Bottom Banner**
3. Ensure it's enabled in **Homepage Settings > Section Visibility**

### Copyright Text Not Updating
1. Ensure **Use Custom Copyright Text** is checked
2. Clear browser cache (Ctrl+F5 or Cmd+R)
3. Check for typos in placeholders: use `{year}` not `{Year}`

### Colors Not Changing
1. Clear browser cache
2. Try using hex color codes instead of color names
3. Check if any Custom CSS is overriding settings

### Footer Links Not Showing
1. Go to **Appearance > Menus**
2. Create or edit the **Footer Menu**
3. Assign it to **Footer Menu** location
4. Add your desired links

---

## ✅ Best Practices

1. **Contrast**: Ensure text colors contrast well with backgrounds
2. **Consistency**: Keep colors consistent with your brand
3. **Testing**: Always preview changes before publishing
4. **Mobile**: Check how it looks on mobile devices
5. **Links**: Test all links after making changes
6. **Backup**: Consider backing up before major changes

---

## 🎨 Color Scheme Suggestions

### Professional Finance Theme
- Background: #1a1d29 (Dark Navy)
- Text: #aaaaaa (Light Gray)
- Links: #F58220 (Orange)
- Hover: #d46f1a (Dark Orange)

### Modern Minimal Theme
- Background: #ffffff (White)
- Text: #333333 (Dark Gray)
- Links: #0066cc (Blue)
- Hover: #004499 (Dark Blue)

### Dark Elegant Theme
- Background: #000000 (Black)
- Text: #ffffff (White)
- Links: #FFD700 (Gold)
- Hover: #FFA500 (Orange)

---

## 📞 Need Help?

If you need assistance:
1. Check WordPress documentation
2. Review this guide
3. Contact your theme developer
4. Visit WordPress support forums

---

**Last Updated**: January 2025  
**Version**: 2.1.0  
**Theme**: Ashutosh Brokerage and Securities
