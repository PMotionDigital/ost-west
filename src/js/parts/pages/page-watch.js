import $ from "jquery";

const watchVideo = $('[data-video-id]');
const watchVideoModalwrap = $('[data-modal="watch"] .modal_wrap');
const videoIframe = watchVideoModalwrap.find('iframe');

watchVideo.on('click', function() {
    let videoId = $(this).attr('data-video-id');
    watchVideoModalwrap.html('');
    watchVideoModalwrap.append(`
        <iframe width="100%" height="450" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>
    `);

    console.log(`https://www.youtube.com/embed/${videoId}`);
});
