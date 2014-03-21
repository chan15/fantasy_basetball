$(function() {
    var injuryUrl = $('#injury-url').val(),
        injuredPlayers = [],
        container = $('.container'),
        loader = $('.loader'),
        gamers = [],
        gamerUrls = $('#gamer-urls').val();

    $.post('proxy.php', {url: injuryUrl}, function(response) {
        var result = $(response);

        result.find('table.data tr').each(function(i) {
            if (i > 1) {
                date = $(this).find('td').eq(0).text();
                realName = $(this).find('td').eq(2).text();
                name = realName.replace(' ', '').toLowerCase();
                team = $(this).find('td').eq(3).text();
                injury = $(this).find('td').eq(4).text();
                expected = $(this).find('td').eq(5).text();

                injuredPlayers.push({'realName': realName, 'date': date, 'name': name, 'team': team, 'injury': injury, 'expected': expected});
            }
        });

        loadGamers().done(function() {
            loader.fadeOut();
        });
    });

    function loadGamers() {
        var results = [],
            result;
            
        gamerUrls = gamerUrls.split(',');

        for (i in gamerUrls) {
            result = $.post('proxy.php', {url: gamerUrls[i]}, function(response) {
                var dom = $(response);
                var gamerName = dom.filter('title').text().split('-');
                var playerName;
                var html = '';
                var table =  '<table class="table table-condensed table-striped">';

                table += '<thead><th>Updated</th><th>Name</th><th>Team</th><th>Injury</th><th>Return</th></thead><tbody>';
                gamerName = '<h3>' + $.trim(gamerName[gamerName.length - 1]) + '</h3>';
                html += gamerName;

                dom.find('#statTable0 tbody tr').each(function() {
                    playerName = $(this).find('a.name').text().replace(' ', '').toLowerCase();

                    for (j in injuredPlayers) {
                        if (injuredPlayers[j].name === playerName) {
                            table += '<tr>';
                            table += '<td>' + injuredPlayers[j].date + '</td>';
                            table += '<td>' + injuredPlayers[j].realName + '</td>';
                            table += '<td>' + injuredPlayers[j].team + '</td>';
                            table += '<td>' + injuredPlayers[j].injury + '</td>';
                            table += '<td>' + injuredPlayers[j].expected + '</td>';
                            table += '</tr>';
                        }
                    }
                });

                table += '</tbody></table>';
                html += table;

                container.append(html);
            });


            results.push(result);
        }

        return $.when.apply(this, results);
    }
});
