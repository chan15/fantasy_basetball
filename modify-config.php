<?php

$siteTitle = !empty($_POST['site-title']) ? $_POST['site-title'] : '';
$people = !empty($_POST['people']) ? intval($_POST['people']) : 6;
$startDate = $_POST['start-date'];
$startWeek = !empty($_POST['start-week']) ? intval($_POST['start-week']) : 1;
$endWeek = !empty($_POST['end-week']) ? intval($_POST['end-week']) : 23;
$number = !empty($_POST['number']) ? intval($_POST['number']) : 0;
$website = !empty($_POST['website']) ? $_POST['website'] : 'http://basketball.fantasysports.yahoo.com';

$line = "<?php\n";
$line .= "\n";
$line .= "define('SITE_TITLE', '{$siteTitle}');\n";
$line .= "define('PEOPLE', {$people});\n";
$line .= "define('START_DATE', '{$startDate}');\n";
$line .= "define('START_WEEK', {$startWeek});\n";
$line .= "define('END_WEEK', {$endWeek});\n";
$line .= "define('NUMBER', {$number});\n";
$line .= "define('WEBSITE', '{$website}');\n";

$file = 'config.php';
$handler = fopen($file, 'w');
fwrite($handler, $line);
fclose($handler);

header('Location: setup.php?up=true');
