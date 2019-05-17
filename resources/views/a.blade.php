<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../frontend/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="../frontend/js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="../frontend/js/easing.min.js"></script>
    <script src="../frontend/js/hoverIntent.js"></script>
    <script src="../frontend/js/superfish.min.js"></script>
    <script src="../frontend/js/jquery.ajaxchimp.min.js"></script>
    <script src="../frontend/js/jquery.magnific-popup.min.js"></script>
    <script src="../frontend/js/jquery.tabs.min.js"></script>
    <script src="../frontend/js/jquery.nice-select.min.js"></script>
    <script src="../frontend/js/owl.carousel.min.js"></script>
    <script src="../frontend/js/mail-script.js"></script>
    <script src="../frontend/js/main.js"></script>


    <script type="text/javascript" src="../js/Home.js"></script>
    <script type="text/javascript" src="../js/Search.js"></script>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="row" id="list_book">
    <div class="active-popular-carusel" id="_list_book">
        <input type="hidden" name="publisher" id="publisher" value="">

        <div class='single-popular-carusel'>
            <div class='thumb-wrap relative'>
                <div class='thumb relative'>
                    <div class='overlay overlay-bg'></div>
                    <a id='4' href='{{route("detailBook",4)}}'><img style='width: 250px;height: 300px' class='img-fluid' src=''
                                                                    alt=''></a></div>
                <div class='meta d-flex justify-content-between'><p><span class='lnr lnr-users'></span> 355 <span
                                class='lnr lnr-bubble'></span>35</p><h4>$150</h4></div>
            </div>
            <div class='details'><a id='4' href='{{route("detailBook",4)}}'><h4>Dai So</h4></a>
                <p>Nhà xuất bản: <a id='2' href='{{route("book",2)}}'></a></p>
                <p>Năm xuất bản:2009</p></div>
        </div>
        <div class='single-popular-carusel'>
            <div class='thumb-wrap relative'>
                <div class='thumb relative'>
                    <div class='overlay overlay-bg'></div>
                    <a id='5' href='{{route("detailBook",5)}}'><img style='width: 250px;height: 300px' class='img-fluid' src=''
                                                                    alt=''></a></div>
                <div class='meta d-flex justify-content-between'><p><span class='lnr lnr-users'></span> 355 <span
                                class='lnr lnr-bubble'></span>35</p><h4>$150</h4></div>
            </div>
            <div class='details'><a id='5' href='{{route("detailBook",5)}}'><h4>Dai So 2</h4></a>
                <p>Nhà xuất bản: <a id='5' href='{{route("book",5)}}'></a></p>
                <p>Năm xuất bản:2012</p></div>
        </div>
    </div>

</div>

</body>
</html>
