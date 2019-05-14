jQuery(function ($) {
    $('#sign_in').on('click', function () {
        var email = $('#email_login').val();
        var password = $('#password_login').val();

        $.ajax({

            url: "api/v1/users/login",
            type: 'post',
            dataType: "json",
            data: {

                email: email,
                password: password

            },
            success: function ($data) {
                window.location.href="{{homeAdmin}}"
                alert("success!");
            },
            error: function (err) {
                console.log(err);
                alert(err.toString());
            }
        });


    })
})
