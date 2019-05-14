jQuery(function($) { 

    $('#sign_in').click(function(){

        var email = $('#email_login').val();
        var password = $('#password_login').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/api/v1/users/login',
            type: 'post',
            dataType: 'json',
            data:{
                email: email,
                password: password
            },
            success: function(data){

                if(data.Role.id == 1){
                    window.location.href="/homePage";
                }
                else if(data.Role.id == 2){
                    window.location.href="/homeAdmin";
                }
                else{
                    alert('You need register account');
                }
                
                
                
            },
            error: function(){
                alert("Login fail !");
            }

        });
    });

    $('.logout').click(function(){

        var id = $(this).attr('data_id');
        // alert(id);
        // var password = $('#password_login').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#confirm_logout').modal('show');

        $('#logout_user').click(function(){

            $.ajax({
                url: '/api/v1/users/logout',
                type: 'post',
                dataType: 'json',
                data:{
                    user_id: id
                },
                success: function(data){

                    window.location.href="/login";
                   
                },
                error: function(){
                    
                }

            });
        });

        
    });

    $('._change_password').click(function(){

        // var user_id = $('#change_user_id').val();
        // alert($('#password_login').val());

        $('#changePassword-user').modal('show');

        
    });

    //Change Password chua hoan thanh...^^

    $('#change_password').click(function(){

        var current_password = $('#current').val();
        var new_password = $('#new').val();
        var confirm_password = $('#confirm').val();
        var user_id = $('#change_user_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // $('#confirm_logout').modal('show');

        $.ajax({
            url: 'api/v1/users/changePassword',
            type: 'patch',
            dataType: 'json',
            data: {
                'id': user_id,
                'old_password': current_password,
                'new_password': new_password,
                'c_new_password': confirm_password
            },
            success: function(data){

                alert('Success !');
                $('#changePassword-user').modal('hide');
               
            },
            error: function(err){
                alert(err);
            }

        });


    });

    $('#register').click(function(){

        var name = $('#name_user').val();
        var email = $('#email_user').val();
        var password = $('#password_user').val();
        var re_password = $('#re_password_user').val();

        if(password == re_password){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/api/v1/users/register',
                type: 'post',
                dataType: 'json',
                data: {
                    name: name,
                    email: email,
                    password: password
                },
                success: function(){
                    alert('Success !');
                },
                error: function(){
                    alert('Register fail !');
                }
            });
        }
        else{
            alert('Confirm password is fail');
        }

        
    });

    $('.borrow').click(function(){
        var id = $('#book_id').val();
        var user_id = $(this).attr('user_id');
        // alert(user_id);
        if(user_id != ""){
             $('#borrow_book_id').val(id);
            $('#myModal-borrow').modal('show');
        }
        else{
            alert('You are not login')
        }
       
    });

    $('#borrow_book').click(function(){
        var book_id = $('#borrow_book_id').val();
        // alert(book_id);
        var quantity = $('#quantity').val();
        // alert(quantity);
        var user_id = $('#borrow_user_id').val();
        // alert(user_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/api/v1/books/borrow',
            type: 'patch',
            dataType: 'json',
            data: {
                user_id: user_id,
                books: {
                    0:{
                    book_id: book_id,
                    quantity: quantity
                    }
                }
            },
            success: function(data){
                alert(data);
                $('#myModal-borrow').modal('hide');
                console.log(data);
            },
            error: function(err){
                alert(err);
                console.log(err);
            }
        });

    });

    $('#_register_card').click(function(){

        var id = $(this).attr('data_id');
        // alert(id);
        $('#card_user_id').val(id);
        $('#card').modal('show');
    });

    $('#register_card').click(function(){
        var user_id = $('#card_user_id').val();
        // alert(user_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/api/v1/cards/post',
            type: 'post',
            dataType: 'json',
            data: {
                user_id: user_id,
                
            },
            success: function(data){
                alert('success');
                $('#card').modal('hide');
                // $('#_register_card').text("");
            },
            error: function(err){
                // console.log(err);
                alert('Card exists!');
                $('#card').modal('hide');
            }
        });

    });
    
});
