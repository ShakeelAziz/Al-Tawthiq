<?php get_header(); ?>

<section class="single-post">
    <div class="container">
        <div class="single-wrapper" data-aos="fade-up">
            <?php 
            while (have_posts()) {
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>
                    <!-- Post Header -->
                    <header class="post-header">
                        <h1 class="post-title"><?php the_title(); ?></h1>
                        
                        <div class="post-meta">
                            <span class="meta-date">
                                <i class="far fa-calendar"></i>
                                <?php echo get_the_date('d M Y'); ?>
                            </span>
                            <span class="meta-author">
                                <i class="far fa-user"></i>
                                <?php the_author_posts_link(); ?>
                            </span>
                            <span class="meta-category">
                                <i class="fas fa-folder"></i>
                                <?php the_category(', '); ?>
                            </span>
                            <span class="meta-read-time">
                                <i class="fas fa-clock"></i>
                                <?php echo ceil(str_word_count(get_the_content()) / 200) . ' min'; ?>
                            </span>
                        </div>
                    </header>


                    <!-- Featured Image -->
                    <?php if (has_post_thumbnail()): ?>
                        <figure class="post-thumbnail" data-aos="zoom-in" data-aos-duration="600">
                            <?php
                            echo get_the_post_thumbnail(
                                get_the_ID(),
                                'large',
                                array(
                                    'alt' => esc_attr(get_the_title())
                                )
                            );
                            ?>
                        </figure>
                    <?php endif; ?>

                    <!-- Main Content -->
                    <div class="post-body">
                        <?php the_content(); ?>
                    </div>

                    <!-- Post Tags -->
                    <?php 
                    $tags = get_the_tags();
                    if ($tags) {
                        ?>
                        <div class="post-tags" data-aos="fade-up" data-aos-delay="100">
                            <strong><?php _e('الوسوم:', 'altawthiq'); ?></strong>
                            <ul>
                                <?php foreach ($tags as $tag): ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="tag-link">
                                            #<?php echo esc_html($tag->name); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Author Bio -->
                    <div class="author-bio" data-aos="fade-up" data-aos-delay="300">
                        <div class="author-image">
                            <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'author-avatar')); ?>
                        </div>
                        <div class="author-info">
                            <h4><?php the_author(); ?></h4>
                            <p><?php echo get_the_author_meta('description'); ?></p>
                        </div>
                    </div>

                    <!-- Comments -->
                    <div class="single-contact-cta" data-aos="fade-up" data-aos-delay="100">
                    <a href="<?php echo esc_url(is_rtl() ? home_url('/contact-ar/') : home_url('/contact')); ?>"
                        class="btn-demo">
                        <?php echo is_rtl()
                            ? esc_html__('تحدث مع أحد خبرائنا', 'altawthiq')
                            : esc_html__('Talk to Our Experts', 'altawthiq'); ?>
                    </a>
                </div>
                </article>

                <!-- Related Posts -->
                <section class="related-posts" data-aos="fade-up" data-aos-delay="500">
                    <h2><?php _e('مقالات ذات صلة', 'altawthiq'); ?></h2>
                    <div class="related-grid">
                        <?php
                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 3,
                            'orderby'        => 'rand',
                            'post__not_in'   => array(get_the_ID()),
                        );
                        $related = new WP_Query($args);
                        
                        if ($related->have_posts()) {
                            while ($related->have_posts()) {
                                $related->the_post();
                                ?>
                                <article class="related-card" data-aos="fade-up">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="related-image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                echo get_the_post_thumbnail(
                                                    get_the_ID(),
                                                    'medium',
                                                    array(
                                                        'alt' => esc_attr(get_the_title())
                                                    )
                                                );
                                                ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p class="related-date"><?php echo get_the_date('d M Y'); ?></p>
                                </article>
                                <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </section>

               

                <?php
            }
            ?>
        </div>
    </div>
</section>

