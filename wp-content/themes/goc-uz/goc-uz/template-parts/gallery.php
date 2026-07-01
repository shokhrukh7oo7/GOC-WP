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
                    <p class="section-enter-header">№ 10.02 - Видео</p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                Тайм-лапсы <br />
                                и репортажи.
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                38 роликов с производства, монтажа на объектах, интервью с
                                командой и обзоров продукции. Доступно на YouTube — без
                                рекламы и без брендинга.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video-container">
                <div class="video-grid">
                    <div class="video-card is-active">
                        <div class="video-preview">
                            <div class="video-overlay">
                                <button class="play-btn">
                                    <img src="/assets/images/home/play.svg" alt="icon" class="btn-icon" />
                                </button>
                                <span class="video-duration">12:48</span>
                            </div>
                            <video class="main-video-player" src="/assets/slide-1.mp4" loop muted playsinline></video>
                        </div>
                        <div class="video-meta">
                            <p class="video-title">DOCUMENTARY · 2026</p>
                            <h3 class="video-header">
                                «От преформы до катушки» — экскурсия по Factory №1
                            </h3>
                            <p class="video-desc">
                                Полный цикл производства оптического кабеля за 12 минут.
                            </p>
                        </div>
                    </div>

                    <div class="video-card">
                        <div class="video-preview">
                            <div class="video-overlay">
                                <button class="play-btn">
                                    <img src="/assets/images/home/play.svg" alt="icon" class="btn-icon" />
                                </button>
                                <span class="video-duration">4:12</span>
                            </div>
                            <video class="main-video-player" src="/assets/slide-3.mp4" loop muted playsinline></video>
                        </div>
                        <div class="video-meta">
                            <p class="video-title">TIME-LAPSE · 03.2026</p>
                            <h3 class="video-header">Запуск линии А-3</h3>
                            <p class="video-desc">
                                5 недель пусконаладки · 240 ч съёмки → 4 мин.
                            </p>
                        </div>
                    </div>

                    <div class="video-card">
                        <div class="video-preview">
                            <div class="video-overlay">
                                <button class="play-btn">
                                    <img src="/assets/images/home/play.svg" alt="icon" class="btn-icon" />
                                </button>
                                <span class="video-duration">7:30</span>
                            </div>
                            <video class="main-video-player" src="/assets/slide-5.mp4" loop muted playsinline></video>
                        </div>
                        <div class="video-meta">
                            <p class="video-title">FIELD · 2025</p>
                            <h3 class="video-header">Магистраль Ташкент — Самарканд</h3>
                            <p class="video-desc">316 км подвеса ADSS с воздуха.</p>
                        </div>
                    </div>
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
                        <p class="section-enter-header">№ 10.03 - Pres kit</p>
                        <div class="section-enter-description">
                            <div class="section-enter-left">
                                <h1>
                                    Скачать <br />
                                    материалы.
                                </h1>
                            </div>

                            <div class="section-enter-right">
                                <p>
                                    Логотипы, фирменные шрифты, продуктовые фото, рендеры и
                                    пресс-релизы. Свободное использование с упоминанием бренда
                                    GOC-UZ
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="download-item-wrapper">
                        <div class="item">
                            <div class="download-icon-wrapper">
                                <img src="/assets/images/home/download-1.svg" alt="image" />
                            </div>

                            <div class="download-content-wrapper">
                                <h6>Логотипы • vector</h6>
                                <p>SVG, EPS, PDF. Версии RU/EN, моно, мнверс</p>
                            </div>

                            <div class="download-btn-wrapper">
                                <p>ZIP • 4.2 MB</p>
                                <a download href="/assets/images/check.svg">
                                    <img src="/assets/images/home/arrow-bottom.svg" alt="icon" />
                                </a>
                            </div>
                        </div>

                        <div class="item">
                            <div class="download-icon-wrapper">
                                <img src="/assets/images/home/download-2.svg" alt="image" />
                            </div>

                            <div class="download-content-wrapper">
                                <h6>Продуктовые фото</h6>
                                <p>128 SKU • студия • 4000х4000</p>
                            </div>

                            <div class="download-btn-wrapper">
                                <p>ZIP • 168 MB</p>
                                <a download href="/assets/images/check.svg">
                                    <img src="/assets/images/home/arrow-bottom.svg" alt="icon" />
                                </a>
                            </div>
                        </div>

                        <div class="item">
                            <div class="download-icon-wrapper">
                                <img src="/assets/images/home/download-3.svg" alt="image" />
                            </div>

                            <div class="download-content-wrapper">
                                <h6>3D-рендеры катушек</h6>
                                <p>PNG • transparent • 12 ресурсов.</p>
                            </div>

                            <div class="download-btn-wrapper">
                                <p>ZIP • 56 MB</p>
                                <a download href="/assets/images/check.svg">
                                    <img src="/assets/images/home/arrow-bottom.svg" alt="icon" />
                                </a>
                            </div>
                        </div>

                        <div class="item">
                            <div class="download-icon-wrapper">
                                <img src="/assets/images/home/download-4.svg" alt="image" />
                            </div>

                            <div class="download-content-wrapper">
                                <h6>Пресс-релизы 2025-2026</h6>
                                <p>PDF • DOCX • RU и EN версии.</p>
                            </div>

                            <div class="download-btn-wrapper">
                                <p>ZIP • 12 MB</p>
                                <a download href="/assets/images/check.svg">
                                    <img src="/assets/images/home/arrow-bottom.svg" alt="icon" />
                                </a>
                            </div>
                        </div>
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