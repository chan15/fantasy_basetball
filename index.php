<?php

include 'main.php';

// Combine week button
$button = '<ul>';

for ($i = START_WEEK; $i <= END_WEEK; $i++) {
    $class = ($i == $week) ? 'class="active"' : '';
    $button .= sprintf('<li %s><a href="index.php?week=%s">%s</a></li>',
        $class,
        $i,
        $i);
}

$button .= '</ul>';
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <meta content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0' name='viewport'/>
    <title>Match Data - <?php echo SITE_TITLE; ?></title>
    <?php include('inc.php'); ?>
    <script type="text/javascript" src="js/index.js"></script>
</head>
<body>
<?php include 'google.php'; ?>
<header></header>
<?php
$page = 'match';
include 'nav.php';
?>
<input type="hidden" id="people" value="<?php echo PEOPLE ;?>">
<input type="hidden" id="urls" value="<?php echo implode(',', $urls); ?>">
<input type="hidden" id="website" value="<?php echo WEBSITE; ?>">
<div class="pagination pagination-centered pagination-small"><?php echo $button;?></div>
<div class="container">
    <div class="date"><span class="yellow">Date</span><?php echo $dates; ?></div>
    <div class="loader"><img src="img/ajax-loader.gif"></div>
    <table class="table table-condensed table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>FG%</th>
                <th>FT%</th>
                <th>3PT</th>
                <th>PTS</th>
                <th>REB</th>
                <th>AST</th>
                <th>STL</th>
                <th>BLK</th>
                <th>TO</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<?php include('footer.php'); ?>
</body>
</html>
