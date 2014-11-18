<?php

include 'main.php';
include 'simple_html_dom.php';

$name = @$_GET['player'];
$email = @$_GET['email'];

if (null !== $name) {
    $url = $playerUrl . str_replace(' ', '%20', $name);
    $html = file_get_html($url);
    $tr = $html->find('div.players', 0)->find('table', 0)->find('tr', 2);
    $name = $tr->find('td', 1)->find('a.Nowrap', 0)->innertext;
    $status = strip_tags(trim($tr->find('td', 4)->innertext));

    if ('FA' === $status) {
        $status = 'FA';

        sendMail($email, $name);
    }

    $html->clear();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0' name='viewport'/>
    <title>Fa Checker - <?php echo SITE_TITLE; ?></title>
    <?php include('inc.php'); ?>
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
