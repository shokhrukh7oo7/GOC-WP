<?php
/*
    Template name: Главная страница
*/
get_header();
?>

<main>
    <!-- SLIDER -->
    <section class="slider" id="slider" aria-label="Слайдер — главный экран">
        <?php if (have_rows('home_slider')):
            $slides = get_field('home_slider');
            $total_slides = count($slides);
            ?>
            <div class="container">
                <nav class="slider-nav" aria-label="Навигация слайдера">
                    <button class="nav-arrow" id="prev" aria-label="Предыдущий слайд">
                        <img src="<?= get_template_directory_uri() ?>/assets/images/home/arrow-left.svg" alt="" />
                    </button>

                    <div class="nav-dots" id="dots" role="tablist" aria-label="Слайды">
                        <?php for ($i = 0; $i < $total_slides; $i++): ?>
                            <button class="nav-dot <?= $i === 0 ? 'active' : ''; ?>" role="tab"
                                aria-selected="<?= $i === 0 ? 'true' : 'false'; ?>" aria-label="Слайд <?= $i + 1 ?>"
                                data-index="<?= $i ?>"></button>
                        <?php endfor; ?>
                    </div>

                    <button class="nav-arrow" id="next" aria-label="Следующий слайд">
                        <img src="<?= get_template_directory_uri() ?>/assets/images/home/arrow-right.svg" alt="" />
                    </button>
                </nav>
            </div>

            <?php
            $slide_index = 0;
            while (have_rows('home_slider')):
                the_row();
                $theme = get_sub_field('slide_theme') ?: 'dark';
                $video_url = get_sub_field('slide_video');
                $title = get_sub_field('slide_title');
                $eyebrow = get_sub_field('slide_eyebrow');
                $desc = get_sub_field('slide_desc');

                $btn_1_text = get_sub_field('btn_1_text');
                $btn_1_url = get_sub_field('btn_1_url');
                $btn_2_text = get_sub_field('btn_2_text');
                $btn_2_url = get_sub_field('btn_2_url');

                $is_active = ($slide_index === 0);
                ?>
                <div class="slide <?= $is_active ? 'active' : ''; ?>" data-theme="<?= esc_attr($theme); ?>" role="group"
                    aria-label="Слайд <?= $slide_index + 1 ?> из <?= $total_slides ?>">

                    <?php if ($video_url): ?>
                        <div class="slide__video-wrap">
                            <video autoplay muted loop playsinline>
                                <source src="<?= esc_url($video_url); ?>" type="video/mp4" />
                            </video>
                        </div>
                    <?php endif; ?>

                    <div class="container">
                        <div class="slide__content">
                            <?php if ($title): ?>
                                <div class="headline">
                                    <h1><?= wp_kses_post($title); ?></h1>
                                </div>
                            <?php endif; ?>

                            <div class="description">

                                <?php if ($eyebrow): ?>
                                    <p class="eyebrow"><?= esc_html($eyebrow); ?></p>
                                <?php endif; ?>

                                <?php if ($desc): ?>
                                    <p class="body-text"><?= esc_html($desc); ?></p>
                                <?php endif; ?>

                                <?php if (($btn_1_text && $btn_1_url) || ($btn_2_text && $btn_2_url)): ?>
                                    <div class="cta-row">
                                        <?php if ($btn_1_text && $btn_1_url): ?>
                                            <a href="<?= esc_url($btn_1_url); ?>" class="btn btn--primary">
                                                <?= esc_html($btn_1_text); ?>
                                                <span class="btn-arrow" aria-hidden="true"></span>
                                            </a>
                                        <?php endif; ?>

                                        <?php if ($btn_2_text && $btn_2_url): ?>
                                            <a href="<?= esc_url($btn_2_url); ?>" class="btn btn--outline">
                                                <?= esc_html($btn_2_text); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php if (have_rows('slide_stats')): ?>
                        <div class="container">
                            <div class="stats-bar" aria-label="Ключевые показатели">
                                <?php while (have_rows('slide_stats')):
                                    the_row();
                                    $stat_label = get_sub_field('stat_label');
                                    $stat_value = get_sub_field('stat_value');
                                    $stat_unit = get_sub_field('stat_unit');
                                    ?>
                                    <div class="stat">
                                        <p class="stat__label"><?= esc_html($stat_label); ?></p>
                                        <p class="stat__value"><?= esc_html($stat_value); ?></p>
                                        <p class="stat__unit"><?= esc_html($stat_unit); ?></p>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
                <?php
                $slide_index++;
            endwhile;
            ?>

        <?php else: ?>
            <p style="text-align:center; padding: 50px;">Пожалуйста, добавьте слайды в панели управления.</p>
        <?php endif; ?>
    </section>

    <!-- <section class="slider" id="slider" aria-label="Слайдер — главный экран">
        <div class="container">
            <nav class="slider-nav" aria-label="Навигация слайдера">
                <button class="nav-arrow" id="prev" aria-label="Предыдущий слайд">
                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-left.svg" alt="" />
                </button>
                <div class="nav-dots" id="dots" role="tablist" aria-label="Слайды">
                    <button class="nav-dot active" role="tab" aria-selected="true" aria-label="Слайд 1"
                        data-index="0"></button>
                    <button class="nav-dot" role="tab" aria-selected="false" aria-label="Слайд 2"
                        data-index="1"></button>
                    <button class="nav-dot" role="tab" aria-selected="false" aria-label="Слайд 3"
                        data-index="2"></button>
                </div>
                <button class="nav-arrow" id="next" aria-label="Следующий слайд">
                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-right.svg" alt="" />
                </button>
            </nav>
        </div>

        <div class="slide active" data-theme="dark" role="group" aria-label="Слайд 1 из 3">
            <div class="slide__video-wrap">
                <video autoplay muted loop playsinline>
                    <source src="<?= get_template_directory_uri() ?> /assets/slide-8.mp4" type="video/mp4" />
                </video>
            </div>
            <div class="container">
                <div class="slide__content">
                    <div class="headline">
                        <h1>Инфраструктура связи <span>нового поколения</span></h1>
                    </div>
                    <div class="description">
                        <p class="eyebrow">N°01 — Manifesto</p>
                        <p class="body-text">
                            Производство оптического кабеля для телекоммуникаций,
                            энергетики и цифровой инфраструктуры. Ташкент • Сеул • с 2019
                            года.
                        </p>
                        <div class="cta-row">
                            <a href="#" class="btn btn--primary">
                                Получить КП за 1 час
                                <span class="btn-arrow" aria-hidden="true"></span>
                            </a>
                            <a href="#" class="btn btn--outline">Подобрать кабель</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="stats-bar" aria-label="Ключевые показатели">
                    <div class="stat">
                        <p class="stat__label">Capacity · Factory 1</p>
                        <p class="stat__value">120 000</p>
                        <p class="stat__unit">км кабеля / год</p>
                    </div>
                    <div class="stat">
                        <p class="stat__label">Capacity · Factory 2</p>
                        <p class="stat__value">24 000</p>
                        <p class="stat__unit">км кабеля / год</p>
                    </div>
                    <div class="stat">
                        <p class="stat__label">CORD Output</p>
                        <p class="stat__value">25 000</p>
                        <p class="stat__unit">штук / месяц</p>
                    </div>
                    <div class="stat">
                        <p class="stat__label">Established</p>
                        <p class="stat__value">2019</p>
                        <p class="stat__unit">совместное предприятие</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide" data-theme="light" role="group" aria-label="Слайд 2 из 3">
            <div class="slide__video-wrap">
                <video autoplay muted loop playsinline>
                    <source src="<?= get_template_directory_uri() ?> /assets/slide-7.mp4" type="video/mp4" />
                </video>
            </div>
            <div class="container">
                <div class="slide__content">
                    <div class="headline">
                        <h1>Инфраструктура связи <span>нового поколения</span></h1>
                    </div>
                    <div class="description">
                        <p class="eyebrow">N°02 — Technology</p>
                        <p class="body-text">
                            Производство оптического кабеля для телекоммуникаций,
                            энергетики и цифровой инфраструктуры. Ташкент • Сеул • с 2019
                            года.
                        </p>
                        <div class="cta-row">
                            <a href="#" class="btn btn--primary">
                                Узнать подробнее
                                <span class="btn-arrow" aria-hidden="true"></span>
                            </a>
                            <a href="#" class="btn btn--outline">Наши решения</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="stats-bar">
                    <div class="stat">
                        <p class="stat__label">Стран-партнёров</p>
                        <p class="stat__value">18</p>
                        <p class="stat__unit">по всему миру</p>
                    </div>
                    <div class="stat">
                        <p class="stat__label">Проектов в год</p>
                        <p class="stat__value">340+</p>
                        <p class="stat__unit">реализовано</p>
                    </div>
                    <div class="stat">
                        <p class="stat__label">Сотрудников</p>
                        <p class="stat__value">1 200</p>
                        <p class="stat__unit">специалистов</p>
                    </div>
                    <div class="stat">
                        <p class="stat__label">Сертификаты</p>
                        <p class="stat__value">ISO</p>
                        <p class="stat__unit">9001 / 14001</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide" data-theme="dark" role="group" aria-label="Слайд 3 из 3">
            <div class="slide__video-wrap">
                <video autoplay muted loop playsinline>
                    <source src="<?= get_template_directory_uri() ?> /assets/slide-5.mp4" type="video/mp4" />
                </video>
            </div>
            <div class="container">
                <div class="slide__content">
                    <div class="headline">
                        <h1>Инфраструктура связи <span>нового поколения</span></h1>
                    </div>
                    <div class="description">
                        <p class="eyebrow">N°03 — Reliability</p>
                        <p class="body-text">
                            Производство оптического кабеля для телекоммуникаций,
                            энергетики и цифровой инфраструктуры. Ташкент • Сеул • с 2019
                            года.
                        </p>
                        <div class="cta-row">
                            <a href="#" class="btn btn--primary">
                                Запросить образец
                                <span class="btn-arrow" aria-hidden="true"></span>
                            </a>
                            <a href="#" class="btn btn--outline">Технические данные</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="stats-bar">
                    <div class="stat">
                        <p class="stat__label">Срок службы</p>
                        <p class="stat__value">25+</p>
                        <p class="stat__unit">лет гарантии</p>
                    </div>
                    <div class="stat">
                        <p class="stat__label">Полоса пропускания</p>
                        <p class="stat__value">400G</p>
                        <p class="stat__unit">макс. скорость</p>
                    </div>
                    <div class="stat">
                        <p class="stat__label">Температура</p>
                        <p class="stat__value">−60°C</p>
                        <p class="stat__unit">до +85°C</p>
                    </div>
                    <div class="stat">
                        <p class="stat__label">Стандарты</p>
                        <p class="stat__value">ITU-T</p>
                        <p class="stat__unit">G.652 / G.657</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- ABOUT -->
    <section>
        <div class="container">
            <div class="about-wrapper">
                <div class="about-left">
                    <p><?= the_field('left-photo-text'); ?></p>
                    <?php
                    $leftPhoto = get_field('left-image');
                    if ($leftPhoto): ?>
                        <img src="<?= esc_url($leftPhoto['url']); ?>" alt="<?= esc_attr($leftPhoto['alt']); ?>">
                    <?php endif; ?>
                </div>

                <div class="about-right">
                    <div class="about-right-top">
                        <span><?= the_field('content-header'); ?></span>
                        <h1><?= the_field('content-under-header'); ?></h1>
                        <p>
                            <?= the_field('content-desc'); ?>
                        </p>
                        <a href="#"><?= the_field('left-btn-text'); ?></a>
                    </div>

                    <div class="about-right-center">
                        <div class="about-sertificate-wrapper">

                            <?php if (have_rows('sertificates')): ?>
                                <?php while (have_rows('sertificates')):
                                    the_row();
                                    $image = get_sub_field('sertificate-image');
                                    ?>
                                    <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <p>
                            <?= the_field('sertificate-text'); ?>
                        </p>
                    </div>

                    <div class="about-right-bottom">
                        <?php if (have_rows('factory')): ?>
                            <div class="factory-wrapper">
                                <?php while (have_rows('factory')):
                                    the_row();
                                    $name = get_sub_field('factory_name');
                                    $value = get_sub_field('factory_value');
                                    $unit = get_sub_field('factory_unit');
                                    $description = get_sub_field('factory_description');
                                    ?>
                                    <div class="factory-item">
                                        <?php if ($name): ?>
                                            <span>
                                                <?= esc_html($name); ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if ($value): ?>
                                            <h6>
                                                <?= esc_html($value); ?>

                                                <?php if ($unit): ?>
                                                    <span>
                                                        <?= esc_html($unit); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </h6>
                                        <?php endif; ?>
                                        <?php if ($description): ?>
                                            <p>
                                                <?= esc_html($description); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application -->
    <section>
        <div class="container">
            <div class="application-wrapper">
                <div class="layout-section">
                    <p class="section-enter-header"><?= the_field('application-header'); ?></p>

                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1><?= the_field('application-under-header'); ?></h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                <?= the_field('application-description'); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="application-left-wrapper">

                    <?php if (have_rows('applications')): ?>
                        <?php while (have_rows('applications')):
                            the_row();
                            $btn_text = get_sub_field('application-btn-text');
                            $btn_image = get_sub_field('application-btn-image');
                            $head = get_sub_field('application-head');
                            $desc = get_sub_field('application-desc');
                            ?>
                            <div class="items">
                                <div class="item-header">
                                    <a href="#">
                                        <?= esc_html($btn_text) ?>
                                        <span>
                                            <?php if ($btn_image): ?>
                                                <img src="<?= esc_url($btn_image['url']); ?>"
                                                    alt="<?= esc_attr($btn_image['alt']); ?>">
                                            <?php endif; ?>
                                        </span>
                                    </a>
                                </div>
                                <div class="item-body">
                                    <h2><?= esc_html($head) ?></h2>
                                    <p><?= esc_html($desc) ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <!-- <div class="items">
                        <div class="item-header">
                            <a href="#">01 / 06
                                <span>
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </span>
                            </a>
                        </div>

                        <div class="item-body">
                            <h2>Телеком сети</h2>
                            <p>Магистральные линии, FTTx, последняя миля</p>
                        </div>
                    </div>

                    <div class="items">
                        <div class="item-header">
                            <a href="#">01 / 06
                                <span>
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </span>
                            </a>
                        </div>

                        <div class="item-body">
                            <h2>Телеком сети</h2>
                            <p>Магистральные линии, FTTx, последняя миля</p>
                        </div>
                    </div>

                    <div class="items">
                        <div class="item-header">
                            <a href="#">01 / 06
                                <span>
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </span>
                            </a>
                        </div>

                        <div class="item-body">
                            <h2>Телеком сети</h2>
                            <p>Магистральные линии, FTTx, последняя миля</p>
                        </div>
                    </div>

                    <div class="items">
                        <div class="item-header">
                            <a href="#">01 / 06
                                <span>
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </span>
                            </a>
                        </div>

                        <div class="item-body">
                            <h2>Телеком сети</h2>
                            <p>Магистральные линии, FTTx, последняя миля</p>
                        </div>
                    </div>

                    <div class="items">
                        <div class="item-header">
                            <a href="#">01 / 06
                                <span>
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </span>
                            </a>
                        </div>

                        <div class="item-body">
                            <h2>Телеком сети</h2>
                            <p>Магистральные линии, FTTx, последняя миля</p>
                        </div>
                    </div>

                    <div class="items">
                        <div class="item-header">
                            <a href="#">01 / 06
                                <span>
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </span>
                            </a>
                        </div>

                        <div class="item-body">
                            <h2>Телеком сети</h2>
                            <p>Магистральные линии, FTTx, последняя миля</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <!-- Solutuin -->
    <section>
        <div class="container">
            <div class="application-wrapper">
                <div class="layout-section">
                    <p class="section-enter-header"><?= the_field('solution-header'); ?></p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                <?= the_field('solution-under-header'); ?>
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                <?= the_field('solution-description'); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="solutions">
                    <?php if (have_rows('solutions')): ?>
                        <?php
                        $index = 1;
                        while (have_rows('solutions')):
                            the_row();
                            $theme = get_sub_field('solution_theme') ?: 'light';
                            $image = get_sub_field('solution_image');
                            $index_text = get_sub_field('solution_index');
                            $index_btn_image = get_sub_field('solution_btn_image');
                            $title = get_sub_field('solution_title');
                            $description = get_sub_field('solution_description');
                            $link = get_sub_field('solution_link');
                            ?>
                            <div class="cell cell--<?= esc_attr($theme); ?>">
                                <span class="cell__label">
                                    №<?= sprintf('%02d', $index); ?> — <?= esc_html($index_text); ?>
                                </span>
                                <?php if (!empty($link)): ?>
                                    <a class="cell__arrow" href="<?= esc_url($link['url']); ?>"
                                        target="<?= esc_attr($link['target'] ?: '_self'); ?>"
                                        aria-label="<?= esc_attr($link['title']); ?>">

                                        <?php if ($index_btn_image): ?>
                                            <img src="<?= esc_url($index_btn_image['url']); ?>"
                                                alt="<?= esc_attr($index_btn_image['alt']); ?>">
                                        <?php endif; ?>
                                    </a>
                                <?php else: ?>
                                    <div class="cell__arrow">
                                        <?php if ($index_btn_image): ?>
                                            <img src="<?= esc_url($index_btn_image['url']); ?>"
                                                alt="<?= esc_attr($index_btn_image['alt']); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($image): ?>
                                    <img class="cell__img" src="<?= esc_url($image['url']); ?>"
                                        alt="<?= esc_attr($image['alt']); ?>">
                                <?php endif; ?>
                                <div class="cell__text">
                                    <?php if ($title): ?>
                                        <h2 class="cell__title">
                                            <?= esc_html($title); ?>
                                        </h2>
                                    <?php endif; ?>
                                    <?php if ($description): ?>
                                        <p class="cell__desc">
                                            <?= esc_html($description); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php
                            $index++;
                        endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Configuration -->
    <section>
        <div class="configurator-wrapper">
            <div class="container">
                <div class="configurator">
                    <!-- LEFT -->
                    <div class="left">
                        <p class="eyebrow">№ 05 — Конфигуратор</p>
                        <h1 class="headline">Подберите кабель под ваш проект.</h1>
                        <p class="subtitle">
                            Три параметра — и вы получите артикул, конструкцию и цену. Без
                            звонка менеджеру.
                        </p>
                        <p class="divider-label">или</p>
                        <p class="tz-link">
                            отправьте нам ТЗ — подберём вручную, ответ за 1 час.
                        </p>
                    </div>

                    <!-- RIGHT -->
                    <div class="right">
                        <div class="form-rows">
                            <!-- Row 01: Project type -->
                            <div class="form-row">
                                <label class="row-label" for="project-type">
                                    <span class="row-num">01</span>
                                    Тип проекта
                                </label>
                                <div class="row-select-wrap">
                                    <select class="row-select" id="project-type" onchange="onSelect(this)">
                                        <option value="" disabled selected>
                                            Выберите применение
                                        </option>
                                        <option value="energy">Энергоснабжение</option>
                                        <option value="control">
                                            Управление и сигнализация
                                        </option>
                                        <option value="data">Передача данных</option>
                                        <option value="industrial">
                                            Промышленная автоматизация
                                        </option>
                                        <option value="transport">
                                            Транспортная инфраструктура
                                        </option>
                                        <option value="construction">Строительство</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row 02: Conditions -->
                            <div class="form-row">
                                <label class="row-label" for="conditions">
                                    <span class="row-num">02</span>
                                    Условия
                                </label>
                                <div class="row-select-wrap">
                                    <select class="row-select" id="conditions" onchange="onSelect(this)">
                                        <option value="" disabled selected>
                                            Условия прокладки
                                        </option>
                                        <option value="ground">В земле</option>
                                        <option value="air">
                                            В воздухе (открытая прокладка)
                                        </option>
                                        <option value="pipe">В трубах и каналах</option>
                                        <option value="water">Подводная прокладка</option>
                                        <option value="explosive">Взрывоопасная зона</option>
                                        <option value="corrosive">Агрессивная среда</option>
                                        <option value="indoor">Внутри помещений</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row 03: Length -->
                            <div class="form-row">
                                <label class="row-label" for="length">
                                    <span class="row-num">03</span>
                                    Длина, м
                                </label>
                                <input class="row-input" type="number" id="length" placeholder="напр. 12 000" min="1"
                                    oninput="onLengthInput(this)" />
                                <span class="row-suffix">М</span>
                            </div>
                        </div>

                        <!-- Estimate + CTA -->
                        <div class="estimate-row">
                            <div class="estimate-info">
                                <span class="estimate-label">Estimate&nbsp;·</span>
                                <span class="estimate-value" id="estimate-value">—</span>
                            </div>
                            <button class="btn-cta" onclick="showSolution()">
                                Показать решение
                                <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-right.svg"
                                    alt="icon" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Toast -->
    <div class="toast" id="toast"></div>

    <!-- Tabs (catalog) -->
    <section>
        <div class="container">
            <div class="catalog-wrapper">
                <div class="layout-section">
                    <p class="section-enter-header">№ 06 - Каталог</p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                Каталог <br />
                                продукции.
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                128 SKU. Если нужного артикула нет - произведем под заказ за
                                10-14 дней.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="catalog-tabs-wrapper">
                    <!-- ================= TABS (static) ================= -->
                    <nav class="tabs" role="tablist" aria-label="Категории продуктов">
                        <button class="tab is-active" role="tab" aria-selected="true" data-cat="all">
                            Все продукты<span class="count">128</span>
                        </button>
                        <button class="tab" role="tab" aria-selected="false" data-cat="outdoor">
                            Наружная прокладка<span class="count">42</span>
                        </button>
                        <button class="tab" role="tab" aria-selected="false" data-cat="indoor">
                            Внутренняя прокладка<span class="count">36</span>
                        </button>
                        <button class="tab" role="tab" aria-selected="false" data-cat="ftth">
                            FTTH / Drop<span class="count">21</span>
                        </button>
                        <button class="tab" role="tab" aria-selected="false" data-cat="armored">
                            Бронированные<span class="count">18</span>
                        </button>
                        <button class="tab" role="tab" aria-selected="false" data-cat="special">
                            Спец. исполнения<span class="count">11</span>
                        </button>
                    </nav>

                    <!-- ================= GRID (static cards) ================= -->
                    <div class="grid" id="grid">
                        <!-- 1. Aerial Cable -->
                        <article class="card" data-cats="outdoor special">
                            <div class="card__sku">
                                <p>SKU · <span>OR-024</span></p>
                            </div>
                            <div class="card__media">
                                <img src="<?= get_template_directory_uri() ?> /assets/images/home/catalog/cat-1.png"
                                    alt="image" />
                            </div>
                            <div class="card__body">
                                <h3 class="card__title">Aerial Cable</h3>
                                <p class="card__meta">2–144 волокна · Self-supporting</p>
                            </div>
                            <div class="card__more">
                                <a class="card__link" href="#or-024">Подробнее
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </a>
                            </div>
                        </article>

                        <!-- 2. Patchcord -->
                        <article class="card" data-cats="indoor">
                            <div class="card__sku">
                                <p>SKU · <span>OM-118</span></p>
                            </div>
                            <div class="card__media">
                                <img src="<?= get_template_directory_uri() ?> /assets/images/home/catalog/cat-2.png"
                                    alt="image" />
                            </div>
                            <div class="card__body">
                                <h3 class="card__title">Patchcord</h3>
                                <p class="card__meta">Armored · до 288 волокон</p>
                            </div>
                            <div class="card__more">
                                <a class="card__link" href="#om-118">Подробнее
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </a>
                            </div>
                        </article>

                        <!-- 3. ADSS Aramid -->
                        <article class="card" data-cats="ftth outdoor">
                            <div class="card__sku">
                                <p>SKU · <span>OM-033</span></p>
                            </div>
                            <div class="card__media">
                                <img src="<?= get_template_directory_uri() ?> /assets/images/home/catalog/cat-3.png"
                                    alt="image" />
                            </div>
                            <div class="card__body">
                                <h3 class="card__title">ADSS&nbsp; Aramid</h3>
                                <p class="card__meta">Flat · 1–12 волокон · FTTH</p>
                            </div>
                            <div class="card__more">
                                <a class="card__link" href="#om-033">Подробнее
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </a>
                            </div>
                        </article>

                        <!-- 4. Drop cable -->
                        <article class="card" data-cats="ftth">
                            <div class="card__sku">
                                <p>SKU · <span>OM-286</span></p>
                            </div>
                            <div class="card__media">
                                <img src="<?= get_template_directory_uri() ?> /assets/images/home/catalog/cat-4.png"
                                    alt="image" />
                            </div>
                            <div class="card__body">
                                <h3 class="card__title">Drop cable</h3>
                                <p class="card__meta">Double-jacketed · 48–432 волокон</p>
                            </div>
                            <div class="card__more">
                                <a class="card__link" href="#om-286">Подробнее
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </a>
                            </div>
                        </article>

                        <!-- 5. Многомодульный грунтовый -->
                        <article class="card" data-cats="outdoor armored">
                            <div class="card__sku">
                                <p>SKU · <span>OR-041</span></p>
                            </div>
                            <div class="card__media">
                                <img src="<?= get_template_directory_uri() ?> /assets/images/home/catalog/cat-5.png"
                                    alt="image" />
                            </div>
                            <div class="card__body">
                                <h3 class="card__title">Многомодульный грунтовый</h3>
                                <p class="card__meta">Огнестойкий · 2–24 волокон</p>
                            </div>
                            <div class="card__more">
                                <a class="card__link" href="#or-041">Подробнее
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </a>
                            </div>
                        </article>

                        <!-- 6. ADSS -->
                        <article class="card" data-cats="outdoor">
                            <div class="card__sku">
                                <p>SKU · <span>OM-309</span></p>
                            </div>
                            <div class="card__media">
                                <img src="<?= get_template_directory_uri() ?> /assets/images/home/catalog/cat-6.png"
                                    alt="image" />
                            </div>
                            <div class="card__body">
                                <h3 class="card__title">ADSS</h3>
                                <p class="card__meta">Diel. · Span до 1200m</p>
                            </div>
                            <div class="card__more">
                                <a class="card__link" href="#om-309">Подробнее
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </a>
                            </div>
                        </article>

                        <!-- 7. Indoor Riser -->
                        <article class="card" data-cats="indoor">
                            <div class="card__sku">
                                <p>SKU · <span>OM-055</span></p>
                            </div>
                            <div class="card__media">
                                <img src="<?= get_template_directory_uri() ?> /assets/images/home/catalog/cat-7.png"
                                    alt="image" />
                            </div>
                            <div class="card__body">
                                <h3 class="card__title">Indoor Riser</h3>
                                <p class="card__meta">Универсальный · 4–96 волокон</p>
                            </div>
                            <div class="card__more">
                                <a class="card__link" href="#om-055">Подробнее
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </a>
                            </div>
                        </article>

                        <!-- 8. Воздушный многомодульный -->
                        <article class="card" data-cats="outdoor special">
                            <div class="card__sku">
                                <p>SKU · <span>OR-412</span></p>
                            </div>
                            <div class="card__media">
                                <img src="<?= get_template_directory_uri() ?> /assets/images/home/catalog/cat-8.png"
                                    alt="image" />
                            </div>
                            <div class="card__body">
                                <h3 class="card__title">Воздушный многомодульный</h3>
                                <p class="card__meta">Грозозащитный трос · 24–96</p>
                            </div>
                            <div class="card__more">
                                <a class="card__link" href="#or-412">Подробнее
                                    <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-top.svg"
                                        alt="image" />
                                </a>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- ================= FOOTER ================= -->
                <div class="catalog__footer">
                    <a href="#" class="catalog-btn-all">
                        Смотреть весь каталог (128)
                        <img src="<?= get_template_directory_uri() ?> /assets/images/home/arrow-right.svg"
                            alt="image" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Reason -->
    <section>
        <div class="container">
            <div class="catalog-wrapper reason-container">
                <div class="layout-section">
                    <p class="section-enter-header">№ 07 - Почему GOC-UZ</p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                Четыре причины, <br />
                                по которым нас <br />
                                выбирают.
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="reason-items-wrapper">
                    <div class="item">
                        <div class="date-wrapper">
                            <p>01 / 04</p>
                        </div>

                        <div class="content">
                            <h5>Собственное производство</h5>
                            <p>
                                Два завода 15 производственных площадок. Полный цикл от
                                превормы до готового кабеля.
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="date-wrapper">
                            <p>02 / 04</p>
                        </div>

                        <div class="content">
                            <h5>Быстрая логистика</h5>
                            <p>
                                КП за 1 час. Отгрузка со склада в Ташкенте и Сеуле. Доставка
                                по СНГ и ЦА
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="date-wrapper">
                            <p>03 / 04</p>
                        </div>

                        <div class="content">
                            <h5>Гибкость под задачи</h5>
                            <p>
                                Небольшая партии, нестандартные длины, индивидуальная
                                маркировка и оболочка.
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="date-wrapper">
                            <p>04 / 04</p>
                        </div>

                        <div class="content">
                            <h5>Контроль качества</h5>
                            <p>
                                OTDR-тестирование каждой барабанной катушк. ISO 9001, IEC
                                60794. ГОСТ Р.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="reason-partner-wrapper">
                    <h3>Нам доверяют</h3>
                    <div class="partner-items-wrapper">
                        <div class="item">
                            <img src="<?= get_template_directory_uri() ?> /assets/images/home/p-1.png" alt="image" />
                        </div>
                        <div class="item">
                            <img src="<?= get_template_directory_uri() ?> /assets/images/home/p-1.png" alt="image" />
                        </div>
                        <div class="item">
                            <img src="<?= get_template_directory_uri() ?> /assets/images/home/p-1.png" alt="image" />
                        </div>
                        <div class="item">
                            <img src="<?= get_template_directory_uri() ?> /assets/images/home/p-1.png" alt="image" />
                        </div>
                        <div class="item">
                            <img src="<?= get_template_directory_uri() ?> /assets/images/home/p-1.png" alt="image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Request -->
    <section class="footer-request-wrapper">
        <div class="container">
            <div class="catalog-wrapper">
                <div class="layout-section">
                    <p class="section-enter-header">№ 08 - Связаться</p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                Оставьте <br />
                                заявку. <br />
                                <span>Ответим за 1 час.</span>
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <div class="form-wrapper">
                                <form>
                                    <div class="item">
                                        <label class="field-label" for="name">Имя</label>
                                        <input class="field-input" id="name" type="text"
                                            placeholder="Как к вам обращаться" />
                                    </div>
                                    <div class="item">
                                        <label class="field-label" for="phone">Телефон</label>
                                        <input class="field-input" id="phone" type="tel"
                                            placeholder="+998 __ ___ __ __" />
                                    </div>
                                    <div class="item">
                                        <label class="field-label" for="comment">Комментарий</label>
                                        <input class="field-input" id="comment" type="text"
                                            placeholder="Коротко опишите проект" />
                                    </div>
                                    <div class="item">
                                        <p>
                                            Нажимая "Отправить", вы соглашаетесь с политикой
                                            обработки персональным данных.
                                        </p>
                                        <button class="btn footer-send-btn">
                                            Отправить заявку >
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>