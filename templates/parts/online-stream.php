<?php

    // New protected media URL
    $today = gmdate("n/j/Y g:i:s A");

    // URL of media we want to handle with pay-per-view
    $initial_url = "https://cdn2.rtvd.de/livebackup/5/playlist.m3u8";
    // client ID which is defined based on customer's database of users
    $id = "2";
    // A password entered in WMSAuth rule via web interface
    $key = "qcjuNbsgPUanZJQr";
    // How long the link would be valid for playback (minutes)
    $validminutes = 60;

    $str2hash = $id . $key . $today . $validminutes;
    $md5raw = md5($str2hash, true);
    $base64hash = base64_encode($md5raw);
    $urlsignature =
    'server_time=' . $today . '&hash_value=' . $base64hash .
    '&validminutes=' . $validminutes . '&id=' . $id;
    $base64urlsignature = base64_encode($urlsignature);
    $signedurlwithvalidinterval = $initial_url . "?wmsAuthSign=$base64urlsignature";

?> 

<video
    
    controls
    height="405px"
    width="720px"
    src="<?php echo $signedurlwithvalidinterval; ?>"
    data-viblast-key="a36f5b70-9bc5-4ce4-8664-15fccd027a69"
    data-viblast-append-timestamps="true"
    data-viblast-initial-abr-index="0"
>
</video>

<script type="text/javascript" src="https://cdn.viblast.com/vb/stable/viblast.js"></script>