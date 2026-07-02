<?php
/*
    Template name: Контакты
*/
get_header();
?>

<main>
    <!-- contact -->
    <section class="contact-wrapper">
        <div class="container">
            <div class="extra-section ready-made-solutions-section">
                <div class="layout-section">
                    <?php goc_breadcrumbs(); ?>
                    <p class="section-enter-header">
                        <?= the_field('contact-header'); ?>
                    </p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                <?= the_field('contact-under-header'); ?>
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                <?= the_field('contact-description'); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="contact-item-wrapper">

                    <?php if (have_rows('contacts')): ?>
                        <?php while (have_rows('contacts')):
                            the_row();
                            $icon = get_sub_field('icon');
                            $title = get_sub_field('title');
                            $phone = get_sub_field('phone-number');
                            $desc = get_sub_field('description');
                            $workspace = get_sub_field('workspace');
                            $link = get_sub_field('link');
                            $btn_icon = get_sub_field('btn-icon');
                            ?>
                            <div class="item">
                                <div class="contact-icon-wrapper">
                                    <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($icon['alt']); ?>" />
                                    <p>
                                        <?= esc_html($title); ?>
                                    </p>
                                </div>

                                <div class="contact-content-wrapper">
                                    <h6>
                                        <?= esc_html($phone); ?>
                                    </h6>
                                    <p>
                                        <?= esc_html($desc); ?>
                                    </p>
                                </div>

                                <div class="contact-btn-wrapper">
                                    <p>
                                        <?= esc_html($workspace); ?>
                                    </p>
                                    <a href="<?= esc_url($link); ?>">
                                        <img src="<?= esc_url($btn_icon['url']); ?>" alt="<?= esc_attr($btn_icon['alt']); ?>" />
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- contact form -->
    <section class="contact-wrapper">
        <div class="container">
            <div class="extra-section">
                <div class="contact-form-container">
                    <?php
                    $lang = pll_current_language();

                    switch ($lang) {
                        case 'ru':
                            echo do_shortcode('[contact-form-7 id="1dc71b6" title="Контактная форма"]');
                            break;

                        case 'uz':
                            echo do_shortcode('[contact-form-7 id="01922cc" title="Bog\'lanish formasi"]');
                            break;

                        case 'en':
                            echo do_shortcode('[contact-form-7 id="12834b0" title="Contact form"]');
                    }
                    ?>
                    <!-- <div class="contact-form-wrapper-left">
                        <div class="form-section">
                            <p class="eyebrow">№ 08.01 — Форма заявки</p>
                            <h1 class="heading">Опишите задачу.</h1>
                            <p class="subheading">
                                Подготовим КП за 1 час · согласуем сроки за 1 день ·
                                доставим документы в любое удобное время
                            </p>

                            <div class="c-items">
                                <div class="c-item active">
                                    <span class="tab-title">КП на кабель</span>
                                    <span class="tab-sub">подбор SKU + цена</span>
                                </div>
                                <div class="c-item">
                                    <span class="tab-title">Решение под ключ</span>
                                    <span class="tab-sub">проект + монтаж</span>
                                </div>
                                <div class="c-item">
                                    <span class="tab-title">Стать партнёром</span>
                                    <span class="tab-sub">дилерство · OEM</span>
                                </div>
                            </div>

                            <form class="form-grid" onsubmit="return false;">
                                <div class="field-row single">
                                    <div class="field">
                                        <label>Имя</label>
                                        <input type="text" placeholder="Бахром Кадыров" autocomplete="name" />
                                    </div>
                                </div>

                                <div class="field-row">
                                    <div class="field">
                                        <label>Компания <span class="req">*</span></label>
                                        <input type="text" placeholder="ООО «Связь-проект»"
                                            autocomplete="organization" />
                                    </div>
                                    <div class="field">
                                        <label>Должность</label>
                                        <input type="text" placeholder="Главный инженер"
                                            autocomplete="organization-title" />
                                    </div>
                                </div>

                                <div class="field-row">
                                    <div class="field">
                                        <label>Email <span class="req">*</span></label>
                                        <input type="email" placeholder="b.kadyrov@company.uz" autocomplete="email" />
                                    </div>
                                    <div class="field">
                                        <label>Телефон</label>
                                        <input type="tel" placeholder="+998 90 000 00 00" autocomplete="tel" />
                                    </div>
                                </div>

                                <div class="field-row">
                                    <div class="field">
                                        <label>Направление</label>
                                        <input type="text" placeholder="Магистральные ВОЛС" />
                                    </div>
                                    <div class="field">
                                        <label>Объём, км</label>
                                        <input type="text" placeholder="≈ 80" />
                                    </div>
                                </div>

                                <div class="field-row single">
                                    <div class="field message-field">
                                        <label>Сообщение</label>
                                        <textarea
                                            placeholder="Кратко о проекте: длины, среда прокладки, сроки, спецтребования…"></textarea>
                                    </div>
                                </div>

                                <div class="submit-row">
                                    <button class="btn-submit" type="submit">
                                        Отправить заявку ›
                                    </button>
                                    <p class="consent-text">
                                        Отправляя форму, вы соглашаетесь<br />
                                        с <a href="#">политикой обработки данных</a>
                                    </p>
                                </div>
                            </form>

                            <div class="form-footer">
                                <span class="pulse-dot"></span>
                                <span class="footer-note">Среднее время ответа на форму — 47 минут в рабочее
                                    время</span>
                            </div>
                        </div>
                    </div> -->

                    <div class="contact-form-wrapper-right">
                        <h3><?= the_field('form-right-header'); ?></h3>
                        <div class="item-wrapper">

                            <?php if (have_rows('form-right-items')): ?>
                                <?php while (have_rows('form-right-items')):
                                    the_row();
                                    $head = get_sub_field('header');
                                    $desc = get_sub_field('description');
                                    $title = get_sub_field('title');
                                    $value = get_sub_field('value');
                                    ?>
                                    <div class="item">
                                        <div class="item-left">
                                            <p><?= esc_html($head); ?></p>
                                            <span><?= esc_html($desc); ?></span>
                                        </div>
                                        <div class="item-center">
                                            <p><?= esc_html($title); ?></p>
                                        </div>
                                        <div class="item-right">
                                            <p>
                                                <?= esc_html($value); ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>

                        <div class="contact-user-info-wrapper">

                            <?php if (have_rows('user-info')): ?>
                                <?php while (have_rows('user-info')):
                                    the_row();
                                    $u_h_name = get_sub_field('header-name');
                                    $u_name = get_sub_field('name');
                                    $u_job = get_sub_field('job');
                                    $u_account = get_sub_field('account');
                                    $u_phone = get_sub_field('phone');
                                    ?>
                                    <div class="contact-user-info">
                                        <div class="user-cicle">
                                            <span><?= esc_html($u_h_name); ?></span>
                                        </div>

                                        <div class="user-info">
                                            <h6><?= esc_html($u_name); ?></h6>
                                            <span><?= esc_html($u_job); ?></span>
                                            <p><?= esc_html($u_account); ?></p>
                                            <p><?= esc_html($u_phone); ?></p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- map -->
    <?php
    $offices_data = [];
    $index = 0;

    if (have_rows('offices_repeater')): ?>
        <section class="section-offices">
            <div class="container">
                <p class="section-label"><?= the_field('map-btn-header'); ?></p>
                <div class="section-header">
                    <h1 class="section-title"><?= the_field('map-btn-under-header'); ?></h1>
                    <p class="section-desc">
                        <?= the_field('map-btn-description'); ?>
                    </p>
                </div>

                <div class="offices-grid" id="officesGrid">
                    <?php while (have_rows('offices_repeater')):
                        the_row();
                        $badge = get_sub_field('badge');
                        $city = get_sub_field('city');
                        $address_header = get_sub_field('address_header');
                        $address = get_sub_field('address');
                        $coords_text = get_sub_field('coords_text');
                        $link_text = get_sub_field('link_text');
                        $link_url = get_sub_field('link_url');

                        $lat = (float) get_sub_field('office_lat');
                        $lng = (float) get_sub_field('office_lng');

                        if ($lat && $lng) {
                            $offices_data[] = [
                                'lat' => $lat,
                                'lng' => $lng,
                                'name' => esc_html($city),
                                'type' => esc_html($badge),
                                'addr' => nl2br(esc_html($address)),
                            ];
                        }
                        ?>
                        <div class="office-card <?php echo $index === 0 ? 'active' : ''; ?>"
                            onclick="setActive(<?php echo $index; ?>)">
                            <span class="card-badge"><?php echo esc_html($badge); ?></span>
                            <div class="card-city"><?php echo esc_html($city); ?></div>
                            <div class="card-details">
                                <div>
                                    <span class="detail-label"><?php echo esc_html($address_header); ?></span>
                                    <span class="detail-value"><?php echo esc_html($address); ?></span>
                                </div>
                                <div class="card-divider"></div>
                                <?php if (have_rows('details_repeater')): ?>
                                    <?php while (have_rows('details_repeater')):
                                        the_row();
                                        $label = get_sub_field('label');
                                        $value = get_sub_field('value');
                                        ?>
                                        <div>
                                            <span class="detail-label"><?php echo esc_html($label); ?></span>
                                            <span class="detail-value"><?php echo esc_html($value); ?></span>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <div class="card-footer">
                                <span class="card-coords"><?php echo esc_html($coords_text); ?></span>
                                <a class="card-link" href="<?php echo esc_url($link_url); ?>">
                                    <?php echo esc_html($link_text); ?>
                                </a>
                            </div>
                        </div>
                        <?php $index++; endwhile; ?>
                </div>
            </div>
        </section>

        <section class="section-map">
            <div class="container">
                <p class="section-label"><?= the_field('map-header'); ?></p>
                <div class="section-header">
                    <h1 class="section-title"><?= the_field('map-under-header'); ?></h1>
                    <p class="section-desc">
                        <?= the_field('map-description'); ?>
                    </p>
                </div>

                <div class="map-wrap" style="position: relative; height: 450px;">
                    <div id="main-leaflet-map" style="width: 100%; height: 100%; border-radius: 12px; overflow: hidden;">
                    </div>
                </div>
            </div>
        </section>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <script>
            const offices = <?php echo json_encode($offices_data, JSON_UNESCAPED_UNICODE); ?>;
        </script>
    <?php endif; ?>

    <section class="contact-accordion-wrapper">
        <div class="container">
            <div class="extra-section ready-made-solutions-section">
                <div class="layout-section">
                    <p class="section-enter-header"><?= the_field('accordion-header'); ?></p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                <?= the_field('accordion-under-header'); ?>
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                <?= the_field('accordion-description'); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-wrapper">
                    <div class="accordion" id="accordionExample">
                        <?php if (have_rows('faq_items')): ?>
                            <?php
                            $total = count(get_field('faq_items'));
                            $index = 1;
                            ?>
                            <?php while (have_rows('faq_items')):
                                the_row();
                                $question = get_sub_field('question');
                                $answer = get_sub_field('answer');
                                $headingId = 'heading' . $index;
                                $collapseId = 'collapse' . $index;
                                ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="<?php echo $headingId; ?>">
                                        <button class="accordion-button <?php echo $index !== 1 ? 'collapsed' : ''; ?>"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapseId; ?>"
                                            aria-expanded="<?php echo $index === 1 ? 'true' : 'false'; ?>"
                                            aria-controls="<?php echo $collapseId; ?>">
                                            <span>
                                                <?php echo sprintf('%02d', $index); ?>
                                                /
                                                <?php echo sprintf('%02d', $total); ?>
                                            </span>
                                            <?php echo esc_html($question); ?>
                                        </button>
                                    </h2>
                                    <div id="<?php echo $collapseId; ?>"
                                        class="accordion-collapse collapse <?php echo $index === 1 ? 'show' : ''; ?>"
                                        aria-labelledby="<?php echo $headingId; ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php echo wp_kses_post($answer); ?>
                                        </div>
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
        </div>
    </section>
</main>

<?php
get_footer();
?>