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
    <section class="section-offices">
        <div class="container">
            <p class="section-label">№ 00.02 — География</p>
            <div class="section-header">
                <h1 class="section-title">Офисы<br />и заводы.</h1>
                <p class="section-desc">
                    Головной офис в Ташкенте, два производственных комплекса и три
                    представительства. Производство — Руз, продажи — Узбекистан,
                    Казахстан, Кыргызстан и Корея.
                </p>
            </div>

            <div class="offices-grid" id="officesGrid">
                <div class="office-card active" onclick="setActive(0)">
                    <span class="card-badge">Головной офис</span>
                    <div class="card-city">Ташкент</div>
                    <div class="card-details">
                        <div>
                            <span class="detail-label">Адрес</span>
                            <span class="detail-value">Республика Узбекистан, 100015, г. Ташкент,
                                Мирзо-Улугбекский р-н, ул. Шахрисабзская, 10, Alibaba Tower,
                                12 этаж</span>
                        </div>
                        <div class="card-divider"></div>
                        <div>
                            <span class="detail-label">Телефон</span>
                            <span class="detail-value">+998 78 148 98 80</span>
                        </div>
                        <div>
                            <span class="detail-label">Email</span>
                            <span class="detail-value">info@pro-uz.com</span>
                        </div>
                        <div>
                            <span class="detail-label">Часы работы</span>
                            <span class="detail-value">Пн – Пт: 09:00 – 19:00</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="card-coords">41.31 N · 69.17 E</span>
                        <a class="card-link" href="#">На карте</a>
                    </div>
                </div>

                <div class="office-card" onclick="setActive(1)">
                    <span class="card-badge">Завод № 1</span>
                    <div class="card-city">Чирчик</div>
                    <div class="card-details">
                        <div>
                            <span class="detail-label">Адрес</span>
                            <span class="detail-value">Ташкентская обл., г. Чирчик, СЭЗ «Ангрен», корпус 8–2</span>
                        </div>
                        <div class="card-divider"></div>
                        <div>
                            <span class="detail-label">Мощность</span>
                            <span class="detail-value">≈ 800 ед. / год</span>
                        </div>
                        <div>
                            <span class="detail-label">Смены</span>
                            <span class="detail-value">8–1 · 8–2 · 4–3</span>
                        </div>
                        <div>
                            <span class="detail-label">Сотрудников</span>
                            <span class="detail-value">116 человек</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="card-coords">41.46 N · 69.57 E</span>
                        <a class="card-link" href="#">Маршрут</a>
                    </div>
                </div>

                <div class="office-card" onclick="setActive(2)">
                    <span class="card-badge">Завод № 2</span>
                    <div class="card-city">Янгиюль</div>
                    <div class="card-details">
                        <div>
                            <span class="detail-label">Адрес</span>
                            <span class="detail-value">Ташкентская обл., г. Янгиюль, ул. Промышленная, 4</span>
                        </div>
                        <div class="card-divider"></div>
                        <div>
                            <span class="detail-label">Класс офиса</span>
                            <span class="detail-value">B+</span>
                        </div>
                        <div>
                            <span class="detail-label">Открыт</span>
                            <span class="detail-value">Июнь 2026</span>
                        </div>
                        <div>
                            <span class="detail-label">Сотрудников</span>
                            <span class="detail-value">52 человека</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="card-coords">41.11 N · 69.03 E</span>
                        <a class="card-link" href="#">Маршрут</a>
                    </div>
                </div>

                <div class="office-card" onclick="setActive(3)">
                    <span class="card-badge">% Представительства</span>
                    <div class="card-city multi">
                        <span>Алматы</span>
                        <span>Сеул</span>
                        <span>Бишкек</span>
                    </div>
                    <div class="card-details">
                        <div>
                            <span class="detail-value">Региональные офисы продаж и сервисной поддержки.</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="card-coords"></span>
                        <a class="card-link" href="#">3 страны</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-map">
        <p class="section-label">№ 01.03 — Карта</p>
        <div class="map-header">
            <h2 class="map-title">Где мы<br />находимся.</h2>
            <p class="map-desc">
                4 точки в Узбекистане и 3 региональных офиса. Кликабельная карта —
                нажмите маркер, чтобы открыть карточку офиса.
            </p>
        </div>

        <div class="map-wrap" id="mapWrap">
            <svg id="map-svg" viewBox="0 0 700 400" preserveAspectRatio="xMidYMid meet"
                xmlns="http://www.w3.org/2000/svg">
                <!-- Neighbors -->
                <rect class="neighbor-fill" x="0" y="0" width="700" height="400" rx="0" />
                <!-- Uzbekistan -->
                <path class="uz-border" d="
        M105,105 L195,72 L295,90 L375,78 L475,95 L555,88 L575,125
        L595,158 L572,198 L535,218 L515,255 L495,288
        L472,308 L415,318 L348,298 L278,318 L195,308
        L138,328 L118,258 L138,178 Z
      " />
                <!-- Ferghana pocket -->
                <path class="uz-border" style="fill: #c0ccc7; stroke: #a0afaa"
                    d="M515,255 L555,238 L585,255 L565,285 L535,270 Z" />

                <!-- Country labels -->
                <text x="348" y="198" text-anchor="middle" font-size="11" font-family="Arial" fill="#7a9490"
                    font-weight="700" letter-spacing="0.1em">
                    УЗБЕКИСТАН
                </text>
                <text x="348" y="48" text-anchor="middle" font-size="9" font-family="Arial" fill="#8aaba5"
                    letter-spacing="0.08em">
                    КАЗАХСТАН
                </text>
                <text x="628" y="298" text-anchor="middle" font-size="8" font-family="Arial" fill="#8aaba5">
                    КЫРГ.
                </text>
                <text x="45" y="250" text-anchor="middle" font-size="8" font-family="Arial" fill="#8aaba5">
                    ТУРКМ.
                </text>
                <text x="330" y="370" text-anchor="middle" font-size="8" font-family="Arial" fill="#8aaba5"
                    letter-spacing="0.06em">
                    ТАДЖИКИСТАН
                </text>

                <!-- Secondary cities -->
                <circle cx="265" cy="232" r="2.5" fill="#8aaba5" />
                <text x="270" y="230" font-size="8" font-family="Arial" fill="#7a9490">
                    Самарканд
                </text>
                <circle cx="488" cy="148" r="2.5" fill="#8aaba5" />
                <text x="494" y="146" font-size="8" font-family="Arial" fill="#7a9490">
                    Наманган
                </text>

                <!-- ── PINS ── (managed by JS) -->

                <!-- 0: Tashkent HQ -->
                <g class="map-pin" id="pin-0" onclick="setActive(0)">
                    <circle class="pin-bg" cx="372" cy="130" r="20" fill="var(--accent)" opacity="0.15" />
                    <circle class="pin-outer" cx="372" cy="130" r="10" fill="var(--accent)" stroke="none" />
                    <circle cx="372" cy="130" r="4.5" fill="#111" />
                    <text class="pin-label" x="386" y="125">Ташкент</text>
                    <text class="pin-sublabel" x="386" y="136">
                        ГО · Главный офис
                    </text>
                </g>

                <!-- 1: Chirchik -->
                <g class="map-pin" id="pin-1" onclick="setActive(1)">
                    <circle class="pin-bg" cx="415" cy="108" r="16" fill="var(--accent)" opacity="0.1" />
                    <circle class="pin-outer" cx="415" cy="108" r="8" fill="var(--white)" stroke="#888"
                        stroke-width="1.2" />
                    <circle cx="415" cy="108" r="3.5" fill="#555" />
                    <text class="pin-label" x="427" y="104">Чирчик</text>
                    <text class="pin-sublabel" x="427" y="114">Завод № 1</text>
                </g>

                <!-- 2: Yangiyul -->
                <g class="map-pin" id="pin-2" onclick="setActive(2)">
                    <circle class="pin-bg" cx="348" cy="152" r="16" fill="var(--accent)" opacity="0.1" />
                    <circle class="pin-outer" cx="348" cy="152" r="8" fill="var(--white)" stroke="#888"
                        stroke-width="1.2" />
                    <circle cx="348" cy="152" r="3.5" fill="#555" />
                    <text class="pin-label" x="335" y="170">Янгиюль</text>
                    <text class="pin-sublabel" x="335" y="180">Завод № 2</text>
                </g>

                <!-- 3a: Almaty -->
                <g class="map-pin" id="pin-3a" onclick="setActive(3)">
                    <circle class="pin-bg" cx="562" cy="62" r="14" fill="var(--accent)" opacity="0.1" />
                    <circle class="pin-outer" cx="562" cy="62" r="7" fill="var(--white)" stroke="#888"
                        stroke-width="1.2" />
                    <circle cx="562" cy="62" r="3" fill="#555" />
                    <text class="pin-label" x="573" y="58">Алматы</text>
                    <text class="pin-sublabel" x="573" y="68">Представительство</text>
                </g>

                <!-- 3b: Bishkek -->
                <g class="map-pin" id="pin-3b" onclick="setActive(3)">
                    <circle class="pin-bg" cx="530" cy="95" r="13" fill="var(--accent)" opacity="0.1" />
                    <circle class="pin-outer" cx="530" cy="95" r="6.5" fill="var(--white)" stroke="#888"
                        stroke-width="1.2" />
                    <circle cx="530" cy="95" r="2.8" fill="#555" />
                    <text class="pin-label" x="540" y="92">Бишкек</text>
                </g>

                <!-- 3c: Seoul (edge indicator) -->
                <g class="map-pin" id="pin-3c" onclick="setActive(3)">
                    <circle class="pin-outer" cx="665" cy="118" r="6" fill="var(--white)" stroke="#888"
                        stroke-width="1.2" />
                    <circle cx="665" cy="118" r="2.5" fill="#555" />
                    <text class="pin-label" x="650" y="108">Сеул</text>
                </g>
            </svg>

            <div class="map-popup hidden" id="mapPopup">
                <div class="popup-name" id="popupName"></div>
                <div class="popup-type" id="popupType"></div>
                <div class="popup-addr" id="popupAddr"></div>
            </div>

            <div class="map-legend">
                <div class="legend-title">Легенда</div>
                <div class="legend-item">
                    <span class="legend-dot" style="background: var(--accent)"></span>
                    Производство · 2 завода
                </div>
                <div class="legend-item">
                    <span class="legend-dot" style="background: #fff; border: 1.5px solid #888"></span>
                    Сервис · 3 офиса
                </div>
                <div class="legend-item">
                    <span class="legend-dot" style="background: #fff; border: 1.5px solid #bbb"></span>
                    Страны объекты · ×7
                </div>
            </div>

            <div class="map-controls">
                <div class="map-btn">+</div>
                <div class="map-btn">−</div>
                <div class="map-btn" style="font-size: 11px">◎</div>
            </div>
        </div>
    </section>

    <section class="contact-accordion-wrapper">
        <div class="container">
            <div class="extra-section ready-made-solutions-section">
                <div class="layout-section">
                    <p class="section-enter-header">№ 08.04 - FAQ</p>
                    <div class="section-enter-description">
                        <div class="section-enter-left">
                            <h1>
                                Частые <br />
                                вопросы.
                            </h1>
                        </div>

                        <div class="section-enter-right">
                            <p>
                                Самые регулярные вопросы перед заключением договора —
                                собрали ответы. Если не нашли свой — напишите менеджеру
                                направления выше.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="accordion-wrapper">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span>01 / 06</span>
                                    Какой минимальный объём заказа?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Минимальный объём поставки — 500 метров. Для нестандартных
                                    конструкций — от 2 000 метров. Для серийных SKU из
                                    каталога — без минимума, отгружаем катушками от 250 m.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span>02 / 06</span>
                                    Сроки производства и доставки?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Минимальный объём поставки — 500 метров. Для нестандартных
                                    конструкций — от 2 000 метров. Для серийных SKU из
                                    каталога — без минимума, отгружаем катушками от 250 m.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span>03 / 06</span>
                                    Какие сертификаты и стандарты соблюдаются?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Минимальный объём поставки — 500 метров. Для нестандартных
                                    конструкций — от 2 000 метров. Для серийных SKU из
                                    каталога — без минимума, отгружаем катушками от 250 m.
                                </div>
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