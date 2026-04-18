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

/**
 * Detect active language for SEO rendering.
 *
 * @return string "ar" or "en"
 */
function altawthiq_detect_lang_for_seo()
{
    if (function_exists('pll_current_language')) {
        $pll_lang = (string) pll_current_language('slug');
        if ($pll_lang === 'ar' || $pll_lang === 'en') {
            return $pll_lang;
        }
    }

    $uri = isset($_SERVER['REQUEST_URI']) ? strtolower((string) wp_unslash($_SERVER['REQUEST_URI'])) : '';
    if (strpos($uri, '-ar') !== false || strpos($uri, '/ar/') !== false || strpos($uri, 'home-ar') !== false) {
        return 'ar';
    }

    return is_rtl() ? 'ar' : 'en';
}

/**
 * Resolve a page key used for page-specific SEO.
 *
 * @return string
 */
function altawthiq_get_seo_page_key()
{
    if (is_404()) {
        return '404';
    }

    if (is_singular('digital_product')) {
        return 'digital_product_single';
    }

    if (is_post_type_archive('digital_product') || is_page(array('digital-products', 'digital-products-ar'))) {
        return 'digital_products';
    }

    if (is_page_template('page-signup.php') || is_page(array('signup', 'sign-up'))) {
        return 'signup';
    }

    if (is_page_template('page-about-juri.php') || is_page(array('about-juri', 'juri'))) {
        return 'about_juri';
    }

    if (is_page_template('page-company.php') || is_page(array('company', 'profile'))) {
        return 'company';
    }

    if (is_page_template('page-about.php') || is_page('about')) {
        return 'about';
    }

    if (is_page_template('page-contact-ar.php') || is_page(array('contact', 'contact-ar'))) {
        return 'contact';
    }

    if (is_page_template('page-tot.php') || is_page(array('tot', 'tot-ar'))) {
        return 'tot';
    }

    if (is_home() || is_front_page() || is_page(array('home', 'home-ar'))) {
        return 'home';
    }

    if (is_singular()) {
        return 'single';
    }

    return 'default';
}

/**
 * Central SEO metadata for all templates.
 *
 * @param string $forced_page_key Optional explicit key from custom templates.
 * @return array<string, mixed>
 */
