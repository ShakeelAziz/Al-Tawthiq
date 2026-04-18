<?php get_header(); ?>

<section class="blog-page">
    <div class="container">
        <div class="blog-wrapper" data-aos="fade-up">
            <div class="blog-header">
                <h1><?php _e('مدونتنا', 'altawthiq'); ?></h1>
                <p><?php _e('آخر الأخبار والمقالات عن التدريب والاستشارات', 'altawthiq'); ?></p>
            </div>

            <!-- Blog Search -->
            <div class="blog-search" data-aos="fade-up" data-aos-delay="100">
                <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" name="s" placeholder="<?php _e('ابحث عن مقال...', 'altawthiq'); ?>" value="<?php echo get_search_query(); ?>">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <!-- Blog Posts Grid -->
            <div class="blog-grid" data-aos="fade-up" data-aos-delay="200">
                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                    'post_type'      => 'post',
                    'paged'          => $paged,
                    'posts_per_page' => 6,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );

                // Add search query if exists
                if (isset($_GET['s'])) {
                    $args['s'] = sanitize_text_field($_GET['s']);
                }

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <article class="blog-card" data-aos="fade-up">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="blog-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="blog-date">
                                        <i class="far fa-calendar"></i>
                                        <?php echo get_the_date('d M Y'); ?>
                                    </span>
                                    <span class="blog-author">
                                        <i class="far fa-user"></i>
                                        <?php the_author(); ?>
                                    </span>
                                </div>

                                <h2 class="blog-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <p class="blog-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                </p>

                                <div class="blog-categories">
                                    <?php
                                    $cats = get_the_category();
                                    foreach ($cats as $cat) {
                                        echo '<a href="' . esc_url(get_category_link($cat)) . '" class="category-tag">' . esc_html($cat->name) . '</a>';
                                    }
                                    ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php _e('اقرأ المزيد', 'altawthiq'); ?>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                        <?php
                    }
                } else {
                    echo '<div class="no-posts"><p>' . _e('لا توجد مقالات', 'altawthiq') . '</p></div>';
                }
                ?>
            </div>

            <!-- Pagination -->
            <?php
            if ($query->max_num_pages > 1) {
                echo '<div class="blog-pagination" data-aos="fade-up" data-aos-delay="300">';
                echo paginate_links(array(
                    'total'   => $query->max_num_pages,
                    'current' => $paged,
                    'type'    => 'list',
                ));
                echo '</div>';
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<style>
    .blog-page {
        padding: 100px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #f0f2f5 100%);
        min-height: 70vh;
    }

    .blog-wrapper {
        max-width: 1200px;
        margin: 0 auto;
    }

    .blog-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .blog-header h1 {
        font-size: 48px;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 16px;
    }

    .blog-header p {
        font-size: 18px;
        color: var(--text-muted);
    }

    /* Search */
    .blog-search {
        margin-bottom: 60px;
    }

    .blog-search form {
        display: flex;
        max-width: 500px;
        margin: 0 auto;
        background: white;
        border-radius: 50px;
        padding: 8px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .blog-search input {
        flex: 1;
        border: none;
        padding: 12px 20px;
        font-size: 16px;
        outline: none;
    }

    .blog-search button {
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

    .blog-search button:hover {
        background: var(--primary-dark);
        transform: scale(1.05);
    }

    /* Grid Layout */
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 40px;
        margin-bottom: 60px;
    }

    .blog-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.15);
    }

    .blog-image {
        width: 100%;
        height: 200px;
        overflow: hidden;
        background: var(--gray-200);
    }

    .blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .blog-card:hover .blog-image img {
        transform: scale(1.08);
    }

    .blog-content {
        padding: 28px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .blog-meta {
        display: flex;
        gap: 16px;
        font-size: 14px;
        color: var(--text-muted);
        margin-bottom: 12px;
    }

    .blog-date, .blog-author {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .blog-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 12px;
        line-height: 1.4;
    }

    .blog-title a {
        color: var(--text-dark);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .blog-title a:hover {
        color: var(--primary-color);
    }

    .blog-excerpt {
        font-size: 16px;
        color: var(--text-muted);
        line-height: 1.6;
        margin-bottom: 16px;
        flex: 1;
    }

    .blog-categories {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 16px;
    }

    .category-tag {
        display: inline-block;
        background: var(--primary-light);
        color: var(--primary-color);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .category-tag:hover {
        background: var(--primary-color);
        color: white;
    }

    .read-more {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .read-more:hover {
        gap: 12px;
        color: var(--primary-dark);
    }

    /* Pagination */
    .blog-pagination {
        display: flex;
        justify-content: center;
        gap: 8px;
        list-style: none;
        margin: 40px 0;
    }

    .blog-pagination a,
    .blog-pagination span {
        padding: 8px 12px;
        border-radius: 6px;
        border: 1px solid #e0e0e0;
        text-decoration: none;
        color: var(--text-dark);
        transition: all 0.3s ease;
        display: inline-block;
    }

    .blog-pagination a:hover,
    .blog-pagination .current {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .no-posts {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 16px;
    }

    .no-posts p {
        font-size: 18px;
        color: var(--text-muted);
    }

    @media (max-width: 768px) {
        .blog-page {
            padding: 60px 0;
        }

        .blog-header h1 {
            font-size: 32px;
        }

        .blog-grid {
            grid-template-columns: 1fr;
            gap: 28px;
        }

        .blog-search form {
            max-width: 100%;
        }

        .blog-meta {
            flex-direction: column;
            gap: 8px;
        }
    }
</style>

<?php get_footer(); ?>
