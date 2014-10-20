<?php
include 'main.php';
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <meta content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0' name='viewport'/>
    <title>Setup - <?php echo SITE_TITLE; ?></title>
    <?php include('inc.php'); ?>
    <script src="js/setup.js"></script>
</head>
<body>
<header></header>
<?php
include 'nav.php';
?>
<div class="pagination pagination-centered pagination-small"><?=$button;?></div>
<div class="container">
    <?php
    if (true === isset($_GET['up'])) {
    ?>
    <div class="alert">edit succeed</div>
    <?php } ?>
    <form action="modify-config.php" method="post" class="form-inline">
        <table class="table table-condensed table-striped">
                <tr>
                    <td>Website</td>
                    <td>
                        <input type="text" name="website" value="<?php echo WEBSITE; ?>" class="input-xxlarge">
                    </td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td>
                        <input type="text" name="number" value="<?php echo NUMBER; ?>" class="input-medium">
                    </td>
                </tr>
                <tr>
                    <td>Site Title</td>
                    <td>
                        <input type="text" name="site-title" value="<?php echo SITE_TITLE; ?>" class="input-xlarge">
                    </td>
                </tr>
                <tr>
                    <td>People</td>
                    <td>
                        <input type="text" name="people" value="<?php echo PEOPLE; ?>" class="input-small">
                    </td>
                </tr>
                <tr>
                    <td>Start Date</td>
                    <td>
                        <input type="text" name="start-date" value="<?php echo ('' === START_DATE) ? date('Y-m-d'): START_DATE; ?>" class="input-small datepicker">
                    </td>
                </tr>
                <tr>
                    <td>Start Week</td>
                    <td>
                        <input type="text" name="start-week" value="<?php echo START_WEEK; ?>" class="input-small">
                    </td>
                </tr>
                <tr>
                    <td>End Week</td>
                    <td>
                        <input type="text" name="end-week" value="<?php echo END_WEEK; ?>" class="input-small">
                    </td>
                </tr>
        </table>
        <input type="submit" value="save" class="btn">
    </form>
</div>
<?php include('footer.php'); ?>
</body>
</html>
