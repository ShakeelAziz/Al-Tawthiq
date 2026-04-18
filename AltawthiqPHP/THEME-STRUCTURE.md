<?php
/**
 * Theme Template File Structure & Documentation
 * 
 * This file documents the WordPress theme structure and key points
 * for developers working with Altawthiq theme
 */

// =====================================================
// THEME TEMPLATES OVERVIEW
// =====================================================

/**
 * CORE TEMPLATES (WordPress Page Templates)
 * 
 * index.php          - Main/Homepage template
 *                    - Displays hero section with background image
 *                    - Shows investment training section
 *                    - Displays steps grid (4 columns)
 *                    - Shows achievements statistics
 *                    - Displays training methods
 * 
 * page.php           - Default page template (generic pages)
 *                    - Simple page content display
 *                    - Good for About, Services, etc.
 *                    - Uses default page layout
 * 
 * single.php         - Single blog post template
 *                    - Full blog post with comments
 *                    - Post metadata (date, author, category)
 *                    - Author biography section
 *                    - Related posts section
 *                    - Post navigation (previous/next)
 * 
 * 404.php            - Error page (page not found)
 *                    - Branded 404 error page
 *                    - Search functionality
 *                    - Links to important pages
 *                    - Suggestion links
 */

// =====================================================
// CUSTOM PAGE TEMPLATES (Using Page Template assignment)
// =====================================================

/**
 * page-blog.php      - Blog listing page template
 *                    - Displays all blog posts in grid
 *                    - Search functionality
 *                    - Pagination support
 *                    - Category filtering
 *                    - Post excerpts and metadata
 *                    - Assign to page via dropdown in admin
 * 
 * page-contact.php   - Contact page template
 *                    - Contact form (Contact Form 7)
 *                    - Business information cards
 *                    - Social media links
 *                    - WhatsApp integration
 *                    - Google Maps embed support
 *                    - Office hours display
 *                    - Assign to page via dropdown in admin
 */

// =====================================================
// TEMPLATE STRUCTURE FILES
// =====================================================

/**
 * header.php         - Header & Navigation
 *                    - Logo handling
 *                    - Primary navigation menu
 *                    - Language switcher (AR/EN with Polylang)
 *                    - HTML head opening
 *                    - wp_head() hook
 *                    - Gets included in all templates via get_header()
 * 
 * footer.php         - Footer content
 *                    - Footer grid (4 columns)
 *                    - Social media links
 *                    - Chat widget attachment point
 *                    - Copyright information
 *                    - Gets included in all templates via get_footer()
 * 
 * functions.php      - Theme setup & WordPress hooks
 *                    - Theme setup (support, menus, sizes)
 *                    - Script/style enqueuing
 *                    - Polylang configuration
 *                    - Theme constants
 *                    - Custom theme functions
 * 
 * style.css          - WordPress theme header & imports
 *                    - Imports main stylesheet from css/style.css
 *                    - Theme metadata (name, version, etc.)
 *                    - Don't edit directly - edit css/style.css instead
 */

// =====================================================
// BILINGUAL SUPPORT
// =====================================================

/**
 * All text in templates uses bilingual format:
 * 
 * <?php _e('النص بالعربية | English Text', 'altawthiq'); ?>
 * 
 * First part:  Arabic (displayed by default)
 * Second part: English (displayed when language switched)
 * Third param: Text domain ('altawthiq')
 * 
 * For variables, use translation functions:
 * <?php echo esc_html('النص | Text'); ?>
 * or
 * <?php printf(__('النص | Text: %s', 'altawthiq'), $variable); ?>
 */

// =====================================================
// ANIMATIONS & AOS LIBRARY
// =====================================================

/**
 * All animations use AOS (Animate On Scroll) library
 * 
 * Common attributes:
 * data-aos="fade-up"          - Fades in while moving up
 * data-aos="fade-left"        - Fades in from left
 * data-aos="fade-right"       - Fades in from right
 * data-aos="zoom-in"          - Scales up and fades in
 * 
 * Duration control:
 * data-aos-duration="800"     - Animation duration in ms (400-2000)
 * data-aos-delay="100"        - Delay before animation starts (ms)
 * data-aos-easing="ease-out"  - Animation timing function
 * 
 * Example:
 * <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
 *     Content here
 * </div>
 */

// =====================================================
// CSS & STYLING
// =====================================================

/**
 * Main stylesheet: css/style.css
 * 
 * CSS Variables (root):
 * --primary-color       #667eea  (main brand color)
 * --primary-dark        #5568d3  (darker shade)
 * --primary-light       #f0f4ff  (light shade)
 * --text-dark           #1a1a1a  (main text)
 * --text-muted          #666666  (secondary text)
 * --gray-100            #f8f9fa  (light gray)
 * --gray-200            #e9ecef  (medium gray)
 * 
 * Font Stack:
 * Arabic: Tajawal (Google Fonts) - loaded first
 * English: Inter (Google Fonts) - loaded second
 * 
 * Responsive Breakpoints:
 * @media (max-width: 768px)     - Mobile
 * @media (max-width: 1024px)    - Tablet
 * 1440px+ - Desktop
 */

// =====================================================
// JAVASCRIPT FILES
// =====================================================

