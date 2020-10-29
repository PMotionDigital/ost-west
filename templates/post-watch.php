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
<!-- <h1>
    Next page token: <?php echo $playlistitems->nextPageToken; ?><br>
    Page info. total Results:  <?php echo $playlistitems->pageInfo->totalResults; ?><br>
    Page info. Results per page:  <?php echo $playlistitems->pageInfo->resultsPerPage; ?><br>
    player.embedHtml:  <?php echo $playlistitems->contentDetails[0]->videoId; ?><br>
</h1> -->
    <section class="watch">
        <?php get_template_part('templates/parts/section-programm'); ?>
        <div class="watch_selected selected-programm dis-flex">
            <div class="selected-programm_image col-lg-4">
                <?php 
                    if(get_the_post_thumbnail_url()) {
                        $post_image = get_the_post_thumbnail_url();
                    } else {
                        $post_image = get_template_directory_uri().'/src/img/placeholder-land.jpg';
                    }
                ?>
                <img src="<?php echo $post_image; ?>">
            </div>
            <div class="selected-programm_desc text-block col-lg-4">
                <h1 class="section-title type-1"><?php echo $playlists->items[0]->snippet->title; ?></h1>
                <p>
                <?php echo $playlists->items[0]->snippet->description; ?>
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
                        <p class="episode_date"><?php echo $item->snippet->publishedAt; ?></p>
                    </button>
                </li>
                <?php } ?>
            </ul>
        </div>
    </section>
    <?php get_template_part('templates/parts/modals/modal-watch'); ?>
<?php get_footer(); ?>