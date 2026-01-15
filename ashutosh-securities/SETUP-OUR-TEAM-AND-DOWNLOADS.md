# Our Team & Downloads Pages Setup Guide

## Overview
Two new fully responsive pages have been added to your Ashutosh Brokerage and Securities WordPress theme:
1. **Our Team** - Display team members with complete backend control
2. **Downloads** - Manage and display downloadable files with categories

---

## 🎯 Our Team Page Setup

### Step 1: Create the Our Team Page
1. Go to **WordPress Admin** > **Pages** > **Add New**
2. Enter page title: **"Our Team"**
3. In the **Page Attributes** section (right sidebar), select **Template: Our Team**
4. Click **Publish**

### Step 2: Add Team Members
1. In WordPress Admin, you'll see a new menu item: **Team Members**
2. Click **Team Members** > **Add New Member**
3. Fill in the following:
   - **Title**: Team member's full name (e.g., "John Doe")
   - **Content Editor**: Team member's bio/description
   - **Featured Image**: Upload team member's photo (recommended size: 400x400px or larger)
   
4. Scroll down to **Team Member Details** meta box and fill in:
   - **Position/Title**: e.g., "Chief Executive Officer"
   - **Email**: Contact email
   - **Phone**: Contact phone number
   - **Social Media Links** (optional):
     - Facebook URL
     - LinkedIn URL
     - Twitter URL

5. Click **Publish**

### Step 3: Organize Team Members
- To change the order of team members, edit each member and set the **Order** field in Page Attributes
- Lower numbers appear first (e.g., Order 1 appears before Order 2)

### Step 4: Customize Page Header (Optional)
1. Go to **Appearance** > **Customize**
2. Add a new section or use existing customizer to add:
   - `team_page_title` - Default: "Our Team"
   - `team_page_description` - Default: "Meet the dedicated professionals..."

---

## 📥 Downloads Page Setup

### Step 1: Create the Downloads Page
1. Go to **WordPress Admin** > **Pages** > **Add New**
2. Enter page title: **"Downloads"**
3. In the **Page Attributes** section, select **Template: Downloads**
4. Click **Publish**

### Step 2: Create Download Categories (Optional but Recommended)
1. In WordPress Admin, go to **Downloads** > **Categories**
2. Add categories such as:
   - Annual Reports
   - Forms & Applications
   - Policies & Guidelines
   - Brochures
   - Price Lists
3. Click **Add New Category**

### Step 3: Add Downloadable Files
1. Click **Downloads** > **Add New Download**
2. Fill in the following:
   - **Title**: File name/description (e.g., "Annual Report 2024")
   - **Content Editor**: Brief description of the file
   - **Featured Image** (optional): Upload a preview image or icon

3. Scroll down to **File Upload & Details** meta box:
   - Click **Upload File** button
   - Select your file (PDF, JPG, PNG, DOC, DOCX, XLS, XLSX, ZIP)
   - File size and type will be auto-detected
   - You can manually override file size and type if needed

4. On the right sidebar, select **Download Categories** that apply

5. Click **Publish**

### Step 4: Customize Page Header (Optional)
1. Go to **Appearance** > **Customize**
2. Add customizer settings for:
   - `downloads_page_title` - Default: "Downloads"
   - `downloads_page_description` - Default: "Access important documents..."

---

## 📊 Features & Functionality

### Our Team Page Features:
✅ Fully responsive grid layout (1-3 columns depending on screen size)
✅ Team member photos with hover effects
✅ Position/title with accent color
✅ Bio/description text
✅ Contact information (email & phone with icons)
✅ Social media links (Facebook, LinkedIn, Twitter)
✅ Smooth scroll animations
✅ Professional card design matching theme style

### Downloads Page Features:
✅ Fully responsive grid layout
✅ Category filtering (All Files + custom categories)
✅ Live search functionality
✅ File type icons (PDF, DOC, XLS, ZIP, etc.)
✅ File size display
✅ Download counter (tracks number of downloads)
✅ Category badges
✅ Preview thumbnails (if featured image is set)
✅ One-click download with tracking
✅ Smooth animations and hover effects

---

## 🎨 Design & Responsive Behavior

### Desktop (1200px+)
- Team: 3 columns
- Downloads: 3-4 columns depending on content

### Tablet (768px - 1199px)
- Team: 2 columns
- Downloads: 2-3 columns

### Mobile (< 768px)
- Team: 1 column (full width cards)
- Downloads: 1 column (full width cards)
- Optimized touch targets
- Stacked layouts for better readability

---

## 🔧 Technical Details

### Custom Post Types Created:
1. **team_member** - For team member profiles
2. **download_item** - For downloadable files

### Custom Taxonomy:
- **download_category** - For categorizing downloads

### Meta Fields:

**Team Members:**
- `_team_position` - Job title
- `_team_email` - Email address
- `_team_phone` - Phone number
- `_team_facebook` - Facebook URL
- `_team_linkedin` - LinkedIn URL
- `_team_twitter` - Twitter URL

