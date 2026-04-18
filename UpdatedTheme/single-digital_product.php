<?php get_header(); ?>

<section class="product-detail">
    <div class="container">

        <h1><?php the_title(); ?></h1>

        <?php the_post_thumbnail('large'); ?>

        <div class="content">
            <?php the_content(); ?>
        </div>

        <div class="download-box">
            <h3>Free Download</h3>

            <form id="downloadForm">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="company" placeholder="Company">
                <input type="text" name="position" placeholder="Position">
                <input type="text" name="mobile" placeholder="Mobile" required>

                <input type="hidden" name="product_id" value="<?php echo get_the_ID(); ?>">

                <button type="submit">Download</button>
            </form>

            <p id="msg"></p>
        </div>

    </div>
</section>

<?php get_footer(); ?>