function altawthiq_get_page_seo_data($forced_page_key = '')
{
    $lang = altawthiq_detect_lang_for_seo();
    $page_key = $forced_page_key !== '' ? sanitize_key($forced_page_key) : altawthiq_get_seo_page_key();
    $is_ar = $lang === 'ar';

    $global_keywords_ar = array(
        'دورات تدريبية',
        'برامج تدريبية',
        'دورات معتمدة',
        'دورات بشهادات معتمدة',
        'دورات تطوير مهني',
        'تدريب الموظفين',
        'تطوير مهارات الموظفين',
        'تدريب الشركات',
        'معهد تدريب',
        'مركز تدريب معتمد',
        'دورات اونلاين',
        'دورات حضورية',
        'تدريب احترافي',
        'دورات القيادة',
        'تطوير القيادات',
        'القيادة التنفيذية',
        'مهارات القيادة',
        'الإدارة الحديثة',
        'إدارة الفرق',
        'إدارة المشاريع',
        'التخطيط الاستراتيجي',
        'اتخاذ القرار',
        'إدارة الوقت',
        'إدارة الأداء',
        'الحوكمة والامتثال',
        'دورات التسويق',
        'التسويق الرقمي',
        'إدارة الحملات الإعلانية',
        'التسويق عبر السوشيال ميديا',
        'كتابة المحتوى',
        'بناء العلامة التجارية',
        'دورات المبيعات',
        'مهارات البيع',
        'استراتيجيات البيع',
        'خدمة العملاء',
        'تجربة العميل',
        'مهارات التواصل',
        'إدارة الشكاوى',
        'رضا العملاء',
        'الصحة والسلامة المهنية',
        'دورة أوشا',
        'OSHA',
        'NEBOSH IGC',
        'السلامة في بيئة العمل',
        'إدارة المخاطر',
        'الأمن الصناعي',
        'الذكاء الاصطناعي',
        'ChatGPT',
        'تحليل البيانات',
        'الأمن السيبراني',
        'البرمجة',
        'تطوير التطبيقات',
        'دورات الحاسب',
        'Microsoft Office',
        'Excel',
        'PowerPoint',
        'Word',
        'الإعلام الرقمي',
        'العلاقات العامة',
        'صناعة المحتوى',
        'رؤية السعودية 2030',
        'تدريب شركات الرياض',
        'الرياض',
    );

    $global_keywords_en = array(
        'training courses',
        'training programs',
        'certified courses',
        'accredited training courses',
        'professional development courses',
        'employee training',
        'corporate training',
        'training institute',
        'accredited training center',
        'online courses',
        'in-person courses',
        'leadership training',
        'executive leadership',
        'management training',
        'project management training',
        'PMP training',
        'strategic planning',
        'performance management',
        'decision making',
        'digital marketing course',
        'social media marketing',
        'content writing',
        'branding',
        'sales training',
        'customer service training',
        'customer experience training',
        'occupational safety',
        'OSHA training',
        'safety training',
        'risk management',
        'AI training',
        'AI for business',
        'ChatGPT training',
        'automation',
        'data analysis',
        'cybersecurity',
        'programming courses',
        'application development',
        'Microsoft Office training',
        'Excel training',
        'PowerPoint training',
        'Word training',
        'media and communication courses',
        'public relations training',
        'content creation',
        'Saudi Vision 2030',
        'Corporate Training Riyadh',
        'Riyadh training institute',
    );

    $titles_ar = array(
        'home' => 'دورات تدريبية معتمدة في الرياض | تدريب الشركات | التوثيق الوطني',
        'contact' => 'تواصل معنا | حجز الدورات التدريبية في الرياض | التوثيق الوطني',
        'about' => 'نبذة عنا | معهد تدريب معتمد في الرياض | التوثيق الوطني',
        'company' => 'الملف التعريفي | شركة التوثيق الوطني للتدريب',
        'about_juri' => 'جوري القحطاني | الإعلام والتواصل والتدريب القيادي',
        'tot' => 'دورة تدريب المدربين TOT | برامج تدريبية احترافية | التوثيق الوطني',
        'digital_products' => 'مواد تدريبية رقمية | كتب وأدلة تطوير مهني | التوثيق الوطني',
        'digital_product_single' => 'محتوى تدريبي رقمي | التوثيق الوطني للتدريب',
        'signup' => 'عرض تعاقدي لتدريب الشركات | التوثيق الوطني',
        'single' => 'محتوى تدريبي واحترافي | التوثيق الوطني',
        '404' => 'الصفحة غير موجودة | التوثيق الوطني للتدريب',
        'default' => 'التوثيق الوطني للتدريب | دورات معتمدة وبرامج تدريبية في الرياض',
    );

    $titles_en = array(
        'home' => 'Certified Training Courses in Riyadh | Corporate Training | Altawthiq',
        'contact' => 'Contact Us | Book Training Courses in Riyadh | Altawthiq',
        'about' => 'About Us | Accredited Training Institute in Riyadh | Altawthiq',
        'company' => 'Company Profile | Altawthiq National Training',
        'about_juri' => 'Jury Al-Qahtani | Media, Communication and Leadership Training',
        'tot' => 'Train the Trainer (TOT) Course | Professional Programs | Altawthiq',
        'digital_products' => 'Digital Training Resources | Professional Learning | Altawthiq',
        'digital_product_single' => 'Digital Training Resource | Altawthiq',
        'signup' => 'Corporate Training Proposal | Altawthiq',
        'single' => 'Training Insights and Professional Development | Altawthiq',
        '404' => 'Page Not Found | Altawthiq',
        'default' => 'Altawthiq National Training | Certified Courses in Riyadh',
    );

    $descriptions_ar = array(
        'home' => 'دورات تدريبية وبرامج تدريبية معتمدة في الرياض تشمل القيادة، إدارة المشاريع، التسويق الرقمي، المبيعات، خدمة العملاء، الصحة والسلامة المهنية، والذكاء الاصطناعي، مع تدريب شركات الرياض وفق مستهدفات رؤية السعودية 2030.',
        'contact' => 'تواصل مع معهد تدريب معتمد في الرياض لحجز دورات معتمدة ودورات بشهادات معتمدة للشركات والأفراد في القيادة، التسويق، خدمة العملاء، الصحة والسلامة المهنية والذكاء الاصطناعي.',
        'about' => 'التوثيق الوطني للتدريب: مركز تدريب معتمد يقدم برامج تدريبية احترافية ودورات حضورية وأونلاين لتطوير الموظفين والقيادات ورفع الأداء المؤسسي في السعودية.',
        'company' => 'الملف التعريفي لشركة التوثيق الوطني للتدريب بالرياض: تدريب الشركات، تطوير القيادات، إدارة المشاريع، دورات التسويق والمبيعات، ودورات الصحة والسلامة المهنية والذكاء الاصطناعي.',
        'about_juri' => 'جوري القحطاني: خبرة في الإعلام والتواصل، مهارات الإلقاء، صناعة المحتوى، والتقديم الاحترافي ضمن برامج تدريبية قيادية وتطوير مهني في الرياض.',
        'tot' => 'دورة تدريب المدربين TOT لتأهيل المدربين والممارسين على تصميم البرامج التدريبية، التقديم الاحترافي، وقياس الأثر التدريبي داخل الجهات الحكومية والخاصة.',
        'digital_products' => 'مكتبة رقمية من الأدلة والكتب والمواد التدريبية في القيادة، الإدارة، التسويق، الموارد البشرية، الذكاء الاصطناعي وتطوير الذات لدعم التعلم المستمر.',
        'digital_product_single' => 'محتوى تدريبي رقمي قابل للتطبيق العملي يدعم تطوير المهارات المهنية والقيادية داخل بيئة العمل.',
        'signup' => 'طلب عرض تعاقدي مخصص لتدريب الشركات في الرياض والسعودية يشمل برامج تدريب الموظفين، تطوير القيادات، والصحة والسلامة المهنية.',
        'single' => 'محتوى معرفي وتدريبي في الإدارة والقيادة والتسويق والذكاء الاصطناعي لدعم تطوير المهارات المهنية.',
        '404' => 'عذرًا، الصفحة المطلوبة غير متوفرة. تصفح دوراتنا التدريبية المعتمدة وبرامجنا الاحترافية في الرياض.',
        'default' => 'برامج تدريبية معتمدة ودورات تطوير مهني في الرياض تشمل القيادة، التسويق، خدمة العملاء، السلامة المهنية، والذكاء الاصطناعي.',
    );

    $descriptions_en = array(
        'home' => 'Certified training courses and corporate programs in Riyadh covering leadership, PMP training, digital marketing, sales, customer service, occupational safety, and AI training aligned with Saudi Vision 2030.',
        'contact' => 'Contact our accredited training institute in Riyadh to book certified courses and corporate training programs in leadership, marketing, customer service, occupational safety, and AI.',
        'about' => 'Altawthiq National Training is an accredited center in Riyadh delivering professional in-person and online programs for employee development, leadership growth, and institutional performance.',
        'company' => 'Company profile of Altawthiq National Training in Riyadh: corporate training, leadership development, project management, marketing and sales courses, plus occupational safety and AI training.',
        'about_juri' => 'Jury Al-Qahtani profile in media and communication, public speaking, content creation, and professional presentation through leadership-focused development programs.',
        'tot' => 'Train the Trainer (TOT) program to prepare trainers and practitioners in instructional design, facilitation skills, and measurable training impact.',
        'digital_products' => 'A digital library of practical resources and learning materials in leadership, management, marketing, HR, AI, and professional development.',
        'digital_product_single' => 'A practical digital training resource to improve professional and leadership capabilities at work.',
        'signup' => 'Request a tailored corporate training proposal in Riyadh and Saudi Arabia for employee development, leadership, and occupational safety programs.',
        'single' => 'Training and professional development insights across leadership, management, marketing, and artificial intelligence.',
        '404' => 'Sorry, the requested page is unavailable. Explore our certified training courses and professional programs in Riyadh.',
        'default' => 'Accredited training programs and professional courses in Riyadh for leadership, marketing, customer service, occupational safety, and AI.',
    );

    $page_keywords_ar = array(
        'home' => array('دورات تدريبية في الرياض معتمدة', 'تدريب شركات الرياض', 'أسعار الدورات التدريبية في السعودية', 'دورات رؤية السعودية 2030'),
        'contact' => array('حجز دورة تدريب', 'التسجيل في برنامج تدريبي', 'معهد تدريب معتمد من المؤسسة العامة للتدريب التقني والمهني'),
        'about' => array('تطوير القيادات', 'تطوير الموظفين', 'برامج تدريب الشركات في السعودية'),
        'company' => array('المدير التنفيذي', 'الادارة المكتبيه', 'الابداع والابتكار', 'التفكير التصميمي', 'الذكاء العاطفي', 'الذكاء الاجتماعي'),
        'about_juri' => array('دورات الإعلام', 'الإعلام الرقمي', 'العلاقات العامة', 'مهارات الإلقاء', 'التقديم الاحترافي', 'كاريزما الظهور الإعلامي'),
        'tot' => array('تدريب المدربين', 'إعداد الحقائب التدريبية', 'تقييم الاحتياج التدريبي', 'قياس أثر التدريب'),
        'digital_products' => array('دورات تطوير الذات', 'دورات ريادة الأعمال', 'دورات مالية', 'دورات تقنية'),
        'signup' => array('خصم المجموعات لموظفي الشركات', 'تطبيق عملي', 'مدربين ممارسين'),
    );

    $page_keywords_en = array(
        'home' => array('certified training courses Riyadh', 'corporate training Riyadh', 'Saudi Vision 2030 training'),
        'contact' => array('book training course', 'corporate training consultation', 'accredited institute Riyadh'),
        'about' => array('leadership development', 'employee development', 'company training Saudi Arabia'),
        'company' => array('governance and compliance', 'change management', 'Lean Six Sigma', 'ISO 9001', 'ISO 45001'),
        'about_juri' => array('media training', 'public speaking skills', 'professional presentation', 'content creation'),
        'tot' => array('train the trainer', 'instructional design', 'facilitation skills', 'training impact measurement'),
        'digital_products' => array('professional learning resources', 'self development courses', 'entrepreneurship training'),
        'signup' => array('group discounts for companies', 'practical application', 'expert trainers'),
    );

    $titles = $is_ar ? $titles_ar : $titles_en;
    $descriptions = $is_ar ? $descriptions_ar : $descriptions_en;
    $global_keywords = $is_ar ? $global_keywords_ar : $global_keywords_en;
    $page_keywords = $is_ar ? $page_keywords_ar : $page_keywords_en;

    $title = isset($titles[$page_key]) ? $titles[$page_key] : $titles['default'];
    $description = isset($descriptions[$page_key]) ? $descriptions[$page_key] : $descriptions['default'];
    $keywords = array_merge($global_keywords, isset($page_keywords[$page_key]) ? $page_keywords[$page_key] : array());
    $keywords = array_values(array_unique(array_filter(array_map('trim', $keywords))));

    return array(
        'lang' => $lang,
        'page_key' => $page_key,
        'title' => $title,
        'description' => $description,
        'keywords' => $keywords,
        'keywords_content' => implode(', ', $keywords),
        'og_title' => $title,
        'og_description' => $description,
        'twitter_title' => $title,
        'twitter_description' => $description,
        'geo_placename' => $is_ar ? 'الرياض' : 'Riyadh',
        'og_image_alt' => $is_ar ? 'التوثيق الوطني للتدريب في الرياض' : 'Altawthiq National Training in Riyadh',
    );
}

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
function altawthiq_register_digital_products_cpt()
{
    register_post_type('digital_product', array(
        'labels' => array(
            'name' => __('Digital Products', 'altawthiq'),
            'singular_name' => __('Digital Product', 'altawthiq'),
            'add_new_item' => __('Add New Digital Product', 'altawthiq'),
            'edit_item' => __('Edit Digital Product', 'altawthiq'),
            'all_items' => __('All Digital Products', 'altawthiq'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'digital-products'),
        'menu_icon' => 'dashicons-book',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'show_in_rest' => true,
    ));

    register_post_type('altawthiq_lead', array(
        'labels' => array(
            'name' => __('Leads', 'altawthiq'),
            'singular_name' => __('Lead', 'altawthiq'),
        ),
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-id',
        'supports' => array('title'),
    ));

    register_post_type('altawthiq_subscriber', array(
        'labels' => array(
            'name' => __('Subscribers', 'altawthiq'),
            'singular_name' => __('Subscriber', 'altawthiq'),
        ),
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-email',
        'supports' => array('title'),
    ));
}
add_action('init', 'altawthiq_register_digital_products_cpt');

/**
 * MailPoet form ID for page-signup.php (Forms → your form → shortcode shows the id).
 * When set, the signup page uses [mailpoet_form] so Automations see real form subscriptions.
 * Override in wp-config.php: define('ALTAWTHIQ_MAILPOET_SIGNUP_FORM_ID', 12);
 */
if (!defined('ALTAWTHIQ_MAILPOET_SIGNUP_FORM_ID')) {
    define('ALTAWTHIQ_MAILPOET_SIGNUP_FORM_ID', 0);
}

function altawthiq_get_mailpoet_signup_form_id()
{
    return (int) apply_filters('altawthiq_mailpoet_signup_form_id', ALTAWTHIQ_MAILPOET_SIGNUP_FORM_ID);
}

/**
 * List IDs used for newsletter sync (same rules as MailPoet API: list named "Subscribers", else first list).
 *
 * @return int[]
 */
function altawthiq_mailpoet_get_newsletter_list_ids()
{
    if (!class_exists('\MailPoet\API\API')) {
        return array();
    }

    try {
        $mailpoet_api = \MailPoet\API\API::MP('v1');
        if (!$mailpoet_api || !method_exists($mailpoet_api, 'getLists')) {
            return array();
        }

        $lists = $mailpoet_api->getLists();
        if (!is_array($lists)) {
            return array();
        }

        $list_ids = array();
        foreach ($lists as $list) {
            if (!empty($list['id']) && !empty($list['name']) && strtolower((string) $list['name']) === 'subscribers') {
                $list_ids[] = (int) $list['id'];
                break;
            }
        }

        if (empty($list_ids)) {
            foreach ($lists as $list) {
                if (!empty($list['id'])) {
                    $list_ids[] = (int) $list['id'];
                    break;
                }
            }
        }

        return $list_ids;
    } catch (\Throwable $e) {
        return array();
    }
}

function altawthiq_get_submission_email()
{
    if (!class_exists('WPCF7_Submission')) {
        return '';
    }

    $submission = WPCF7_Submission::get_instance();
    if (!$submission) {
        return '';
    }

    $posted_data = $submission->get_posted_data();
    if (!is_array($posted_data)) {
        return '';
    }

    $email = '';
    if (!empty($posted_data['your-email'])) {
        $email = $posted_data['your-email'];
    } elseif (!empty($posted_data['email'])) {
        $email = $posted_data['email'];
    }

    return sanitize_email((string) $email);
}

function altawthiq_get_submission_name()
{
    if (!class_exists('WPCF7_Submission')) {
        return '';
    }

    $submission = WPCF7_Submission::get_instance();
    if (!$submission) {
        return '';
    }

    $posted_data = $submission->get_posted_data();
    if (!is_array($posted_data)) {
        return '';
    }

    $name = '';
    if (!empty($posted_data['your-name'])) {
        $name = $posted_data['your-name'];
    } elseif (!empty($posted_data['full-name'])) {
        $name = $posted_data['full-name'];
    } elseif (!empty($posted_data['name'])) {
        $name = $posted_data['name'];
    }

    return sanitize_text_field((string) $name);
}

/**
 * Create local altawthiq_subscriber post if this email is not already registered.
 *
 * @return bool True when a new post was created.
 */
function altawthiq_register_local_subscriber_if_new($email, $name = '')
{
    unset($name);
    $email = sanitize_email((string) $email);
    if (!$email || !is_email($email) || altawthiq_email_exists_in_subscribers($email)) {
        return false;
    }

    $subscriber_id = wp_insert_post(array(
        'post_type' => 'altawthiq_subscriber',
        'post_status' => 'publish',
        'post_title' => $email,
    ), true);

    if (is_wp_error($subscriber_id)) {
        return false;
    }

    update_post_meta($subscriber_id, '_altawthiq_subscriber_email', $email);
    return true;
}

function altawthiq_subscribe_to_mailpoet($email, $name = '')
{
    if (!$email || !class_exists('\MailPoet\API\API')) {
        return;
    }

    try {
        $mailpoet_api = \MailPoet\API\API::MP('v1');
        if (!$mailpoet_api) {
            return;
        }

        $list_ids = altawthiq_mailpoet_get_newsletter_list_ids();

        $subscriber_data = array(
            'email' => $email,
            'status' => 'subscribed',
        );

        if ($name !== '') {
            $subscriber_data['first_name'] = $name;
        }

        try {
            if (method_exists($mailpoet_api, 'addSubscriber')) {
                $mailpoet_api->addSubscriber(
                    $subscriber_data,
                    $list_ids,
                    array('send_confirmation_email' => false)
                );
            }
        } catch (\Throwable $e) {
            // If subscriber already exists, ensure they are linked to list(s) and marked subscribed.
            if (method_exists($mailpoet_api, 'subscribeToLists') && !empty($list_ids)) {
                $mailpoet_api->subscribeToLists(
                    $email,
                    $list_ids,
                    array(
                        'send_confirmation_email' => false,
                        'status' => 'subscribed',
                    )
                );
            }
        }

        // Force status to "subscribed" for existing records as well.
        if (method_exists($mailpoet_api, 'getSubscriber') && method_exists($mailpoet_api, 'updateSubscriber')) {
            $existing_subscriber = $mailpoet_api->getSubscriber($email);

            $subscriber_id = 0;
            if (is_array($existing_subscriber) && !empty($existing_subscriber['id'])) {
                $subscriber_id = (int) $existing_subscriber['id'];
            } elseif (is_object($existing_subscriber) && !empty($existing_subscriber->id)) {
                $subscriber_id = (int) $existing_subscriber->id;
            }

            if ($subscriber_id > 0) {
                $update_data = array('status' => 'subscribed');
                if ($name !== '') {
                    $update_data['first_name'] = $name;
                }
                $mailpoet_api->updateSubscriber($subscriber_id, $update_data);

                // Fallback for MailPoet setups that still keep status unconfirmed.
                global $wpdb;
                $mailpoet_table = $wpdb->prefix . 'mailpoet_subscribers';
                if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $mailpoet_table)) === $mailpoet_table) {
                    $wpdb->update(
                        $mailpoet_table,
                        array('status' => 'subscribed'),
                        array('id' => $subscriber_id),
                        array('%s'),
                        array('%d')
                    );
                }
            }
        }
    } catch (\Throwable $e) {
        // Keep CF7 submission flow intact even if MailPoet is unavailable.
    }
}

