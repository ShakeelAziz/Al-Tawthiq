<!-- FOOTER -->
<?php
$currentLang = is_rtl() ? 'ar' : 'en';


if ($currentLang == 'ar') { ?>

    <!-- ================= ARABIC FOOTER ================= -->
    <footer dir="rtl">
        <div class="container">
            <div class="footer-grid">

                <div class="footer-brand">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_png.webp"
                        alt="<?php bloginfo('name'); ?>" class="footer-logo">

                    <p>شريكك في بناء القدرات التنافسية</p>
                    <div class="footer-social">
                        <a href="https://www.linkedin.com/company/tawthiq-sa" target="_blank"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://www.facebook.com/Jurehaif" target="_blank"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/tawthiqsa/" target="_blank"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a href="https://x.com/Altawthiq_sa" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="https://wa.me/966553300598" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="footer-contact">
                    <h5>تواصل معنا</h5>
                    <p><strong>الهاتف:</strong> ‎+966 553 300 598</p>
                    <p><strong>البريد الإلكتروني:</strong> info@altawthiq.com</p>
                    <p><strong>العنوان:</strong>الرياض حي المربع</p>
                </div>

                <div class="footer-col">
                    <h5>موقعنا على الخريطة</h5>
                    <div class="map-container">
                        <!-- <iframe src="https://www.google.com/maps?q=24.660199,46.701665&output=embed" width="200" -->
                        <iframe src="https://tinyurl.com/5f5k66e8" width="200" height="200" style="border:0;"
                            loading="lazy"></iframe>
                    </div>
                </div>

                <div class="footer-brand">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/white__logo.webp"
                        alt="<?php bloginfo('name'); ?>" class="footer-logo">
                    <p style="padding-right: 35px;"> رقم رخصة المؤسسة: 224219355451812</p>
                </div>

            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?>     <?php bloginfo('name'); ?>. جميع الحقوق محفوظة</p>
            </div>
        </div>
    </footer>


<?php } else { ?>

    <!-- ================= ENGLISH FOOTER ================= -->
    <footer>
        <div class="container">
            <div class="footer-grid">

                <div class="footer-brand">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_png.webp"
                        alt="<?php bloginfo('name'); ?>" class="footer-logo">
                    <p>Your Partner in Building Competitive Capabilities</p>

                    <div class="footer-social">
                        <a href="https://www.linkedin.com/company/tawthiq-sa" target="_blank"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://www.facebook.com/Jurehaif" target="_blank"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/tawthiqsa/" target="_blank"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a href="https://x.com/tawthiqsa" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="https://wa.me/966553300598" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="footer-contact">
                    <h5>Contact Us</h5>
                    <p><strong>Phone:</strong> +966 553 300 598</p>
                    <p><strong>Email:</strong> info@altawthiq.com</p>
                    <p><strong>Address:</strong> Riyadh, Al-Muorabba</p>
                </div>

                <div class="footer-col">
                    <h5>Our Location</h5>
                    <div class="map-container">


                        <!-- <iframe src="https://www.google.com/maps?q=24.660199,46.701665&output=embed" -->
                        <iframe src="https://tinyurl.com/5f5k66e8" width="200" height="200" style="border:0;"
                            loading="lazy"></iframe>
                    </div>
                </div>

                <div class="footer-brand">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/white__logo.webp"
                        alt="<?php bloginfo('name'); ?>" class="footer-logo">
                    <p style="padding-left: 35px;">
                        License Number: 224219355451812</p>
                </div>

            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?>     <?php bloginfo('name'); ?>. All Rights Reserved</p>
            </div>
        </div>
    </footer>

<?php } ?>

<!-- Chat Icon Button -->
<div id="chat-toggle" onclick="toggleChat()"
    title="<?php echo ($currentLang == 'ar') ? 'المساعد الذكي' : 'Smart Assistant'; ?>">
    <span class="chat-toggle-icon">💬</span>
</div>

