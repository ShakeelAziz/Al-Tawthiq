<?php get_header(); ?>
<html lang="en" dir="ltr">
<section class="contact-section">
  <div class="container">
    <div class="contact-card" data-aos="fade-up">

      <h1><?php _e('Book a Free Demo', 'altawthiq'); ?></h1>
      <p><?php _e('Tell us a bit about your company and we will schedule a demo that fits your needs.', 'altawthiq'); ?>
      </p>

      <form id="contactForm">

        <div class="form-grid">

          <div class="form-group">
            <label><?php _e('Company Name', 'altawthiq'); ?></label>
            <input type="text" name="company" placeholder="<?php _e('Your company name', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label><?php _e('Email', 'altawthiq'); ?></label>
            <input type="email" name="email" placeholder="<?php _e('company@email.com', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label><?php _e('City', 'altawthiq'); ?></label>
            <input type="text" name="city" placeholder="<?php _e('City', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label><?php _e('Number of Employees', 'altawthiq'); ?></label>
            <select name="employees" required>
              <option value="">Select range</option>
              <option>0 – 50</option>
              <option>50 – 100</option>
              <option>100 – 150</option>
              <option>150 – 200</option>
              <option>200 – 500</option>
            </select>
          </div>

          <div class="form-group">
            <label><?php _e('Name', 'altawthiq'); ?></label>
            <input type="text" name="name" placeholder="<?php _e('Full name', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label><?php _e('Phone', 'altawthiq'); ?></label>
            <input type="tel" name="phone" placeholder="<?php _e('Phone Number', 'altawthiq'); ?>" required>
          </div>

          <div class="form-group">
            <label><?php _e('Preferred Meeting Type', 'altawthiq'); ?></label>
            <select name="meeting" required>
              <option value="">Select meeting type</option>
              <option><?php _e('Office', 'altawthiq'); ?></option>
              <option><?php _e('Remotely', 'altawthiq'); ?></option>
            </select>
          </div>

          <div class="form-group">
            <label><?php _e('Position', 'altawthiq'); ?></label>
            <input type="text"name="position" placeholder="<?php _e('Your Position', 'altawthiq'); ?>" required>
          </div>
        </div>
        <div class="submit-wrap">
          <button type="submit"><?php _e('Submit Request', 'altawthiq'); ?></button>
          <p id="contactFormMessage" role="status" aria-live="polite" style="margin-top: 12px;"></p>
        </div>

      </form>

    </div>
  </div>

</section>

</html>


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

      messageEl.textContent = "<?php _e('Your request has been submitted successfully.', 'altawthiq'); ?>";
      messageEl.style.color = "#198754";
      this.reset();
    } catch (error) {
      messageEl.textContent = "<?php _e('Something went wrong. Please try again.', 'altawthiq'); ?>";
      messageEl.style.color = "#dc3545";
    } finally {
      submitButton.disabled = false;
    }

  });
</script>
<?php get_footer(); ?>