<?php
/*
Template Name: TOT Content Page
*/
get_header();
?>

<style>
  .tot-page {
    background:
      radial-gradient(circle at 10% 10%, #efe7ff 0%, rgba(239, 231, 255, 0) 30%),
      radial-gradient(circle at 90% 20%, #e0ecff 0%, rgba(224, 236, 255, 0) 28%),
      linear-gradient(180deg, #f7f3ff 0%, #f2f8ff 100%);
    padding: 0 0 70px;
    direction: rtl;
    font-family: Tahoma, Arial, sans-serif;
  }
  .tot-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
  }
  .tot-custom-header {
    background: linear-gradient(135deg, #7c3aed 0%, #6366f1 45%, #0ea5e9 100%);
    border-radius: 0 0 24px 24px;
    color: #fff;
    padding: 36px 24px 30px;
    text-align: center;
    box-shadow: 0 14px 34px rgba(99, 102, 241, 0.28);
    margin-bottom: 26px;
  }
  .tot-logo-row {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
    margin-bottom: 14px;
  }
  .tot-logo-main {
    width: 210px;
    max-width: 100%;
    height: auto;
  }
  .tot-menu {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    justify-content: center;
  }
  .tot-menu a {
    display: inline-block;
    text-decoration: none;
    color: #ffffff;
    font-weight: 700;
    font-size: 15px;
    padding: 8px 14px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 999px;
    background: rgba(255, 255, 255, 0.18);
  }
  .tot-logo-side {
    width: 120px;
    height: auto;
    opacity: 1;
  }
  .tot-custom-header h1 {
    margin: 0 0 8px;
    font-size: 34px;
    line-height: 1.4;
  }
  .tot-custom-header p {
    margin: 0;
    font-size: 16px;
    line-height: 1.9;
    opacity: 0.95;
  }
  .tot-main-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
    align-items: start;
  }
  .tot-card {
    background: linear-gradient(180deg, #ffffff 0%, #fcfaff 100%);
    border: 1px solid #e9d5ff;
    border-radius: 18px;
    box-shadow: 0 10px 26px rgba(76, 29, 149, 0.1);
    padding: 24px;
    margin-bottom: 18px;
  }
  .tot-card.alt {
    border-color: #cfe2ff;
    box-shadow: 0 10px 26px rgba(30, 64, 175, 0.1);
    background: linear-gradient(180deg, #ffffff 0%, #f7fbff 100%);
  }
  .tot-card h2 {
    margin: 0 0 10px;
    color: #5b21b6;
    font-size: 24px;
  }
  .tot-card h3 {
    margin: 18px 0 8px;
    color: #6d28d9;
    font-size: 20px;
    border-right: 4px solid #a78bfa;
    padding-right: 10px;
  }
  .tot-card p {
    margin: 0;
    color: #374151;
    line-height: 1.95;
    font-size: 16px;
  }
  .tot-card ul,
  .tot-card ol {
    margin: 0;
    padding-right: 22px;
    color: #374151;
    line-height: 1.95;
    font-size: 16px;
  }
  .tot-card li {
    margin-bottom: 6px;
  }
  .tot-card ul li::marker,
  .tot-card ol li::marker {
    color: #8b5cf6;
  }
  .tot-badge {
    display: inline-block;
    margin: 0 0 14px;
    padding: 6px 12px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 700;
    color: #4338ca;
    background: #eef2ff;
    border: 1px solid #c7d2fe;
  }
  .tot-hero-image {
    border-radius: 12px;
    width: 100%;
    height: auto;
    margin-bottom: 18px;
    border: 1px solid #ddd6fe;
  }
  @media (max-width: 767px) {
    .tot-custom-header h1 {
      font-size: 26px;
    }
    .tot-logo-main {
      width: 170px;
    }
    .tot-logo-side {
      width: 88px;
    }
    .tot-main-grid {
      grid-template-columns: 1fr;
    }
    .tot-container {
      padding: 0 12px;
    }
  }
</style>

<section class="tot-page">
  <div class="tot-container">
    <header class="tot-custom-header">
      <div class="tot-logo-row">
        <img class="tot-logo-side"
             src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_png.webp"
             alt="شعار التوثيق الوطني - دورة تدريب المدربين المعتمدة">
        <nav class="tot-menu" aria-label="القائمة العلوية">
          <a href="#">الملف التعريفي</a>
          <a href="#">من نحن</a>
          <a href="#">اتصل بنا</a>
        </nav>
        <img class="tot-logo-side"
             src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_white.webp"
             alt="شعار برامج تدريب المدربين وتطوير المهارات">
      </div>
      <h1>صفحة تعريفية شاملة</h1>
      <p>جميع المحتوى النصي الخاص بالنشرة في صفحة ويب واحدة مخصصة لهذا القسم.</p>
    </header>

    <div class="tot-main-grid">
      <article class="tot-card">
        <img class="tot-hero-image"
             src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/mam_jure.jpeg"
             alt="دورة تدريب المدربين TOT في الرياض">
        <span class="tot-badge">نبذة تعريفية</span>
        <h2>من نحن</h2>
        <p>
          شركة التوثيق الوطني للتدريب جهة متخصصة في تصميم وتنفيذ البرامج التدريبية والمشاريع التطويرية،
          تقدم حلولا احترافية تستهدف تطوير الكفاءات ورفع جودة الأداء المؤسسي.
        </p>

        <h3>رؤيتنا</h3>
        <p>أن نكون شريكا استراتيجيا موثوقا في تطوير القدرات البشرية، وصناعة برامج تدريبية ذات أثر مستدام.</p>

        <h3>رسالتنا</h3>
        <p>تصميم وتنفيذ تجارب تدريبية متكاملة تسهم في تطوير الأفراد، وتمكين الجهات، ورفع كفاءة الأداء المؤسسي.</p>
      </article>

      <article class="tot-card alt">
        <span class="tot-badge">المحتوى التفصيلي</span>
        <h3>قيمنا</h3>
        <ul>
          <li>الجودة في التنفيذ</li>
          <li>الاحترافية في العمل</li>
          <li>التركيز على الأثر</li>
          <li>الشراكة مع الجهات</li>
          <li>الابتكار في الحلول</li>
        </ul>

        <h3>ماذا نقدم</h3>
        <ul>
          <li>تصميم البرامج التدريبية</li>
          <li>تحليل الاحتياج التدريبي</li>
          <li>تنفيذ البرامج والدورات</li>
          <li>إدارة المشاريع التدريبية</li>
          <li>قياس أثر التدريب</li>
          <li>تنظيم وتنفيذ ورش العمل</li>
          <li>حلول تدريبية مخصصة</li>
        </ul>

        <h3>خبراتنا</h3>
        <ul>
          <li>تدريب أكثر من 30,000 متدرب</li>
          <li>خبرة 11 سنة</li>
          <li>مشاريع تدريبية مع جهات حكومية</li>
          <li>العمل مع القطاع الخاص وغير الربحي</li>
          <li>إدارة مشاريع تدريبية متكاملة</li>
        </ul>

        <h3>منهجية العمل</h3>
        <ol>
          <li>تحليل الاحتياج التدريبي</li>
          <li>تصميم البرنامج</li>
          <li>تنفيذ تفاعلي</li>
          <li>متابعة الأداء</li>
          <li>قياس الأثر</li>
        </ol>
      </article>
    </div>
  </div>
</section>

<?php get_footer(); ?>
