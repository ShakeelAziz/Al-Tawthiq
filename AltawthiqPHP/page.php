<?php get_header(); ?>

<section class="page-content">
    <div class="container" data-aos="fade-up">
        <div class="page-wrapper">
            <?php 
            while (have_posts()) {
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <?php if (has_post_thumbnail()): ?>
                        <figure class="post-thumbnail">
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

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('الصفحات:', 'altawthiq'),
                        'after'  => '</div>',
                    ));
                    ?>
                </article>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<style>
    .page-content {
        padding: 100px 0;
        background: var(--gray-100);
        min-height: 50vh;
    }
    
    .page-wrapper {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        padding: 48px;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    
    .entry-header {
        margin-bottom: 40px;
    }
    
    .entry-title {
        font-size: 42px;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 20px;
    }
    
    .entry-content {
        font-size: 16px;
        line-height: 1.8;
        color: var(--text-muted);
    }
    
    @media (max-width: 768px) {
        .page-wrapper {
            padding: 24px;
        }
        
        .entry-title {
            font-size: 28px;
        }
    }
</style>

<?php get_footer(); ?>