function altawthiq_email_exists_in_flamingo($email)
{
    if (!$email || !post_type_exists('flamingo_inbound')) {
        return false;
    }

    $possible_keys = array('_from_email', '_field_your-email', '_field_email');

    foreach ($possible_keys as $meta_key) {
        $query = new WP_Query(array(
            'post_type' => 'flamingo_inbound',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'fields' => 'ids',
            'no_found_rows' => true,
            'meta_query' => array(
                array(
                    'key' => $meta_key,
                    'value' => $email,
                    'compare' => '=',
                ),
            ),
        ));

        if (!empty($query->posts)) {
            return true;
        }
    }

    return false;
}

function altawthiq_email_exists_in_subscribers($email)
{
    if (!$email) {
        return false;
    }

    $query = new WP_Query(array(
        'post_type' => 'altawthiq_subscriber',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'fields' => 'ids',
        'no_found_rows' => true,
        'meta_query' => array(
            array(
                'key' => '_altawthiq_subscriber_email',
                'value' => $email,
                'compare' => '=',
            ),
        ),
    ));

    return !empty($query->posts);
}

function altawthiq_prevent_duplicate_cf7_email($result, $tag)
{
    $tag_name = isset($tag->name) ? (string) $tag->name : '';
    if (!in_array($tag_name, array('your-email', 'email'), true)) {
        return $result;
    }

    $email = altawthiq_get_submission_email();
    if (!$email) {
        return $result;
    }

    if (altawthiq_email_exists_in_flamingo($email)) {
        // Even if duplicate is blocked in CF7, ensure MailPoet status is subscribed.
        altawthiq_subscribe_to_mailpoet($email, altawthiq_get_submission_name());
        $result->invalidate($tag, __('This email is already registered.', 'altawthiq'));
    }

    return $result;
}
add_filter('wpcf7_validate_email', 'altawthiq_prevent_duplicate_cf7_email', 20, 2);
add_filter('wpcf7_validate_email*', 'altawthiq_prevent_duplicate_cf7_email', 20, 2);

