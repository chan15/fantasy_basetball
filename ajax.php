<?php

include 'libs/simple_html_dom.php';
include 'functions.php';
include 'config.php';

$week = $_GET['week'];
$tdCss = array(
    'name',
    'fg',
    'ft',
    '3pt',
    'pts',
    'reb',
    'ast',
    'st',
    'blk',
    'to',
    'socre'
);
$str = '';
$id = 1;

// Start get the match data
foreach ($urls as $url) {
	$html = getUrl($url);
	$html = strip_html_tags($html); // Remove useless tag
	$result = str_get_html($html); // Change to simple html format

	// Combine table string
	$tables = $result->find('#matchup-wall-header');
	foreach ($tables as $table) {
		foreach ($table->find('tr') as $k => $tr) {
			if ($k > 0) {
				$tr->id = $id;

				foreach ($tr->find('td') as $y => $td) {
					if ($y == 0) {
						$img = $td->find('a', 0)->innertext;
						$name = $td->find('a', 1)->innertext;
						$td->innertext = $img . '<a href="' . $page . $id . '" target="_blank">' . $name . '</a>';
					}

					$td->class = $tdCss[$y];
				}

				$tr->class = 'move';
				$id++;
				$str .= $tr;
			}
		}
	}

	$result->clear();
}

echo $str;
