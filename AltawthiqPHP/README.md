# Altawthiq Theme - WordPress Theme

## 🌟 Overview

**Altawthiq** is a modern, professional WordPress theme designed for training and consulting companies. The theme is **Arabic-first** with full bilingual support (Arabic & English), featuring stunning animations, responsive design, and comprehensive WordPress integration.

### Key Features:
✅ Arabic-first language (with English fallback)  
✅ Fully responsive design  
✅ Smooth animations with AOS (Animate On Scroll)  
✅ Polylang support for bilingual content  
✅ Clean, professional typography  
✅ Social media integration  
✅ WhatsApp integration  
✅ Blog functionality  
✅ Contact form support (Contact Form 7 compatible)  
✅ SEO optimized  
✅ Dark mode ready  

---

## 📋 Theme Structure

```
altawthiq-theme/
├── style.css              # Theme header & main styles
├── functions.php          # WordPress hooks & functionality
├── header.php             # Navigation & header template
├── footer.php             # Footer template
├── index.php              # Homepage template
├── page.php               # Default page template
├── page-contact.php       # Contact page template
├── page-blog.php          # Blog listing template
├── single.php             # Single post template
├── 404.php                # 404 error page template
├── css/
│   └── style.css          # Main stylesheet (copy from original)
├── js/
│   ├── main.js            # Main scripts (copy from original)
│   ├── faq-chat-ar.js     # Arabic chatbot (copy from original)
│   └── faq-chat.js        # English chatbot (copy from original)
└── assets/
    ├── images/            # Theme images
    ├── partners/          # Partner logos
    └── bg/                # Background images
```

---

## 🚀 Installation Guide

### Step 1: File Structure Setup
Copy required files from your original project to the theme:

```powershell
# Copy main stylesheet
Copy-Item "c:\xampp\htdocs\project\style.css" "c:\xampp\htdocs\project\altawthiq-theme\css\style.css"

# Copy JavaScript files
Copy-Item "c:\xampp\htdocs\project\main.js" "c:\xampp\htdocs\project\altawthiq-theme\js\"
Copy-Item "c:\xampp\htdocs\project\faq-chat-ar.js" "c:\xampp\htdocs\project\altawthiq-theme\js\"
Copy-Item "c:\xampp\htdocs\project\faq-chat.js" "c:\xampp\htdocs\project\altawthiq-theme\js\"

# Copy all assets (images, fonts, backgrounds)
Copy-Item "c:\xampp\htdocs\project\assets\*" "c:\xampp\htdocs\project\altawthiq-theme\assets\" -Recurse -Force
```

### Step 2: Create WordPress Theme ZIP

1. Navigate to the parent directory of `altawthiq-theme/`
2. Right-click on `altawthiq-theme/` folder
3. Send to → Compressed (zipped) folder
4. Rename to `altawthiq.zip`

### Step 3: Upload to WordPress

**Method A: Dashboard Upload**
1. Go to WordPress Dashboard
2. Navigate to **Appearance** → **Themes**
3. Click **Add New** → **Upload Theme**
4. Select `altawthiq.zip`
5. Click **Install Now**
6. Click **Activate**

**Method B: FTP Upload**
1. Extract `altawthiq.zip`
2. Upload `altawthiq-theme/` folder to `/wp-content/themes/` via FTP
3. Go to WordPress Dashboard → **Appearance** → **Themes**
4. Find "Altawthiq" and click **Activate**

---

## ⚙️ Configuration

### 1. Install Required Plugins

The theme works best with these plugins installed:

- **Polylang** - For bilingual support (Arabic & English)
- **Contact Form 7** - For contact forms
- **Yoast SEO** - For SEO optimization

### 2. Configure Polylang

1. Install and activate Polylang
2. Go to **Languages** → **Add New Language**
3. Add **Arabic (العربية)** and **English**
4. Set **Arabic as the default language**
5. Create language-specific pages (Homepage, Contact, Blog, etc.)

### 3. Create Pages

Create these pages in WordPress, then assign them in Settings:

- **Homepage** (set as Static Page in Settings → Reading)
- **Blog** (set as Posts Page in Settings → Reading)
- **Contact** (use the Contact page template)
- **About Us** (optional - use default page template)

### 4. Customize Logo & Branding

1. Go to **Appearance** → **Customize**
2. Click **Site Identity**
3. Upload your logo
4. Set site title, tagline, and favicon

