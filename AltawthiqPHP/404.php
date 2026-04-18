<?php get_header(); ?>

<section class="error-404">
    <div class="container">
        <div class="error-wrapper" data-aos="fade-up">
            <div class="error-content">
                <div class="error-icon" data-aos="zoom-in" data-aos-duration="600">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>

                <h1><?php _e('الصفحة غير موجودة', 'altawthiq'); ?></h1>
                <p class="error-code">404</p>

                <p class="error-message">
                    <?php _e('عذراً، الصفحة التي تبحث عنها غير متاحة أو تم نقلها', 'altawthiq'); ?>
                </p>

                <div class="error-actions">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="cta-btn primary">
                        <i class="fas fa-home"></i>
                        <?php _e('العودة للرئيسية', 'altawthiq'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/blogs/')); ?>" class="cta-btn secondary">
                        <i class="fas fa-blog"></i>
                        <?php _e('زيارة المدونة', 'altawthiq'); ?>
                    </a>
                </div>

                <div class="search-section" data-aos="fade-up" data-aos-delay="200">
                    <h3><?php _e('ابحث عما تحتاجه | Search for what you need', 'altawthiq'); ?></h3>
                    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" name="s" placeholder="<?php _e('ابحث هنا... | Search here...', 'altawthiq'); ?>">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>

            <!-- Suggested Pages -->
            <div class="suggested-pages" data-aos="fade-up" data-aos-delay="300">
                <h3><?php _e('صفحات قد تهمك | Pages you might like', 'altawthiq'); ?></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('الصفحة الرئيسية | Home', 'altawthiq'); ?></a></li>
                    <li><a href="<?php echo esc_url(is_rtl() ? home_url('/contact-ar/') : home_url('/contact')); ?>"><?php _e('اتصل بنا | Contact Us', 'altawthiq'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/blogs/')); ?>"><?php _e('المدونة | Blog', 'altawthiq'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<style>
    .error-404 {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 40px 0;
    }

    .error-wrapper {
        text-align: center;
        max-width: 600px;
        background: rgba(255, 255, 255, 0.95);
        padding: 60px;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .error-icon {
        font-size: 100px;
        color: var(--primary-color);
        margin-bottom: 20px;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-20px);
        }
    }

    .error-404 h1 {
        font-size: 42px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 20px 0 10px;
    }

    .error-code {
        font-size: 120px;
        font-weight: 900;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: -30px 0 20px;
        opacity: 0.1;
    }

    .error-message {
        font-size: 18px;
        color: var(--text-muted);
        line-height: 1.6;
        margin: 20px 0 40px;
    }

    /* Buttons */
    .error-actions {
        display: flex;
        gap: 16px;
        justify-content: center;
        margin-bottom: 40px;
        flex-wrap: wrap;
    }

    .cta-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 32px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .cta-btn.primary {
        background: var(--primary-color);
        color: white;
    }

    .cta-btn.primary:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .cta-btn.secondary {
        background: transparent;
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .cta-btn.secondary:hover {
        background: var(--primary-color);
        color: white;
    }

    /* Search Section */
    .search-section {
        margin: 40px 0;
        padding: 40px 0;
        border-top: 2px solid #e0e0e0;
        border-bottom: 2px solid #e0e0e0;
    }

    .search-section h3 {
        font-size: 18px;
        color: var(--text-dark);
        margin-bottom: 20px;
    }

    .search-section form {
        display: flex;
        gap: 8px;
        background: var(--gray-100);
        border-radius: 50px;
        padding: 8px;
        max-width: 100%;
max-width: 400px;
        margin: 0 auto;
    }

    .search-section input {
        flex: 1;
        border: none;
        background: transparent;
        padding: 12px 20px;
        font-size: 16px;
        outline: none;
    }

    .search-section button {
        background: var(--primary-color);
        border: none;
        color: white;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .search-section button:hover {
        background: var(--primary-dark);
        transform: scale(1.05);
    }

    /* Suggested Pages */
    .suggested-pages {
        margin-top: 40px;
        text-align: left;
    }

    .suggested-pages h3 {
        font-size: 18px;
        color: var(--text-dark);
        margin-bottom: 20px;
    }

    .suggested-pages ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    .suggested-pages li a {
        display: block;
        padding: 12px 16px;
        background: var(--gray-100);
        border-radius: 8px;
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .suggested-pages li a:hover {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-dark);
    }

    @media (max-width: 768px) {
        .error-wrapper {
            padding: 40px 24px;
        }

        .error-404 h1 {
            font-size: 32px;
        }

        .error-code {
            font-size: 80px;
        }

        .error-message {
            font-size: 16px;
        }

        .error-actions {
            flex-direction: column;
        }

        .cta-btn {
            width: 100%;
            justify-content: center;
        }

        .suggested-pages ul {
            grid-template-columns: 1fr;
        }

        .search-section form {
            flex-direction: column;
        }

        .search-section button {
            width: 100%;
        }
    }
</style>

<?php get_footer(); ?>
