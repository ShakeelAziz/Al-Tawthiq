<?php
get_header();
?>
<html lang="ar" dir="rtl">
<section class="contact-section">
  <div class="container">
    <div class="contact-card" data-aos="fade-up">

      <h1><?php _e('حجز عرض تجريبي', 'altawthiq'); ?></h1>
      <p><?php _e('أخبرنا قليلاً عن مؤسستك وسنحدد موعدًا للعرض يناسب احتياجاتك.', 'altawthiq'); ?></p>

      <form id="contactForm">

        <div class="form-grid">

          <div class="form-group">
            <label><?php _e('اسم الشركة', 'altawthiq'); ?></label>
            <input type="text" name="company" placeholder="<?php _e('اسم شركتك', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label><?php _e('البريد الإلكتروني', 'altawthiq'); ?></label>
            <input type="email" name= "email" placeholder="<?php _e('company@email.com', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label><?php _e('المدينة', 'altawthiq'); ?></label>
            <input type="text" name="city" placeholder="<?php _e('المدينة', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label><?php _e('عدد الموظفين', 'altawthiq'); ?></label>
            <select name="employees" required>
              <option value="">اختر النطاق</option>
              <option>0 – 50</option>
              <option>50 – 100</option>
              <option>100 – 150</option>
              <option>150 – 200</option>
              <option>200 – 500</option>
            </select>
          </div>

          <div class="form-group">
            <label><?php _e('اسم', 'altawthiq'); ?></label>
            <input type="text" name= "name" placeholder="<?php _e('الاسم الكامل', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label><?php _e('هاتف', 'altawthiq'); ?></label>
            <input type="tel" name="phone" placeholder="<?php _e('رقم الهاتف', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label><?php _e('نوع الاجتماع المفضل', 'altawthiq'); ?></label>
            <select name="meeting" required>
              <option value="">اختر نوع الاجتماع</option>
              <option><?php _e('في المكتب', 'altawthiq'); ?></option>
              <option><?php _e('عن بعد', 'altawthiq'); ?></option>
            </select>
          </div>
          <div class="form-group">
            <label><?php _e('المسمى الوظيفي', 'altawthiq'); ?></label>
            <input type="text" name="position" placeholder="<?php _e('المسمى الوظيفي', 'altawthiq'); ?>" required>
          </div>

        </div>

        <div class="submit-wrap">
          <button type="submit"><?php _e('إرسال الطلب', 'altawthiq'); ?></button>
          <p id="contactFormMessage" role="status" aria-live="polite" style="margin-top: 12px;"></p>
        </div>

      </form>

    </div>
  </div>
</section>

<script>
  document.getElementById("contactForm").addEventListener("submit", async function (e) {
    e.preventDefault();
    const messageEl = document.getElementById("contactFormMessage");
    const submitButton = this.querySelector('button[type="submit"]');
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());
    messageEl.textContent = "";
    messageEl.style.color = "";
    submitButton.disabled = true;

    try {
      const response = await fetch("https://altawthiqsa.app.n8n.cloud/webhook/signup-form", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
      });

      if (!response.ok) {
        throw new Error("Request failed");
      }

      messageEl.textContent = "<?php _e('تم إرسال طلبك بنجاح.', 'altawthiq'); ?>";
      messageEl.style.color = "#198754";
      this.reset();
    } catch (error) {
      messageEl.textContent = "<?php _e('حدث خطأ ما. يرجى المحاولة مرة أخرى.', 'altawthiq'); ?>";
      messageEl.style.color = "#dc3545";
    } finally {
      submitButton.disabled = false;
    }

  });
</script>

<?php get_footer(); ?>




