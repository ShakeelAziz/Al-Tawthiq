# Asset Migration Guide - Altawthiq Theme

This guide explains how to copy all necessary asset files from your original project to the WordPress theme.

---

## Overview

Your theme requires these files copied from the original project:

| File/Folder | Source | Destination | Purpose |
|-------------|--------|-------------|---------|
| `style.css` | `/` | `altawthiq-theme/css/` | Main stylesheet |
| `main.js` | `/` | `altawthiq-theme/js/` | Core functionality |
| `faq-chat-ar.js` | `/` | `altawthiq-theme/js/` | Arabic chatbot |
| `faq-chat.js` | `/` | `altawthiq-theme/js/` | English chatbot |
| `assets/images/` | `/assets/` | `altawthiq-theme/assets/` | Product images |
| `assets/partners/` | `/assets/` | `altawthiq-theme/assets/` | Partner logos |
| `assets/bg/` | `/assets/` | `altawthiq-theme/assets/` | Background images |

---

## Method 1: PowerShell Script (Recommended for Windows)

### Copy All Files At Once

**Step 1:** Open PowerShell as Administrator

**Step 2:** Navigate to project directory:
```powershell
cd c:\xampp\htdocs\project
```

**Step 3:** Run the following commands (copy each line separately or create a batch file):

```powershell
# Copy main stylesheet
Copy-Item "style.css" "altawthiq-theme\css\style.css" -Force

# Copy JavaScript files
Copy-Item "main.js" "altawthiq-theme\js\main.js" -Force
Copy-Item "faq-chat-ar.js" "altawthiq-theme\js\faq-chat-ar.js" -Force
Copy-Item "faq-chat.js" "altawthiq-theme\js\faq-chat.js" -Force

# Copy assets folders
Copy-Item "assets\images" "altawthiq-theme\assets\images" -Recurse -Force
Copy-Item "assets\partners" "altawthiq-theme\assets\partners" -Recurse -Force
Copy-Item "assets\bg" "altawthiq-theme\assets\bg" -Recurse -Force

# Verify all files copied
Write-Host "Verifying copies..." -ForegroundColor Green
Get-ChildItem "altawthiq-theme\css\style.css"
Get-ChildItem "altawthiq-theme\js\*.js"
Get-ChildItem "altawthiq-theme\assets\" -Recurse | Measure-Object
```

### Create a PowerShell Script File

**Step 1:** Create a new file: `copy-assets.ps1`

**Step 2:** Paste this content:

```powershell
# Altawthiq Theme - Asset Migration Script
# Run this script to copy all assets to the theme directory

$projectRoot = "c:\xampp\htdocs\project"
$themeDir = "$projectRoot\altawthiq-theme"

Write-Host "🔄 Starting asset migration..." -ForegroundColor Cyan
Write-Host "Source: $projectRoot" -ForegroundColor Gray
Write-Host "Target: $themeDir" -ForegroundColor Gray
Write-Host ""

# Copy CSS
Write-Host "📋 Copying stylesheets..." -ForegroundColor Yellow
Copy-Item "$projectRoot\style.css" "$themeDir\css\style.css" -Force
if (Test-Path "$themeDir\css\style.css") {
    Write-Host "✓ CSS copied successfully" -ForegroundColor Green
} else {
    Write-Host "✗ CSS copy failed!" -ForegroundColor Red
}

# Copy JavaScript Files
Write-Host "📜 Copying JavaScript files..." -ForegroundColor Yellow
Copy-Item "$projectRoot\main.js" "$themeDir\js\main.js" -Force
Copy-Item "$projectRoot\faq-chat-ar.js" "$themeDir\js\faq-chat-ar.js" -Force
Copy-Item "$projectRoot\faq-chat.js" "$themeDir\js\faq-chat.js" -Force
Write-Host "✓ All JavaScript files copied" -ForegroundColor Green

# Copy Asset Folders
Write-Host "🖼️  Copying asset folders..." -ForegroundColor Yellow
Copy-Item "$projectRoot\assets\images" "$themeDir\assets\images" -Recurse -Force
Copy-Item "$projectRoot\assets\partners" "$themeDir\assets\partners" -Recurse -Force
Copy-Item "$projectRoot\assets\bg" "$themeDir\assets\bg" -Recurse -Force
Write-Host "✓ All asset folders copied" -ForegroundColor Green

# Verify
Write-Host ""
Write-Host "📊 Verification Report:" -ForegroundColor Cyan
Write-Host "CSS files: $(Get-ChildItem "$themeDir\css" -Filter "*.css" | Measure-Object | Select-Object -ExpandProperty Count)"
Write-Host "JS files: $(Get-ChildItem "$themeDir\js" -Filter "*.js" | Measure-Object | Select-Object -ExpandProperty Count)"
Write-Host "Total in assets: $(Get-ChildItem "$themeDir\assets" -Recurse | Measure-Object | Select-Object -ExpandProperty Count)"

Write-Host ""
Write-Host "✅ Asset migration completed!" -ForegroundColor Green
```

**Step 3:** Run the script:
```powershell
.\copy-assets.ps1
```

---

## Method 2: Manual Copy (Windows File Explorer)

### Folder by Folder

