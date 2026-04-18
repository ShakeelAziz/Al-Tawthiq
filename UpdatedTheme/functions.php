<?php
/**
 * Al Tawthiq Theme Functions
 * Arabic-First Theme for Training & Development
 */

// Establish text domain for translations
add_action('plugins_loaded', function () {
    load_theme_textdomain('altawthiq', get_template_directory() . '/languages');
});

// Enqueue styles and scripts with Arabic priority
function altawthiq_enqueue_assets()
{
    // Google Fonts - Arabic first
    wp_enqueue_style(
        'tajawal-font',
        'https://fonts.googleapis.com/css2?family=Tajawal:wght@400;600;700;800&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'inter-font',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
        array(),
        null
    );

    // External libraries
    wp_enqueue_style(
        'aos-css',
        'https://unpkg.com/aos@2.3.4/dist/aos.css',
        array(),
        '2.3.4'
    );

    wp_enqueue_style(
        'fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        array(),
        '6.5.1'
    );

    // Theme style
    wp_enqueue_style(
        'altawthiq-style',
        get_stylesheet_uri(),
        array(),
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    // Theme scripts
    wp_enqueue_script(
        'aos-js',
        'https://unpkg.com/aos@2.3.4/dist/aos.js',
        array(),
        '2.3.4',
        true
    );

    wp_enqueue_script(
        'altawthiq-main',
        get_template_directory_uri() . '/js/main.js',
        array(),
        filemtime(get_template_directory() . '/js/main.js'),
        true
    );

    // FAQ Chat scripts
    $lang = function_exists('pll_current_language') ? pll_current_language() : 'ar';
    $chat_file = ($lang === 'ar' || !$lang) ? 'faq-chat-ar.js' : 'faq-chat.js';
    if (file_exists(get_template_directory() . '/js/' . $chat_file)) {
        wp_enqueue_script(
            'altawthiq-faq-chat',
            get_template_directory_uri() . '/js/' . $chat_file,
            array(),
            filemtime(get_template_directory() . '/js/' . $chat_file),
            true
        );
    }

    // Set document direction
    $dir = is_rtl() ? 'rtl' : 'ltr';
    wp_add_inline_script('altawthiq-main', "document.documentElement.dir = '$dir'; document.documentElement.lang = '" . get_bloginfo('language') . "';", 'before');

    // Language switch function
    wp_add_inline_script('altawthiq-main', "
    function switchLanguage(url) {
        if (url !== '#') {
            window.location.href = url;
        }
    }
    ");
}
add_action('wp_enqueue_scripts', 'altawthiq_enqueue_assets', 10);

// Theme support
function altawthiq_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style'
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('custom-logo', array(
        'height' => 70,
        'width' => 240,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Register menus - Arabic names prioritized
    register_nav_menus(array(
        'primary' => __('القائمة الأساسية | Primary Menu', 'altawthiq'),
        'footer' => __('قائمة التذييل | Footer Menu', 'altawthiq')
    ));
}
add_action('after_setup_theme', 'altawthiq_theme_support');

// Register widget areas
function altawthiq_widgets_init()
{
    register_sidebar(array(
        'name' => __('الشريط الجانبي الأساسي | Primary Sidebar', 'altawthiq'),
        'id' => 'primary-sidebar',
        'description' => __('الشريط الجانبي الرئيسي | Main sidebar for pages', 'altawthiq'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'altawthiq_widgets_init');

// Custom excerpt length
function altawthiq_excerpt_length($length)
{
    return 25;
}
add_filter('excerpt_length', 'altawthiq_excerpt_length');

// Set default language to Arabic
function altawthiq_set_default_language()
{
    if (function_exists('pll_current_language')) {
        $current = pll_current_language();
        if (!$current) {
            // If no language is set, redirect to Arabic version
            wp_safe_remote_post(
                home_url('/'),
                array('blocking' => false)
            );
        }
    }
}
add_action('init', 'altawthiq_set_default_language');

// Polylang support
if (function_exists('pll_register_string')) {
    add_filter('pll_get_post_types', function ($post_types) {
        $post_types[] = 'post';
        $post_types[] = 'page';
        return $post_types;
    });

    // Register Arabic strings for translation
    add_action('wp_head', function () {
        pll_register_string('site_description', get_option('blogdescription'));
        pll_register_string('contact_cta', __('حجز عرض تجريبي', 'altawthiq'));
        pll_register_string('We Offer:', __('حجز عرض تجريبي', 'altawthiq'));
        pll_register_string('contact_cta', __('حجز عرض تجريبي', 'altawthiq'));
        pll_register_string('contact_cta', __('حجز عرض تجريبي', 'altawthiq'));
    });
}

// Filter body class to add language
function altawthiq_body_class($classes)
{
    $lang = function_exists('pll_current_language') ? pll_current_language() : 'ar';
    if (!$lang)
        $lang = 'ar';
    $classes[] = 'lang-' . $lang;
    return $classes;
}
add_filter('body_class', 'altawthiq_body_class');

// RTL support
function altawthiq_wp_footer()
{
    if (is_rtl()) {
        echo "<!-- Arabic RTL Theme -->\n";
    } else {
        echo "<!-- English LTR Theme -->\n";
    }
}
add_action('wp_footer', 'altawthiq_wp_footer');

/**
 * Digital Products (Free Books) + Lead Capture
 */
// REGISTER CUSTOM POST TYPES
function create_digital_products_cpt() {
    register_post_type('digital_product', array(
        'labels' => array(
            'name' => 'Digital Products',
            'singular_name' => 'Digital Product'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'digital-products'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-media-document'
    ));
}
add_action('init', 'create_digital_products_cpt');


// ADD META BOX
function altawthiq_digital_product_metaboxes()
{
    add_meta_box(
        'altawthiq_digital_product_file',
        __('Digital Product File', 'altawthiq'),
        function ($post) {
            $file_url = get_post_meta($post->ID, '_altawthiq_product_file_url', true);
            wp_nonce_field('altawthiq_save_digital_product', 'altawthiq_digital_product_nonce');
            ?>
            <p>
                <label><strong><?php echo esc_html__('File URL (PDF/ZIP)', 'altawthiq'); ?></strong></label>
                <input type="url" name="altawthiq_product_file_url"
                       value="<?php echo esc_attr($file_url); ?>"
                       style="width:100%" placeholder="https://.../file.pdf" />
            </p>
            <?php
        },
        'digital_product',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'altawthiq_digital_product_metaboxes');


// SAVE META BOX DATA
function altawthiq_save_digital_product_meta($post_id)
{
    // Check post type
    if (get_post_type($post_id) !== 'digital_product') {
        return;
    }

    // Verify nonce
    if (!isset($_POST['altawthiq_digital_product_nonce']) ||
        !wp_verify_nonce($_POST['altawthiq_digital_product_nonce'], 'altawthiq_save_digital_product')) {
        return;
    }

    // Prevent autosave overwrite
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save file URL
    if (isset($_POST['altawthiq_product_file_url'])) {
        update_post_meta(
            $post_id,
            '_altawthiq_product_file_url',
            esc_url_raw($_POST['altawthiq_product_file_url'])
        );
    }
}
add_action('save_post', 'altawthiq_save_digital_product_meta');


function altawthiq_enqueue_digital_products_assets()
{
    if (!is_singular('digital_product')) {
        return;
    }

    wp_enqueue_script(
        'altawthiq-digital-products',
        get_template_directory_uri() . '/js/digital-products.js',
        array(),
        filemtime(get_template_directory() . '/js/digital-products.js'),
        true
    );
    wp_localize_script('altawthiq-digital-products', 'AltawthiqDigital', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('altawthiq_claim_product'),
        'successText' => __('Thank you! Your download is ready.', 'altawthiq'),
        'errorText' => __('Something went wrong. Please try again.', 'altawthiq'),
    ));
}
add_action('wp_enqueue_scripts', 'altawthiq_enqueue_digital_products_assets', 20);

add_action('wp_ajax_nopriv_download_product', 'download_product');
add_action('wp_ajax_download_product', 'download_product');

function download_product() {

    $product_id = intval($_POST['product_id']);

    $data = [
        'name' => sanitize_text_field($_POST['name']),
        'email' => sanitize_email($_POST['email']),
        'company' => sanitize_text_field($_POST['company']),
        'position' => sanitize_text_field($_POST['position']),
        'mobile' => sanitize_text_field($_POST['mobile']),
        'time' => current_time('mysql')
    ];

    // Save lead
    add_post_meta($product_id, 'leads', $data);

    // Get file
    $file = get_field('download_file', $product_id);

    if ($file) {
        wp_send_json_success($file['url']);
    } else {
        wp_send_json_error('No file found');
    }
}

function toggleMenu()
{
    document . getElementById("navMenu") . classList . toggle("active");
}
?>