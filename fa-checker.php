<?php
include 'config.php';
include 'functions.php';
include 'libs/simple_html_dom.php';

$name = @$_GET['player'];
$email = @$_GET['email'];

if ($name != '') {
    $url = $playerUrl.str_replace(' ', '%20', $name);
    $html = file_get_html($url);
    $name = $html->find('.name', 0)->innertext;
    $status = $html->find('.owner', 2)->innertext;
    $pattern = '/^W \(\w* \d*\)$/';

    if (!preg_match($pattern, $status) && $email != '') {
        $content = $name.' 狀態為 '.$status;
        $chan->email($defaultEmail, 'FA Checker', $email, '球員狀態變更通知', $content);
    }

    $html->clear();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0' name='viewport'/>
    <title>FA Checker</title>
    <meta property="og:title" content="<?php echo SITE_TITLE; ?>"/>
    <meta property="og:type" content="game"/>
    <meta property="og:url" content="<?php echo SITE_URL; ?>index.php"/>
    <meta property="og:image" content="<?php echo SITE_URL;?>img/fb.jpg"/>
    <meta property="og:description" content="<?php echo SITE_CONTENT; ?>"/>
    <link rel="stylesheet" href="css/fantasybasketball.css" />
    <link rel="stylesheet" href="css/smoothness/jquery-ui-1.9.1.custom.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.css" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.1.custom.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/fa-checker.js" type="text/javascript"></script>
</head>
<body>
<header></header>
<?php
$page = '';
include 'nav.php';
?>
<div class="pagination pagination-centered pagination-small"><?=$button;?></div>
<div class="container">
    <form name="fa" action="fa-checker.php" method="get" class="form-search">
        <input type="text" name="player" id="player" placeholder="player name" value="<?php echo $name; ?>">
        <input type="text" name="email" id="email" placeholder="email" value="<?php echo $email; ?>">
        <button type="submit" class="btn">go</button>
        <a href="fa-checker.php" class="btn">reset</a>
    </form>
    <table class="table table-condensed table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Owner</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $name; ?></td>
            <td class="status"><?php echo $status; ?></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="footer">Copyright © <?php echo date('Y', time()); ?> Chan All rights reserved.</footer>
</body>
</html>
