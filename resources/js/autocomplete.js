$(document).ready(function () {
    $('#current_city').keyup(function () {
        const query = $(this).val();

        if(query == '') return false

        var params = window
            .location
            .search
            .replace('?','')
            .split('&')
            .reduce(
                function(p,e){
                    var a = e.split('=');
                    p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
                    return p;
                },
                {}
            );

        $.ajax({
            url: "/autocomplete/fetch",
            method: 'GET',
            data:{...params, city:query},
            success:function (data) {
                $("#cities_list").fadeIn();
                $("#cities_list").html(data);
            }
        })
    })

    $(document).on('click','ul#list_cities>li', function () {
        $('#current_city').val($(this).text());
        $("#cities_list").hide();
        $('#find_city').submit();
    })
})
