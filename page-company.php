<?php
declare(strict_types=1);

$pageTitle = 'الملف التعريفي | شركة التوثيق الوطني للتدريب';
$baseHref = './';
$homeUrl = 'home-ar.php';
$profileUrl = 'profile.php';
$contactUrl = 'contact-ar.php';
$totUrl = 'tot-ar.php';

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
    .company-page {
      background: linear-gradient(180deg, #f7f2ff 0%, #ffffff 45%);
      padding-bottom: 70px;
    }

    #navbar {
      background: linear-gradient(90deg, #f8f7ff 0%, #ebe6ff 50%, #e3dcff 100%);
      border-bottom: none;
      box-shadow: 0 6px 18px rgba(96, 69, 145, 0.12);
    }

    #navbar a,
    #navbar .lang-switch,
    #navbar .dropbtn {
      color: #4f3a79;
    }

    #navbar a:hover {
      color: #6d4ca6;
    }

    #navbar .dropdown-content {
      background: #f8f5ff;
      border: 1px solid rgba(109, 84, 162, 0.2);
    }

    #navbar .dropdown-content a {
      color: #4a356f;
    }

    #navbar .logo.logo-secondary img {
      height: 72px !important;
      max-height: 72px !important;
      width: auto;
      object-fit: contain;
      mix-blend-mode: multiply;
    }

    .company-hero {
      position: relative;
      min-height: 620px;
      margin-top: 90px;
      background:
        radial-gradient(circle at 88% 15%, rgba(121, 95, 178, 0.22), transparent 28%),
        radial-gradient(circle at 10% 82%, rgba(105, 161, 255, 0.2), transparent 30%),
        linear-gradient(130deg, #edf3ff 0%, #dcd6ff 52%, #f2e7ff 100%) !important;
      background-size: 140% 140% !important;
      display: flex;
      align-items: center;
      overflow: hidden;
      animation: heroGradientShift 10s ease-in-out infinite;
    }

    .company-hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.35), rgba(255, 255, 255, 0) 52%);
      opacity: 1;
      z-index: 0;
    }

    .company-hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background:
        linear-gradient(90deg, rgba(111, 84, 176, 0.22), rgba(88, 155, 246, 0.18), rgba(175, 140, 240, 0.2)),
        repeating-linear-gradient(
          0deg,
          rgba(88, 92, 140, 0.12) 0px,
          rgba(88, 92, 140, 0.12) 1px,
          transparent 1px,
          transparent 28px
        ),
        repeating-linear-gradient(
          90deg,
          rgba(88, 92, 140, 0.12) 0px,
          rgba(88, 92, 140, 0.12) 1px,
          transparent 1px,
          transparent 28px
        );
      background-size: 220% 220%, 100% 100%, 100% 100%;
      animation: graphFlow 14s linear infinite;
      z-index: 1;
    }

    .hero-orb {
      position: absolute;
      border-radius: 999px;
      filter: blur(1px);
      pointer-events: none;
      z-index: 1;
      opacity: 1 !important;
      animation: floatOrb 8s ease-in-out infinite;
    }

    .hero-orb.one {
      width: 220px;
      height: 220px;
      top: 55px;
      right: 6%;
      background: radial-gradient(circle, rgba(126, 96, 190, 0.55), rgba(126, 96, 190, 0.08));
    }

    .hero-orb.two {
      width: 170px;
      height: 170px;
      bottom: 40px;
      left: 8%;
      background: radial-gradient(circle, rgba(94, 163, 255, 0.5), rgba(94, 163, 255, 0.08));
      animation-delay: 1.4s;
    }

    .hero-orb.three {
      width: 110px;
      height: 110px;
      top: 42%;
      right: 24%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.98), rgba(255, 255, 255, 0.15));
      animation-delay: 0.6s;
    }

    @keyframes heroGradientShift {
      0%, 100% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
    }

    @keyframes graphFlow {
      0% {
        background-position: 0% 50%, 0 0, 0 0;
      }
      100% {
        background-position: 100% 50%, 0 28px, 28px 0;
      }
    }

    @keyframes floatOrb {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-14px); }
    }

    .hero-layout {
      position: relative;
      z-index: 2;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      padding: 40px 0;
    }

    .company-hero-content {
      position: relative;
      color: #2e2859;
      text-align: center;
      max-width: 900px;
      animation: fadeInUpHero 900ms ease both;
      background: linear-gradient(160deg, rgba(255, 255, 255, 0.66), rgba(255, 255, 255, 0.4));
      border: 1px solid rgba(108, 84, 166, 0.24);
      border-radius: 26px;
      padding: 34px 30px;
      backdrop-filter: blur(8px);
      box-shadow: 0 22px 56px rgba(63, 40, 107, 0.16);
    }

    .company-hero h1 {
      font-size: clamp(32px, 5vw, 48px);
      line-height: 1.2;
      margin-bottom: 18px;
      letter-spacing: -0.02em;
    }

    .company-hero p {
      font-size: clamp(18px, 2.4vw, 23px);
      line-height: 1.9;
      color: #5a4782;
      animation: fadeInUpHero 1200ms ease both;
    }

    .hero-badge {
      display: inline-block;
      padding: 8px 16px;
      border-radius: 999px;
      background: linear-gradient(135deg, rgba(91, 75, 154, 0.16), rgba(94, 163, 255, 0.18));
      color: #433174;
      font-weight: 700;
      margin-bottom: 14px;
      font-size: 14px;
      border: 1px solid rgba(91, 75, 154, 0.16);
      animation: fadeInUpHero 800ms ease both;
    }

    .hero-divider {
      width: 120px;
      height: 4px;
      margin: 0 auto 18px;
      border-radius: 999px;
      background: linear-gradient(90deg, rgba(94, 163, 255, 0.9), rgba(107, 76, 167, 0.9));
      animation: fadeInUpHero 1000ms ease both;
    }

    @keyframes fadeInUpHero {
      from {
        opacity: 0;
        transform: translateY(24px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes heroFloatBg {
      0%, 100% {
        transform: scale(1) translateY(0);
      }
      50% {
        transform: scale(1.03) translateY(-8px);
      }
    }

    .company-hero::before {
      animation: heroFloatBg 12s ease-in-out infinite;
    }

    .company-content {
      margin-top: -45px;
      position: relative;
      z-index: 3;
    }

    .section-card {
      background: #fff;
      border: 1px solid rgba(111, 76, 162, 0.18);
      box-shadow: 0 14px 34px rgba(86, 51, 141, 0.08);
      border-radius: 20px;
      padding: 34px 28px;
      margin-bottom: 22px;
    }

    .section-card h2 {
      color: #5e3a9f;
      font-size: 30px;
      margin-bottom: 16px;
    }

    .section-card p,
    .section-card li {
      font-size: 21px;
      line-height: 2;
      color: #302542;
      font-weight: 500;
    }

    .company-content > .container > .section-card:first-child p {
      text-align: center;
    }

    .section-card ul,
    .section-card ol {
      padding-right: 22px;
    }

    .section-card li {
      margin-bottom: 8px;
    }

    .company-achiev-grid {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 28px;
    }

    .company-achiev-grid .achiev-item {
      margin-bottom: 0;
    }

    .company-info-card {
      height: 100%;
      text-align: center;
      padding: 22px 20px;
    }

    .company-info-card h2 {
      color: #5b4b9a;
      font-size: 24px;
      margin-bottom: 18px;
      text-align: center;
    }

    .partners-title {
      color: #5b4b9a !important;
      font-size: 24px !important;
      margin-bottom: 10px !important;
      text-align: center;
    }

    .company-info-card p,
    .company-info-card li {
      font-size: 18px;
      line-height: 1.9;
      color: rgba(24, 35, 61, 0.9);
      font-weight: 600;
    }

    .company-info-card ul,
    .company-info-card ol {
      margin: 0;
      padding: 0;
      list-style: none;
      display: flex;
      flex-wrap: nowrap;
      gap: 16px;
    }

    .company-info-card li {
      margin-bottom: 0;
      background: linear-gradient(180deg, #f4edff 0%, #ede4ff 100%);
      border: 1px solid rgba(91, 75, 154, 0.24);
      border-radius: 12px;
      padding: 10px 12px;
      min-height: 200px;
      box-shadow: 0 4px 12px rgba(91, 75, 154, 0.08);
      transition: all 0.25s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      flex: 1 1 0;
      min-width: 0;
    }

    .company-info-card li:hover {
      background: #ffffff;
      border-color: #5b4b9a;
      transform: translateY(-2px);
    }

    .company-info-card.list-out {
      background: transparent !important;
      border: 0 !important;
      box-shadow: none !important;
      padding: 0 !important;
    }

    .section-card.achiev-style {
      background: linear-gradient(180deg, #ece3ff 0%, #ece3ff 100%);
      border: 2px solid transparent;
      box-shadow: 0 8px 24px rgba(91, 75, 154, 0.12);
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .section-card.achiev-style:hover {
      background: linear-gradient(180deg, #ffffff 0%, #ffffff 100%);
      border-color: #5b4b9a;
      box-shadow: 0 20px 50px rgba(91, 75, 154, 0.25);
      transform: translateY(-6px);
    }

    .section-card.achiev-style h2 {
      color: #5b4b9a;
    }

    .cards-grid-2 {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 22px;
      margin-bottom: 22px;
    }

    .cards-grid-2 .section-card {
      margin-bottom: 0;
      height: 100%;
    }

    .values-wrapper {
      display: flex;
      flex-direction: column;
      gap: 14px;
      align-items: stretch;
    }

    .values-title {
      text-align: center;
      color: #5b4b9a;
      font-size: 30px;
      margin: 0;
    }

    .values-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
    }

    .values-list li {
      background: linear-gradient(180deg, #f3ebff 0%, #ede2ff 100%);
      border: 1px solid rgba(91, 75, 154, 0.22);
      border-radius: 14px;
      padding: 14px 12px;
      text-align: center;
      font-size: 19px;
      line-height: 1.6;
      color: #302542;
      font-weight: 700;
      margin: 0;
      box-shadow: 0 6px 18px rgba(91, 75, 154, 0.1);
      transition: all 0.3s ease;
    }

    .values-list li:hover {
      background: #ffffff;
      border-color: #5b4b9a;
      transform: translateY(-3px);
    }

    .grid-2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 22px;
    }

    .partners-placeholder {
      border: 2px dashed rgba(111, 76, 162, 0.35);
      background: #faf6ff;
      border-radius: 14px;
      padding: 30px;
      text-align: center;
      color: #6e4aad;
      font-size: 20px;
      font-weight: 700;
    }

    .contact-box {
      background: linear-gradient(180deg, #ece3ff 0%, #ece3ff 100%);
      border: 2px solid transparent;
      box-shadow: 0 8px 24px rgba(91, 75, 154, 0.12);
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .contact-box:hover {
      background: linear-gradient(180deg, #ffffff 0%, #ffffff 100%);
      border-color: #5b4b9a;
      box-shadow: 0 20px 50px rgba(91, 75, 154, 0.25);
      transform: translateY(-6px);
    }

    .contact-box h2 {
      color: #5b4b9a;
    }

    .contact-box p {
      color: #302542;
      margin-bottom: 8px;
      font-size: 19px;
    }

    .contact-box a {
      color: #302542;
      text-decoration: none;
      border-bottom: 1px solid rgba(48, 37, 66, 0.4);
    }

    @media (max-width: 900px) {
      .grid-2 {
        grid-template-columns: 1fr;
      }

      .cards-grid-2 {
        grid-template-columns: 1fr;
      }

      .values-list {
        grid-template-columns: 1fr;
      }

      .company-hero {
        min-height: auto;
      }

      .hero-layout {
        padding: 30px 0;
      }

      .section-card p,
      .section-card li {
        font-size: 18px;
      }
    }
  </style>
</head>
<body>

  <nav id="navbar">
    <div class="container">
      <a href="<?php echo e($homeUrl); ?>" class="logo">
        <img src="assets/images/main_logo_green.webp" alt="Al Tawthiq">
      </a>

      <ul>
        <!-- <li class="dropdown">
          <a href="#" class="dropbtn">الخدمات▾</a>
          <ul class="dropdown-content">
            <li><a href="contact-ar.html">تصميم وابتكار البرامج التدريبه </a></li>
            <li><a href="contact-ar.html">اداره المشاريع التدريبه</a></li>
            <li><a href="contact-ar.html">الاستشارات والتطوير المهني </a></li>
            <li><a href="contact-ar.html">التدريب حضوري ( محلي -دولي )</a></li>
            <li><a href="contact-ar.html">تدريب اونلاين (مباشر - متزامن )</a></li>
            <li><a href="contact-ar.html">اعتماد الشهادات - اصدار تراخيص </a></li>
            <li><a href="contact-ar.html">تحليل واعداد البرامج وفق الاحتياج </a></li>
            <li><a href="contact-ar.html">التقييمات وقياس الأثر على التدريب</a></li>
          </ul>
        </li> -->
        <li><a href="<?php echo e($totUrl); ?>">بروفايل</a></li>
        <li><a href="<?php echo e($profileUrl); ?>">نبذه عنا</a></li>
        <li><a href="<?php echo e($contactUrl); ?>">تواصل معنا</a></li>

      </ul>

      <a href="<?php echo e($homeUrl); ?>" class="logo logo-secondary">
        <img src="assets/images/company_logo1.png" alt="Al Tawthiq">
        <!-- <img src="https://static.wixstatic.com/media/6ec07f_ea040f6a8391419486a9a1ea0526120b~mv2.png/v1/fill/w_980,h_980,al_c,q_90,usm_0.66_1.00_0.01,enc_avif,quality_auto/%D9%84%D9%85%D8%A4%D8%B3%D8%B3%D8%A9%20%D8%A7%D9%84%D8%B9%D8%A7%D9%85%D8%A9%20%D9%84%D9%84%D8%AA%D8%AF%D8%B1%D9%8A%D8%A8%20%D8%A7%D9%84%D8%AA%D9%82%D9%86%D9%8A%20%D9%88%D8%A7%D9%84%D9%85%D9%87%D9%86%D9%8A.png" alt="Al Tawthiq"> -->
      </a>
    </div>
  </nav>

  <main class="company-page">
    <section class="company-hero">
      <div class="container">
        <div class="hero-layout">
          <div class="company-hero-content" data-aos="fade-up">
            <span class="hero-badge">شريكك في بناء القدرات التنافسية</span>
            <div class="hero-divider"></div>
            <h1>شركة التوثيق الوطني للتدريب</h1>
            <p>
              جهة متخصصة في تصميم وتنفيذ البرامج التدريبية والمشاريع التطويرية، تقدم حلولًا احترافية تستهدف
              تطوير الكفاءات ورفع جودة الأداء المؤسسي.
            </p>
          </div>
        </div>
        <span class="hero-orb one"></span>
        <span class="hero-orb two"></span>
        <span class="hero-orb three"></span>
      </div>
    </section>

    <section class="company-content">
      <div class="container">
        <div class="section-card" data-aos="fade-up">
          <p>
            نعمل مع الجهات الحكومية، القطاع الخاص، والقطاع غير الربحي، ونقدم برامج تدريبية مصممة وفق الاحتياج
            الفعلي لكل جهة، مع التركيز على تحقيق الأثر وليس فقط تقديم المحتوى.
          </p>
        </div>

        <div class="company-achiev-grid">
          <div class="achiev-item" data-aos="fade-up">
            <div class="stat-card company-info-card">
              <h2>رؤيتنا</h2>
              <p>أن نكون شريكًا استراتيجيًا موثوقًا في تطوير القدرات البشرية، وصناعة برامج تدريبية ذات أثر مستدام.</p>
            </div>
          </div>

          <div class="achiev-item" data-aos="fade-up" data-aos-delay="80">
            <div class="stat-card company-info-card">
              <h2>رسالتنا</h2>
              <p>تصميم وتنفيذ تجارب تدريبية متكاملة تسهم في تطوير الأفراد، وتمكين الجهات، ورفع كفاءة الأداء المؤسسي.</p>
            </div>
          </div>

          <div class="achiev-item" data-aos="fade-up">
            <div class="stat-card company-info-card list-out">
              <h2>قيمنا</h2>
              <ul>
                <li>الجودة في التنفيذ</li>
                <li>الاحترافية في العمل</li>
                <li>التركيز على الأثر</li>
                <li>الشراكة مع الجهات</li>
                <li>الابتكار في الحلول</li>
              </ul>
            </div>
          </div>

          <div class="achiev-item" data-aos="fade-up">
            <div class="stat-card company-info-card list-out">
              <h2>ماذا نقدم</h2>
              <ul>
                <li>تصميم البرامج التدريبية</li>
                <li>تحليل الاحتياج التدريبي</li>
                <li>تنفيذ البرامج والدورات</li>
                <li>إدارة المشاريع التدريبية</li>
                <li>قياس أثر التدريب</li>
                <li>تنظيم وتنفيذ ورش العمل</li>
                <li>تقديم حلول تدريبية مخصصة حسب احتياج الجهة</li>
              </ul>
            </div>
          </div>

          <div class="achiev-item" data-aos="fade-up">
            <div class="stat-card company-info-card list-out">
              <h2>خبراتنا</h2>
              <ul>
                <li>تدريب أكثر من 30,000 متدرب</li>
                <li>خبرة 11 سنة</li>
                <li>تنفيذ مشاريع تدريبية مع جهات حكومية</li>
                <li>العمل مع القطاع الخاص والقطاع غير الربحي</li>
                <li>إدارة مشاريع تدريبية من التخطيط حتى التنفيذ والتقييم</li>
                <li>تقديم برامج تدريبية نوعية في مختلف المجالات</li>
              </ul>
            </div>
          </div>

          <div class="achiev-item" data-aos="fade-up">
            <div class="stat-card company-info-card list-out">
              <h2>منهجية العمل</h2>
              <ol>
                <li>تحليل الاحتياج التدريبي</li>
                <li>تصميم البرنامج وفق أهداف الجهة</li>
                <li>تنفيذ البرنامج بأساليب تفاعلية</li>
                <li>متابعة الأداء والتفاعل</li>
                <li>قياس الأثر وتحسين النتائج</li>
              </ol>
            </div>
          </div>

          <div class="achiev-item" data-aos="fade-up">
            <div class="stat-card company-info-card list-out">
              <h2>نموذج عملنا مع الجهات</h2>
              <ul>
                <li>برامج مخصصة بالكامل</li>
                <li>مرونة في التنفيذ (داخل الجهة – خارجها – أونلاين)</li>
                <li>اختيار المدربين المناسبين</li>
                <li>تصميم البرامج حسب الميزانية</li>
                <li>إدارة متكاملة للمشروع التدريبي</li>
              </ul>
            </div>
          </div>

          <!-- <div class="achiev-item" data-aos="fade-up">
            <div class="stat-card company-info-card">
              <h2>شركاؤنا</h2>
              
              <div class="partners-placeholder">مساحة مخصصة لإضافة شعارات الشركاء لاحقًا</div>
            </div>
          </div> -->
          <section class="partners-section" data-aos="fade-up" data-aos-duration="800">
            <div class="partners-section">
              <h2 class="partners-title">شركاؤنا</h2>
              <div class="partners-track">
                <div class="partner-logo"><img src="assets/partners/sp_logo_0.webp" alt="شعار شريك 1"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_1.webp" alt="شعار شريك 2"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_3.webp" alt="شعار شريك 3"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_4.webp" alt="شعار شريك 4"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_5.webp" alt="شعار شريك 5"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_6.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_7.webp" alt="شعار شريك 7"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_8.webp" alt="شعار شريك 8"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_9.webp" alt="شعار شريك 9"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_10.webp" alt="شعار شريك 10"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_11.webp" alt="شعار شريك 11"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_12.webp" alt="شعار شريك 12"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_50.webp" alt="شعار شريك 13"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_51.webp" alt="شعار شريك 14"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_86.webp" alt="شعار شريك 15"></div>




                <div class="partner-logo"><img src="assets/partners/sp_logo_0.webp" alt="شعار شريك 1"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_1.webp" alt="شعار شريك 2"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_3.webp" alt="شعار شريك 3"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_4.webp" alt="شعار شريك 4"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_5.webp" alt="شعار شريك 5"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_6.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_7.webp" alt="شعار شريك 7"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_8.webp" alt="شعار شريك 8"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_9.webp" alt="شعار شريك 9"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_10.webp" alt="شعار شريك 10"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_11.webp" alt="شعار شريك 11"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_12.webp" alt="شعار شريك 12"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_50.webp" alt="شعار شريك 13"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_51.webp" alt="شعار شريك 14"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_86.webp" alt="شعار شريك 15"></div>
              </div>



              <div class="partners-track">
                <div class="partner-logo"><img src="assets/partners/sp_logo_13.webp" alt="شعار شريك 1"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_14.webp" alt="شعار شريك 2"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_15.webp" alt="شعار شريك 3"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_16.webp" alt="شعار شريك 4"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_17.webp" alt="شعار شريك 5"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_18.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_19.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_20.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_22.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_23.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_24.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_25.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_52.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_53.webp" alt="شعار شريك 6"></div>

                <div class="partner-logo"><img src="assets/partners/sp_logo_87.webp" alt="شعار شريك 6"></div>


                <div class="partner-logo"><img src="assets/partners/sp_logo_13.webp" alt="شعار شريك 1"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_14.webp" alt="شعار شريك 2"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_15.webp" alt="شعار شريك 3"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_16.webp" alt="شعار شريك 4"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_17.webp" alt="شعار شريك 5"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_18.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_19.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_20.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_22.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_23.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_24.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_25.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_52.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_53.webp" alt="شعار شريك 6"></div>

                <div class="partner-logo"><img src="assets/partners/sp_logo_87.webp" alt="شعار شريك 6"></div>

              </div>
              <div class="partners-track">
                <div class="partner-logo"><img src="assets/partners/sp_logo_26.webp" alt="شعار شريك 1"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_27.webp" alt="شعار شريك 2"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_28.webp" alt="شعار شريك 3"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_29.webp" alt="شعار شريك 4"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_30.webp" alt="شعار شريك 5"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_31.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_32.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_33.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_34.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_35.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_36.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_37.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_54.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_55.webp" alt="شعار شريك 6"></div>

                <div class="partner-logo"><img src="assets/partners/sp_logo_88.webp" alt="شعار شريك 6"></div>

                <div class="partner-logo"><img src="assets/partners/sp_logo_26.webp" alt="شعار شريك 1"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_27.webp" alt="شعار شريك 2"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_28.webp" alt="شعار شريك 3"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_29.webp" alt="شعار شريك 4"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_30.webp" alt="شعار شريك 5"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_31.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_32.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_33.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_34.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_35.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_36.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_37.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_54.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_55.webp" alt="شعار شريك 6"></div>

              </div>

              <div class="partners-track">
                <div class="partner-logo"><img src="assets/partners/sp_logo_38.webp" alt="شعار شريك 1"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_39.webp" alt="شعار شريك 2"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_40.webp" alt="شعار شريك 3"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_41.webp" alt="شعار شريك 4"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_42.webp" alt="شعار شريك 5"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_43.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_44.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_45.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_46.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_47.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_48.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_49.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_56.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_57.webp" alt="شعار شريك 6"></div>

                <div class="partner-logo"><img src="assets/partners/sp_logo_89.webp" alt="شعار شريك 6"></div>


                <div class="partner-logo"><img src="assets/partners/sp_logo_38.webp" alt="شعار شريك 1"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_39.webp" alt="شعار شريك 2"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_40.webp" alt="شعار شريك 3"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_41.webp" alt="شعار شريك 4"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_42.webp" alt="شعار شريك 5"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_43.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_44.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_45.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_46.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_47.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_48.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_49.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_56.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_57.webp" alt="شعار شريك 6"></div>

                <div class="partner-logo"><img src="assets/partners/sp_logo_89.webp" alt="شعار شريك 6"></div>

              </div>

              <div class="partners-track">
                <div class="partner-logo"><img src="assets/partners/sp_logo_58.webp" alt="شعار شريك 1"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_59.webp" alt="شعار شريك 2"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_60.webp" alt="شعار شريك 3"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_61.webp" alt="شعار شريك 4"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_62.webp" alt="شعار شريك 5"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_63.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_64.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_65.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_66.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_67.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_68.jpg" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_69.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_70.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_71.webp" alt="شعار شريك 6"></div>

                <div class="partner-logo"><img src="assets/partners/sp_logo_90.webp" alt="شعار شريك 6"></div>

                <div class="partner-logo"><img src="assets/partners/sp_logo_58.webp" alt="شعار شريك 1"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_59.webp" alt="شعار شريك 2"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_60.webp" alt="شعار شريك 3"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_61.webp" alt="شعار شريك 4"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_62.webp" alt="شعار شريك 5"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_63.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_64.webp" alt="شعار شريك 7"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_65.webp" alt="شعار شريك 8"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_66.webp" alt="شعار شريك 9"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_67.webp" alt="شعار شريك 10"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_68.jpg" alt="شعار شريك 11"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_69.webp" alt="شعار شريك 12"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_70.webp" alt="شعار شريك 13"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_71.webp" alt="شعار شريك 14"></div>

                <div class="partner-logo"><img src="assets/partners/sp_logo_90.webp" alt="شعار شريك 6"></div>

              </div>

              <div class="partners-track">
                <div class="partner-logo"><img src="assets/partners/sp_logo_72.webp" alt="شعار شريك 1"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_73.webp" alt="شعار شريك 2"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_74.webp" alt="شعار شريك 3"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_75.webp" alt="شعار شريك 4"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_76.webp" alt="شعار شريك 5"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_77.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_78.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_79.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_80.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_81.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_82.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_83.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_84.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_85.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_51.webp" alt="شعار شريك 6"></div>

                <div class="partner-logo"><img src="assets/partners/sp_logo_72.webp" alt="شعار شريك 1"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_73.webp" alt="شعار شريك 2"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_74.webp" alt="شعار شريك 3"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_75.webp" alt="شعار شريك 4"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_76.webp" alt="شعار شريك 5"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_77.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_78.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_79.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_80.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_81.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_82.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_83.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_84.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_85.webp" alt="شعار شريك 6"></div>
                <div class="partner-logo"><img src="assets/partners/sp_logo_51.webp" alt="شعار شريك 6"></div>
              </div>

              <!-- for new logos -->
              <div class="partners-track">
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_92.webp" alt="شعار شريك 1">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_93.webp" alt="شعار شريك 2">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_94.webp" alt="شعار شريك 3">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_95.webp" alt="شعار شريك 5">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_96.png" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_97.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_98.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_99.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_100.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_101.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_102.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_103.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_104.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_105.webp" alt="شعار شريك 6">
                </div>

                <div class="partner-logo"><img
                        src="assets/partners/sp_log_106.webp" alt="شعار شريك 1">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_107.webp" alt="شعار شريك 2">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_108.webp" alt="شعار شريك 3">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_109.webp" alt="شعار شريك 4">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_110.webp" alt="شعار شريك 5">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_1111.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_112.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_113.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_114.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_115.webp" alt="شعار شريك 6">
                </div>

                     <div class="partner-logo"><img
                        src="assets/partners/sp_log_92.webp" alt="شعار شريك 1">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_93.webp" alt="شعار شريك 2">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_94.webp" alt="شعار شريك 3">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_95.webp" alt="شعار شريك 5">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_96.png" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_97.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_98.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_99.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_100.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_101.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_102.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_103.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_104.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_105.webp" alt="شعار شريك 6">
                </div>

                <div class="partner-logo"><img
                        src="assets/partners/sp_log_106.webp" alt="شعار شريك 1">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_107.webp" alt="شعار شريك 2">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_108.webp" alt="شعار شريك 3">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_109.webp" alt="شعار شريك 4">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_110.webp" alt="شعار شريك 5">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_1111.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_112.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_113.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_114.webp" alt="شعار شريك 6">
                </div>
                <div class="partner-logo"><img
                        src="assets/partners/sp_log_115.webp" alt="شعار شريك 6">
                </div>

              
            </div>
            </div>
            </section>


          <div class="achiev-item" data-aos="fade-up">
            <div class="stat-card company-info-card list-out">
              <h2>لماذا نحن؟</h2>
              <ul>
                <li>خبرة عملية في المشاريع التدريبية</li>
                <li>فهم حقيقي لاحتياج الجهات</li>
                <li>مرونة في التصميم والتنفيذ</li>
                <li>تركيز على الأثر وليس فقط التنفيذ</li>
                <li>فريق عمل احترافي</li>
              </ul>
            </div>
          </div>

    
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <img src="assets/images/logo_png.webp" alt="Al Tawthiq logo" class="footer-logo">
          <p> شريكك في بناء القدرات التنافسية</p>

          <div class="footer-social">
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
        </div>
        <div class="footer-contact">
          <h3>تواصل معنا</h3>
          <p><strong>الهاتف:</strong> ‎+966 553 300 598</p>
          <p><strong>البريد الإلكتروني:</strong> <a href="mailto:info@altawthiq.com">info@altawthiq.com</a></p>
          <p><strong>العنوان:</strong> الرياض، المملكة العربية السعودية</p>
        </div>

        <div class="footer-col">
          <div class="footer-map">
            <h5>موقعنا على الخريطة</h5>
            <div class="map-container">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3625.939829397909!2d46.701665710943374!3d24.660199377969043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f050035914655%3A0x3f84ffe264b6fbd7!2z2YXZhtiq2K_ZiSDYp9mE2YjYudmKINin2YTZgdmD2LHZig!5e0!3m2!1sen!2ssa!4v1772026131238!5m2!1sen!2ssa"
                width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="footer-brand">
          <img src="assets/images/white__logo.webp" alt="Training & dev logo" class="footer-logo">
          <p>رقم رخصة المؤسسة : 224219355451812</p>
        </div>
      </div>

      <div class="footer-bottom">
        <p>التوثيق© 2026. جميع الحقوق محفوظة</p>
      </div>
    </div>
  </footer>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="main.js"></script>
  <script>
    AOS.init({ once: true, duration: 700 });
  </script>
</body>
</html>

