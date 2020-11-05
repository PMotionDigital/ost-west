<div class="section-title type-1 margin-b-2">
    <h2>Оформите подписку:</h2>
</div>
<div class="tariff-list">
    <?php if(have_rows('список_тарифов', 'option')): ?>
    <?php while(have_rows('список_тарифов', 'option')): the_row(); ?>  
    <div class="tariff-list_item tariff-item">
        <div class="tariff-item_title">
            <?php the_sub_field('наименование_тарифа'); ?>
            <span class="sub-title">*Первый месяц бесплатно</span>
        </div>
        <div class="empty--div">
            <div class="tariff-item_price">
                <?php the_sub_field('стоимость_тарифа'); ?>€
            </div>
            <?php if (!is_user_logged_in()) { ?>
            <button data-modal-btn="login" class="button type-1">Выбрать тариф</button>
            <?php } else { ?>
            <a href="/profile/" class="button type-1">Выбрать тариф</a>
            <?php } ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</div>