<?php get_header(); ?>

<?php
while (have_posts()) {
    the_post();
    $file_url = (string) get_post_meta(get_the_ID(), '_altawthiq_product_file_url', true);
}
rewind_posts();
?>

<section class="single-post">
    <div class="container">
        <div class="single-wrapper" data-aos="fade-up">
            <?php while (have_posts()) { the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>
                    <header class="post-header">
                        <h1 class="post-title"><?php the_title(); ?></h1>
                        <p style="margin: 0; color: var(--text-muted); line-height: 1.7;">
                            <?php echo is_rtl()
                                ? esc_html__('تحميل مجاني. أدخل بياناتك وسيظهر رابط التحميل فورًا.', 'altawthiq')
                                : esc_html__('Free download. Enter your info and the download link will appear instantly.', 'altawthiq'); ?>
                        </p>
                    </header>

                    <?php if (has_post_thumbnail()): ?>
                        <figure class="post-thumbnail" data-aos="zoom-in" data-aos-duration="600">
                            <?php
                            echo get_the_post_thumbnail(
                                get_the_ID(),
                                'large',
                                array('alt' => esc_attr(get_the_title()))
                            );
                            ?>
                        </figure>
                    <?php endif; ?>

                    <div class="post-body">
                        <?php the_content(); ?>
                    </div>

                    <div class="post-content" style="padding: 24px; margin-top: 24px;">
                        <h2 style="margin-top: 0;">
                            <?php echo is_rtl() ? esc_html__('استلام الكتاب مجانًا', 'altawthiq') : esc_html__('Get this book for free', 'altawthiq'); ?>
                        </h2>

                        <form id="altawthiqDigitalClaimForm" style="display:grid; gap: 12px; max-width: 520px;">
                            <input type="hidden" name="productId" value="<?php echo esc_attr(get_the_ID()); ?>">

                            <input name="name" type="text" required
                                placeholder="<?php echo esc_attr(is_rtl() ? 'الاسم الكامل' : 'Full name'); ?>">

                            <input name="email" type="email" required
                                placeholder="<?php echo esc_attr(is_rtl() ? 'البريد الإلكتروني' : 'Email'); ?>">

                            <input name="phone" type="tel"
                                placeholder="<?php echo esc_attr(is_rtl() ? 'رقم الهاتف (اختياري)' : 'Phone (optional)'); ?>">

                            <input name="company" type="text"
                                placeholder="<?php echo esc_attr(is_rtl() ? 'اسم الشركة (اختياري)' : 'Company (optional)'); ?>">

                            <input name="city" type="text"
                                placeholder="<?php echo esc_attr(is_rtl() ? 'المدينة (اختياري)' : 'City (optional)'); ?>">

                            <button type="submit" class="btn-demo" style="width: fit-content;">
                                <?php echo is_rtl() ? esc_html__('عرض رابط التحميل', 'altawthiq') : esc_html__('Show download link', 'altawthiq'); ?>
                            </button>
                        </form>

                        <div id="altawthiqDigitalResult" style="margin-top: 16px;"></div>

                        <?php if (!$file_url): ?>
                            <p style="margin-top: 12px; color: #b91c1c;">
                                <?php echo is_rtl()
                                    ? esc_html__('ملاحظة: لم يتم إضافة رابط الملف لهذا المنتج بعد (من لوحة التحكم).', 'altawthiq')
                                    : esc_html__('Note: No file URL is set for this product yet (admin).', 'altawthiq'); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </article>
            <?php } ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

