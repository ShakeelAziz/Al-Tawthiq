# Setup Checklist - Altawthiq Theme

Complete each step in order for optimal theme functionality.

---

## Phase 1: Core Installation ⚙️

### Pre-Installation Setup
- [ ] Have WordPress installed and running
- [ ] Have admin access to WordPress dashboard
- [ ] All original project files available
- [ ] Read QUICK-START.md

### File Migration
- [ ] Copy `style.css` to `altawthiq-theme/css/style.css`
- [ ] Copy `main.js` to `altawthiq-theme/js/main.js`
- [ ] Copy `faq-chat-ar.js` to `altawthiq-theme/js/faq-chat-ar.js`
- [ ] Copy `faq-chat.js` to `altawthiq-theme/js/faq-chat.js`
- [ ] Copy `assets/images/` to `altawthiq-theme/assets/images/`
- [ ] Copy `assets/partners/` to `altawthiq-theme/assets/partners/`
- [ ] Copy `assets/bg/` to `altawthiq-theme/assets/bg/`

### Theme Packaging
- [ ] Create ZIP file: `altawthiq.zip` containing `altawthiq-theme/` folder
- [ ] Verify ZIP file size is reasonable (shouldn't be huge)
- [ ] ZIP file created successfully and is accessible

### WordPress Upload
- [ ] Navigate to **Appearance** → **Themes** → **Add New**
- [ ] Click **Upload Theme** button
- [ ] Select `altawthiq.zip` file
- [ ] Click **Install Now**
- [ ] Theme installed without errors
- [ ] Click **Activate** to enable theme

---

## Phase 2: Plugin Installation & Configuration 🔌

### Required Plugins
- [ ] Navigate to **Plugins** → **Add New**
- [ ] Search and install **Polylang**
  - [ ] Activate Polylang
  - [ ] Navigate to **Languages** menu (new menu appears)
- [ ] Search and install **Contact Form 7**
  - [ ] Activate Contact Form 7

### Optional Plugins (Recommended)
- [ ] Install **Yoast SEO** (for SEO optimization)
- [ ] Install **WP Super Cache** (for performance)
- [ ] Install **Wordfence Security** (for security)

### Polylang Configuration
- [ ] Go to **Languages** → **Settings**
- [ ] Set **Default Language** to **Arabic (عربي)**
- [ ] Under **Language Switcher**:
  - [ ] Check "Display language switcher in"
  - [ ] Check "Menu item" and "Widget"

### Add Languages
- [ ] Go to **Languages** → **Languages**
- [ ] Click **Add New Language**
- [ ] Add **Arabic (عربي)**
  - [ ] Select region "Saudi Arabia" (or your region)
  - [ ] Set as Default
- [ ] Click **Add New Language** again
- [ ] Add **English (English)**
  - [ ] Select region "United States"

---

## Phase 3: Page Setup & Configuration 📄

### Create Essential Pages

#### Homepage
- [ ] Go to **Pages** → **Add New**
- [ ] Title: "الرئيسية | Home"
- [ ] Leave content empty (theme uses template)
- [ ] Set **Page Template** to "Homepage"
- [ ] Publish and note the Page ID
- [ ] Go to **Settings** → **Reading**
- [ ] Under "Your homepage displays"
- [ ] Select "A static page"
- [ ] Set **Homepage** to this page
- [ ] Save changes

#### Blog/Posts Page
- [ ] Go to **Pages** → **Add New**
- [ ] Title: "المدونة | Blog"
- [ ] Leave content empty
- [ ] Set **Page Template** to "Blog Template"
- [ ] Publish and note the Page ID
- [ ] Go to **Settings** → **Reading**
- [ ] Set **Posts page** to this page
- [ ] Save changes

#### Contact Page
- [ ] Go to **Pages** → **Add New**
- [ ] Title: "تواصل معنا | Contact Us"
- [ ] Leave content empty
- [ ] Set **Page Template** to "Contact"
- [ ] Publish

#### About Page (Optional)
- [ ] Go to **Pages** → **Add New**
- [ ] Title: "عن الشركة | About Us"
- [ ] Add content about your company
- [ ] Set **Page Template** to "Default"
- [ ] Publish

### Create Sample Blog Post
- [ ] Go to **Posts** → **Add New**
- [ ] Title: "مثال على منشور | Example Post"
- [ ] Add sample content with paragraphs
- [ ] Upload **Featured Image**
- [ ] Add **Category** (if not exists, create one)
- [ ] Publish

---

## Phase 4: Branding & Customization 🎨

### Site Identity
- [ ] Go to **Appearance** → **Customize**
- [ ] Click **Site Identity**
- [ ] Upload **Site Icon** (favicon)
- [ ] Upload **Logo** (recommended: 300x100px)
- [ ] Set **Site Title** (Arabic name)
- [ ] Set **Tagline** (optional)
- [ ] Save changes

### Colors & Theme (Optional)
- [ ] Go to **Appearance** → **Customize**
- [ ] Click **Colors** (if available)
- [ ] Adjust primary color to match brand
- [ ] Save changes

### Edit CSS (if needed)
- [ ] Edit `css/style.css` in theme directory
- [ ] Find `:root` section (line 1-15)
- [ ] Modify CSS variables:
  - [ ] `--primary-color`: Your brand color
  - [ ] `--primary-dark`: Darker shade
  - [ ] `--text-dark`: Text color
- [ ] Save file via FTP or file manager

### Menu Setup
- [ ] Go to **Appearance** → **Menus**
- [ ] Create **Main Menu** (Arabic & English)
- [ ] Add pages to menu in desired order:
  - Homepage
  - About
  - Blog
  - Contact
- [ ] Set as **Display location** → "Primary Menu"
- [ ] Save

---

## Phase 5: Contact Form Setup 📧

### Configure Contact Form 7
- [ ] Go to **Contact Form 7** → **Contact Forms**
- [ ] Default form should be available
- [ ] Click **Edit** on default form
- [ ] Note the shortcode: `[contact-form-7 id="1" title="Contact Form"]`
- [ ] Copy this shortcode
- [ ] Go to **Pages** → Edit Contact page
- [ ] Paste shortcode into page content
- [ ] Publish

### Email Settings
- [ ] In Contact Form 7, click **Mail** tab
- [ ] Set **To:** field to your email: `info@yourcompany.com`
- [ ] Set **From:** to `[_site_title] <[_site_admin_email]>`
- [ ] Customize **Subject** as needed
- [ ] Save changes

### Test Form
- [ ] Visit your Contact page on frontend
- [ ] Send test message
- [ ] Check email received
- [ ] Verify form submission works

---

## Phase 6: Content Creation 📝

### Add Training/Service Content
- [ ] Go to **Posts** → **Add New**
- [ ] Create "Introduction to Training" post
- [ ] Add featured image
- [ ] Add 2-3 paragraphs of content
- [ ] Add category
- [ ] Publish and repeat for more posts

### Create About Page Content
- [ ] Go to **Pages** → Edit About page
- [ ] Add company history
- [ ] Add team information
- [ ] Add company values/mission
- [ ] Upload company logo/images
- [ ] Publish

### Add FAQ/Blog Posts
- [ ] Go to **Posts** → **Add New**
- [ ] Create FAQ entries with:
  - [ ] Clear title (question format)
  - [ ] Detailed answer in content
  - [ ] Relevant category
  - [ ] Featured image (optional)
- [ ] Publish

---

## Phase 7: Frontend Verification ✅

### Homepage Check
- [ ] Visit homepage URL
- [ ] Verify all sections display:
  - [ ] Hero section with background image
  - [ ] Investment/training section
  - [ ] Steps grid (4 items)
  - [ ] Achievements section
  - [ ] Training methods
- [ ] Check animations load (fade-in effects)
- [ ] Test language switcher (AR/EN buttons)

### Navigation Check
- [ ] Verify menu appears correctly
- [ ] Click each menu item and verify navigation
- [ ] Check logo links back to homepage
- [ ] Verify language switcher works
- [ ] Test mobile menu (on mobile device)

### Blog Check
- [ ] Visit blog page
- [ ] Verify blog posts display in grid
- [ ] Click a post to view full content
- [ ] Verify "Read More" links work
- [ ] Test search functionality
- [ ] Check category filtering (if available)

### Contact Page Check
- [ ] Visit contact page
- [ ] Verify contact form displays
- [ ] Fill out and submit form
- [ ] Check email received
- [ ] Verify contact information cards display
- [ ] Test WhatsApp button

### Footer Check
- [ ] Scroll to bottom of all pages
- [ ] Verify footer displays correctly
- [ ] Check social media links work
- [ ] Verify copyright year is current
- [ ] Test chat widget button (if applicable)

### Responsive Check
- [ ] Open on desktop (1440px)
- [ ] Test on tablet (768px)
- [ ] Test on mobile (375px)
- [ ] Verify no horizontal scroll
- [ ] Check touch targets are adequate (44px minimum)
- [ ] Verify text is readable at all sizes

### Performance Check
- [ ] Visit homepage - should load quickly
- [ ] Check Google PageSpeed Insights
- [ ] Verify images loaded
- [ ] Check animations are smooth
- [ ] Test on slow connection (throttle if possible)

---

## Phase 8: SEO & Optimization 🔍

### Basic SEO Setup
- [ ] Go to **Settings** → **General**
- [ ] Set **Site Title** to keyword-rich title
- [ ] Set **Tagline** descriptively
- [ ] Save changes

### Install SEO Plugin (Optional)
- [ ] Install **Yoast SEO** from plugins
- [ ] Activate and configure
- [ ] Set **Front Page** as homepage
- [ ] Go through initial setup wizard

### Meta Descriptions
- [ ] Go to **Pages** - edit each page
- [ ] Add meta description to each page
- [ ] Keep descriptions 150-160 characters
- [ ] Include keywords naturally

### XML Sitemap
- [ ] Verify XML sitemap created (usually `/sitemap.xml`)
- [ ] Submit to Google Search Console
- [ ] Submit to Bing Webmaster Tools

---

## Phase 9: Security & Backups 🔒

### WordPress Security
- [ ] Go to **Settings** → **General**
- [ ] Set appropriate User roles
- [ ] Disable unwanted user registrations (if not needed)
- [ ] Install **Wordfence Security** plugin
- [ ] Activate and configure firewall

### Create Backup
- [ ] Install **UpdraftPlus** or similar backup plugin
- [ ] Create full backup (files + database)
- [ ] Download backup to local machine
- [ ] Test backup restoration

### Update Everything
- [ ] Go to **Dashboard** → **Updates**
- [ ] Update WordPress core
- [ ] Update all plugins
- [ ] Update theme (if updates available)
- [ ] Verify site still works after updates

---

## Phase 10: Launch & Maintenance 🚀

### Pre-Launch Checklist
- [ ] All pages accessible and content correct
- [ ] All forms working and responding
- [ ] Images loading properly
- [ ] Mobile version responsive
- [ ] Navigation working correctly
- [ ] Contact form emails being received
- [ ] No broken links (use Link Checker plugin)
- [ ] SSL certificate installed (https://)

### Domain Setup
- [ ] Point domain DNS to WordPress hosting
- [ ] Verify domain resolves correctly
- [ ] Verify SSL works (green lock icon)
- [ ] Update **Site Address (URL)** in Settings if needed

### Go Live
- [ ] Remove maintenance mode (if enabled)
- [ ] Remove development/test content
- [ ] Verify site performs well under load
- [ ] Monitor error logs for issues

### Ongoing Maintenance
- [ ] Check updates monthly
- [ ] Monitor comments/spam
- [ ] Create backups weekly
- [ ] Update blog content regularly
- [ ] Monitor analytics
- [ ] Review broken links monthly

---

## Troubleshooting Guide 🔧

| Issue | Solution |
|-------|----------|
| Theme not activating | Check PHP version (7.4+), check error logs |
| Images missing | Verify assets copied to `/assets/` folder |
| Language switch broken | Activate Polylang, set Arabic as default |
| Styles broken | Check `css/style.css` exists and is readable |
| Contact form not working | Verify Contact Form 7 installed, form added to page |
| Chat widget missing | Verify `js/faq-chat-ar.js` and `js/faq-chat.js` exist |
| Menu not showing | Create menu, assign to Primary Menu display location |
| SSL errors | Install SSL certificate or use Let's Encrypt |

---

## Support Resources

- **Theme README**: Full documentation in `README.md`
- **Quick Start**: Fast setup guide in `QUICK-START.md`
- **Asset Migration**: File copy guide in `ASSET-MIGRATION.md`

---

## Completion Checklist

- [ ] All phases completed
- [ ] Site tested thoroughly
- [ ] Backups created
- [ ] Performance optimized
- [ ] Security configured
- [ ] Content added
- [ ] Ready for launch!

**Congratulations! Your Altawthiq theme is ready! 🎉**
