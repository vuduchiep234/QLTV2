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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script type="text/javascript" src="../js/Home.js"></script>
    <script type="text/javascript" src="../js/Search.js"></script>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="row" id="list_book">
    <div>
        @foreach($books as $book)
            <h1>{{$book->title}}</h1>
        @endforeach
    </div>

    <div class="col-md-8">
        {{ $books->links() }}
    </div>
</div>

</body>
</html>
