<?php /* Template Name: Страница - О нас */ get_header(); ?>
    <section class="about-us">
        <div class="about-us_intro about-intro dis-flex flex-direction-col align-items-center intro col-lg-12">
            <div class="intro_title col-lg-11">
                <h1>OstWest -</h1>
            </div>
            <div class="intro_desc col-lg-11 col-xs-11 col-lm-11">
                <div class="dis-grid grid-col-lg-2 grid-col-xs-1 grid-gap-1 col-lg-8 col-xs-12 col-lm-12">
                    <?php the_field('первый_блок_текст'); ?>
                </div>
            </div>
            <div class="about-intro_bg">
                <img src="https://liveberlin.ru/wp-content/uploads/2016/12/Berlin_Panorama_Mitte-cover.jpg">
            </div>
        </div>
        <?php if(have_rows('блок_наши_партнеры')): ?>
        <div class="about-us_partners partners dis-flex justify-content-center">
            <div class="col-lg-11 dis-flex align-items-center">
                <h2>Наши Партнёры</h2>
                <ul class="partners_list dis-flex flex-wrap-wrap">      
                    <?php while(have_rows('блок_наши_партнеры')): the_row(); ?>  
                    <li class="partners_list-item">
                        <a href="<?php the_sub_field('ссылка_на_партнера'); ?>">
                            <img src="<?php the_sub_field('изображение'); ?>">
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
        <div class="about-us_faces faces">
            <div class="faces_title col-lg-11">
                <h2>Наши лица</h2>
            </div>
            <div class="faces_list col-lg-6 col-lm-12 col-xs-12">
                <ul data-slider-faces>
                <?php if(have_rows('блок_наши_лица')): ?>
                    <?php while(have_rows('блок_наши_лица')): the_row(); ?>  
                    <li class="faces_list-item" data-modal-content="parent">
                        <div data-modal-btn="empty">
                            <img src="<?php the_sub_field('фотография'); ?>">
                            <div class="dis-none" data-modal-content="content">
                                <div class="faces_list-desc">
                                    <?php the_sub_field('биография'); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endwhile; ?>
                <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="about-us_services services dis-flex flex-wrap-wrap">
            <div class="services_title col-lg-12 col-lm-11 col-xs-11">
                <h2>Импрессум</h2>
            </div>
            <div class="services_desc col-lg-6 col-lm-11 col-xs-11">
                <div class="services_about">
                    <?php the_field('блок_о_нас'); ?>
                </div>
                <div class="services_contacts">
                    <?php the_field('блок_реквизиты'); ?>
                </div>
            </div>
            <div class="services_form-section col-lg-6 col-lm-11 col-xs-11">
                <div class="services_form-title">
                    Пишите нам на почту <a href="mailto:info@ostwest.tv">info@ostwest.tv</a> или используйте форму обратной связи
                </div>
                <div class="services_form">
                    <?php echo do_shortcode('[contact-form-7 id="339" title="Форма обратной связи"]'); ?>
                </div>
            </div>
        </div>
    </section>
<?php get_template_part('templates/parts/modals/modal-empty') ?>
<?php get_footer(); ?>