**Downloads:**
- `_download_file_url` - File URL
- `_download_file_size` - File size (e.g., "2.5 MB")
- `_download_file_type` - File type (e.g., "PDF Document")
- `_download_count` - Number of downloads (auto-incremented)

---

## 📋 Content Recommendations

### Team Member Photos:
- **Optimal Size**: 400x400px to 800x800px
- **Format**: JPG or PNG
- **Style**: Professional headshots or team photos
- **Background**: Clean, consistent backgrounds work best
- **File Size**: Keep under 200KB for optimal loading

### Download Files:
- **Supported Formats**: PDF, JPG, PNG, DOC, DOCX, XLS, XLSX, ZIP
- **File Naming**: Use descriptive names (e.g., "annual-report-2024.pdf")
- **File Size**: Be mindful of large files (consider compressing if > 10MB)
- **Organization**: Use categories to keep files organized

### Download Descriptions:
- Keep descriptions concise (2-3 sentences)
- Include relevant keywords for search
- Mention what the file contains
- Add dates if relevant (e.g., "Updated January 2025")

---

## 🚀 Usage Tips

### For Team Members:
1. **Add new hires immediately** - Keep your team page current
2. **Use consistent photo styles** - Same background/lighting for professional look
3. **Keep bios concise** - 2-3 paragraphs maximum
4. **Update positions** - When team members get promoted
5. **Add social links** - Helps with networking and credibility

### For Downloads:
1. **Use categories wisely** - Makes it easy for visitors to find files
2. **Update regularly** - Remove outdated files, add new ones
3. **Use descriptive titles** - "Q4 2024 Financial Report" vs "Report.pdf"
4. **Add thumbnails** - Makes the page more visually appealing
5. **Monitor download stats** - See which files are most popular

---

## 🎭 Customization Options

### Styling:
Both pages use the theme's existing color scheme automatically:
- Primary orange color (`--primary-orange`)
- Text colors (`--text-dark`, `--text-gray`)
- Background colors (`--bg-light-gray`)
- Hover effects matching the home page

### Advanced Customization:
If you want to customize the appearance further:
1. Edit `/page-our-team.php` for Team page
2. Edit `/page-downloads.php` for Downloads page
3. Look for the `<style>` section in each file
4. Modify CSS as needed (colors, spacing, layout, etc.)

---

## 📱 Mobile Optimization

Both pages are fully optimized for mobile devices:
- Touch-friendly buttons (minimum 44px tap target)
- Responsive images (automatically resized)
- Readable font sizes (minimum 16px)
- Proper spacing for easy navigation
- Fast loading times with optimized assets

---

## ✅ Testing Checklist

After setup, verify the following:

**Our Team Page:**
- [ ] Page displays correctly on desktop
- [ ] Page displays correctly on mobile
- [ ] All team member photos load
- [ ] Email links work (open email client)
- [ ] Phone links work (on mobile)
- [ ] Social media links open in new tab
- [ ] Animations trigger on scroll

**Downloads Page:**
- [ ] Page displays correctly on desktop
- [ ] Page displays correctly on mobile
- [ ] Category filter works
- [ ] Search function works
- [ ] Download buttons trigger file download
- [ ] Download counter increments
- [ ] File icons display correctly
- [ ] "No results" message appears when no matches

---

## 🐛 Troubleshooting

### Team member photos not displaying:
- Check if Featured Image is set
- Verify image file is not corrupted
- Ensure image file size is reasonable (< 2MB)

### Download button not working:
- Verify file was uploaded correctly
- Check if file URL field has a value
- Ensure file still exists in media library

### Categories not showing:
- Make sure at least one download has that category assigned
- Verify category has at least one published download

### Search not working:
- Clear browser cache
- Check if JavaScript is enabled
- Verify no JavaScript errors in browser console

---

## 🔄 Updates & Maintenance

### Regular Tasks:
1. **Monthly**: Review and update team member information
2. **Quarterly**: Clean up old/outdated downloads
3. **Annually**: Update team photos if needed
4. **As needed**: Add new downloads, team members

### Backup Recommendations:
- Always backup your site before major changes
- Keep copies of important files outside WordPress
- Test download links after WordPress updates

---

## 💡 Pro Tips

1. **SEO Optimization**: 
   - Use descriptive page titles
   - Add meta descriptions via SEO plugins
   - Use alt text for team member images

2. **Performance**:
   - Compress images before uploading
   - Use lazy loading (built into WordPress 5.5+)
   - Consider using a CDN for large files

3. **User Experience**:
   - Add a "Meet Our Team" link in your main menu
   - Add "Downloads" link to footer menu
   - Consider adding team members to About Us page

4. **Analytics**:
   - Track page views in Google Analytics
   - Monitor which downloads are most popular
   - Use data to improve content

---

## 📞 Support

For additional help:
1. Check WordPress.org documentation
2. Review theme documentation
3. Contact theme support
4. Post in WordPress forums

---

**Version**: 1.0.0  
**Last Updated**: January 2025  
**Compatibility**: WordPress 5.0+  
**Theme**: Ashutosh Brokerage and Securities v2.2.0+
