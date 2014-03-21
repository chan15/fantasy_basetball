<?php
include 'main.php';
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <meta content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0' name='viewport'/>
	<title>Player Data - <?php echo SITE_TITLE; ?></title>
    <?php include('inc.php'); ?>
    <script type="text/javascript" src="js/player.js"></script>
</head>
<body>
<?php include 'google.php'; ?>
<header></header>
<?php
$page = 'player';
include 'nav.php';
?>
<div class="button">
    <div class="input-append">
        <select name="stat1" id="statselect" class="input-large">
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
        <button id="btn-search" type="button" class="btn">search</button>
        <button id="btn-clear" type="button" class="btn">clear</button>
    </div>
    <span class="loading">Searching...</span>
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
                <th>FGM/A</th>
                <th>FG%</th>
                <th>FTM/A</th>
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
</div>
<?php include('footer.php'); ?>
</body>
</html>
