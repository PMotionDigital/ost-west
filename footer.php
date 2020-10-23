	<footer class="main-footer col-lg-12">
		<div class="wrapper col-lg-11 dis-flex flex-wrap-wrap">
			<div class="main-footer_desc col-lg-4 col-lm-12 col-xs-12">
				Импрессум RTV Broadcast & Content Management GmbH Postfach 10 06 01, 10566 Berlin, Deutschland
			</div>
			<div class="main-footer_copypaste col-lg-5 col-lm-12 col-xs-12">
				<p>© 2018 OstWest Berlin. При использовании текстовых материалов с сайта активная ссылка на OstWest.tv обязательна
				Копирование видео материалов запрещено. Политика конфиденциальности.</p>
			</div>
			<div class="main-footer_socials col-lg-3 col-lm-12 col-xs-12">
				<?php get_template_part('templates/parts/components/socials'); ?>
			</div>
		</div>
	</footer>
	<div class="note-form">
		<span class="note-form_close"></span>
		<div class="note-form_text"></div>
	</div>
	<?php get_template_part('templates/parts/modals/modal-login'); ?>
	<?php get_template_part('templates/parts/modals/modal-register'); ?>
	<?php wp_footer(); ?>
</body>
</html>