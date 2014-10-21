$(function() {
    var status = $('.status').text(),
        second = 30000;

    // Search name
    $( "#player" ).autocomplete({
        source: "ajax-player.php",
        minLength: 3
    });

    if ('' !== status) {
        if ('FA' === status) {
            alert('FA');
        } else {
            setTimeout(function() {
                window.location.reload();
            }, second);
        }
    }
});
