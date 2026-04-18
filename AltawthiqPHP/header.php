<?php
$currentLang = is_rtl() ? 'ar' : 'en';
$homePagePath = ($currentLang === 'ar') ? '/home-ar' : '/home';
$isArabicProductsOrContact = is_page(array('products-ar', 'contact-ar'));
$isBlogContext = is_home() || is_archive() || is_single() || is_page('blog');
$isArabicHome = is_page('home-ar');
$isEnglishProductsOrContact = is_page(array('products', 'contact'));
$isEnglishHome = is_page('home');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="__variable_6bee3b lenis lenis-smooth">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#5B4B9A">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="geo.region" content="SA-01">
    <meta name="geo.placename" content="<?php echo esc_attr(($currentLang === 'ar') ? 'الرياض' : 'Riyadh'); ?>">
    <meta name="geo.position" content="24.7136;46.6753">
    <meta name="ICBM" content="24.7136, 46.6753">

    <!-- SEO Title -->
    <title>
        <?php
        if ($currentLang == 'ar') {
            echo "التدريب المؤسسي في الرياض | دورات تدريبية معتمدة | التوثيق";
        } else {
            echo "Corporate Training in Riyadh | Professional Training Programs | Altathiq";
        }
        ?>
    </title>

    <!-- SEO Description -->
    <?php if ($currentLang == 'en') { ?>
        <meta name="description"
            content="Altathiq provides corporate training programs and professional development courses in Riyadh, Saudi Arabia. We help companies and individuals improve skills through certified training programs.">

    <?php } else { ?>
        <meta name="description"
            content="أفضل مركز تدريب في الرياض يقدم دورات تدريبية معتمدة وبرامج تدريب الشركات لتطوير المهارات ورفع كفاءة الموظفين في السعودية.">
    <?php } ?>

    <!-- SEO Keywords (local intent: Riyadh + Saudi Arabia) -->
    <?php if ($currentLang == 'en') { ?>
        <meta name="keywords"
            content="training Riyadh, corporate training Riyadh, training courses Riyadh, training programs Riyadh, training institute Riyadh, training center Riyadh, skill development, professional training Saudi Arabia, employee training, leadership development, in-house corporate training, certified courses Saudi Arabia, certified training Riyadh, training certificates, innovation courses, design thinking, creative problem solving, AI courses, AI for HR, digital transformation, HR courses, performance appraisal, digital marketing courses, social media marketing, content creation, Altawthiq, Riyadh Saudi Arabia">
    <?php } else { ?>
        <meta name="keywords"
            content="تدريب, دورات تدريبية, برامج تدريبية, معهد تدريب, مركز تدريب, تطوير المهارات, تنمية بشرية, تدريب مهني, تدريب إداري, تدريب احترافي, التدريب في السعودية, تدريب في الرياض, دورات الرياض, معهد تدريب بالرياض, دورات معتمدة, دورات معتمدة الرياض, دورات معتمدة في السعودية, شهادات تدريبية, دورات بشهادة معتمدة, تسجيل دورة تدريبية, حجز دورة تدريب, أفضل معهد تدريب في الرياض, أسعار الدورات التدريبية, دورة تدريب حضوري, دورة تدريب عن بعد, التسجيل في برنامج تدريبي, كورسات تطوير مهني, تدريب الموظفين, تطوير القيادات, برامج تدريب الشركات, تدريب داخلي للشركات, حلول تدريبية للمؤسسات, تأهيل الكوادر, رفع كفاءة الموظفين, الابتكار والتفكير, دورات الابتكار, التفكير الابتكاري, التفكير التصميمي, الإبداع المؤسسي, حل المشكلات بطريقة إبداعية, مهارات التفكير, الذكاء الاصطناعي, دورات الذكاء الاصطناعي, استخدام الذكاء الاصطناعي في العمل, أدوات الذكاء الاصطناعي, AI في الموارد البشرية, التحول الرقمي, الموارد البشرية, دورات HR, إدارة الموارد البشرية, تطوير الموظفين, تقييم الأداء, التسويق, التسويق الرقمي, دورات التسويق, إدارة الحملات الإعلانية, التسويق عبر السوشيال ميديا, صناعة المحتوى, التوثيق, الرياض, السعودية">
    <?php } ?>

    <!-- Canonical -->
    <?php
    $canonical_url = '';
    if (function_exists('wp_get_canonical_url')) {
        $canonical_url = wp_get_canonical_url();
    }
    if (!$canonical_url) {
        $canonical_url = (function_exists('get_permalink') && is_singular()) ? get_permalink() : home_url('/');
    }
    ?>
    <link rel="canonical" href="<?php echo esc_url($canonical_url); ?>">

    <!-- hreflang -->
    <link rel="alternate" hreflang="ar-SA" href="<?php echo esc_url(home_url('/home-ar')); ?>">
    <link rel="alternate" hreflang="en-SA" href="<?php echo esc_url(home_url('/home')); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo esc_url(home_url('/')); ?>">

    <!-- Open Graph -->
    <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <meta property="og:locale" content="<?php echo esc_attr(($currentLang === 'ar') ? 'ar_SA' : 'en_US'); ?>">
    <meta property="og:locale:alternate" content="<?php echo esc_attr(($currentLang === 'ar') ? 'en_US' : 'ar_SA'); ?>">
    <meta property="og:title"
        content="<?php echo ($currentLang == 'ar') ? 'التدريب المؤسسي في الرياض | التوثيق' : 'Corporate Training in Riyadh | Al-Tawthiq'; ?>">

    <meta property="og:description"
        content="<?php echo ($currentLang == 'ar') ? 'برامج تدريبية احترافية للشركات والأفراد في الرياض.' : 'Professional training programs for companies and individuals in Riyadh, Saudi Arabia.'; ?>">

    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url($canonical_url); ?>">
    <meta property="og:image" content="<?php echo esc_url(home_url('/assets/images/main_logo_green.webp')); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Altawthiq Training Riyadh">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title"
        content="<?php echo ($currentLang == 'ar') ? 'التدريب في الرياض | التوثيق' : 'Corporate Training in Riyadh | Altathiq'; ?>">
    <meta name="twitter:description"
        content="<?php echo ($currentLang == 'ar') ? 'دورات تدريبية معتمدة في الرياض للشركات والأفراد.' : 'Corporate training programs in Riyadh, Saudi Arabia.'; ?>">

    <?php wp_head(); ?>

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Altathiq Training",
        "url": "<?php echo esc_url(home_url('/')); ?>",
        "logo": "<?php echo esc_url(home_url('/assets/images/logo_png.webp')); ?>",
        "image": "<?php echo esc_url(home_url('/assets/images/main_logo_green.webp')); ?>",
        "email": "info@altawthiq.com",
        "telephone": "+966553300598",
        "sameAs": [],
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": 24.7136,
            "longitude": 46.6753
        },
        "areaServed": [
            {
                "@type": "AdministrativeArea",
                "name": "Riyadh"
            },
            {
                "@type": "Country",
                "name": "Saudi Arabia"
            }
        ],
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Al-Murabba, near Passport Department Station",
            "addressLocality": "Riyadh",
            "addressRegion": "Riyadh Province",
            "addressCountry": "Saudi Arabia"
        },
        "contactPoint": [
            {
                "@type": "ContactPoint",
                "telephone": "+966553300598",
                "contactType": "customer service",
                "email": "info@altawthiq.com",
                "areaServed": "SA",
                "availableLanguage": ["ar", "en"]
            }
        ]
    }
    </script>

