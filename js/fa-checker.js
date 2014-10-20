$(function() {
    var $fa = $('.status').html(),
        $sec = 30000,
        $pattern = /^W \(\w* \d*\)$/;

    // search name
    $( "#player" ).autocomplete({
        source: "ajax-player.php",
        minLength: 3
    });

    if ($fa != '') {
        if (!$fa.match($pattern)) {
            alert('FA');
        } else {
            setTimeout(function() {
                window.location.reload();
            }, $sec);
        }
    }
});
