<?php /* Template Name: Страница - провайдеры */ get_header(); ?>
    <section class="providers col-lg-11 wrapper dis-flex flex-wrap-wrap">
        <div class="providers_list">
            <h2 class="providers_title">Провайдеры <span class="country">Германия</span></h2>
            <ul class="providers-slider dis-flex" data-slider-providers>
                <?php if(have_rows('провайдеры_германия')): ?>
                <?php while(have_rows('провайдеры_германия')): the_row(); ?>  
                <li class="providers_item">
                    <a href="<?php the_sub_field('ссылка_на_сайт'); ?>" target="_blank">
                        <div class="providers_item-image">
                            <img src="<?php the_sub_field('логотип'); ?>">
                        </div>
                        <p class="providers_item-desc"><?php the_sub_field('заголовок'); ?></p>
                    </a>
                </li>
                <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="providers_list">
            <h2 class="providers_title">Провайдеры <span class="country">Швейцария</span></h2>
            <ul class="providers-slider dis-flex" data-slider-providers>
                <?php if(have_rows('провайдеры_швейцария')): ?>
                <?php while(have_rows('провайдеры_швейцария')): the_row(); ?>  
                <li class="providers_item">
                    <a href="<?php the_sub_field('ссылка_на_сайт'); ?>" target="_blank">
                        <div class="providers_item-image">
                            <img src="<?php the_sub_field('логотип'); ?>">
                        </div>
                        <p class="providers_item-desc"><?php the_sub_field('заголовок'); ?></p>
                    </a>
                </li>
                <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="providers_list">
            <h2 class="providers_title">Провайдеры <span class="country">Украина</span></h2>
            <ul class="providers-slider dis-flex" data-slider-providers>
                <?php if(have_rows('провайдеры_украина')): ?>
                <?php while(have_rows('провайдеры_украина')): the_row(); ?>  
                <li class="providers_item">
                    <a href="<?php the_sub_field('ссылка_на_сайт'); ?>" target="_blank">
                        <div class="providers_item-image">
                            <img src="<?php the_sub_field('логотип'); ?>">
                        </div>
                        <p class="providers_item-desc"><?php the_sub_field('заголовок'); ?></p>
                    </a>
                </li>
                <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="providers_list">
            <h2 class="providers_title">Провайдеры <span class="country">Латвия</span></h2>
            <ul class="providers-slider dis-flex" data-slider-providers>
                <?php if(have_rows('провайдеры_латвии')): ?>
                <?php while(have_rows('провайдеры_латвии')): the_row(); ?>  
                <li class="providers_item">
                    <a href="<?php the_sub_field('ссылка_на_сайт'); ?>" target="_blank">
                        <div class="providers_item-image">
                            <img src="<?php the_sub_field('логотип'); ?>">
                        </div>
                        <p class="providers_item-desc"><?php the_sub_field('заголовок'); ?></p>
                    </a>
                </li>
                <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
        <?php if (is_user_logged_in()) { ?>
        <div class="providers_subscription">
            <h2 class="providers_title">Онлайн подписка</h2>
            <a href="/profile" class="button">Перейти в личный кабинет</a>
        </div>
        <?php } else { ?>
            <div class="providers_subscription">
            <h2 class="providers_title">Онлайн подписка</h2>
            <button data-modal-btn="login" class="button">Зарегистрироваться и оплатить подписку</button>
        </div>
        <?php } ?>
    </section>
<?php get_footer(); ?>