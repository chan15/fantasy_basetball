<?php
error_reporting(0);
date_default_timezone_set("Asia/Taipei");
include 'config.php';
include 'functions.php';

$today = date('Y-m-d');
$defaultWeek = floor((((strtotime($today) - strtotime(START_DATE)) / 86400) / 7)) + START_WEEK;
if ($defaultWeek < 1) $defaultWeek = 1;
$week = isset($_GET['week']) ? $_GET['week'] : $defaultWeek;
$page = WEBSITE . '/nba/' . NUMBER . '/';
$url = $page . 'matchup?week=' . $week;
$playerNameUrl = $page . 'playersearchservice?q=';
$playerUrl = $page . 'playersearch?search=';
$injryUrl = 'http://www.cbssports.com/nba/injuries/daily';

$urls = array();

for ($i = 1; $i <= PEOPLE; $i += 2) {
    $urls[] = sprintf('%s&mid1=%s&mid2=%s',
        $url,
        $i,
        ($i + 1));
}

$dates = '';
$firstDate = date('Y-m-d', strtotime(START_DATE . '+ ' . (($week - 1) * 7)  . ' day'));

for ($i = 0; $i < 7; $i++) {
    $now = strtotime($firstDate . ' + ' . $i . ' day');
    $dates .= '<span>' . date('D, M d', $now) . '</span>';
}
