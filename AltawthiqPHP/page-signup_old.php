<?php
/**
 * Template Name: Signup — عرض تعاقدي
 * Form HTML lives here. POST is handled in functions.php on the `init` hook
 * (see altawthiq_signup_form_handle_post) so submission does not 404.
 */
if (!defined('ABSPATH')) {
    exit;
}

$GLOBALS['altawthiq_only_logos'] = true;

$signup_notice = isset($_GET['signup']) ? sanitize_key(wp_unslash($_GET['signup'])) : '';

get_header();
?>
<html lang="ar" dir="rtl">
<section class="contact-section">
  <div class="container">
    <div class="contact-card" data-aos="fade-up">
      <h1><?php esc_html_e('احجر العرض التعاقدي', 'altawthiq'); ?></h1>
      <p><?php esc_html_e('أخبرنا قليلاً عن مؤسستك وسنحدد موعدًا للعرض يناسب احتياجاتك.', 'altawthiq'); ?></p>

      <?php if ($signup_notice === 'ok') : ?>
        <p class="altawthiq-signup-notice altawthiq-signup-notice--ok" role="status">
          <?php esc_html_e('تم تقديم طلبك بنجاح. شكرًا لك، سنتواصل معك قريبًا.', 'altawthiq'); ?>
        </p>
      <?php elseif ($signup_notice === 'error') : ?>
        <p class="altawthiq-signup-notice altawthiq-signup-notice--err" role="alert">
          <?php esc_html_e('تعذر إرسال الطلب. حاول مرة أخرى لاحقًا.', 'altawthiq'); ?>
        </p>
      <?php elseif ($signup_notice === 'invalid') : ?>
        <p class="altawthiq-signup-notice altawthiq-signup-notice--err" role="alert">
          <?php esc_html_e('يرجى إدخال بريد إلكتروني صالح.', 'altawthiq'); ?>
        </p>
      <?php elseif ($signup_notice === 'nonce') : ?>
        <p class="altawthiq-signup-notice altawthiq-signup-notice--err" role="alert">
          <?php esc_html_e('انتهت صلاحية الجلسة. حدّث الصفحة وأعد المحاولة.', 'altawthiq'); ?>
        </p>
      <?php endif; ?>

      <form id="signupForm" method="post" action="" class="altawthiq-signup-form">
        <?php wp_nonce_field('altawthiq_page_signup', '_wpnonce'); ?>
        <input type="hidden" name="altawthiq_signup" value="1" />
        <input type="hidden" name="altawthiq_signup_page_id" value="<?php echo (int) get_queried_object_id(); ?>" />

        <div class="form-grid">

          <div class="form-group">
            <label for="signup-company"><?php esc_html_e('اسم الشركة', 'altawthiq'); ?></label>
            <input id="signup-company" type="text" name="company" placeholder="<?php esc_attr_e('اسم شركتك', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label for="signup-email"><?php esc_html_e('البريد الإلكتروني', 'altawthiq'); ?></label>
            <input id="signup-email" type="email" name="email" placeholder="<?php esc_attr_e('company@email.com', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label for="signup-city"><?php esc_html_e('المدينة', 'altawthiq'); ?></label>
            <input id="signup-city" type="text" name="city" placeholder="<?php esc_attr_e('المدينة', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label for="signup-employees"><?php esc_html_e('عدد الموظفين', 'altawthiq'); ?></label>
            <select id="signup-employees" name="employees" required>
              <option value=""><?php esc_html_e('اختر النطاق', 'altawthiq'); ?></option>
              <option value="0 – 50">0 – 50</option>
              <option value="50 – 100">50 – 100</option>
              <option value="100 – 150">100 – 150</option>
              <option value="150 – 200">150 – 200</option>
              <option value="200 – 500">200 – 500</option>
            </select>
          </div>

          <div class="form-group">
            <label for="signup-name"><?php esc_html_e('اسم', 'altawthiq'); ?></label>
            <input id="signup-name" type="text" name="name" placeholder="<?php esc_attr_e('الاسم الكامل', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label for="signup-phone"><?php esc_html_e('هاتف', 'altawthiq'); ?></label>
            <input id="signup-phone" type="tel" name="phone" placeholder="<?php esc_attr_e('رقم الهاتف', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label for="signup-meeting"><?php esc_html_e('نوع الاجتماع المفضل', 'altawthiq'); ?></label>
            <select id="signup-meeting" name="meeting" required>
              <option value=""><?php esc_html_e('اختر نوع الاجتماع', 'altawthiq'); ?></option>
              <option value="<?php echo esc_attr(__('في المكتب', 'altawthiq')); ?>"><?php esc_html_e('في المكتب', 'altawthiq'); ?></option>
              <option value="<?php echo esc_attr(__('عن بعد', 'altawthiq')); ?>"><?php esc_html_e('عن بعد', 'altawthiq'); ?></option>
            </select>
          </div>

          <div class="form-group">
            <label for="signup-position"><?php esc_html_e('المسمى الوظيفي', 'altawthiq'); ?></label>
            <input id="signup-position" type="text" name="position" placeholder="<?php esc_attr_e('المسمى الوظيفي', 'altawthiq'); ?>" required>
          </div>

        </div>

        <div class="submit-wrap">
          <button type="submit" id="signup-submit"><?php esc_html_e('إرسال الطلب', 'altawthiq'); ?></button>
        </div>
      </form>

    </div>
  </div>
</section>

<style>
  .altawthiq-signup-notice {
    text-align: center;
    padding: 12px 16px;
    border-radius: 12px;
    margin-bottom: 20px;
    font-weight: 600;
  }
  .altawthiq-signup-notice--ok {
    background: rgba(2, 122, 72, 0.12);
    color: #027a48;
  }
  .altawthiq-signup-notice--err {
    background: rgba(180, 35, 24, 0.1);
    color: #b42318;
  }
</style>

<script>
(function () {
  var form = document.getElementById('signupForm');
  var btn = document.getElementById('signup-submit');
  if (!form || !btn) {
    return;
  }
  form.addEventListener('submit', function () {
    btn.disabled = true;
    btn.setAttribute('aria-busy', 'true');
  });
})();
</script>
<?php get_footer(); ?>