function altawthiq_store_subscriber_from_cf7($contact_form, $result)
{
    $status = isset($result['status']) ? (string) $result['status'] : '';
    if ($status !== 'mail_sent' && $status !== 'mail_failed') {
        return;
    }

    $email = altawthiq_get_submission_email();
    if (!$email || !is_email($email)) {
        return;
    }

    if (altawthiq_email_exists_in_subscribers($email)) {
        // Keep MailPoet list subscription in sync for existing local subscribers.
        altawthiq_subscribe_to_mailpoet($email, altawthiq_get_submission_name());
        return;
    }

    if (altawthiq_register_local_subscriber_if_new($email, altawthiq_get_submission_name())) {
        altawthiq_subscribe_to_mailpoet($email, altawthiq_get_submission_name());
    }
}
add_action('wpcf7_submit', 'altawthiq_store_subscriber_from_cf7', 20, 2);

/**
 * When someone subscribes via a MailPoet form, keep the theme subscriber CPT in sync (no second API subscribe).
 * List scope defaults to the same IDs as altawthiq_mailpoet_get_newsletter_list_ids(); override with filter
 * altawthiq_mailpoet_local_cpt_list_ids.
 */
function altawthiq_mailpoet_segment_subscribed_local_cpt($subscriber_segment)
{
    if (!is_object($subscriber_segment) || !method_exists($subscriber_segment, 'getSubscriber')) {
        return;
    }

    $segment = method_exists($subscriber_segment, 'getSegment') ? $subscriber_segment->getSegment() : null;
    $segment_id = ($segment && method_exists($segment, 'getId')) ? (int) $segment->getId() : 0;
    if ($segment_id <= 0) {
        return;
    }

    $watched = apply_filters('altawthiq_mailpoet_local_cpt_list_ids', altawthiq_mailpoet_get_newsletter_list_ids());
    if (!is_array($watched) || empty($watched) || !in_array($segment_id, array_map('intval', $watched), true)) {
        return;
    }

    $subscriber = $subscriber_segment->getSubscriber();
    if (!$subscriber || !method_exists($subscriber, 'getEmail')) {
        return;
    }

    $email = sanitize_email((string) $subscriber->getEmail());
    $name = method_exists($subscriber, 'getFirstName') ? sanitize_text_field((string) $subscriber->getFirstName()) : '';
    altawthiq_register_local_subscriber_if_new($email, $name);
}
add_action('mailpoet_segment_subscribed', 'altawthiq_mailpoet_segment_subscribed_local_cpt', 25, 1);

