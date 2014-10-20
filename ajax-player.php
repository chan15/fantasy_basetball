<?php

include 'main.php';

// Search player name
if (true === isset($_GET['term'])) {
    $url = $playerNameUrl . $_GET['term'];
    $json = json_decode(getUrl($url), true);
    $player = $json['objects'][0]['aResult'];

    foreach ($player as $v) {
        $name[] = $v['sPlayerName'];
    }

    echo json_encode($name);
}

// Search player
if (true === isset($_GET['search'])) {
    if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
        $keyword = str_replace(' ', '%20', $_GET['keyword']);
        $url = $playerUrl . $keyword . '&stat1=' . $_GET['stat1'];
        $html = stripHtml(getUrl($url));
        echo $html;
    }
}