**Step 1: Copy CSS File**
1. Open File Explorer
2. Navigate to `c:\xampp\htdocs\project\`
3. Right-click on `style.css`
4. Select **Copy**
5. Navigate to `c:\xampp\htdocs\project\altawthiq-theme\css\`
6. Right-click and **Paste**
7. If prompted, click **Replace**

**Step 2: Copy JavaScript Files**
1. Go back to `c:\xampp\htdocs\project\`
2. Select and copy these files:
   - `main.js`
   - `faq-chat-ar.js`
   - `faq-chat.js`
3. Navigate to `c:\xampp\htdocs\project\altawthiq-theme\js\`
4. Paste all files

**Step 3: Copy Image Assets**
1. Navigate to `c:\xampp\htdocs\project\assets\images\`
2. Select all images (Ctrl+A)
3. Copy (Ctrl+C)
4. Navigate to `c:\xampp\htdocs\project\altawthiq-theme\assets\images\`
5. Paste (Ctrl+V)

**Step 4: Copy Partner Logos**
1. Navigate to `c:\xampp\htdocs\project\assets\partners\`
2. Select all logos (Ctrl+A)
3. Copy (Ctrl+C)
4. Navigate to `c:\xampp\htdocs\project\altawthiq-theme\assets\partners\`
5. Paste (Ctrl+V)

**Step 5: Copy Background Images**
1. Navigate to `c:\xampp\htdocs\project\assets\bg\`
2. Select all background images (Ctrl+A)
3. Copy (Ctrl+C)
4. Navigate to `c:\xampp\htdocs\project\altawthiq-theme\assets\bg\`
5. Paste (Ctrl+V)

---

## Method 3: FTP Upload

If you're uploading directly to hosting server via FTP:

### Step 1: Connect via FTP
- Open FileZilla or similar FTP client
- Connect to your hosting server
- Navigate to `/wp-content/themes/altawthiq-theme/`

### Step 2: Upload Files
- Drag and drop from local:
  - `css/style.css`
  - `js/main.js`
  - `js/faq-chat-ar.js`
  - `js/faq-chat.js`

### Step 3: Upload Folders
- Drag and drop folders:
  - `assets/images/`
  - `assets/partners/`
  - `assets/bg/`

### Step 4: Verify Permissions
- Right-click each folder
- Select **Permissions**
- Set to `755` for directories
- Set to `644` for files

---

## Verification Checklist

After copying files, verify everything is in place:

### ✅ CSS Files
```powershell
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\css\style.css"
```
Should return `True`

### ✅ JavaScript Files
```powershell
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\js\main.js"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\js\faq-chat-ar.js"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\js\faq-chat.js"
```
All should return `True`

### ✅ Asset Folders
```powershell
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\assets\images"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\assets\partners"
Test-Path "c:\xampp\htdocs\project\altawthiq-theme\assets\bg"
```
All should return `True`

### ✅ File Count
```powershell
Get-ChildItem "c:\xampp\htdocs\project\altawthiq-theme\js" -Filter "*.js" | Measure-Object
```
Should show 3 files

### ✅ Asset Count
```powershell
Get-ChildItem "c:\xampp\htdocs\project\altawthiq-theme\assets" -Recurse | Measure-Object
```
Should show a count > 0

---

## Troubleshooting

### Issue: "Access Denied" when copying

**Solution:**
1. Close all programs using the theme files
2. Right-click PowerShell and select "Run as Administrator"
3. Try copying again

### Issue: Some files show as "in use"

**Solution:**
1. Close any open text editors viewing these files
2. Close any FTP clients
3. Restart PowerShell
4. Try again

### Issue: Files didn't copy

**Solution:**
1. Verify source files exist:
   ```powershell
   Get-ChildItem "c:\xampp\htdocs\project\style.css"
   ```
2. Verify destination folder exists:
   ```powershell
   Get-ChildItem "c:\xampp\htdocs\project\altawthiq-theme\css"
   ```
3. Check file permissions (should be 644)
4. Check disk space is available
5. Try manual copy if script fails

### Issue: WordPress says images still not showing

**Solution:**
1. Verify images copied to correct folder:
   ```powershell
   Get-ChildItem "c:\xampp\htdocs\project\altawthiq-theme\assets\images"
   ```
2. Clear WordPress cache (if using caching plugin)
3. Clear browser cache (press Ctrl+Shift+Delete)
4. Verify image file paths in CSS match actual file names
5. Check theme permissions (755 for folders, 644 for files)

---

## File Structure After Migration

After successful migration, your theme should look like:

```
altawthiq-theme/
├── css/
│   └── style.css              ✓ (from original project)
├── js/
│   ├── main.js                ✓ (from original project)
│   ├── faq-chat-ar.js         ✓ (from original project)
│   └── faq-chat.js            ✓ (from original project)
├── assets/
│   ├── images/                ✓ (from original project)
│   │   ├── logo.webp
│   │   ├── feature1.webp
│   │   └── ...
│   ├── partners/              ✓ (from original project)
│   │   ├── partner1.webp
│   │   └── ...
│   └── bg/                    ✓ (from original project)
│       ├── bg1.webp
│       └── ...
├── style.css                  (WordPress theme header)
├── functions.php              (WordPress hooks)
├── header.php                 (Navigation)
├── footer.php                 (Footer)
├── index.php                  (Homepage)
├── page.php                   (Default page)
├── page-contact.php           (Contact page)
├── page-blog.php              (Blog page)
├── single.php                 (Single post)
├── and more...                (all theme files)
```

---

## Next Steps

After migration:

1. **Create ZIP file** of theme directory
2. **Upload to WordPress** via Dashboard → Appearance → Themes → Add New → Upload
3. **Activate theme**
4. **Verify all assets** load correctly on frontend
5. **Test all pages** to ensure images and styles display

See **SETUP-CHECKLIST.md** for next steps.

---

## Support

- **Asset files not copying?** Check file permissions and disk space
- **Images still broken?** Clear WordPress cache and verify file paths
- **Need more help?** See README.md for full documentation

---

**Asset migration completed! ✅**
