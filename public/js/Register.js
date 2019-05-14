jQuery(function ($) {
    $('#register').on('click', function () {
        var name = $('#name_user').val();
        var email = $('#email_user').val();
        var password = $('#password_user').val();
        var retype_pass = $('#re_password_user').val();
        if (name == "" || email == "" || password == "" || retype_pass == "") {
            alert("Nhap day du thong tin")
        } else if (password != retype_pass) {
            alert("Mat khau xac nhan khong dung")
        } else if (password.length<6) {
            alert("Mat khau phai it nhat 6 ki tu")
        }else {
            $.ajax({

                url: "http://127.0.0.1:8000/api/v1/users/register",
                type: 'post',
                dataType: "json",
                data: {

                    name: name,
                    email: email,
                    password: password,
                    c_password: password

                },
                success: function () {
                    alert("success!");
                    window.location.href = "http://127.0.0.1:8000/login"
                    alert("success!");
                },
                error: function (err) {
                    console.log(err);
                    alert(err);
                }
            });
        }


    })
})
