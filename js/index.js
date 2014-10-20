$(function() {
    var high = 0,
        low = 0,
        currentValue = 0,
        highIndex = 0,
        lowIndex = 0,
        css,
        tableBody = $('tbody'),
        urls = $('#urls').val().split(',');
        loader = $('.loader'),
        website = $('#website'),
        template = [],
        tdClasses = [
            'fg',
            'ft',
            '3pt',
            'pts',
            'reb',
            'ast',
            'st',
            'blk',
            'to'];

    // Start to load page
    loadPage().done(function() {
        tableBody.append(template);
        loader.fadeOut();
        tableBody.sortable();
        markHigh();
    });

    /**
     * Load page by ajax
     *
     * @return status
     */
    function loadPage() {
        var results = [],
            result,
            id,
            avatar,
            link,
            href,
            html;

        for (i in urls) {
            result = $.post('proxy.php',{url: urls[i]}, function(response) {
                result = $(response);
                result.find('#matchup-wall-header tbody tr').each(function() {
                    html = '';
                    html += '<tr class="move">';
                    href = $(this).find('a').attr('href');
                    id = href.split('/');
                    id = id[id.length - 1];

                    $(this).find('td').each(function(j) {
                        if (0 === j) {
                            avatar = $(this).find('img');
                            link = '<a href="' + website.val() + href + '" target="_blank">' + $(this).text() + '</a>'
                            html += '<td class="name"><img src="' + avatar.prop('src')  + '">' + link + '</td>';
                        } else {
                            html += '<td class= "' + tdClasses[j - 1] + '">' + $(this).text() + '</td>';
                        }
                    });

                    html += '</tr>';
                    template[id] = html;
                });
            });

            results.push(result);
        }

        return $.when.apply(this, results);
    }

    /*
     * High rank finder
     */
    function markHigh() {
        $('.high').removeClass('high');

        for (i in tdClasses) {
            css = '.' + tdClasses[i];
            highIndex = 0;
            lowIndex = 0;
            high = 0;
            low = 0;

            $(css).each(function(j) {
                currentValue = parseInt($(this).text().replace('.', ''));

                if (currentValue > high) {
                    high = currentValue;
                    highIndex = j;
                }

                if (0 === low) low = currentValue;

                if (currentValue < low) {
                    low = currentValue;
                    lowIndex = j;
                }
            });

            if ('to' !== tdClasses[i]) {
                $(css).eq(highIndex).addClass('high', 'slow');
            } else {
                // Only to item win by lowest
                $(css).eq(lowIndex).addClass('high', 'slow');
            }
        }
    }
});
