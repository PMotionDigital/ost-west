	<footer class="main-footer col-lg-12">
		<div class="wrapper col-lg-11 dis-flex flex-wrap-wrap">
			<div class="main-footer_desc col-lg-4 col-lm-12 col-xs-12">
				Импрессум RTV Broadcast & Content Management GmbH Postfach 10 06 01, 10566 Berlin, Deutschland
			</div>
			<div class="main-footer_copypaste col-lg-5 col-lm-12 col-xs-12">
				<p>© 2018 OstWest Berlin. При использовании текстовых материалов с сайта активная ссылка на OstWest.tv обязательна
				Копирование видео материалов запрещено. <a href="/polit_conf">Политика конфиденциальности.</a></p>
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
	<div class="cookie-message" data-cookie-message>
		Diese Webseite verwendet Cookies. Hier <a href="/datenschutzerklarung">klicken für mehr Informationen. Schlissen</a>
		<div class="cookie-message_close"></div>
    </div>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-53741768-3"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-53741768-3');
	</script>
	<?php wp_footer(); ?>
</body>
</html>