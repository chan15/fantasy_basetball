$(function() {
    var keyword = $('#keyword'),
        loading = $('.loading'),
        tbody = $('.table tbody'),
        table = $('#player-table').tablesorter(),
        result;
        
    // Clear button
    $('#btn-clear').on('click', function() {
        tbody.html('');
    });
    
    // Remove button
    tbody.on('click', '.btn-minus', function() {
        $(this).closest('tr').remove();
        table.trigger('update');
        return false;
    });
    
    // Search name    
    $( "#keyword" ).autocomplete({
        source: "ajax-player.php",
        minLength: 3
    });
    
    // Search player
    $('#btn-search').on('click', function() {
        if (keyword.val() != '') {
            loading.fadeIn();
            $.get('ajax-player.php', {search: true, keyword: keyword.val(), stat1: $('#statselect').val()}, function(response) {
                var html;

                result = $(response);

                result.find('#players-table tbody tr').each(function() {
                    html = [];
                    html.push($(this).find('td:eq(1)').find('a:last').text());
                    html.push($(this).find('td:eq(3)').text());
                    html.push($(this).find('td:eq(4)').text());
                    html.push($(this).find('td:eq(5)').text());
                    html.push($(this).find('td:eq(6)').text());
                    html.push($(this).find('td:eq(7)').text());
                    html.push($(this).find('td:eq(8)').text());
                    html.push($(this).find('td:eq(9)').text());
                    html.push($(this).find('td:eq(10)').text());
                    html.push($(this).find('td:eq(11)').text());
                    html.push($(this).find('td:eq(12)').text());
                    html.push($(this).find('td:eq(13)').text());
                    html.push($(this).find('td:eq(14)').text());
                    html.push($(this).find('td:eq(15)').text());
                    html.push($(this).find('td:eq(16)').text());
                    html.push($(this).find('td:eq(17)').text());
                    html.push($(this).find('td:eq(18)').text());
                    html.push($(this).find('td:eq(19)').text());
                    tbody.append('<tr><td>' + html.join('</td><td>') + '</td><td><a href="#" class="btn-minus"><img src="img/minus.png"></a></td></tr>');
                });

                loading.fadeOut();
                table.trigger('update');
            });
        }
    });
});
