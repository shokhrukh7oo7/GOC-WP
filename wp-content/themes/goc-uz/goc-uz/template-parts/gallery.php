<?php
/*
Template Name: Галерея
*/
get_header();
?>

<main>
    <section>
        <div class="container">
            <div class="extra-section ready-made-solutions-section">
                <div class="layout-section">
                    <?php goc_breadcrumbs(); ?>

                    <p class="section-enter-header"><? the_field('gallery-header'); ?></p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                <?= the_field('gallery-under-header'); ?>
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                <?= the_field('gallery-description'); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rms-item-wrapper">

                    <?php if (have_rows('rms-item')): ?>

                        <?php while (have_rows('rms-item')):
                            the_row(); ?>
                            <div class="item">
                                <h6>
                                    <?= get_sub_field('rms-header'); ?>
                                </h6>
                                <div class="content">
                                    <p>
                                        <?= get_sub_field('rms-span'); ?>
                                    </p>
                                    <span>
                                        <?= get_sub_field('rms-desc'); ?>
                                    </span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="gallery-container">
                <header class="gallery-header">
                    <nav class="gallery-nav">
                        <?php
                        $categories = get_terms([
                            'taxonomy' => 'gallery_category',
                            'hide_empty' => false,
                        ]);

                        $total_count = wp_count_posts('gallery')->publish;
                        ?>

                        <button class="tab-btn active" data-filter="all">
                            Все <span><?php echo $total_count; ?></span>
                        </button>

                        <?php
                        if (!empty($categories) && !is_wp_error($categories)):
                            foreach ($categories as $cat):
                                $filter_slug = ($cat->slug === 'video' || mb_strtolower($cat->name) === 'видео') ? 'video' : $cat->slug;
                                ?>
                                <button class="tab-btn" data-filter="<?php echo esc_attr($filter_slug); ?>">
                                    <?php echo esc_html($cat->name); ?> <span><?php echo $cat->count; ?></span>
                                </button>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </nav>
                    <div class="gallery-extra-links">
                        <p class="extra-link">Вид</p>
                        <span class="extra-link">Мозаика</span>
                    </div>
                </header>

                <div class="gallery-grid">
                    <?php
                    $gallery_query = new WP_Query([
                        'post_type' => 'gallery',
                        'posts_per_page' => -1,
                        'post_status' => 'publish'
                    ]);

                    if ($gallery_query->have_posts()):
                        while ($gallery_query->have_posts()):
                            $gallery_query->the_post();

                            $terms = get_the_terms(get_the_ID(), 'gallery_category');
                            $cat_slug = !empty($terms) ? $terms[0]->slug : '';
                            $cat_name = !empty($terms) ? $terms[0]->name : '';

                            $is_video = get_field('is_video');
                            $video_duration = get_field('video_duration');

                            $video_field_data = get_field('video_file');
                            $video_url = '';
                            if (is_array($video_field_data)) {
                                $video_url = $video_field_data['url'];
                            } elseif (is_numeric($video_field_data)) {
                                $video_url = wp_get_attachment_url($video_field_data);
                            } else {
                                $video_url = $video_field_data;
                            }

                            $img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');

                            if (!$img_url) {
                                $img_url = '/assets/images/home/catalog/cat-1.png';
                            }
                            ?>
                            <?php
                            $final_category = $is_video ? 'video' : $cat_slug;
                            ?>
                            <div class="gallery-item" data-category="<?php echo esc_attr($final_category); ?>">

                                <?php if ($is_video): ?>
                                    <div class="item-inner has-video" onclick="playInlineVideo(this)">
                                        <span class="item-badge">Видео • <?php echo esc_html($video_duration); ?></span>
                                        <div class="video-indicator"></div>

                                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>"
                                            class="video-poster" />

                                        <video class="gallery-video inline-player" autoplay loop muted playsinline>
                                            <source src="<?php echo esc_url($video_url); ?>" type="video/mp4" />
                                        </video>
                                    </div>
                                <?php else: ?>
                                    <div class="item-inner">
                                        <span class="item-badge"><?php echo esc_html($cat_name); ?></span>
                                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" />
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                        echo '<p>Элементов галереи пока не добавлено.</p>';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- video -->
    <section class="video-section">
        <div class="container">
            <div class="extra-section">
                <div class="layout-section">
                    <p class="section-enter-header">
                        <?= the_field('video-header'); ?>
                    </p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                <?= the_field('video-under-header'); ?>
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                <?= the_field('video-description'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video-container">
                <div class="video-grid" data-play="<?= get_template_directory_uri(); ?>/assets/images/home/play.svg"
                    data-pause="<?= get_template_directory_uri(); ?>/assets/images/home/pause.svg">
                    <?php if (have_rows('videos')): ?>
                        <?php
                        $index = 0;
                        while (have_rows('videos')):
                            the_row();
                            $video = get_sub_field('video_file');
                            $duration = get_sub_field('duration');
                            $title = get_sub_field('title');
                            $heading = get_sub_field('heading');
                            $description = get_sub_field('description');
                            ?>
                            <div class="video-card <?= $index === 0 ? 'is-active' : ''; ?>">
                                <div class="video-preview">
                                    <div class="video-overlay">
                                        <button class="play-btn">
                                            <img src="<?= get_template_directory_uri(); ?>/assets/images/home/play.svg" alt=""
                                                class="btn-icon">
                                        </button>
                                        <span class="video-duration">
                                            <?= esc_html($duration); ?>
                                        </span>
                                    </div>
                                    <video class="main-video-player" loop muted playsinline>
                                        <source src="<?= esc_url($video['url']); ?>"
                                            type="<?= esc_attr($video['mime_type']); ?>">
                                    </video>
                                </div>
                                <div class="video-meta">
                                    <p class="video-title">
                                        <?= esc_html($title); ?>
                                    </p>
                                    <h3 class="video-header">
                                        <?= esc_html($heading); ?>
                                    </h3>
                                    <p class="video-desc">
                                        <?= esc_html($description); ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                            $index++;
                        endwhile;
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- download -->
    <section class="download-container">
        <div class="container">
            <div class="download-wrapper">
                <div class="extra-section ready-made-solutions-section">
                    <div class="layout-section">
                        <p class="section-enter-header">
                            <?= the_field('download-header'); ?>
                        </p>
                        <div class="section-enter-description">
                            <div class="section-enter-left">
                                <h1>
                                    <?= the_field('download-under-header'); ?>
                                </h1>
                            </div>

                            <div class="section-enter-right">
                                <p>
                                    <?= the_field('download-description'); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="download-item-wrapper">

                        <?php if (have_rows('downloads')): ?>
                            <?php while (have_rows('downloads')):
                                the_row();
                                $icon = get_sub_field('icon');
                                $title = get_sub_field('title');
                                $description = get_sub_field('description');
                                $file_size = get_sub_field('file_size');
                                $file = get_sub_field('file');
                                $btn_icon = get_sub_field('btn-icon');
                                ?>
                                <div class="item">
                                    <div class="download-icon-wrapper">
                                        <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt']); ?>" />
                                    </div>

                                    <div class="download-content-wrapper">
                                        <h6>
                                            <?= esc_html($title); ?>
                                        </h6>
                                        <p>
                                            <?= esc_html($description); ?>
                                        </p>
                                    </div>

                                    <div class="download-btn-wrapper">
                                        <p>
                                            <?= esc_html($file_size); ?>
                                        </p>
                                        <a download href="<?= esc_url($file['url']); ?>">
                                            <img src="<?= esc_url($btn_icon['url']); ?>"
                                                alt="<?= esc_attr($btn_icon['alt']); ?>" />
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <a download href="recipe.html"> Download recipe </a> -->
</main>

<?php
get_footer();
?>