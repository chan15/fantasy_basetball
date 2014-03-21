<?php
include 'libs/simple_html_dom.php';
include 'config.php';
include 'functions.php';
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <meta content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0' name='viewport'/>
    <meta property="og:title" content="<?php echo SITE_TITLE; ?>"/>
    <meta property="og:type" content="game"/>
    <meta property="og:url" content="<?php echo SITE_URL; ?>index.php"/>
    <meta property="og:image" content="<?php echo SITE_URL;?>img/fb.jpg"/>
    <meta property="og:description" content="<?php echo SITE_CONTENT; ?>"/>
	<title>Player Data</title>
    <link rel="stylesheet" href="css/fantasybasketball.css" />
    <link rel="stylesheet" href="css/smoothness/jquery-ui-1.9.1.custom.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.css" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.1.custom.js"></script>
    <script src="js/jquery.tablesorter.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/player.js"></script>
</head>
<body>
<header></header>
<?php
$page = 'player';
include 'nav.php';
?>
<div class="button">
    <div class="input-append">
        <select name="stat1" id="statselect" class="input-small">
            <option value="S_S_2012">Season (total)</option>
            <option value="S_AS_2012">Season (avg)</option>
            <option value="S_L30">Last 30 Days (total)</option>
            <option value="S_AL30">Last 30 Days (avg)</option>
            <option value="S_L14">Last 14 Days (total)</option>
            <option value="S_AL14" selected=selected>Last 14 Days (avg)</option>
            <option value="S_L7">Last 7 Days (total)</option>
            <option value="S_AL7">Last 7 Days (avg)</option>
            <option value="S_PSR">Remaining Games (proj)</option>
        </select> 
        <input type="text" name="keyword" id="keyword" class="input-xlarge">
        <button id="btn-search" type="button" class="btn">Search</button>
        <button id="btn-clear" type="button" class="btn">clear</button>
    </div>
    <span class="loading">搜尋中...</span>
</div>
<div class="container">
    <table id="player-table" class="table table-condensed table-striped">
        <thead>
            <tr>
                <th>Players</th>
                <th>Opp:</th>
                <th>Owner</th>
                <th>O-Rank</th>
                <th>Rank</th>
                <th>% Owned</th>
                <th>MPG</th>
                <th>FGM</th>
                <th>FGA</th>
                <th>FG%</th>
                <th>FTM</th>
                <th>FTA</th>
                <th>FT%</th>
                <th>3PT</th>
                <th>PTS</th>
                <th>REB</th>
                <th>AST</th>
                <th>ST</th>
                <th>BLK</th>
                <th>TO</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
	Under Construction
</div>
<div class="footer">Copyright © <?php echo date('Y', time()); ?> Chan All rights reserved.</footer>
</body>
</html>
