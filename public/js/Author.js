
jQuery(function($) {

	$('#addAuthor').click(function(){

        $('#myModal-author').modal('show');
        $('#type-author').val("");
        
    });

   

	$('#add-author').on('click', function(){

        
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }

        });
		

		var data = $('#type-author').val();
        // alert(data);
		
		$.ajax({
            
            url: "/api/v1/authors/post",
            type: 'post',
            dataType: "json",
            data:{
                
                name: data
                
            },
            success: function () {
                alert("success!");
                $('#myModal-author').modal('hide');
                load_data_author();
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
            }
        });
	});
    

    $('a[data-type=update-author]').on('click', function(){


    	var id = $(this).attr("id");
    	var name = $(this).attr("name");
    	// alert(name);

    	$('#author-type').val(name);
    	$('#author-id').val(id);
    	$('#editModal-author').modal('show');
    });

    $('#edit-author').on('click', function () {
        var id=$('#author-id').val();
        var data = $('#author-type').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
            url: '/api/v1/authors/patch/'+id,
            type: 'patch',
            dataType: "json",
            data: {name: data, _method: "patch"},
            success: function () {
                alert('success!');
                $('#editModal-author').modal('hide');
                load_data_author();
            },
            error: function(mess){
                alert("error! Please, try again.");
                // alert(mess);
                $('#editModal-author').modal('hide');
                // $.ajax({
                    
                //     url: '/api/v1/authors/'+'all',
                //     type: 'get',
                //     dataType: 'json',
                //     success: function(data) {
                //         var output = "";
                //         for(var i = 0; i < data.length; i++){

                //             output +=   "<tr>"
                //                             +"<td class='text-center'>"+data[i].id+"</td>"
                //                             +"<td class='text-center'>"+data[i].name+"</td>"
                                            
                //                             +"<td class='text-center'>"
                //                                 +"<a href='#' class='text-blue' data-toggle='modal' id_edit_author="+data[i].id+" data-type='update-author' name="+data[i].name+">"
                //                                     +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                //                                 +"</a>"
                //                             +"</td>"
                //                             +"<td class='text-center'>"
                //                                 +"<a href='#' class='text-red delete_author' id_delete_author="+data[i].id+" data-type='delete-author'>"
                //                                     +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                //                                 +"</a>"
                //                             +"</td>"
                                            
                //                         +"</tr>";

                //         }
                //         $('#body_list_author').html(output);
                //         $('a[data-type=update-author]').on('click', function(){


                //             var id = $(this).attr("id_edit_author");
                //             var name = $(this).attr("name");
                //             // alert(name);

                //             $('#author-type').val(name);
                //             $('#author-id').val(id);
                //             $('#editModal-author').modal('show');
                //         });

                //         $('a[data-type=delete-author]').on('click', function(){

                //             var id = $(this).attr("id_delete_author");

                //             $('#author-delete').val(id);
                //             $('#deleteModal-author').modal('show');
                            
                //         });


                //         // alert('success');
                //     },
                //     error: function(err){
                //         alert(1);
                //     }
                // });
            }
        });
    });

    $('a[data-type=delete-author]').on('click', function(){

        var id = $(this).attr("id");

        $('#author-delete').val(id);
        $('#deleteModal-author').modal('show');
        
    });

    $('#_delete-author').on('click', function(){

    	var id = $('#author-delete').val();

        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                

            url: '/api/v1/authors/delete/'+id,
            type: 'delete',
            data: {id: id, _method: "delete"},
            success: function () {
                alert('success!');
                $('#deleteModal-author').modal('hide');
                load_data_author();
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);

                
            }
        });
    	
		
	});

    function load_data_author(){
        $.ajax({

            url: '/api/v1/authors/'+'all',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                for(var i = 0; i < data.length; i++){

                    output +=   "<tr>"
                        +"<td class='text-center'>"+data[i].id+"</td>"
                        +"<td class='text-center'>"+data[i].name+"</td>"

                        +"<td class='text-center'>"
                        +"<a href='#' class='text-blue' data-toggle='modal' id_edit_author="+data[i].id+" data-type='update-author' name="+data[i].name+">"
                        +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                        +"</a>"
                        +"</td>"
                        +"<td class='text-center'>"
                        +"<a href='#' class='text-red delete_author' id_delete_author="+data[i].id+" data-type='delete-author'>"
                        +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                        +"</a>"
                        +"</td>"

                        +"</tr>";

                }
                $('#body_list_author').html(output);
                $('a[data-type=update-author]').on('click', function(){


                    var id = $(this).attr("id_edit_author");
                    var name = $(this).attr("name");
                    // alert(name);

                    $.ajax({

                        url: '/api/v1/authors/get/'+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            name = data.name;
                            // alert(name);
                            $('#author-type').val(name);
                        },
                        error: function(mess){
                            alert("Loi gi nay");
                            console.log(mess);
                        }
                    });

                    // $('#author-type').val(name);
                    $('#author-id').val(id);
                    $('#editModal-author').modal('show');
                });

                $('a[data-type=delete-author]').on('click', function(){

                    var id = $(this).attr("id_delete_author");

                    $('#author-delete').val(id);
                    $('#deleteModal-author').modal('show');

                });


                // alert('success');
            },
            error: function(err){
                alert(1);
            }
        });
    }

});
