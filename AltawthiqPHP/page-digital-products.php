<?php get_header(); ?>

<section class="blog-page">
    <div class="container">
        <div class="blog-wrapper" data-aos="fade-up">

            <div class="blog-header">
                <h1>
                    <?php echo is_rtl() ? 'المنتجات الرقمية' : 'Digital Products'; ?>
                </h1>
                <p>
                    <?php echo is_rtl()
                        ? 'كتب وأدلة مجانية لتحميلها بعد تعبئة بيانات بسيطة'
                        : 'Free books and guides—download after a short form'; ?>
                </p>
            </div>

            <div class="blog-grid">

                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                $args = array(
                    'post_type' => 'digital_product',
                    'posts_per_page' => 9,
                    'paged' => $paged,
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>

                        <article class="blog-card">

                            <?php if (has_post_thumbnail()) : ?>
                                <div class="blog-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="blog-content">
                                <h2 class="blog-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

                                <p class="blog-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 22); ?>
                                </p>

                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php echo is_rtl() ? 'تحميل مجاني' : 'Free Download'; ?>
                                </a>
                            </div>

                        </article>

                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>لا توجد منتجات رقمية بعد</p>';
                endif;
                ?>

            </div>

            <!-- PAGINATION -->
            <div class="blog-pagination">
                <?php
                echo paginate_links(array(
                    'total' => $query->max_num_pages,
                    'current' => max(1, $paged),
                    'type' => 'list',
                ));
                ?>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>