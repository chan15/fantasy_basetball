$(function() {
    var $keyword = $('#keyword'),
        $loading = $('.loading'),
        $tbody = $('.table tbody'),
        $table = $('#player-table').tablesorter();
        
    //clear button
    $('#btn-clear').on('click', function() {
        $tbody.html('');
    });
    
    // remove button
    $tbody.on('click', '.btn-minus', function() {
        $(this).closest('tr').remove();
        return false;
    });
    
    // search name    
    $( "#keyword" ).autocomplete({
        source: "ajax-player.php",
        minLength: 3
    });
    
    // search player
    $('#btn-search').on('click', function() {
        if ($keyword.val() != '') {
            $loading.fadeIn();
            $.get('ajax-player.php', {search: true, keyword: $keyword.val(), stat1: $('#statselect').val()}, function($res) {
                $tbody.append($res);
                $loading.fadeOut();
                $table.trigger('update');
            });
        }
    });
});
