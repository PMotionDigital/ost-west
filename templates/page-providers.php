<?php /* Template Name: Страница - провайдеры */ get_header(); ?>
    <section class="providers col-lg-11 wrapper dis-flex flex-wrap-wrap">
        <div class="providers_list">
            <h2 class="providers_title">Провайдеры <span class="country">Германия</span></h2>
            <ul class="providers-slider dis-flex" data-slider-providers>
                <li class="providers_item">
                    <a href="#">
                        <div class="providers_item-image">
                            <img src="https://upload.wikimedia.org/wikipedia/ru/thumb/c/cc/Vodafone_2017_logo.svg/1200px-Vodafone_2017_logo.svg.png">
                        </div>
                        <p class="providers_item-desc">Vodafone GmbH</p>
                    </a>
                </li>
                <li class="providers_item">
                    <a href="#">
                        <div class="providers_item-image">
                            <img src="https://www.tv-angebote.de/wp-content/uploads/2019/02/pyur.png">
                        </div>
                        <p class="providers_item-desc">PYUR (Tele Columbus AG)</p>
                    </a>
                </li>
                <li class="providers_item">
                    <a href="#">
                        <div class="providers_item-image">
                            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/59/Swisscom_logo.svg/1200px-Swisscom_logo.svg.png">
                        </div>
                        <p class="providers_item-desc">Swisscom</p>
                    </a>
                </li>
                <li class="providers_item">
                    <a href="#">
                        <div class="providers_item-image">
                            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/51/UPC_Switzerland_logo.png/200px-UPC_Switzerland_logo.png">
                        </div>
                        <p class="providers_item-desc">UPC Schweiz GmbH</p>
                    </a>
                </li>
                <li class="providers_item">
                    <a href="#">
                        <div class="providers_item-image">
                            <img src="https://www.united-internet.de/fileadmin/user_upload/Brands/Downloads/1_1_Logo_Outline_rgb.jpg">
                        </div>
                        <p class="providers_item-desc">1&1 Telecommunication SE</p>
                    </a>
                </li>
                <li class="providers_item">
                    <a href="#">
                        <div class="providers_item-image">
                            <img src="https://lh3.googleusercontent.com/proxy/DPhrF1pw1v3_4E9qyoBCDAmsfkazA9flOwvjfosYVd6pIkP7R3YEWWiInW5TllHlbKsR_fGI5g">
                        </div>
                        <p class="providers_item-desc">Компания Сонар</p>
                    </a>
                </li>
                <li class="providers_item">
                    <a href="#">
                        <div class="providers_item-image">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Telekom_Logo_2013.svg/1200px-Telekom_Logo_2013.svg.png">
                        </div>
                        <p class="providers_item-desc">Telecom Deutschland GmbH</p>
                    </a>
                </li>
                <li class="providers_item">
                    <a href="#">
                        <div class="providers_item-image">
                            <img src="https://lh3.googleusercontent.com/proxy/eyb2iBgU30t_9OG0FPIPQ86_HctLP236MYM2MD-mgnfsWZ4mAiVJoi5s3riWIrsgmUyy_2XcAga35dI9lnBo-baSZPJ3FX6Vh4vmz1LBnvSh1iD2_u7TGYXMIYU0zHhi5hpKkLs">
                        </div>
                        <p class="providers_item-desc">Magenta TV Stick</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="providers_list">
            <h2 class="providers_title">Провайдеры <span class="country">Швейцария</span></h2>
            <ul class="providers-slider dis-flex" data-slider-providers>
                <li class="providers_item">
                    <a href="#">
                        <div class="providers_item-image">
                            <img src="https://upload.wikimedia.org/wikipedia/ru/thumb/c/cc/Vodafone_2017_logo.svg/1200px-Vodafone_2017_logo.svg.png">
                        </div>
                        <p class="providers_item-desc">Vodafone GmbH</p>
                    </a>
                </li>
                <li class="providers_item">
                    <a href="#">
                        <div class="providers_item-image">
                            <img src="https://www.tv-angebote.de/wp-content/uploads/2019/02/pyur.png">
                        </div>
                        <p class="providers_item-desc">PYUR (Tele Columbus AG)</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="providers_list">
            <h2 class="providers_title">Провайдеры <span class="country">Украина</span></h2>
            <ul class="providers-slider dis-flex" data-slider-providers>
                <li class="providers_item">
                    <a href="#">
                        <div class="providers_item-image">
                            <img src="https://upload.wikimedia.org/wikipedia/ru/thumb/c/cc/Vodafone_2017_logo.svg/1200px-Vodafone_2017_logo.svg.png">
                        </div>
                        <p class="providers_item-desc">Vodafone GmbH</p>
                    </a>
                </li>
            </ul>
        </div>
        <?php if (is_user_logged_in()) { ?>
        <div class="providers_subscription">
            <h2 class="providers_title">Онлайн подписка</h2>
            <a href="#" class="button">Перейти в личный кабинет</a>
        </div>
        <?php } else { ?>
            <div class="providers_subscription">
            <h2 class="providers_title">Онлайн подписка</h2>
            <button data-modal-btn="login" class="button">Зарегистрироваться и оплатить подписку</button>
        </div>
        <?php } ?>
    </section>
<?php get_footer(); ?>