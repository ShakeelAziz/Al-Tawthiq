<?php
$tot_url = 'tot.php';
$homeUrl = 'home-ar.php';
$profileUrl = 'profile.php';
$pageTitle = 'جوري القحطاني';
$baseHref = './';
$seoData = function_exists('altawthiq_get_page_seo_data') ? altawthiq_get_page_seo_data('about_juri') : array();
$pageTitle = $seoData['title'] ?? $pageTitle;
$seoDescription = $seoData['description'] ?? '';
$seoKeywords = $seoData['keywords_content'] ?? '';
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <meta name="description" content="<?php echo e($seoDescription); ?>">
  <meta name="keywords" content="<?php echo e($seoKeywords); ?>">
  <meta name="geo.region" content="SA-01">
  <meta name="geo.placename" content="الرياض">
  <title><?php echo e($pageTitle); ?></title>
  <base href="<?php echo e($baseHref); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer">

    <style>
      :root {
        --bg: #0a1323;
        --card: #141f33;
        --text: #e6edf9;
        --muted: #a9b5cc;
        --primary: #6f84f5;
        --accent: #0ea5e9;
        --border: rgba(143, 164, 210, 0.24);
      }

      * {
        box-sizing: border-box;
      }

      body {
        margin: 0;
        font-family: "Tajawal", system-ui, -apple-system, Segoe UI, Arial, sans-serif;
        background:
          radial-gradient(circle at 15% 0%, rgba(111, 132, 245, 0.2), transparent 38%),
          radial-gradient(circle at 85% 10%, rgba(59, 130, 246, 0.16), transparent 44%),
          linear-gradient(180deg, #111b2d 0%, #0c1627 52%, #0a1323 100%);
        color: var(--text);
        line-height: 1.8;
      }

      .container {
        width: min(1180px, 92%);
        margin: 0 auto;
      }

      .top-nav {
        position: sticky;
        top: 0;
        z-index: 20;
        backdrop-filter: blur(8px);
        background: rgba(10, 17, 30, 0.9);
        border-bottom: 1px solid rgba(148, 163, 184, 0.2);
      }

      .top-nav .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 0;
      }

      .logo {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: var(--text);
        font-weight: 800;
      }

      .logo img {
        width: auto;
        height: 50px;
        object-fit: contain;
      }

      .top-nav ul {
        list-style: none;
        display: flex;
        gap: 18px;
        margin: 0;
        padding: 0;
      }

      .top-nav a {
        color: #e2e8f0;
        text-decoration: none;
        font-weight: 600;
      }

      .top-nav a:hover {
        color: #ffffff;
      }

      .hero {
        position: relative;
        min-height: 78vh;
        display: grid;
        place-items: center;
        overflow: hidden;
        text-align: center;
        background-image: url("https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=1800&q=80");
        background-size: cover;
        background-position: center;
      }

      .hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(rgba(6, 11, 22, 0.68), rgba(9, 20, 40, 0.88));
      }

      .hero-content {
        position: relative;
        z-index: 1;
        height: max-content;
        max-width: 980px;
        padding: 48px 10px;
        display: grid;
        grid-template-columns: 1.2fr 0.9fr;
        gap: 26px;
        align-items: center;
      }

      .hero-text {
        text-align: right;
      }

      .hero-portrait {
        margin: 0;
        background: rgba(12, 20, 36, 0.65);
        border: 1px solid rgba(148, 163, 184, 0.26);
        border-radius: 16px;
        padding: 10px;
        box-shadow: 0 16px 32px rgba(2, 6, 23, 0.45);
        height: 100%;
        display: flex;
        flex-direction: column;
      }

      .hero-portrait img {
        width: 100%;
        max-width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 12px;
        display: block;
        margin: 0 auto;
        flex: 1;
      }

      .hero-portrait figcaption {
        margin-top: 10px;
        color: #e2e8f0;
        font-size: 0.95rem;
      }

      .hero h1 {
        margin: 0.2rem 0 0.6rem;
        font-size: clamp(2rem, 5vw, 4.1rem);
      }

      .hero p {
        margin: 0;
        font-size: clamp(1.05rem, 2.3vw, 1.4rem);
        color: #f1f5f9;
      }

      .section {
        padding: 72px 0;
      }

      .card {
        background: rgba(20, 31, 50, 0.88);
        border: 1px solid var(--border);
        border-radius: 18px;
        padding: 28px;
        box-shadow: 0 14px 34px rgba(3, 7, 18, 0.42);
      }

      .section h2 {
        margin-top: 0;
        font-size: clamp(1.5rem, 2.7vw, 2.3rem);
      }

      .bio-grid {
        display: grid;
        grid-template-columns: 1.1fr 1fr;
        gap: 24px;
      }

      .achievements {
        margin: 0;
        padding-right: 18px;
      }

      .achievements li {
        margin-bottom: 8px;
      }

      .gallery-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
      }

      .gallery-item {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 14px;
        overflow: hidden;
      }

      .gallery-item img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        display: block;
      }

      .gallery-item figcaption {
        padding: 12px;
        font-size: 0.95rem;
        color: var(--muted);
      }

      .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px;
      }

      .contact-list {
        list-style: none;
        padding: 0;
        margin: 0;
      }

      .contact-list li {
        margin-bottom: 10px;
      }

      .contact-list a {
        color: #e9d5ff;
        text-decoration: none;
      }

      .contact-list a:hover {
        text-decoration: underline;
      }

      .social-links {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
      }

      .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        text-decoration: none;
        font-weight: 700;
        color: #fff;
        background: linear-gradient(90deg, var(--primary), #4f46e5);
      }

      .social-links a i {
        font-size: 1.2rem;
      }

      .social-links a.whatsapp {
        background: linear-gradient(90deg, var(--accent), #2563eb);
      }

      .footer {
        border-top: 1px solid rgba(148, 163, 184, 0.2);
        text-align: center;
        color: #9fb1cf;
        background: #0a1220;
        padding: 22px 0;
      }

      @media (max-width: 940px) {
        .hero-content {
          grid-template-columns: 1fr;
          text-align: center;
        }

        .hero-text {
          text-align: center;
        }

        .bio-grid,
        .contact-grid {
          grid-template-columns: 1fr;
        }

        .gallery-grid {
          grid-template-columns: repeat(2, minmax(0, 1fr));
        }
      }

      @media (max-width: 600px) {
        .top-nav ul {
          gap: 12px;
          font-size: 0.92rem;
        }

        .gallery-grid {
          grid-template-columns: 1fr;
        }
      }
    </style>
   
</head>
<body>
<nav class="top-nav">
      <div class="container">
        <a class="logo" href="<?php echo e($homeUrl); ?>">
          <img src="assets/images/logo_png.webp" alt="Al Tawthiq" />
        </a>
        <ul>
          <li><a href="<?php echo e($homeUrl); ?>">الرئيسية</a></li>
          <li><a href="<?php echo e($tot_url); ?>">دورة تدريب المدربين</a></li>
          <li><a href="<?php echo e($profileUrl); ?>">نبذة عنا</a></li>
        </ul>

        <a class="logo" href="<?php echo e($homeUrl); ?>">
          <img src="assets/images/white__logo.webp" alt="Al Tawthiq" />
        </a>
      </div>
    </nav>

<header class="hero">
      <div class="hero-content container">
        <div class="hero-text">
          <p> <?php _e('السيرة المهنية والإعلامية', 'altawthiq'); ?></p>
          <h1> <?php _e('جوري القحطاني', 'altawthiq'); ?></h1>
          <p> <?php _e('مدربة، متحدثة، وميسّرة برامج تطوير قيادي وتأثير إعلامي.', 'altawthiq'); ?></p>
        </div>
        <figure class="hero-portrait">
          <img src="assets/mam_jure.jpeg" alt="<?php echo e($pageTitle); ?>" />
        </figure>
      </div>
    </header>

<section class="section">

        <div class="container bio-grid">
          <article class="card">
            <h2><?php _e('من هي جوري القحطاني؟', 'altawthiq'); ?></h2>
            <p>
              جوري القحطاني اسم بارز في مجال التدريب والتأهيل القيادي، حيث تجمع
              <?php _e('بين الخبرة العملية والمنهجية العلمية في تقديم برامج تدريبية تصنع', 'altawthiq'); ?>
              <?php _e('فرقاً ملموساً في أداء الأفراد والفرق. تشتهر بأسلوبها التفاعلي الذي', 'altawthiq'); ?>
              <?php _e('يدمج بين العمق المعرفي والتمارين التطبيقية.', 'altawthiq'); ?>
            </p>
            <p>
              <?php _e('خلال مسيرتها، قدمت عشرات اللقاءات والورش التخصصية في مجالات', 'altawthiq'); ?>
              <?php _e('الإلقاء، بناء المحتوى التدريبي، التيسير، والتوجيه المهني، مع تركيز', 'altawthiq'); ?>
              <?php _e('واضح على تمكين المشاركين من تحويل المعرفة إلى نتائج عملية.', 'altawthiq'); ?>
            </p>
          </article>

          <article class="card">
            <h2><?php _e('أبرز الخبرات والإنجازات', 'altawthiq'); ?></h2>
            <ul class="achievements">
              <li><?php _e('قيادة برامج تدريب المدربين على المستويات الأساسية والمتقدمة.', 'altawthiq'); ?></li>
              <li><?php _e('تقديم لقاءات إعلامية متخصصة في قنوات ومنصات متعددة.', 'altawthiq'); ?></li>
              <li><?php _e('تطوير حقائب تدريبية عملية موجهة لسوق العمل السعودي.', 'altawthiq'); ?></li>
              <li><?php _e('تأهيل مدربين ومدربات لبناء حضور احترافي مؤثر.', 'altawthiq'); ?></li>
              <li><?php _e('المساهمة في مبادرات تعليمية ومجتمعية مرتبطة بالتنمية البشرية.', 'altawthiq'); ?></li>
            </ul>
          </article>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <article class="card">
            <h2><?php _e('معرض الظهور الإعلامي (قنوات وبرامج)', 'altawthiq'); ?></h2>
            <p><?php _e('معرض صور لظهور جوري القحطاني الإعلامي في البرامج التلفزيونية والمنصات المتخصصة، حيث عرضت خبرتها في التدريب القيادي والتطوير المهني، وقدمت مواضيع عملية حول بناء القادة وتطوير فرق العمل وتعزيز الأداء المؤسسي.', 'altawthiq'); ?>
            </p>
            <div class="gallery-grid">
              <figure class="gallery-item">
                <img src="assets/mam_jure.jpeg" alt="ظهور إعلامي 1" />
                <figcaption><?php _e('برنامج حواري - القناة الأولى', 'altawthiq'); ?></figcaption>
              </figure>
              <figure class="gallery-item">
                <img src="assets/mam_jure.jpeg" alt="ظهور إعلامي 2" />
                <figcaption><?php _e('لقاء تدريبي - قناة أعمال', 'altawthiq'); ?></figcaption>
              </figure>
              <figure class="gallery-item">
                <img src="assets/mam_jure.jpeg" alt="ظهور إعلامي 3" />
                <figcaption><?php _e('تغطية خاصة - منصة رقمية', 'altawthiq'); ?></figcaption>
              </figure>
              <figure class="gallery-item">
                <img src="assets/mam_jure.jpeg" alt="ظهور إعلامي 4" />
                <figcaption><?php _e('حلقة نقاش - قناة ثقافية', 'altawthiq'); ?></figcaption>
              </figure>
              <figure class="gallery-item">
                <img src="assets/mam_jure.jpeg" alt="ظهور إعلامي 5" />
                <figcaption><?php _e('مقابلة مباشرة - قناة إخبارية', 'altawthiq'); ?></figcaption>
              </figure>
              <figure class="gallery-item">
                <img src="assets/mam_jure.jpeg" alt="ظهور إعلامي 6" />
                <figcaption><?php _e('ندوة تلفزيونية - قناة تعليمية', 'altawthiq'); ?></figcaption>
              </figure>
              <figure class="gallery-item">
                <img src="assets/mam_jure.jpeg" alt="ظهور إعلامي 7" />
                <figcaption><?php _e('مداخلة مهنية - قناة أعمال', 'altawthiq'); ?></figcaption>
              </figure>
              <figure class="gallery-item">
                <img src="assets/mam_jure.jpeg" alt="ظهور إعلامي 8" />
                <figcaption><?php _e('حلقة خاصة - منصة بودكاست مرئية', 'altawthiq'); ?></figcaption>
              </figure>
              <figure class="gallery-item">
                <img src="assets/mam_jure.jpeg" alt="ظهور إعلامي 9" />
                <figcaption><?php _e('استضافة رئيسية - قناة محلية', 'altawthiq'); ?></figcaption>
              </figure>
            </div>
          </article>
        </div>
      </section>

      <section class="section">
        <div class="container contact-grid">
          <article class="card">
            <h2><?php _e('التواصل المباشر', 'altawthiq'); ?></h2>
            <ul class="contact-list">
              <li><?php _e('الهاتف: ', 'altawthiq'); ?> <a href="tel:+966553300598"> ‎+966 553 300 598</a></li>
              <li>
                <?php _e('البريد الإلكتروني: ', 'altawthiq'); ?>
                <a href="mailto:info@altawthiq.com">info@altawthiq.com</a>
              </li>
              <li><?php _e('الموقع: الرياض، المملكة العربية السعودية', 'altawthiq'); ?></li>
            </ul>
          </article>

          <article class="card">
            <h2><?php _e('روابط التواصل الاجتماعي', 'altawthiq'); ?></h2>
            <div class="social-links">
              <a href="https://www.linkedin.com/company/tawthiq-sa" target="_blank" rel="noopener" aria-label="LinkedIn">
                <i class="fa-brands fa-linkedin-in"></i>
              </a>
              <a href="https://www.facebook.com/Jurehaif" target="_blank" rel="noopener" aria-label="Facebook">
                <i class="fa-brands fa-facebook-f"></i>
              </a>
              <a href="https://www.instagram.com/tawthiqsa/" target="_blank" rel="noopener" aria-label="Instagram">
                <i class="fa-brands fa-instagram"></i>
              </a>
              <a href="https://x.com/Altawthiq_sa/" target="_blank" rel="noopener" aria-label="X">
                <i class="fa-brands fa-x-twitter"></i>
              </a>
             <a href="https://wa.me/966553300598" target="_blank" rel="noopener" aria-label="WhatsApp">
                <i class="fa-brands fa-whatsapp"></i>
              </a>
            </div>
          </article>
        </div>
      </section>  
    </main>
    
    <?php include 'footer.php'; ?>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script src="./js/main.js"></script>
      <script>
        AOS.init({ once: true, duration: 700 });
      </script>
    </body>
    </html>