/**
 * Stop redirect to MailPoet confirmation URL after CF7 submit (theme shows inline success instead).
 * Redirect usually comes from CF7 "Additional settings" (on_sent_ok) or MailPoet integration.
 */
function altawthiq_cf7_is_newsletter_signup_form($contact_form)
{
    if (!is_object($contact_form)) {
        return false;
    }
    if (method_exists($contact_form, 'title') && trim((string) $contact_form->title()) === 'Newsletter Sign Up') {
        return true;
    }
    // Shortcode id from theme: [contact-form-7 id="44d1d5e" ...]
    if (method_exists($contact_form, 'hash') && (string) $contact_form->hash() === '44d1d5e') {
        return true;
    }
    if (method_exists($contact_form, 'id') && (string) $contact_form->id() === '44d1d5e') {
        return true;
    }
    return false;
}

function altawthiq_cf7_strip_newsletter_redirect_settings($properties, $contact_form)
{
    if (!altawthiq_cf7_is_newsletter_signup_form($contact_form)) {
        return $properties;
    }
    if (empty($properties['additional_settings']) || !is_string($properties['additional_settings'])) {
        return $properties;
    }
    $lines = preg_split('/\r\n|\r|\n/', $properties['additional_settings']);
    $kept = array();
    foreach ($lines as $line) {
        $trim = trim($line);
        if ($trim === '') {
            continue;
        }
        if (preg_match('/^\s*on_sent_ok\s*:/i', $trim)) {
            continue;
        }
        if (preg_match('/^\s*on_submit_ok\s*:/i', $trim)) {
            continue;
        }
        if (stripos($trim, 'mailpoet_page') !== false || stripos($trim, 'mailpoet_router') !== false) {
            continue;
        }
        if (preg_match('/location\.(href|assign|replace)/i', $trim)) {
            continue;
        }
        $kept[] = $line;
    }
    $properties['additional_settings'] = implode("\n", $kept);
    return $properties;
}
add_filter('wpcf7_contact_form_properties', 'altawthiq_cf7_strip_newsletter_redirect_settings', 999, 2);