</head>



<body <?php body_class(); ?> <?php echo is_rtl() ? 'dir="rtl"' : 'dir="ltr"'; ?>>
    <?php wp_body_open(); ?>

    <!-- NAVBAR -->
    <nav id="nav">
        <div class="container">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url($homePagePath)); ?>" class="logo">

                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_png.webp"
                    alt="<?php bloginfo('name'); ?>">

            </a>

            <!-- Primary Menu -->
            <div class="hamburger" onclick="toggleMenu()">
                ☰
            </div>

            <ul id="navMenu">
                <?php if ($currentLang == 'ar') { ?>

                    <!-- Arabic Menu -->
                    <?php if ($isArabicProductsOrContact) { ?>
                        <li><a href="<?php echo esc_url(home_url('/home-ar/')); ?>">الرئيسية</a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">المدونة</a></li>
                        <li><a href="<?php echo esc_url(home_url('/about/')); ?>">نبذه عنا</a></li>
                    <?php } elseif ($isBlogContext && !$isArabicHome) { ?>
                        <li><a href="<?php echo esc_url(home_url('/home-ar/')); ?>">الرئيسية</a></li>
                        <li><a href="<?php echo esc_url(home_url('/products-ar/')); ?>">منتجات رقميه</a></li>
                        <li><a href="<?php echo esc_url(home_url('/about/')); ?>">نبذه عنا</a></li>
                    <?php } else { ?>
                        <li class="dropdown">
                            <a href="#" class="dropbtn">الخدمات ▾</a>
                            <ul class="dropdown-content">
                            <li><a href="<?php echo esc_url(home_url('/contact-ar/')); ?>">تصميم وابتكار البرامــــج التدريبية</a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact-ar/')); ?>">اداره وتنفيذ الــمــشــاريـع الـتــدريـبـية</a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact-ar/')); ?>">الاستشارات والتـــــطـويـر المـهـنـي</a>
                            </li>
                            <li><a href="<?php echo esc_url(home_url('/contact-ar/')); ?>">تــنــفــيـذ الـبــرامـج الـتـــــدريـبـيـة</a>
                            </li>
                            <li><a href="<?php echo esc_url(home_url('/contact-ar/')); ?>">اعتماد الشهادات-اصدار تــراخيص</a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact-ar/')); ?>">تحليل واعداد الــبرامج وفق الاحتياج</a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact-ar/')); ?>">التقييــمات وقياس الأثر على التدريب</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">المدونة</a></li>
                        <li><a href="<?php echo esc_url(home_url('/about/')); ?>">نبذه عنا</a></li>
                        <li><a href="<?php echo esc_url(home_url('/products-ar/')); ?>">منتجات رقميه</a></li>
                    <?php } ?>

                <?php } else { ?>

                    <!-- English Menu -->
                    <?php if ($isEnglishProductsOrContact) { ?>
                        <li><a href="<?php echo esc_url(home_url('/home/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">Blogs</a></li>
                        <li><a href="<?php echo esc_url(home_url('/about/')); ?>">About Us</a></li>
                    <?php } elseif ($isBlogContext && !$isEnglishHome) { ?>
                        <li><a href="<?php echo esc_url(home_url('/home/')); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url(home_url('/products/')); ?>">Digital Products</a></li>
                        <li><a href="<?php echo esc_url(home_url('/about/')); ?>">About Us</a></li>
                    <?php } else { ?>
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Services ▾</a>
                            <ul class="dropdown-content">
                            <li><a
                                    href="<?php echo esc_url(home_url('/contact')); ?>"><?php _e('Design and Development of Training Programs', 'altawthiq'); ?></a>
                            </li>
                            <li><a
                                    href="<?php echo esc_url(home_url('/contact')); ?>"><?php _e('Training Project Management', 'altawthiq'); ?></a>
                            </li>
                            <li><a
                                    href="<?php echo esc_url(home_url('/contact')); ?>"><?php _e('Consulting and Professional Development', 'altawthiq'); ?></a>
                            </li>
                            <li><a
                                    href="<?php echo esc_url(home_url('/contact')); ?>"><?php _e('Implementation of Training Programs', 'altawthiq'); ?></a>
                            </li>
                            <li><a
                                    href="<?php echo esc_url(home_url('/contact')); ?>"><?php _e('Certification Accreditation and Licensing Services', 'altawthiq'); ?></a>
                            </li>
                            <li><a
                                    href="<?php echo esc_url(home_url('/contact')); ?>"><?php _e('Training Needs Analysis and Program Development', 'altawthiq'); ?></a>
                            </li>
                            <li><a
                                    href="<?php echo esc_url(home_url('/contact')); ?>"><?php _e('Training Evaluation and Impact Measurement', 'altawthiq'); ?></a>
                            </li>
                            </ul>
                        </li>
                        <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">Blogs</a></li>
                        <li><a href="<?php echo esc_url(home_url('/about/')); ?>">About Us</a></li>
                        <li><a href="<?php echo esc_url(home_url('/products/')); ?>">Digital Products</a></li>
                    <?php } ?>

                <?php } ?>

                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'fallback_cb' => false,
                        'depth' => 2,
                        'items_wrap' => '%3$s',
                        'link_before' => '',
                        'link_after' => ''
                    ));
                }
                ?>
                <?php if ($currentLang == 'ar') { ?>
                    <div class="lang-switcher a">
                        <a class="active" href="<?php echo esc_url(home_url('/home')); ?>">
                            <?php _e('En', 'altawthiq'); ?>
                        </a>
                    </div>

                <?php } else { ?>
                    <div class="lang-switcher a">
                        <a class="active" href="<?php echo esc_url(home_url('/home-ar')); ?>">
                            <?php _e('Ar', 'altawthiq'); ?>
                        </a>
                    </div>
                <?php }
                ?>

            </ul>

            <a href="<?php echo esc_url(home_url($homePagePath)); ?>" class="logo">

                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/white__logo.webp"
                    alt="<?php bloginfo('name'); ?>">

            </a>

        </div>
    </nav>