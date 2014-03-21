<?php
include 'config.php';
include 'functions.php';

$url = $_POST['url'];
echo getUrl($url);
