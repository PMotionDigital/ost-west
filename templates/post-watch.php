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
</h1> -->
    <section class="watch">
        <?php get_template_part('templates/parts/section-programm'); ?>
        <div class="watch_selected selected-programm dis-flex">
            <div class="selected-programm_image col-lg-4">
                <img src="https://images.unsplash.com/photo-1579894059380-1866b68bce6b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80">
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
                    <a class="episodes_item episode">
                        <div class="episode_image">
                            <img src="<?php echo $item->snippet->thumbnails->high->url; ?>">
                        </div>
                        <h3 class="episode_title">
                        <?php echo $item->snippet->title; ?>
                        </h3>
                        <p class="episode_date"><?php echo $item->snippet->publishedAt; ?></p>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </section>
<?php get_footer(); ?>