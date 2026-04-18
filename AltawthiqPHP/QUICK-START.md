# Quick Start Guide - Altawthiq Theme

## ⏱️ 5-Minute Setup

### 1. Copy Files (2 minutes)
```powershell
# Run in PowerShell from project root
Copy-Item "style.css" "altawthiq-theme\css\"
Copy-Item "*.js" "altawthiq-theme\js\" -Force
Copy-Item "assets\*" "altawthiq-theme\assets\" -Recurse -Force
```

### 2. Create ZIP (1 minute)
- Right-click `altawthiq-theme` folder
- Select "Send to" → "Compressed (zipped) folder"
- Rename to `altawthiq.zip`

### 3. Upload to WordPress (2 minutes)
1. Go to **Appearance** → **Themes** → **Add New**
2. Click **Upload Theme**
3. Select `altawthiq.zip`
4. Click **Install Now** → **Activate**

---

## ✅ First Time Configuration

### Step 1: Install Plugins
```
Appearance → Plugins → Add New
Search and install:
- Polylang
- Contact Form 7
```

### Step 2: Set Languages (Polylang)
```
Languages → Add New Language
✓ Add Arabic (عربي) - Set as DEFAULT
✓ Add English (English)
```

### Step 3: Create Pages
```
Pages → Add New
- Homepage (set in Settings → Reading)
- Blog (set in Settings → Reading)
- Contact (use Page Template: Contact)
- About (optional)
```

### Step 4: Upload Logo
```
Appearance → Customize → Site Identity
✓ Upload logo (recommended size: 300x100px)
✓ Set site title & tagline
```

### Step 5: Configure Theme Colors
```
css/style.css (line 1-10)
Change --primary-color to your brand color
```

---

## 🔗 Key Pages

| Page | Purpose | Template |
|------|---------|----------|
| Home | Main landing page | `index.php` |
| Blog | Blog listing | `page-blog.php` |
| Contact | Contact form | `page-contact.php` |
| About | Company info | `page.php` |
| Post | Single article | `single.php` |
| 404 | Error page | `404.php` |

---

## 🌐 Language Switching

The theme automatically sets **Arabic as the default**.

To switch languages:
1. Look for language switcher in header (AR / EN buttons)
2. Click to view content in different language
3. Polylang handles all translations

---

## 🐛 Quick Troubleshooting

**Q: Images not showing?**  
A: Ensure all files copied to `altawthiq-theme/assets/`

**Q: Styles look broken?**  
A: Check `css/style.css` exists in `altawthiq-theme/css/`

**Q: Language switch not working?**  
A: Verify Polylang installed and Arabic set as default

**Q: Chat widget missing?**  
A: Check `js/faq-chat-ar.js` and `js/faq-chat.js` copied

---

## 📂 File Checklist

After setup, verify these files exist:

```
✓ altawthiq-theme/css/style.css
✓ altawthiq-theme/js/main.js
✓ altawthiq-theme/js/faq-chat-ar.js
✓ altawthiq-theme/js/faq-chat.js
✓ altawthiq-theme/assets/images/
✓ altawthiq-theme/assets/partners/
✓ altawthiq-theme/assets/bg/
```

---

## 🚀 Next Steps

1. **Add content** to your pages
2. **Create blog posts** with images
3. **Customize footer** social links
4. **Set contact form** email recipient
5. **Enable comments** on posts (if desired)

---

## 📞 Support Resources

- **Full Documentation**: See `README.md`
- **Setup Checklist**: See `SETUP-CHECKLIST.md`
- **Asset Migration**: See `ASSET-MIGRATION.md`

---

**You're ready to go! 🎉**