function altawthiq_cf7_strip_newsletter_submission_redirect($result, $submission)
{
    if (!is_object($submission) || !method_exists($submission, 'get_contact_form')) {
        return $result;
    }
    $contact_form = $submission->get_contact_form();
    if (!$contact_form || !altawthiq_cf7_is_newsletter_signup_form($contact_form)) {
        return $result;
    }
    if (!is_array($result)) {
        return $result;
    }
    $strip_keys = array(
        'onSentOk',
        'onSubmitOk',
        'scripts',
        'onSentOkKeys',
        'onSubmitOkKeys',
    );
    foreach ($strip_keys as $key) {
        unset($result[$key]);
    }
    return $result;
}
add_filter('wpcf7_submission_result', 'altawthiq_cf7_strip_newsletter_submission_redirect', 999, 2);


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

function altawthiq_ajax_claim_digital_product()
{
    if (!check_ajax_referer('altawthiq_claim_product', 'nonce', false)) {
        wp_send_json_error(array('message' => 'bad_nonce'), 403);
    }

    $product_id = isset($_POST['productId']) ? (int) $_POST['productId'] : 0;
    if (!$product_id || get_post_type($product_id) !== 'digital_product') {
        wp_send_json_error(array('message' => 'invalid_product'), 400);
    }

    $name = sanitize_text_field((string) ($_POST['name'] ?? ''));
    $email = sanitize_email((string) ($_POST['email'] ?? ''));
    $phone = sanitize_text_field((string) ($_POST['phone'] ?? ''));
    $company = sanitize_text_field((string) ($_POST['company'] ?? ''));
    $city = sanitize_text_field((string) ($_POST['city'] ?? ''));

    if (!$name || !$email) {
        wp_send_json_error(array('message' => 'missing_fields'), 400);
    }

    $file_url = (string) get_post_meta($product_id, '_altawthiq_product_file_url', true);
    if (!$file_url) {
        wp_send_json_error(array('message' => 'missing_file'), 400);
    }

    $lead_post_id = wp_insert_post(array(
        'post_type' => 'altawthiq_lead',
        'post_status' => 'publish',
        'post_title' => $name . ' — ' . get_the_title($product_id),
    ), true);

    if (!is_wp_error($lead_post_id)) {
        update_post_meta($lead_post_id, '_altawthiq_lead_name', $name);
        update_post_meta($lead_post_id, '_altawthiq_lead_email', $email);
        update_post_meta($lead_post_id, '_altawthiq_lead_phone', $phone);
        update_post_meta($lead_post_id, '_altawthiq_lead_company', $company);
        update_post_meta($lead_post_id, '_altawthiq_lead_city', $city);
        update_post_meta($lead_post_id, '_altawthiq_lead_product_id', $product_id);
        update_post_meta($lead_post_id, '_altawthiq_lead_product_title', get_the_title($product_id));
    }

    wp_send_json_success(array(
        'downloadUrl' => esc_url_raw($file_url),
    ));
}
add_action('wp_ajax_altawthiq_claim_digital_product', 'altawthiq_ajax_claim_digital_product');
add_action('wp_ajax_nopriv_altawthiq_claim_digital_product', 'altawthiq_ajax_claim_digital_product');

