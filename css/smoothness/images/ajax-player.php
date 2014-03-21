<?php
include 'libs/simple_html_dom.php';
include 'config.php';
include 'functions.php';

// search player name
if (isset($_GET['term'])) {
    $url = $playerNameUrl . $_GET['term'];
    $json = json_decode(getUrl($url), true);
    $player = $json['objects'][0]['aResult'];
    foreach ($player as $v) {
        $name[] = $v['sPlayerName'];
    }
    
    echo json_encode($name);
}

// search player
if (isset($_GET['search'])) {
    if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
        $keyword = str_replace(' ', '%20', $_GET['keyword']);
        $url = $playerUrl . $keyword . '&stat1=' . $_GET['stat1'];
        $html = strip_html_tags(getUrl($url));
        $result = str_get_html($html);
        $table = $result->find('.teamtable', 0);
        
        if ($table) {
            $trStr = '';
            
            foreach ($table->find('tr') as $k => $tr) {
                if ($k > 1) {
                    $trStr .= '<tr class="move">';
                    foreach ($tr->find('td') as $k2 => $td) {
                        if ($td->innertext != '') {
                            if ($k2 == 0) {
                                $text = $td->plaintext;
                                $pos = strpos($text, ')');
                                $text = substr($text, 0, ($pos + 1));
                                $trStr .= '<td>' . $text . '</td>';
                            
                            } else {
                                $text = $td->plaintext;
                                $trStr .= '<td>' . $text . '</td>';
                            }
                        }
                    }
                    $trStr .= '<td><a href="#" class="btn-minus"><img src="img/minus.png"></a></td>';
                    $trStr .= '</tr>';
                }
            }

            echo $trStr;
        }
    }

    $result->clear();
}
?>
