<?php

// Get page content from cURL
function getUrl($url) {
    $result = '';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $result = curl_exec($ch);

    if (false === $result) {
        $result = curl_error($ch);
    }

    curl_close($ch);

    return $result;
}

// Strip all tag but table
function stripHtml($text) {
    $text = preg_replace(
        array(
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu'
        ),
        array(
            '',
            ''
        ),
        $text
    );

	return $text;
}

// Send mail
function sendMail($to, $playerName) {
    $to      = $to;
    $subject = 'FA Inform';
    $message = 'Your player ' . $playerName . ' is available!';
    $headers = 'From: chan15tw@gmail.com' . "\r\n" .
        'Reply-To: chan15tw@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}