/**
 * n8n Webhook node (production) URLs — forms POST JSON; override in wp-config.php if needed.
 */
if (!defined('ALTAWTHIQ_N8N_SIGNUP_WEBHOOK_URL')) {
    define(
        'ALTAWTHIQ_N8N_SIGNUP_WEBHOOK_URL',
        'https://altawthiqsa.app.n8n.cloud/webhook/signup-form'
    );
}
if (!defined('ALTAWTHIQ_N8N_CONTACT_WEBHOOK_URL')) {
    define(
        'ALTAWTHIQ_N8N_CONTACT_WEBHOOK_URL',
        'https://altawthiqsa.app.n8n.cloud/webhook/signup-form'
    );
}

/**
 * Forward form JSON to n8n server-side (avoids browser CORS blocking direct webhook calls).
 */
function altawthiq_rest_forward_form_to_n8n(WP_REST_Request $request)
{
    $params = $request->get_json_params();
    if (!is_array($params)) {
        $params = array();
    }

    $nonce = isset($params['_wpnonce']) ? (string) $params['_wpnonce'] : '';
    if (!wp_verify_nonce($nonce, 'altawthiq_n8n_forward')) {
        return new WP_Error(
            'forbidden',
            __('Session expired. Please refresh the page and try again.', 'altawthiq'),
            array('status' => 403)
        );
    }

    $context = isset($params['context']) ? sanitize_key((string) $params['context']) : '';
    unset($params['_wpnonce'], $params['context']);

    if ($context === 'signup') {
        $url = apply_filters('altawthiq_n8n_signup_webhook_url', ALTAWTHIQ_N8N_SIGNUP_WEBHOOK_URL);
    } elseif ($context === 'contact') {
        $url = apply_filters('altawthiq_n8n_contact_webhook_url', ALTAWTHIQ_N8N_CONTACT_WEBHOOK_URL);
    } else {
        return new WP_Error(
            'bad_request',
            __('Invalid request.', 'altawthiq'),
            array('status' => 400)
        );
    }

    $url = trim((string) $url);
    if ($url === '' || !filter_var($url, FILTER_VALIDATE_URL)) {
        return new WP_Error(
            'misconfigured',
            __('Signup is temporarily unavailable.', 'altawthiq'),
            array('status' => 503)
        );
    }

    $email = isset($params['email']) ? sanitize_email((string) $params['email']) : '';
    if (!$email || !is_email($email)) {
        return new WP_Error(
            'invalid_email',
            __('Please enter a valid email address.', 'altawthiq'),
            array('status' => 400)
        );
    }

    $payload = array(
        'form' => isset($params['form']) ? sanitize_text_field((string) $params['form']) : '',
        'submittedAt' => isset($params['submittedAt']) ? sanitize_text_field((string) $params['submittedAt']) : '',
        'company' => isset($params['company']) ? sanitize_text_field((string) $params['company']) : '',
        'email' => $email,
        'city' => isset($params['city']) ? sanitize_text_field((string) $params['city']) : '',
        'employees' => isset($params['employees']) ? sanitize_text_field((string) $params['employees']) : '',
        'name' => isset($params['name']) ? sanitize_text_field((string) $params['name']) : '',
        'phone' => isset($params['phone']) ? sanitize_text_field((string) $params['phone']) : '',
        'meeting' => isset($params['meeting']) ? sanitize_text_field((string) $params['meeting']) : '',
        'position' => isset($params['position']) ? sanitize_text_field((string) $params['position']) : '',
    );

    $payload = apply_filters('altawthiq_n8n_forward_payload', $payload, $context, $params);

    $http_args = apply_filters(
        'altawthiq_n8n_forward_http_args',
        array(
            'timeout' => 30,
            'blocking' => true,
            'headers' => array(
                'Content-Type' => 'application/json; charset=utf-8',
                'Accept' => 'application/json, text/plain, */*',
            ),
            'body' => wp_json_encode($payload),
        ),
        $payload,
        $url,
        $context
    );

    $response = wp_remote_post($url, $http_args);

    if (is_wp_error($response)) {
        return new WP_Error(
            'n8n_unreachable',
            __('Could not send your request. Please try again later.', 'altawthiq'),
            array('status' => 502)
        );
    }

    $code = (int) wp_remote_retrieve_response_code($response);
    if ($code < 200 || $code >= 300) {
        return new WP_Error(
            'n8n_rejected',
            __('Could not complete the request. Please try again later.', 'altawthiq'),
            array('status' => 502)
        );
    }

    return rest_ensure_response(array('success' => true));
}