### 5. Configure Theme Colors

Edit `css/style.css` to customize primary colors:

```css
:root {
    --primary-color: #667eea;        /* Main brand color */
    --primary-dark: #5568d3;         /* Darker shade */
    --primary-light: #f0f4ff;        /* Light shade */
    --text-dark: #1a1a1a;
    --text-muted: #666666;
    --gray-100: #f8f9fa;
    --gray-200: #e9ecef;
}
```

---

## 🌐 Language Support

### How Bilingual Strings Work

All text in templates uses bilingual format:
```php
<?php _e('النص بالعربية | English Text', 'altawthiq'); ?>
```

- **First part**: Arabic text (displayed by default)
- **Second part**: English text (displayed when language is switched to English)
- **Third parameter**: Text domain (`'altawthiq'`)

### Language Switching

The header includes a language switcher that:
- Shows current language in the navigation
- Allows switching between Arabic and English
- Sets Arabic as the default language
- Works seamlessly with Polylang

---

## 📱 Responsive Design

The theme is fully responsive and tested on:
- Desktop (1440px and above)
- Tablet (768px - 1023px)
- Mobile (below 768px)

Breakpoints are defined in the CSS:
```css
@media (max-width: 768px) {
    /* Mobile styles */
}

@media (max-width: 1024px) {
    /* Tablet styles */
}
```

---

## ✨ Features & Components

### 1. Hero Section
- Full-width background image
- Call-to-action buttons
- Smooth fade-in animations

### 2. Service Sections
- Investment training section
- Steps/process grid (4 columns)
- Achievements/statistics grid
- Training methods showcase

### 3. Blog Functionality
- Blog listing page with search
- Individual post pages with comments
- Related posts section
- Category filtering
- Author information
- Read time estimate

### 4. Contact Page
- Contact form (Contact Form 7 compatible)
- Business information cards
- Social media links
- WhatsApp integration
- Working hours display

### 5. Chat Widget
- Integrated chatbot system
- Language-specific versions (Arabic/English)
- Smooth animations and interactions

### 6. 404 Error Page
- Branded error template
- Suggested links
- Search functionality

---

## 🎨 Customization

### Changing Colors

Open `css/style.css` and modify CSS variables:

```css
:root {
    --primary-color: #your-color;
    --primary-dark: #darker-shade;
    --primary-light: #lighter-shade;
}
```

### Adding Custom Fonts

Add Google Fonts to `functions.php`:

```php
wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=YourFont&display=swap');
```

### Modifying Templates

All templates are in the theme root directory (`.php` files):
- `header.php` - Top navigation
- `footer.php` - Footer content
- `index.php` - Homepage
- `page.php` - Single pages
- `single.php` - Blog posts
- `page-blog.php` - Blog listing

### Adding Custom CSS

1. Edit `css/style.css` directly, or
2. Go to Dashboard → **Appearance** → **Customize** → **Additional CSS**

---

## 🔧 Troubleshooting

### Images Not Showing
- Ensure all asset files are copied to `assets/` folder
- Check file paths use correct WordPress URLs: `<?php echo esc_url(get_template_directory_uri()); ?>`

### Languages Not Switching
- Verify Polylang is installed and activated
- Check that both Arabic and English languages are added in Polylang settings
- Ensure Arabic is set as default language

### Styles Not Loading
- Check that `css/style.css` is copied correctly
- Verify file permissions (644 for files, 755 for directories)
- Clear WordPress cache if using a caching plugin

### Chat Widget Not Working
- Ensure `faq-chat-ar.js` and `faq-chat.js` are in `js/` folder
- Check browser console for JavaScript errors
- Verify chat widget HTML IDs match the JavaScript

---

## 📝 License

This theme is provided as-is for use with the Altawthiq project.

---

## 🤝 Support

For issues or questions regarding:
- **Theme Setup**: Check the SETUP-CHECKLIST.md
- **Asset Migration**: See ASSET-MIGRATION.md
- **Quick Start**: Review QUICK-START.txt

---

## 📊 Theme Information

- **Theme Name**: Altawthiq
- **Version**: 1.0.0
- **Description**: Professional training and consulting WordPress theme
- **Primary Language**: Arabic (العربية)
- **Secondary Language**: English
- **Compatibility**: WordPress 5.0+
- **PHP Version**: 7.4+

---

**Happy building! 🚀**
