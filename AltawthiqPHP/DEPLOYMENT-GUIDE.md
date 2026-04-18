# Deployment Guide - Uploading Theme to WordPress

This guide explains how to package and upload your Altawthiq theme to a WordPress installation.

---

## Pre-Deployment Checklist

Before uploading, verify all files are in place:

```powershell
# Check all required files exist
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\style.css"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\functions.php"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\header.php"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\footer.php"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\index.php"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\page.php"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\page-contact.php"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\page-blog.php"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\single.php"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\404.php"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\css\style.css"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\js\main.js"
```

All should return `True`.

---

## Option 1: Local XAMPP Installation

### Test the theme locally before uploading

#### Step 1: Verify Local WordPress
```
1. Start XAMPP services (Apache + MySQL)
2. Navigate to http://localhost/wordpress (or your path)
3. Login to WordPress Dashboard
```

#### Step 2: Copy Theme to WordPress
```powershell
# Copy entire theme to wp-content/themes
Copy-Item "c:\xampp\htdocs\project\altawthiq-theme" `
          "c:\xampp\htdocs\wordpress\wp-content\themes\altawthiq" -Recurse -Force
```

#### Step 3: Activate in Dashboard
```
1. Go to Appearance → Themes
2. Look for "Altawthiq" theme
3. Click "Activate"
```

#### Step 4: Test
```
1. Visit homepage - verify hero section displays
2. Check all pages load correctly
3. Test language switcher
4. Verify images display
5. Test contact form
6. Check mobile responsiveness
```

---

## Option 2: Create ZIP for Distribution

### Package theme for upload or distribution

#### Step 1: Create ZIP File (PowerShell)
```powershell
# Navigate to parent directory
cd "c:\xampp\htdocs\project"

# Create compressed file
Compress-Archive -Path "altawthiq-theme" -DestinationPath "altawthiq.zip" -Force

# Verify ZIP created
Get-Item "altawthiq.zip"
```

#### Step 2: Create ZIP File (Windows GUI)
```
1. Open File Explorer
2. Navigate to c:\xampp\htdocs\project\
3. Right-click "altawthiq-theme" folder
4. Select "Send to" → "Compressed (zipped) folder"
5. Rename created file to "altawthiq.zip"
```

#### Step 3: Verify ZIP Contents
```powershell
# List ZIP contents
Expand-Archive "altawthiq.zip" -DestinationPath "temp-verify" -Force
Get-ChildItem "temp-verify\altawthiq-theme" -Recurse
Remove-Item "temp-verify" -Recurse
```

---

## Option 3: Upload to WordPress.com or Hosted WordPress

### Upload via WordPress Dashboard

#### Step 1: Package Theme
- Follow "Create ZIP for Distribution" steps above
- Ensure ZIP file is less than 2GB

#### Step 2: Upload via Dashboard
```
1. Log into WordPress Dashboard
2. Go to Appearance → Themes → Add New
3. Click "Upload Theme" button
4. Select "altawthiq.zip" file
5. Click "Install Now"
6. Wait for upload to complete
7. Click "Activate" to enable theme
```

**Result**: Theme installed and activated!

---

## Option 4: Upload via FTP

### For hosting providers with FTP access

#### Step 1: Get FTP Credentials
- Contact hosting provider for:
  - FTP Host (e.g., ftp.yourdomain.com)
  - FTP Username
  - FTP Password
  - FTP Port (usually 21)

#### Step 2: Connect via FTP Client
Download and install one of:
- **FileZilla** (free) - https://filezilla-project.org/
- **WinSCP** (free) - https://winscp.net/
- Or use Windows Explorer with FTP built-in

**Using FileZilla:**
```
1. File → Site Manager → New Site
2. Protocol: FTP
3. Host: ftp.yourdomain.com
4. User: your_username
5. Password: your_password
6. Port: 21
7. Click "Connect"
```

#### Step 3: Navigate to Theme Directory
```
1. In FTP client, navigate to: /public_html/wp-content/themes/
2. Right-click in folder list
3. Create new folder: altawthiq
```

#### Step 4: Upload Theme Files
```
1. Local Side (left): Select theme directory
   c:\xampp\htdocs\project\altawthiq-theme\
2. Remote Side (right): Ensure in /wp-content/themes/altawthiq/
3. Right-click local folder
4. Select "Upload"
5. Wait for all files to transfer
6. Check for errors in transfer log
```

#### Step 5: Set Permissions
```
1. Right-click each folder on remote server
2. Select "File attributes" or "Properties"
3. Set permissions:
   - Directories:   755
   - Files:         644