<style>
    .single-post {
        padding: 100px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #f0f2f5 100%);
        min-height: 70vh;
    }

    .single-wrapper {
        max-width: 900px;
        margin: 0 auto;
    }

    .post-content {
        background: white;
        border-radius: 20px;
        padding: 60px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        margin-bottom: 60px;
    }

    /* Post Header */
    .post-header {
        margin-bottom: 40px;
    }

    .post-title {
        font-size: 42px;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .post-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        font-size: 14px;
        color: var(--text-muted);
        padding-top: 20px;
        border-top: 1px solid #e0e0e0;
    }

    .post-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .post-meta a {
        color: var(--primary-color);
        text-decoration: none;
    }

    .post-meta a:hover {
        text-decoration: underline;
    }

    /* Thumbnail */
    .post-thumbnail {
        margin: 40px 0;
        border-radius: 16px;
        overflow: hidden;
    }

    .post-thumbnail img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* Post Body */
    .post-body {
        font-size: 18px;
        line-height: 1.8;
        color: var(--text-muted);
        margin: 40px 0;
    }

    .post-body h2,
    .post-body h3,
    .post-body h4 {
        color: var(--text-dark);
        margin: 32px 0 16px;
        font-weight: 700;
    }

    .post-body h2 {
        font-size: 28px;
    }

    .post-body h3 {
        font-size: 22px;
    }

    .post-body p {
        margin-bottom: 20px;
    }

    .post-body ul,
    .post-body ol {
        margin: 20px 0 20px 20px;
    }

    .post-body li {
        margin-bottom: 10px;
    }

    .post-body blockquote {
        border-left: 4px solid var(--primary-color);
        padding: 20px;
        margin: 20px 0;
        background: var(--gray-100);
        border-radius: 4px;
        font-style: italic;
    }

    .post-body a {
        color: var(--primary-color);
        text-decoration: none;
        border-bottom: 2px solid rgba(102, 126, 234, 0.3);
    }

    .post-body a:hover {
        border-bottom-color: var(--primary-color);
    }

    /* Tags */
    .post-tags {
        display: flex;
        align-items: center;
        gap: 16px;
        margin: 40px 0;
        padding: 24px;
        background: var(--gray-100);
        border-radius: 12px;
    }

    .post-tags strong {
        white-space: nowrap;
    }

    .post-tags ul {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .tag-link {
        display: inline-block;
        background: var(--primary-color);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .tag-link:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    /* Author Bio */
    .author-bio {
        display: flex;
        gap: 24px;
        padding: 32px;
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-light-2) 100%);
        border-radius: 16px;
        margin: 40px 0;
        align-items: flex-start;
    }

    .author-image {
        flex-shrink: 0;
    }

    .author-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 3px solid white;
    }

    .author-info h4 {
        margin: 0 0 8px;
        font-size: 18px;
        color: var(--text-dark);
    }

    .author-info p {
        margin: 0;
        color: var(--text-muted);
        font-size: 14px;
    }

    /* Navigation */
    .post-navigation {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        margin: 40px 0;
        padding: 32px;
        background: var(--gray-100);
        border-radius: 16px;
    }

    .nav-previous,
    .nav-next {
        display: flex;
        align-items: center;
    }

    .nav-previous a {
        text-decoration: none;
        color: var(--primary-color);
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .nav-next a {
        text-decoration: none;
        color: var(--primary-color);
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        justify-content: flex-end;
    }

    .nav-previous a:hover,
    .nav-next a:hover {
        gap: 12px;
    }

    /* Comments Section */
    .post-comments {
        margin-top: 60px;
        padding-top: 60px;
        border-top: 2px solid #e0e0e0;
    }

    /* Related Posts */
    .related-posts {
        margin-top: 80px;
    }

    .related-posts h2 {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 40px;
        text-align: center;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
    }

    .related-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .related-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.1);
    }

    .related-image {
        width: 100%;
        height: 200px;
        overflow: hidden;
        background: var(--gray-200);
    }

    .related-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .related-card:hover .related-image img {
        transform: scale(1.08);
    }

    .related-card h3 {
        padding: 20px;
        font-size: 16px;
        font-weight: 700;
        margin: 0;
    }

    .related-card h3 a {
        color: var(--text-dark);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .related-card h3 a:hover {
        color: var(--primary-color);
    }

    .related-date {
        padding: 0 20px 20px;
        margin: 0;
        font-size: 14px;
        color: var(--text-muted);
    }

    .single-contact-cta {
        margin-top: 48px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    @media (max-width: 768px) {
        .post-content {
            padding: 32px 20px;
        }

        .post-title {
            font-size: 28px;
        }

        .post-meta {
            flex-direction: column;
            gap: 12px;
        }

        .post-body {
            font-size: 16px;
        }

        .author-bio {
            flex-direction: column;
        }

        .post-navigation {
            grid-template-columns: 1fr;
        }

        .related-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<?php get_footer(); ?>
