<?php

include 'main.php';

// Search player name
if (true === isset($_GET['term'])) {
    $searchName = strtolower($_GET['term']);
    $url = $playerNameUrl . $searchName;
    $json = json_decode(getUrl($url), true);
    $players = $json['objects'][0]['aResult'];
    $names = array();

    foreach ($players as $player) {
        $playerName = $player['sPlayerName'];

        if (true == strstr(strtolower($playerName), $searchName)) {
            $names[] = $playerName;
        }
    }

    echo json_encode($names);
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
