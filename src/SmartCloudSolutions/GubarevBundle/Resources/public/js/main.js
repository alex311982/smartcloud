(function($) {
    if (!window.Cloud) {
        window.Cloud = {};
    }
    window.Cloud.Symfony = {
        formSubmit: function () {
            $('#filter').submit(function(event) {
                var taxgroup = $('#tax_group option:selected').val();
                var repiod_esv = $('#repiod_esv option:selected').val();
                var lang = $('#lang option:selected').val();
                var path = $(this).attr("data-path");
                $.get(
                    path,
                    {
                        taxgroup: taxgroup,
                        repiod_esv: repiod_esv,
                        lang: lang
                    },
                    function(data) {
                        $('#result').empty();
                        var list = 0;
                        if (data.list.length == 0) {
                            $('#result').append("<p>" + data.error + "</p>");
                        } else {
                            $.each(data.list, function(index, element) {
                                $('#result').append("<p style='text-transform:capitalize'>" + index + "</p>");
                                $('#result').append("<ul id='list_" + list + "'></ul>");
                                $.each(element, function(i, li) {
                                    $("#list_" + list).append("<li>" + li + "</li>");
                                });
                                list++;
                            });
                        }
                    },
                    'json'
                );
                event.preventDefault();
            })
        }
    };

    $(function(){
        Cloud.Symfony.formSubmit();
    });

})(jQuery);