
jQuery(function($) {

    $('.dropdown_user li').click(function(){

        // $('#publisher_id').val($(this).text());
        // $('#edit_publisher_id').val($(this).text());
        $('#user_role_id').val($(this).attr('id'));
        $('#user_role').val($(this).text());

    });


    $.ajax({

        url: 'api/v1/users/'+'all?relations[]=role',
        type: 'get',
        dataType: 'json',
        success: function(data) {
            var output = "";

            for(var i = 0; i < data.length; i++){
               
                output +=   "<tr>"
                                +"<td class='text-center'>"+data[i].id+"</td>"
                                +"<td class='text-center'>"+data[i].name+"</td>"
                                +"<td class='text-center'>"+data[i].email+"</td>"
                                // +"<td class='text-center'>"+data[i].password+"</td>"
                                +"<td class='text-center'>"+data[i].role.roleType+"</td>"
                                // +"<td class='text-center'>"
                                //     +"<a href='#' class='text-yellow' data-toggle='modal' id_edit_user="+data[i].id+" data-type='import-user' name="+data[i].name+" email="+data[i].email+" password="+data[i].password+">"
                                //         +"<i class='ace-icon fa fa-pencil-square-o bigger-130'></i>"
                                //     +"</a>"
                                // +"</td>"
                                +"<td class='text-center'>"
                                    +"<a href='#' class='text-blue' data-toggle='modal' id_edit_user="+data[i].id+" data-type='update-user' name="+data[i].name+" email="+data[i].email+" password="+data[i].password+" role_id="+data[i].role_id+" role="+data[i].role.roleType+">"
                                        +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                    +"</a>"
                                +"</td>"
                                +"<td class='text-center'>"
                                    +"<a href='#' class='text-red delete_user' id_delete_user="+data[i].id+" data-type='delete-user'>"
                                        +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                    +"</a>"
                                +"</td>"

                            +"</tr>";

            }
            $('#body_list_user').html(output);
            // $('#addUser').click(function(){


            //     $('#name_user').val("");
            //     $('#email_user').val("");
            //     $('#password_user').val("");
            //     $('#role_user').val("");
                
            //     $('#myModal-user').modal('show');

            // });
            $('a[data-type=update-user]').on('click', function(){

                var id = $(this).attr("id_edit_user");
                var name = $(this).attr("name");
                var email = $(this).attr("email");
                var password = $(this).attr("password");
                var role_id = $(this).attr("role_id");
                var role = $(this).attr("role");

                // alert(id);
               

                $('#user_id_').val(id);
                $('#user_name').val(name);
                $('#user_email').val(email);
                $('#user_password').val(password);
                $('#user_role_id').val(id);
                $('#user_role').val(role);
                $('#editModal-user').modal('show');
            });

            $('a[data-type=delete-user]').on('click', function(){

                var id = $(this).attr("id_delete_user");

                $('#user-delete').val(id);
                $('#deleteModal-user').modal('show');

            });
        },
        error: function(err){
            alert("Fail !");
        }
    });

    $('#_edit-user').on('click', function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        var id = $('#user_id_').val();
        var name = $('#user_name').val();
        var email = $('#user_email').val();
        var password = $('#user_password').val();
        var role_id = $('#user_role_id').val();
        // var name = $('#user_name').val();
        // alert(id);

        $.ajax({

            url: '/api/v1/users/patch?id='+id,
            type: 'patch',
            dataType: "json",
            data: {
                role_id: role_id,
            },
            success: function () {
                alert('success!');
                $('#editModal-user').modal('hide');

                loaddata_user();
                
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
                $('#editModal-user').modal('hide');

            }
        });
    });


    $('#_delete-user').on('click', function(){

        var id = $('#user-delete').val();
        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({

            url: '/api/v1/users/delete/'+id,
            type: 'delete',
            data: {id: id},
            success: function () {
                alert('success!');
                $('#deleteModal-user').modal('hide');
                loaddata_user();
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
            }
        });


    });
    function loaddata_user() {
        $.ajax({

            url: 'api/v1/users/'+'all?relations[]=role',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";

                for(var i = 0; i < data.length; i++){

                    output +=   "<tr>"
                        +"<td class='text-center'>"+data[i].id+"</td>"
                        +"<td class='text-center'>"+data[i].name+"</td>"
                        +"<td class='text-center'>"+data[i].email+"</td>"
                        // +"<td class='text-center'>"+data[i].password+"</td>"
                        +"<td class='text-center'>"+data[i].role.roleType+"</td>"
                        // +"<td class='text-center'>"
                        //     +"<a href='#' class='text-yellow' data-toggle='modal' id_edit_user="+data[i].id+" data-type='import-user' name="+data[i].name+" email="+data[i].email+" password="+data[i].password+">"
                        //         +"<i class='ace-icon fa fa-pencil-square-o bigger-130'></i>"
                        //     +"</a>"
                        // +"</td>"
                        +"<td class='text-center'>"
                        +"<a href='#' class='text-blue' data-toggle='modal' id_edit_user="+data[i].id+" data-type='update-user' name="+data[i].name+" email="+data[i].email+" password="+data[i].password+" role_id="+data[i].role_id+" role="+data[i].role.roleType+">"
                        +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                        +"</a>"
                        +"</td>"
                        +"<td class='text-center'>"
                        +"<a href='#' class='text-red delete_user' id_delete_user="+data[i].id+" data-type='delete-user'>"
                        +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                        +"</a>"
                        +"</td>"

                        +"</tr>";

                }
                $('#body_list_user').html(output);
                // $('#addUser').click(function(){


                //     $('#name_user').val("");
                //     $('#email_user').val("");
                //     $('#password_user').val("");
                //     $('#role_user').val("");

                //     $('#myModal-user').modal('show');

                // });
                $('a[data-type=update-user]').on('click', function(){

                    var id = $(this).attr("id_edit_user");
                    var name = $(this).attr("name");
                    var email = $(this).attr("email");
                    var password = $(this).attr("password");
                    var role_id = $(this).attr("role_id");
                    var role = $(this).attr("role");


                    $('#user_id_').val(id);
                    $('#user_name').val(name);
                    $('#user_email').val(email);
                    $('#user_password').val(password);
                    $('#user_role_id').val(id);
                    $('#user_role').val(role);
                    $('#editModal-user').modal('show');
                });

                $('a[data-type=delete-user]').on('click', function(){

                    var id = $(this).attr("id_delete_user");

                    $('#user-delete').val(id);
                    $('#deleteModal-user').modal('show');

                });
            },
            error: function(err){
                alert("Fail !");
            }
        });
    }

    // $('#addUser').click(function(){


    //     $('#name').val("");
    //     $('#user_select').val("");
    //     $('#genre_select').val("");
    //     $('#email').val("");
    //     $('#password').val("");
    //     $('#myModal-user').modal('show');

    // });

    // $('#add-user').on('click', function(){

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }

    //     });

    //     var name = $('#name').val();

    //     var email = $('#_email').val();
    //     // var user_id = $('#_user_id').val();
    //     // var genre_id = $('#_genre_id').val();
    //     var password = $('#password').val();
    //     // alert(email);

    //     var user=[];
    //     var user_id_ = [];
    //     $('#user_select :selected').each(function(){
    //          user.push($(this).text());
    //          user_id_.push($(this).attr('id'));
    //     });
    //     // console.log(user);

    //     var genre=[];
    //     var genre_id_ = [];
    //     $('#genre_select :selected').each(function(){
    //          genre.push($(this).text());
    //          genre_id_.push($(this).attr('id'));
    //     });
    //     // console.log(genre_id_);
    //     // console.log(user_id_);
    //     // console.log(genre);
    //     // console.log(user);
    //     // console.log(email);
    //     // console.log(password);
    //     // console.log(name);
    //     var formData = new FormData();
    //     formData.append('name', name);
    //     formData.append('users[]', user_id_);
    //     formData.append('genres[]', genre_id_);
    //     formData.append('email', email);
    //     formData.append('password', password);
    //     formData.append('image', $('input[type=file]')[0].files[0]);

    //     $.ajax({

    //         url: "/api/v1/users/post",
    //         type: 'post',
    //         data: formData,
    //         // type: "POST", //ADDED THIS LINE
    //         // THIS MUST BE DONE FOR FILE UPLOADING
    //         contentType: false,
    //         processData: false,
    //         // dataType: "json",
    //         // data:{
    //         //
    //         //     name: name,
    //         //     users: user_id_,
    //         //     genres: genre_id_,
    //         //     email: email,
    //         //     password: password
    //         //
    //         // },
    //         success: function () {
    //             alert("success!");
    //             $('#myModal-user').modal('hide');
    //             $.ajax({

    //                 url: '/api/v1/users/'+'all?relations[]=users&relations[]=genres&relations[]=publisher',
    //                 type: 'get',
    //                 dataType: 'json',
    //                 success: function(data) {



    //                     var output = "";
    //                     var j, q = "";

    //                     for(var i = 0; i < data.length; i++){
    //                         var k = [];
    //                         var p = [];
    //                         var au = [];
    //                         var ge = [];
    //                         for(j in data[i].users){
    //                             k.push(data[i].users[j].id);
    //                             au.push(data[i].users[j].name);
    //                         }
    //                         for(q in data[i].genres){
    //                             p.push(data[i].genres[q].id);
    //                             ge.push(data[i].genres[q].genreType);
    //                         }
    //                         output +=   "<tr>"
    //                                         +"<td class='text-center'>"+data[i].id+"</td>"
    //                                         +"<td class='text-center'>"+data[i].name+"</td>"
    //                                         +"<td class='text-center'>"+au+"</td>"
    //                                         +"<td class='text-center'>"+ge+"</td>"
    //                                         +"<td class='text-center'>"+data[i].publisher.publisherName+"</td>"
    //                                         +"<td class='text-center'>"+data[i].password+"</td>"
    //                                         +"<td class='text-center'>"
    //                                             +"<a href='#' class='text-yellow' data-toggle='modal' id_edit_user="+data[i].id+" data-type='import-user' name="+data[i].name+" email="+data[i].email+" user_id="+k+" genre_id="+p+" password="+data[i].password+">"
    //                                                 +"<i class='ace-icon fa fa-pencil-square-o bigger-130'></i>"
    //                                             +"</a>"
    //                                         +"</td>"
    //                                         +"<td class='text-center'>"
    //                                             +"<a href='#' class='text-blue' data-toggle='modal' id_edit_user="+data[i].id+" data-type='update-user' name="+data[i].name+" email="+data[i].email+" user_id="+k+" genre_id="+p+" password="+data[i].password+">"
    //                                                 +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
    //                                             +"</a>"
    //                                         +"</td>"
    //                                         +"<td class='text-center'>"
    //                                             +"<a href='#' class='text-red delete_user' id_delete_user="+data[i].id+" data-type='delete-user'>"
    //                                                 +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
    //                                             +"</a>"
    //                                         +"</td>"

    //                                     +"</tr>";

    //                     }
    //                     $('#body_list_user').html(output);
    //                     $('#adduser').click(function(){


    //                         $('#name').val("");
    //                         $('#user_select').val("");
    //                         $('#genre_select').val("");
    //                         $('#email').val("");
    //                         $('#password').val("");
    //                         $('#myModal-user').modal('show');

    //                     });
    //                     $('a[data-type=update-user]').on('click', function(){

    //                         $('#edit_name').val("");
    //                         $('#select_user').val('');
    //                         $('#select_genre').val('');
    //                         $('#edit_published_year').val("");
    //                         $('#editModal-user').modal('show');


    //                         var id = $(this).attr("id_edit_user");
    //                         var edit_name = "";
    //                         var edit_user_id = $(this).attr("user_id");
    //                         var edit_genre_id = $(this).attr("genre_id");
    //                         var edit_email = $(this).attr("email");
    //                         var edit_published_year = $(this).attr("password");
    //                         // var user = $(this).attr("user");
    //                         // var genre = $(this).attr("genre");
    //                         var user_array = [];
    //                         var genre_array = [];

    //                         user_array = edit_user_id.split(",");
    //                         // user_array = user_array.split(",");

    //                         genre_array = edit_genre_id.split(",");
    //                         // genre_array = genre_array.split(",");
    //                         // console.log(user_array);
    //                         // console.log(genre_array);
    //                         $.ajax({

    //                             url: '/api/v1/users/get?id='+id,
    //                             type: 'get',
    //                             dataType: 'json',
    //                             success: function(data) {
    //                                 name = data.name;
    //                                 $('#edit_name').val(name);
    //                                 // alert(name);
    //                             },
    //                             error: function(){
    //                                 alert("Error get data user");
    //                             }
    //                         });
    //                         // console.log(name);
    //                         $.ajax({

    //                             url: '/api/v1/publishers/get?id='+edit_email,
    //                             type: 'get',
    //                             dataType: 'json',
    //                             success: function(data) {
    //                                 edit_email = data.publisherName;
    //                                 $('#edit_email').val(edit_email);
    //                             },
    //                             error: function(){
    //                                 alert("Error get data publisher");
    //                             }
    //                         });

    //                         var nameuser = [];

    //                         for(var a = 0; a < user_array.length; a++){
    //                             // alert(user_array[a]);
    //                             $.ajax({

    //                                 url: '/api/v1/users/get?id='+user_array[a],
    //                                 type: 'get',
    //                                 dataType: 'json',
    //                                 success: function(data) {
    //                                     nameuser.push(data.name);
    //                                     $('#select_user').val(nameuser);

    //                                 },
    //                                 error: function(){
    //                                     alert("Error get data user");
    //                                 }
    //                             });
    //                         }





    //                         var genreType = [];

    //                         for(var g = 0; g < genre_array.length; g++){
    //                             // alert(genre_array[g]);
    //                             $.ajax({

    //                                 url: '/api/v1/genres/get?id='+genre_array[g],
    //                                 type: 'get',
    //                                 dataType: 'json',
    //                                 success: function(data) {
    //                                     genreType.push(data.genreType);
    //                                     $('#select_genre').val(genreType);

    //                                 },
    //                                 error: function(){
    //                                     alert("Error get data genre");
    //                                 }
    //                             });
    //                         }




    //                         // $('#edit_name').val(name);

    //                         $('#edit_published_year').val(edit_published_year);
    //                         $('#editModal-user').modal('show');
    //                         // console.log(nameuser);
    //                         // console.log(genreType);
    //                     });

    //                     $('a[data-type=delete-user]').on('click', function(){

    //                         var id = $(this).attr("id_delete_user");

    //                         $('#user-delete').val(id);
    //                         $('#deleteModal-user').modal('show');

    //                     });

    //                     $('a[data-type=import-user]').click(function(){

    //                         $('#quantity_user').val("");

    //                         var id = $(this).attr("id_edit_user");

    //                         $('#import_user_id').val(id);
                            
    //                         $('#importModal-user').modal('show');

    //                     });


    //                     // alert('success');
    //                 },
    //                 error: function(err){
    //                     alert(1);
    //                 }
    //             });
    //         },
    //         error: function(mess){
    //             alert("error! Please, try again.");
    //             console.log(mess);
    //         }
    //     });
    // });

});
