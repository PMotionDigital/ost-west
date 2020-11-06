<?php /*
Template Name: Запись - программа / репортаж
Template Post Type: post, page, event
*/
get_header(); 

$API_key = 'AIzaSyDsAHNwID-9liXcHtQY8rRluW3lJRdVDjI';
$channelID = 'UC6IHSAUvmsSKlABloNBzoXQ';
$maxResults = 20;
$playlistId = get_field('playlist_id');
$playlistitems = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults='. $maxResults .'&playlistId='. $playlistId .'&key='. $API_key .''));
$playlists = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/playlists?part=snippet&id='. $playlistId .'&key='. $API_key .''));
?>
    <section class="watch">
        <?php get_template_part('templates/parts/section-programm'); ?>
        <div class="watch_selected selected-programm dis-flex flex-wrap-wrap">
            <div class="selected-programm_image col-lg-4 col-xs-12">
                <?php 
                    if(get_the_post_thumbnail_url()) {
                        $post_image = get_the_post_thumbnail_url();
                    } else {
                        $post_image = get_template_directory_uri().'/src/img/placeholder-land.jpg';
                    }
                ?>
                <img src="<?php echo $post_image; ?>">
            </div>
            <div class="selected-programm_desc text-block col-lg-4 col-xs-12">
                <h1 class="section-title type-1"><?php the_title(); ?></h1>
                <p>
                <?php the_field('описание_плейлиста'); ?>
                </p>
            </div>
        </div>

        <div class="watch_episodes episodes">
            <div class="dis-flex justify-content-center">
                <div class="col-lg-11">
                    <div class="section-title type-1">
                        <h2>Эпизоды</h2>
                    </div>
                </div>
            </div>
            <ul class="episodes_list col-lg-11 dis-flex flex-wrap-wrap">
                <?php foreach($playlistitems->items as $item) { ?>
                <li>
                    <button data-modal-btn="watch" data-video-id="<?php echo $item->snippet->resourceId->videoId; ?>" class="episodes_item episode">
                        <div class="episode_image">
                            <img src="<?php echo $item->snippet->thumbnails->high->url; ?>">
                        </div>
                        <h3 class="episode_title">
                        <?php echo $item->snippet->title; ?>
                        </h3>
                        <p class="episode_date">
                        <?php 
                            $videoDate = $item->snippet->publishedAt;
                            echo date("d/m/Y", strtotime($videoDate));
                        ?>
                        </p>
                    </button>
                </li>
                <?php } ?>
            </ul>
        </div>
    </section>
    <?php get_template_part('templates/parts/modals/modal-watch'); ?>
<?php get_footer(); ?>