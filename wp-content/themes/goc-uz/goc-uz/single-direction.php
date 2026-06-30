<?php get_header(); ?>

<section class="direction-single">

    <div class="container">

        <div class="direction-single-wrapper">
            <h1>
                <?php the_title(); ?>
            </h1>

            <div class="direction-main-image-wrapper">
                <?php the_post_thumbnail('full'); ?>
            </div>

            <div class="content">

                <?php the_content(); ?>

            </div>
        </div>

    </div>

</section>

<?php get_footer(); ?>