<!-- Chatbot Container -->
<div id="chatbot" class="hidden" <?php echo is_rtl() ? 'dir="rtl"' : 'dir="ltr"'; ?>>
    <div id="chat-header">
        <div class="header-left">
            <div class="avatar"><?php echo ($currentLang == 'ar') ? '🤖' : 'AI'; ?></div>
            <div>
                <div class="title"><?php echo ($currentLang == 'ar') ? 'المساعد الذكي' : 'Smart Assistant'; ?></div>
                <div class="subtitle">
                    <span class="status-dot"></span>
                    <?php echo ($currentLang == 'ar') ? 'متصل الآن' : 'Online now'; ?>
                </div>
            </div>
        </div>
        <span class="close-btn" onclick="toggleChat()">✖</span>
    </div>

    <div class="chat-welcome">
        <?php if ($currentLang == 'ar') { ?>
            <p>مرحبًا! 👋 اسأل عن خدمات التدريب، الشهادات، أو تواصل معنا مباشرة.</p>
        <?php } else { ?>
            <p>Hi there! 👋 Ask about training services, certifications, or contact options.</p>
        <?php } ?>
    </div>

    <div id="chat-messages"></div>

    <div id="chat-input">

        <input type="text" id="userInput"
            placeholder="<?php echo ($currentLang == 'ar') ? 'اكتب رسالة...' : 'Type a message...'; ?>">
        <?php if ($currentLang == 'ar') { ?>
            <button onclick="sendMessage()" aria-label="Send message">
                <span>إرسال</span>
            </button>
        <?php } else { ?>
            <button onclick="sendMessage()" aria-label="Send message">
                <span>Send</span>
            </button>
        <?php } ?>
    </div>
</div>

<!-- WhatsApp Button -->


<a href="https://wa.me/966553300598?text=%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%D8%8C%0A%D8%A7%D8%B7%D9%84%D8%B9%D9%86%D8%A7%20%D8%B9%D9%84%D9%89%20%D8%AE%D8%AF%D9%85%D8%A7%D8%AA%D9%83%D9%85%20%D9%88%D8%A8%D8%B1%D8%A7%D9%85%D8%AC%D9%83%D9%85%20%D8%A7%D9%84%D8%AA%D8%AF%D8%B1%D9%8A%D8%A8%D9%8A%D8%A9%D8%8C%20%D9%88%D9%86%D8%B1%D8%BA%D8%A8%20%D9%81%D9%8A%20%D8%A7%D9%84%D8%AA%D9%88%D8%A7%D8%B5%D9%84%20%D8%A8%D8%B4%D8%A3%D9%86%20%D8%AA%D8%B5%D9%85%D9%8A%D9%85%20%D8%A8%D8%B1%D9%86%D8%A7%D9%85%D8%AC%20%D8%AA%D8%AF%D8%B1%D9%8A%D8%A8%D9%8A%20%D8%AA%D8%B9%D8%A7%D9%82%D8%AF%D9%8A%20%D9%8A%D8%AA%D9%86%D8%A7%D8%B3%D8%A8%20%D9%85%D8%B9%20%D8%A7%D8%AD%D8%AA%D9%8A%D8%A7%D8%AC%20%D8%A7%D9%84%D8%AC%D9%87%D8%A9%20%D9%88%D8%A3%D9%87%D8%AF%D8%A7%D9%81%D9%87%D8%A7.%0A%D9%86%D8%A3%D9%85%D9%84%20%D8%AA%D8%B2%D9%88%D9%8A%D8%AF%D9%86%D8%A7%20%D8%A8%D8%A2%D9%84%D9%8A%D8%A9%20%D8%A7%D9%84%D8%B9%D9%85%D9%84%20%D9%88%D8%A7%D9%84%D8%AE%D8%B7%D9%88%D8%A7%D8%AA%20%D8%A7%D9%84%D9%84%D8%A7%D8%B2%D9%85%D8%A9%20%D9%84%D8%A8%D8%AF%D8%A1%20%D8%A7%D9%84%D8%AA%D8%B9%D8%A7%D9%88%D9%86.%0A%D8%B4%D9%83%D8%B1%D9%8B%D8%A7%20%D9%84%D9%83%D9%85"
    class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>

<?php wp_footer(); ?>
</body>

</html>