/**
 * js/main.js           - Main functionality
 *                      - Core interaction logic
 *                      - Menu toggle, scroll handlers, etc.
 * 
 * js/faq-chat-ar.js    - Arabic chatbot
 *                      - Chat widget for Arabic language
 *                      - Message display and input
 * 
 * js/faq-chat.js       - English chatbot
 *                      - Chat widget for English language
 *                      - Message display and input
 * 
 * Loaded in functions.php:
 * wp_enqueue_script('altawthiq-main', ...)
 * wp_enqueue_script('altawthiq-chat-ar', ...)
 * wp_enqueue_script('altawthiq-chat', ...)
 */

// =====================================================
// ASSETS FOLDER STRUCTURE
// =====================================================

/**
 * assets/images/       - Product/feature images
 *                      - Used in hero, services, etc.
 * 
 * assets/partners/     - Partner logos
 *                      - Used in partners section
 * 
 * assets/bg/           - Background images
 *                      - Used in hero sections
 *                      - Main: bg6.webp (hero background)
 */

// =====================================================
// WORDPRESS HOOKS USED
// =====================================================

/**
 * Theme Setup:
 * after_setup_theme    - Initialize theme features
 * wp_enqueue_scripts   - Load JS & CSS
 * wp_enqueue_styles    - Load stylesheets
 * widgets_init         - Register widget areas
 * 
 * Front-end:
 * wp_head()            - Include before </head>
 * wp_footer()          - Include before </body>
 * get_header()         - Include header.php
 * get_footer()         - Include footer.php
 * the_content()        - Output page content
 * the_post_thumbnail() - Output featured image
 * the_permalink()      - Link to post
 * the_title()          - Post/page title
 */

// =====================================================
// CUSTOM WORDPRESS FEATURES
// =====================================================

/**
 * Registered Features (functions.php):
 * - post-thumbnails      Featured images support
 * - html5                HTML5 markup
 * - title-tag            <title> tag management
 * - custom-logo          Logo upload in customize
 * 
 * Registered Menus:
 * - primary: 'القائمة الأساسية | Primary Menu'
 * 
 * Image Sizes:
 * - thumbnail (150x150)
 * - medium (300x300)
 * - large (1024x1024)
 */

// =====================================================
// CONTACT FORM SETUP
// =====================================================

/**
 * Contact Form 7 Integration:
 * Location: page-contact.php
 * 
 * Form Shortcode:
 * [contact-form-7 id="1" title="Contact Form"]
 * 
 * Email recipient: Configure in CF7 plugin settings
 * Form fields: name, email, subject, message
 * 
 * Alternative for no CF7:
 * - Native form fallback included in page-contact.php
 * - Requires custom email handling
 */

// =====================================================
// POLYLANG LANGUAGE SUPPORT
// =====================================================

/**
 * Default Language: Arabic (ar)
 * Secondary Language: English (en)
 * 
 * Language Switcher:
 * - Located in header.php
 * - Shows AR/EN buttons
 * - Uses Polylang language URLs
 * 
 * Content Translation:
 * - Translate pages via Polylang admin
 * - Each page can have Arabic and English versions
 * - Language switcher redirects to correct version
 * 
 * Fallback Logic:
 * In functions.php:
 * $lang = pll_current_language() ?: 'ar';
 * (Falls back to Arabic if no language set)
 */

// =====================================================
// CUSTOMIZATION GUIDE
// =====================================================

/**
 * To customize the theme:
 * 
 * 1. COLORS
 *    Edit css/style.css - CSS variables at top
 *    Change --primary-color to your brand color
 * 
 * 2. FONTS
 *    Edit functions.php - enqueue_scripts function
 *    Add new Google Fonts or local fonts
 * 
 * 3. LAYOUT/STRUCTURE
 *    Edit template files (.php files)
 *    Be careful with HTML structure
 * 
 * 4. CONTENT SECTIONS
 *    Edit index.php for homepage sections
 *    Edit page-* templates for specific pages
 * 
 * 5. FOOTER/HEADER
 *    Edit header.php or footer.php
 *    Update links, social media URLs, etc.
 * 
 * 6. ANIMATIONS
 *    Add data-aos attributes to elements
 *    Adjust timing with data-aos-duration
 */

// =====================================================
// DEPLOYMENT CHECKLIST
// =====================================================

/**
 * Before uploading theme to WordPress:
 * 
 * ✓ All template files created (.php)
 * ✓ style.css copied to css/ folder
 * ✓ All .js files copied to js/ folder
 * ✓ All assets copied to assets/ folder
 * ✓ No syntax errors (no white screens)
 * ✓ Check with WordPress Coding Standards
 * ✓ Create theme screenshot.webp (880x660px)
 * ✓ Create ZIP file of theme directory
 * ✓ Upload to WordPress via Dashboard
 * ✓ Activate theme
 * ✓ Test all pages and features
 */

// =====================================================
// TROUBLESHOOTING
// =====================================================

/**
 * White screen of death?
 * - Check PHP errors: wp-content/debug.log
 * - Verify syntax in edited files
 * - Disable plugins and enable one by one
 * 
 * Styles not loading?
 * - Check css/style.css exists
 * - Verify stylesheet enqueued in functions.php
 * - Clear WordPress cache if using caching plugin
 * 
 * Images not showing?
 * - Verify assets copied correctly
 * - Check file paths use get_template_directory_uri()
 * - Clear browser cache
 * 
 * Language switcher broken?
 * - Verify Polylang plugin installed
 * - Check Polylang languages configured
 * - Set Arabic as default language
 */

// This file is for documentation only
// It should NOT be included in the actual theme
?>
