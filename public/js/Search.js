function runScript(e) {
    //See notes about 'which' and 'key'
    if (e.keyCode == 13) {
        var tb = document.getElementById("search_book");

        console.log(tb.value);
        $.ajax({
            url: 'api/v1/books/search?q=' + tb.value + '&limit=10',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var output = "";
                for (var i = 0; i < data.length; i++) {
                    var title = data[i].title;
                    var publisher_id = data[i].publisher_id;
                    var publisher_year = data[i].publishedYear;
                    var id = data[i].id;
                    var html =
                        "<div class='single-popular-carusel'>" +
                        "<div class='thumb-wrap relative'>" +
                        "<div class='thumb relative'>" +
                        "<div class='overlay overlay-bg'></div>" +
                        "<a id='" + id + "'href='{{route(" + '"detailBook",' + id + ")}}'>" +
                        "<img style='width: 250px;height: 300px' class='img-fluid' src='' alt=''>" +
                        "</a>" +
                        "</div>" +
                        "<div class='meta d-flex justify-content-between'>" +
                        "<p><span class='lnr lnr-users'></span> 355 <span class='lnr lnr-bubble'></span>35</p>" +
                        "<h4>$150</h4>" +
                        "</div>" +
                        "</div>" +
                        "<div class='details'>" +
                        "<a id='" + id + "'href='{{route(" + '"detailBook",' + id + ")}}'>" +
                        "<h4>" + title + "</h4>" +
                        "</a>" +
                        "<p>" + "Nhà xuất bản: " + "<a id='" + publisher_id + "'href='{{route(" + '"book",' + publisher_id + ")}}'>" +
                        "</a>" + "</p>" + "<p>" + "Năm xuất bản:" + publisher_year + "</p> " +
                        "</div> " +
                        "</div>"
                    ;


                    output = output + html;
                }
                document.getElementById('_list_book').innerHTML = output;
                console.log(output);

            },
            error: function (err) {

                console.log("error" + err);
            }
        });

        return false;
    }
}
