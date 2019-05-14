
jQuery(function($) {


	$('#addGenre').click(function(){

        $('#myModal-genre').modal('show');
        $('#type-genre').val("");
        
    });

   

	$('#add-genre').on('click', function(){

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }

        });
		
		var data = $('#type-genre').val();
        // alert(data);
		
		$.ajax({
            
            url: "/api/v1/genres/post",
            type: 'post',
            dataType: "json",
            data:{
                
                genreType: data
                
            },
            success: function () {
                alert("success!");
                $('#myModal-genre').modal('hide');
                //Them
                load_data_genre();
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
            }
        });
	});

    

    $('a[data-type=update-genre]').on('click', function(){


    	var id = $(this).attr("id");
    	var name = $(this).attr("name");
    	// alert(name);

    	$('#genre-type').val(name);
    	$('#genre-id').val(id);
    	$('#editModal-genre').modal('show');
    });

    $('#edit-genre').on('click', function () {
        var id=$('#genre-id').val();
        var data = $('#genre-type').val();
        // alert(id + data);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
            url: '/api/v1/genres/patch?id='+id,
            type: 'patch',
            dataType: "json",
            data: {genreType: data, _method: "patch"},
            success: function () {
                alert('success!');
                $('#editModal-genre').modal('hide');
                load_data_genre();
            },
            error: function(mess){
                alert("error! Please, try again.");
                // alert(mess);
                $('#editModal-genre').modal('hide');
                load_data_genre();
            }
        });
    });

  //   $('.delete_genre').on('click', function(){

  //   	var id = $(this).attr("id");

  //       $('#genre-delete').val(id);
		// $('#deleteModal-genre').modal('show');
		


  //   });

    $('a[data-type=delete-genre]').on('click', function(){

        var id = $(this).attr("id");

        $('#genre-delete').val(id);
        $('#deleteModal-genre').modal('show');
        
    });

    $('#_delete-genre').on('click', function(){

    	var id = $('#genre-delete').val();
        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/genres/delete/'+id,
                type: 'delete',
                data: {id: id, _method: "delete"},
            success: function () {
                alert('success!');
                $('#deleteModal-genre').modal('hide');
               load_data_genre();

                

            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
            }
        });
    	
		
	});
    function load_data_genre() {
        $.ajax({

            url: '/api/v1/genres/'+'all',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                for(var i = 0; i < data.length; i++){

                    output +=   "<tr>"
                        +"<td class='text-center'>"+data[i].id+"</td>"
                        +"<td class='text-center'>"+data[i].genreType+"</td>"

                        +"<td class='text-center'>"
                        +"<a href='' class='text-blue' data-toggle='modal' id_edit_genre="+data[i].id+" data-type='update-genre' name="+data[i].genreType+">"
                        +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                        +"</a>"
                        +"</td>"
                        +"<td class='text-center'>"
                        +"<a href='' class='text-red' data-toggle='modal' id_delete_genre="+data[i].id+" data-type='delete-genre'>"
                        +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                        +"</a>"
                        +"</td>"

                        +"</tr>";

                }
                $('#body_list_genre').html(output);


                $('a[data-type=update-genre]').on('click', function(){


                    var id = $(this).attr("id_edit_genre");
                    var name = $(this).attr("name");

                    $.ajax({

                        url: '/api/v1/genres/get/'+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            name = data.genreType;
                            // alert(name);
                            $('#genre-type').val(name);
                        },
                        error: function(mess){
                            alert("Loi gi nay");
                            console.log(mess);
                        }
                    });


                    $('#genre-id').val(id);
                    $('#editModal-genre').modal('show');
                });

                $('a[data-type=delete-genre]').on('click', function(){

                    var id = $(this).attr("id_delete_genre");
                    alert(id);

                    $('#genre-delete').val(id);
                    $('#deleteModal-genre').modal('show');

                });
            },
            error: function(err){
                alert(err);
            }
        });
    }

});