add_action('rest_api_init', function () {
    register_rest_route(
        'altawthiq/v1',
        '/n8n-webhook',
        array(
            'methods' => 'POST',
            'callback' => 'altawthiq_rest_forward_form_to_n8n',
            'permission_callback' => '__return_true',
        )
    );
});

/**
 * Signup page form: handle POST on init so WordPress has parsed the request (avoids 404 / wrong redirect URL).
 * Template: page-signup.php — filter altawthiq_page_signup_n8n_url to change webhook.
 */
function altawthiq_signup_redirect_base_from_post()
{
    $page_id = isset($_POST['altawthiq_signup_page_id']) ? (int) $_POST['altawthiq_signup_page_id'] : 0;
    if ($page_id > 0) {
        $url = get_permalink($page_id);
        if ($url) {
            return remove_query_arg(array('signup'), $url);
        }
    }
    $ref = wp_get_referer();
    if ($ref) {
        return remove_query_arg(array('signup'), $ref);
    }
    $path = isset($_SERVER['REQUEST_URI']) ? strtok(wp_unslash($_SERVER['REQUEST_URI']), '?') : '/';
    if ($path === '' || (isset($path[0]) && $path[0] !== '/')) {
        $path = '/' . ltrim((string) $path, '/');
    }

    return home_url($path);
}

function altawthiq_signup_form_handle_post()
{
    if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST' || empty($_POST['altawthiq_signup'])) {
        return;
    }

    if (!isset($_POST['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'altawthiq_page_signup')) {
        wp_safe_redirect(add_query_arg('signup', 'nonce', altawthiq_signup_redirect_base_from_post()));
        exit;
    }

    $payload = array(
        'form' => 'contract_signup',
        'submittedAt' => gmdate('c'),
        'company' => isset($_POST['company']) ? sanitize_text_field(wp_unslash($_POST['company'])) : '',
        'email' => isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '',
        'city' => isset($_POST['city']) ? sanitize_text_field(wp_unslash($_POST['city'])) : '',
        'employees' => isset($_POST['employees']) ? sanitize_text_field(wp_unslash($_POST['employees'])) : '',
        'name' => isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '',
        'phone' => isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '',
        'meeting' => isset($_POST['meeting']) ? sanitize_text_field(wp_unslash($_POST['meeting'])) : '',
        'position' => isset($_POST['position']) ? sanitize_text_field(wp_unslash($_POST['position'])) : '',
    );

    $redirect_base = altawthiq_signup_redirect_base_from_post();

    if (!$payload['email'] || !is_email($payload['email'])) {
        wp_safe_redirect(add_query_arg('signup', 'invalid', $redirect_base));
        exit;
    }

    $webhook = apply_filters('altawthiq_page_signup_n8n_url', ALTAWTHIQ_N8N_SIGNUP_WEBHOOK_URL);
    $webhook = trim((string) $webhook);
    if ($webhook === '' || !filter_var($webhook, FILTER_VALIDATE_URL)) {
        wp_safe_redirect(add_query_arg('signup', 'error', $redirect_base));
        exit;
    }

    $response = wp_remote_post(
        $webhook,
        array(
            'timeout' => 30,
            'headers' => array(
                'Content-Type' => 'application/json; charset=utf-8',
                'Accept' => 'application/json, */*',
            ),
            'body' => wp_json_encode($payload),
        )
    );

    if (is_wp_error($response)) {
        wp_safe_redirect(add_query_arg('signup', 'error', $redirect_base));
        exit;
    }

    $code = (int) wp_remote_retrieve_response_code($response);
    if ($code < 200 || $code >= 300) {
        wp_safe_redirect(add_query_arg('signup', 'error', $redirect_base));
        exit;
    }

    wp_safe_redirect(add_query_arg('signup', 'ok', $redirect_base));
    exit;
}
add_action('init', 'altawthiq_signup_form_handle_post', 20);