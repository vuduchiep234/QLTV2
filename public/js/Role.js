
jQuery(function($) {

    $('#addRole').click(function(){

        $('#type-role').val("");

        $('#myModal-role').modal('show');
        
        
    });

   

    $('#add-role').on('click', function(){

        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        

        var data = $('#type-role').val();
        // alert(data);
        
        $.ajax({
            
            url: "/api/v1/roles/post",
            type: 'post',
            dataType: "json",
            data:{
                
                roleType: data
                
            },
            success: function () {
                alert("success!");
                $('#myModal-role').modal('hide');
                Loaddata_role();
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
            }
        });
    });
    

    $('a[data-type=update-role]').on('click', function(){


        var id = $(this).attr("id");
        var name = $(this).attr("roleType");
        // alert(name);

        $('#role-type').val(name);
        $('#role-id').val(id);
        $('#editModal-role').modal('show');
    });

    $('#edit-role').on('click', function () {
        var id=$('#role-id').val();
        var data = $('#role-type').val();
      
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
            url: '/api/v1/roles/patch?id='+id,
            type: 'patch',
            dataType: "json",
            data: {roleType: data},
            success: function () {
                alert('success!');
                $('#editModal-role').modal('hide');
                Loaddata_role();
            },
            error: function(mess){
                alert("error! Please, try again.");
                alert(mess);
                $('#editModal-role').modal('hide');
               
            }
        });
    });

    $('a[data-type=delete-role]').on('click', function(){

        var id = $(this).attr("id");

        $('#role-delete').val(id);
        $('#deleteModal-role').modal('show');
        
    });

    $('#_delete-role').on('click', function(){

        var id = $('#role-delete').val();

        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                

            url: '/api/v1/roles/delete/'+id,
            type: 'delete',
            dataType: 'json',
            data: {id: id},
            success: function () {
                alert('success!');
                $('#deleteModal-role').modal('hide');
                Loaddata_role();
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);

                
            }
        });
        
        
    });

    function Loaddata_role() {
        $.ajax({

            url: '/api/v1/roles/'+'all',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                for(var i = 0; i < data.length; i++){

                    output +=   "<tr>"
                        +"<td class='text-center'>"+data[i].id+"</td>"
                        +"<td class='text-center'>"+data[i].roleType+"</td>"

                        +"<td class='text-center'>"
                        +"<a href='#' class='text-blue' data-toggle='modal' id_edit_role="+data[i].id+" data-type='update-role' name="+data[i].name+">"
                        +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                        +"</a>"
                        +"</td>"
                        +"<td class='text-center'>"
                        +"<a href='#' class='text-red delete_role' id_delete_role="+data[i].id+" data-type='delete-role'>"
                        +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                        +"</a>"
                        +"</td>"

                        +"</tr>";

                }
                $('#body_list_role').html(output);
                $('a[data-type=update-role]').on('click', function(){


                    var id = $(this).attr("id_edit_role");
                    var name = $(this).attr("roleType");
                    // alert(name);

                    $.ajax({

                        url: '/api/v1/roles/get/'+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            name = data.roleType;
                            // alert(name);
                            $('#role-type').val(name);
                        },
                        error: function(mess){
                            alert("Loi gi nay");
                            console.log(mess);
                        }
                    });

                    // $('#role-type').val(name);
                    $('#role-id').val(id);
                    $('#editModal-role').modal('show');
                });

                $('a[data-type=delete-role]').on('click', function(){

                    var id = $(this).attr("id_delete_role");

                    $('#role-delete').val(id);
                    $('#deleteModal-role').modal('show');

                });


                // alert('success');
            },
            error: function(err){
                alert(1);
            }
        });
    }

});
