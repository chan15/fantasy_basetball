$(function() {
    var high = 0,
        low = 0,
        highIndex = 0,
        lowIndex = 0,
        css,
        tableBody = $('tbody'),
        urls = $('#urls').val().split(',');
        loader = $('.loader'),
        website = $('#website'),
        template = [],
        tdClasses = [];

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
            html,
            heads = [];

        for (i in urls) {
            result = $.post('proxy.php',{url: urls[i]}, function(response) {
                result = $(response);

                // Grab head
                if (0 === heads.length) {
                    result.find('#matchup-wall-header thead tr th').each(function() {
                        heads.push($(this).text());
                    });

                    var headHtml = $.map(heads, function(item) {
                        return '<th>' + item + '</th>';
                    }).join('');

                    $('.heads').append(headHtml);
                }

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
                            html += '<td class= "' + heads[j].toLowerCase().replace('%', '').replace('/', '') + '">' + $(this).text() + '</td>';
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

        tableBody.find('tr:first td:gt(0)').each(function() {
            var className = $(this).prop('class');

            $('.' + className).each(function(i) {
                var text = $(this).text();

                if ('-' === text) {
                    text = 0;
                }

                text = parseFloat(text);

                if (text >= high) {
                    high = text;
                    highIndex = i;
                }

                if (text <= low || 0 === low) {
                    low = text;
                    lowIndex = i;
                }
            });

            if ('score' !== className) {
                if ('to' !== className) {
                    $('.' + className).eq(highIndex).addClass('high', 'slow');
                } else {
                    $('.' + className).eq(lowIndex).addClass('high', 'slow');
                }
            }

            high = 0;
            highIndex = 0;
            low = 0;
            lowIndex = 0;
        });
    }
});