4. Apply to all files
```

#### Step 6: Activate via Dashboard
```
1. Log into WordPress Dashboard
2. Go to Appearance → Themes
3. Find "Altawthiq"
4. Click "Activate"
```

---

## Option 5: Upload via SFTP (Secure)

### More secure method if FTP is unavailable

#### Step 1: Get SFTP Credentials
- Some hosts provide SFTP instead of FTP
- Get credentials from hosting provider

#### Step 2: Use FileZilla with SFTP
```
1. File → Site Manager → New Site
2. Protocol: SFTP (SSH File Transfer Protocol)
3. Host: sftp.yourdomain.com (or same as above)
4. User: your_username
5. Password: your_password
6. Port: 22 (standard for SFTP)
7. Click "Connect"
```

#### Step 3: Upload (Same as FTP)
- Navigate to `/wp-content/themes/`
- Upload `altawthiq-theme/` folder
- Set permissions (755 for dirs, 644 for files)

---

## Post-Deployment Verification

### After uploading and activating theme:

#### Initial Setup
```
✓ Theme appears in Appearance → Themes
✓ Theme activates without errors
✓ No white screen of death
✓ Homepage displays without errors
```

#### Functionality Check
```
✓ Hero section visible with background image
✓ All sections display (investment, steps, achievements)
✓ Images load correctly
✓ Styles apply correctly (not looking broken)
✓ Fonts display (Arabic text visible)
✓ Language switcher appears (AR/EN buttons)
```

#### Navigation Test
```
✓ Menu items clickable
✓ Links navigate to correct pages
✓ Logo links to homepage
✓ Footer displays correctly
✓ Social links work
```

#### Responsive Test
```
✓ Desktop view (1440px): All sections aligned
✓ Tablet view (768px): Elements stack properly
✓ Mobile view (375px): Touch-friendly layout
✓ No horizontal scrolling
✓ Text readable at all sizes
```

#### Performance Check
```
✓ Page loads within 3 seconds
✓ Images display without delay
✓ Animations run smoothly
✓ No console errors (check browser dev tools)
✓ No performance warnings
```

---

## Troubleshooting Deployment Issues

### Issue: "Fatal error" when uploading

**Solution:**
1. Check PHP version on server (need 7.4+)
2. Check PHP error log for specific error
3. Verify all files uploaded (check file count)
4. Try activating one plugin at a time
5. Temporarily increase PHP memory limit

### Issue: Styles not loading after upload

**Solution:**
1. Clear WordPress cache (if using caching plugin)
2. Clear browser cache (Ctrl+Shift+Delete)
3. Verify css/style.css uploaded correctly
4. Check CSS file permissions (644)
5. Check CSS file path in browser dev tools (F12)

### Issue: Images broken after upload

**Solution:**
1. Verify assets/ folder uploaded completely
2. Check image file permissions (644)
3. Verify image paths in CSS use correct URL structure
4. Use get_template_directory_uri() for paths
5. Clear browser cache
6. Verify image file formats supported (webp, png, gif)

### Issue: JavaScript not working (chat widget, etc.)

**Solution:**
1. Verify js/ folder uploaded with all .js files
2. Check JavaScript file permissions (644)
3. Verify script paths in functions.php use get_template_directory_uri()
4. Check browser console for errors (F12)
5. Verify jQuery is loaded before custom scripts

### Issue: Contact form not working

**Solution:**
1. Verify Contact Form 7 plugin installed
2. Check form ID matches shortcode
3. Verify form email settings configured
4. Test form submission and check for errors
5. Check spam folder for test emails

### Issue: Language switcher not working

**Solution:**
1. Verify Polylang plugin installed and activated
2. Check Languages → Languages has Arabic and English
3. Verify Arabic set as default language
4. Create language-specific pages
5. Check language switcher appears in header

---

## Update & Maintenance

### Future Updates to Theme

#### Method 1: Online Update
```
1. Modify files locally
2. Create new altawthiq.zip with changes
3. Go to Appearance → Themes
4. Click Theme Details → (might have delete button)
5. Delete old version
6. Upload new altawthiq.zip
7. Activate theme
8. Test thoroughly
```

#### Method 2: Direct FTP Update
```
1. Modify files locally
2. Connect via FTP
3. Navigate to /wp-content/themes/altawthiq/
4. Update individual files that changed
5. Set permissions (644 for files, 755 for dirs)
6. Test changes on live site
```

#### Method 3: Child Theme (Advanced)
```
1. Create child theme directory: altawthiq-child/
2. Create only modified files in child theme
3. Upload child theme separately
4. Activate child theme instead
5. Original theme updates don't affect customizations
```

---

## Backup Before Deployment

### Create backup before uploading

```powershell
# Backup local theme
$timestamp = Get-Date -Format "yyyy-MM-dd_HHmmss"
Compress-Archive -Path "altawthiq-theme" `
                 -DestinationPath "altawthiq-backup_$timestamp.zip" -Force

Write-Host "Backup created: altawthiq-backup_$timestamp.zip"
```

### Create WordPress backup

If deploying to existing WordPress:
```
1. Use UpdraftPlus plugin: Create full backup
2. Download backup files to local machine
3. Store safely (multiple locations)
4. Verify backup can be restored
```

---

## Production Deployment Checklist

Before going live:

- [ ] Theme tested locally
- [ ] All files copied to correct locations
- [ ] Permissions set correctly (755 dirs, 644 files)
- [ ] CSS and JS files loading (check with F12)
- [ ] Images displaying correctly
- [ ] Links and navigation working
- [ ] Contact form functioning
- [ ] Language switcher working
- [ ] Mobile responsive verified
- [ ] Performance acceptable
- [ ] No console errors
- [ ] Backup created and verified
- [ ] All content added/migrated
- [ ] Settings configured (colors, logo, etc.)
- [ ] Plugins updated and compatible
- [ ] SSL certificate installed
- [ ] Caching configured
- [ ] CDN setup (optional, for performance)

---

## Rollback Plan

If something goes wrong:

```
1. Keep backup of working theme
2. Keep backup of database
3. Have previous theme version available
4. Keep FTP login credentials handy
5. Document all settings and customizations
6. Have support contact info available
```

**Quick Rollback:**
```
1. Delete broken altawthiq theme folder via FTP
2. Upload backup version
3. Activate backup theme via Dashboard
4. Restore database if needed
5. Investigate error in debug log
```

---

## Support Resources

- **Full Theme Guide**: README.md
- **Setup Instructions**: SETUP-CHECKLIST.md
- **Asset Migration**: ASSET-MIGRATION.md
- **Quick Start**: QUICK-START.md
- **Theme Structure**: THEME-STRUCTURE.md

---

**Deployment complete! Your theme is live! 🚀**
