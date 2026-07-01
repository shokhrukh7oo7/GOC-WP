<?php
/*
    Template name: Решение
*/
get_header();
?>

<main>
    <!-- ready-made solutions -->
    <section>
        <div class="container">
            <div class="extra-section ready-made-solutions-section">
                <div class="layout-section">
                    <?php goc_breadcrumbs(); ?>

                    <p class="section-enter-header"><?= the_field('solution-header'); ?></p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                <?= the_field('solution-under-header'); ?>
                                <br>
                                <?= the_field('solution-extra-text'); ?>
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                <?= the_field('solution-description'); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rms-item-wrapper">

                    <?php if (have_rows('rms-item')): ?>
                        <?php while (have_rows('rms-item')):
                            the_row();
                            $head = get_sub_field('rms-header');
                            $span = get_sub_field('rms-span');
                            $desc = get_sub_field('rms-desc');
                            ?>
                            <div class="item">
                                <h6><?= esc_html($head); ?></h6>
                                <div class="content">
                                    <p><?= esc_html($span); ?></p>
                                    <span><?= esc_html($desc); ?></span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- direction -->
    <section>
        <div class="container">
            <div class="direction-section">
                <div class="layout-section">
                    <p class="section-enter-header"><?= the_field('direction-header'); ?></p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                <?= the_field('direction-under-header'); ?>
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                <?= the_field('direction-description'); ?>
                            </p>

                            <div class="layout-extra-section-wrapper">
                                <a href="#">
                                    <?= the_field('direction-btn-text'); ?>
                                    <?php
                                    $icon = get_field('direction-btn-image');
                                    ?>
                                    <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt']); ?>" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="direction-item-wrapper">

                    <?php

                    $query = new WP_Query([
                        'post_type' => 'direction',
                        'posts_per_page' => -1,
                    ]);

                    $total = $query->post_count;
                    $count = 1;

                    if ($query->have_posts()):

                        while ($query->have_posts()):

                            $query->the_post();

                            $small = get_field('direction_small_title');
                            $fibers = get_field('direction_fibers');
                            $standard = get_field('direction_standard');
                            $stat = get_field('direction_stat');
                            $textBtn = get_field('direction-btn-text');
                            $models = get_field('direction_models');

                            ?>

                            <div class="item">
                                <div class="item-header">
                                    <span>
                                        <?= sprintf('%02d', $count); ?>
                                        /
                                        <?= sprintf('%02d', $total); ?>
                                    </span>
                                    <p>
                                        <?= esc_html($small); ?>
                                    </p>
                                </div>
                                <div class="item-image">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>

                                <div class="item-content">
                                    <h3>
                                        <?php the_title(); ?>
                                    </h3>
                                    <p>
                                        <?= wp_trim_words(get_the_content(), 20); ?>
                                    </p>
                                    <div class="extra-content">
                                        <p>
                                            <span>
                                                <?= esc_html($fibers); ?>
                                            </span>
                                        </p>
                                        <span>
                                            <?= esc_html($standard); ?>
                                        </span>
                                        <p>
                                            <span>
                                                <?= esc_html($stat); ?>
                                            </span>
                                        </p>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="content-btn">
                                        <?= esc_html($textBtn); ?>
                                        <span>
                                            <?= esc_html($models); ?>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php
                            $count++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- process -->
    <section class="process-container">
        <div class="container">
            <div class="process-wrapper">
                <div class="layout-section">
                    <p class="section-enter-header"><?= the_field('process-header'); ?></p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                <?= the_field('process-under-header'); ?>
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                <?= the_field('process-description'); ?>
                            </p>
                        </div>
                        <div class="layout-extra-section-wrapper">
                            <p><?= the_field('process-extra-text'); ?></p>
                            <span><?= the_field('process-extra-text-2'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="process-item-wrapper">

                    <?php if (have_rows('process')): ?>
                        <?php while (have_rows('process')):
                            the_row();
                            $number = get_sub_field('process-number');
                            $head = get_sub_field('process-head');
                            $desc = get_sub_field('process-desc');
                            $deadline = get_sub_field('process-deadline');
                            ?>
                            <div class="item">
                                <h1><?= esc_html($number); ?></h1>
                                <span><?= esc_html($head); ?></span>
                                <p><?= esc_html($desc); ?></p>
                                <span><?= esc_html($deadline); ?></span>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- keys -->
    <section class="keys-wrapper">
        <div class="container">
            <div class="keys-section">
                <div class="layout-section">
                    <p class="section-enter-header"><?= the_field('keys-header'); ?></p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                <?= the_field('keys-under-header'); ?>
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                <?= the_field('keys-description'); ?>
                            </p>

                            <div class="layout-extra-section-wrapper">
                                <a href="#">
                                    <?= the_field('keys-btn-text'); ?>
                                    <?php
                                    $icon = get_field('keys-btn-icon');
                                    ?>
                                    <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt']); ?>" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="keys-item-wrapper">

                    <?php if (have_rows('keys-items')): ?>
                        <?php while (have_rows('keys-items')):
                            the_row();
                            $date = get_sub_field('keys-item-date');
                            $head = get_sub_field('keys-item-header');
                            $desc = get_sub_field('keys-item-description');
                            $client = get_sub_field('keys-item-client');
                            $client_value = get_sub_field('keys-item-client-value');
                            $length = get_sub_field('keys-item-length');
                            $length_value = get_sub_field('keys-item-length-value');
                            $btn_text = get_sub_field('keys-item-btn-text');
                            $btn_icon = get_sub_field('keys-item-btn-icon');
                            ?>
                            <div class="keys-item">
                                <p class="keys-date">
                                    <?= esc_html($date); ?>
                                </p>
                                <div class="keys-row">
                                    <h6><?= esc_html($head); ?></h6>
                                    <span><?= esc_html($desc); ?></span>
                                </div>

                                <div class="keys-client">
                                    <span><?= esc_html($client); ?></span>
                                    <p><?= esc_html($client_value); ?></p>
                                </div>

                                <p class="keys-row-length">
                                    <?= esc_html($length); ?> <sub><?= esc_html($length_value); ?></sub>
                                </p>

                                <a href="#">
                                    <?= esc_html($btn_text); ?>
                                    <img src="<?= esc_url($btn_icon['url']); ?>" alt="<?= esc_attr($btn_icon['alt']); ?>" />
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- table -->
    <section class="table-container">
        <div class="container">
            <div class="extra-section">
                <div class="layout-section">
                    <p class="section-enter-header">№ 04.04 - Сравнение</p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                Что входит <br />
                                в решение.
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                Три уровня вовлечения. Можем поставить только кабель - а
                                можем вести проект от ТЗ до 5 лет сервиса.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="table_component" role="region" tabindex="0">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    Supply <br />
                                    <span>только поставка</span>
                                </th>
                                <th>
                                    Standard <br />
                                    <span>поставка + монтаж</span>
                                </th>
                                <th>
                                    Turnkey <br />
                                    <span>под ключ • популярное</span>
                                </th>
                                <th>
                                    Service <br />
                                    <span>+ сервис 5 лет</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Подбор Sku</td>
                                <td data-label="Supply (только поставка)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                                <td data-label="Standard (поставка + монтаж)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                                <td data-label="Turnkey (под ключ)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                                <td data-label="Service (+ сервис 5 лет)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                            </tr>
                            <tr>
                                <td>Кабель с OTDR-паспортом</td>
                                <td data-label="Supply (только поставка)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                                <td data-label="Standard (поставка + монтаж)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                                <td data-label="Turnkey (под ключ)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                                <td data-label="Service (+ сервис 5 лет)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                            </tr>
                            <tr>
                                <td>Доставка до объекта</td>
                                <td data-label="Supply (только поставка)"><b>опция</b></td>
                                <td data-label="Standard (поставка + монтаж)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                                <td data-label="Turnkey (под ключ)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                                <td data-label="Service (+ сервис 5 лет)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                            </tr>
                            <tr>
                                <td>Проектирование</td>
                                <td data-label="Supply (только поставка)">—</td>
                                <td data-label="Standard (поставка + монтаж)">—</td>
                                <td data-label="Turnkey (под ключ)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                                <td data-label="Service (+ сервис 5 лет)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                            </tr>
                            <tr>
                                <td>Монтаж бригадой GOC-UZ</td>
                                <td data-label="Supply (только поставка)">—</td>
                                <td data-label="Standard (поставка + монтаж)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                                <td data-label="Turnkey (под ключ)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                                <td data-label="Service (+ сервис 5 лет)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                            </tr>
                            <tr>
                                <td>Сдача с актом и паспортом</td>
                                <td data-label="Supply (только поставка)">—</td>
                                <td data-label="Standard (поставка + монтаж)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                                <td data-label="Turnkey (под ключ)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                                <td data-label="Service (+ сервис 5 лет)">
                                    <img src="/assets/images/check.svg" alt="icon" />
                                </td>
                            </tr>
                            <tr>
                                <td>Гарантия</td>
                                <td data-label="Supply (только поставка)">
                                    <b>24 мес.</b>
                                </td>
                                <td data-label="Standard (поставка + монтаж)">
                                    <b>24 мес.</b>
                                </td>
                                <td data-label="Turnkey (под ключ)"><b>36 мес.</b></td>
                                <td data-label="Service (+ сервис 5 лет)">
                                    <b>60 мес.</b>
                                </td>
                            </tr>
                            <tr>
                                <td>SLA реагирования</td>
                                <td data-label="Supply (только поставка)">—</td>
                                <td data-label="Standard (поставка + монтаж)">
                                    <b>24 ч</b>
                                </td>
                                <td data-label="Turnkey (под ключ)"><b>8 ч</b></td>
                                <td data-label="Service (+ сервис 5 лет)">
                                    <b>4 ч • 24/7</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- top footer -->
    <section class="top-footer-container">
        <div class="container">
            <div class="top-footer-wrapper">
                <div class="top-footer-left">
                    <h1>Опишите задачу - мы соберем решение за 1 день.</h1>
                    <p>
                        Закрепленный менеджер. Подбор SKU, расчёт сроков, опционально
                        визит на объект для замеров. Без обяъзательств.
                    </p>
                </div>

                <div class="top-footer-right">
                    <a href="#" class="give-btn">Получить КП ›</a>
                    <a href="#" class="catalog-btn">К каталогу</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>