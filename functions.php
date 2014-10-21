<?php

// Get page content from cURL
function getUrl($url) {
    $ch = curl_init(); 
    $opt = array(
        CURLOPT_RETURNTRANSFER => true,
		CURLOPT_URL            => $url,
		CURLOPT_HEADER         => false
    );

    curl_setopt_array($ch, $opt);
    $result = curl_exec($ch);
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
