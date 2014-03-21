<?php
include 'main.php';

$gamerUrls = array();

for ($i = 1; $i <= PEOPLE; $i++) {
    $gamerUrls[] = $page . $i;
}

$gamerUrls = implode(',', $gamerUrls);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <meta content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0' name='viewport'/>
    <title>Injury Data - <?php echo SITE_TITLE; ?></title>
    <?php include('inc.php'); ?>
    <script src="js/injury.js"></script>
</head>
<body>
<?php include 'google.php'; ?>
<header></header>
<?php
$page = 'injury';
include 'nav.php';
?>
<input type="hidden" id="injury-url" value="<?php echo $injryUrl; ?>">
<input type="hidden" id="gamer-urls" value="<?php echo $gamerUrls; ?>">
<div class="container">
    <div class="date"><span class="yellow">Date</span><?php echo $dates; ?></div>   
    <div class="loader"><img src="img/ajax-loader.gif"></div>
</div>
<?php include('footer.php'); ?>
</body>
</html>
