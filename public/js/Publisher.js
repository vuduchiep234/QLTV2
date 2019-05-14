
jQuery(function($) {


	$('#addPublisher').click(function(){

        $('#myModal-publisher').modal('show');
        $('#type-publisher').val("");
        
    });

   

	$('#add-publisher').on('click', function(){

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }

        });
		
		var data = $('#type-publisher').val();
        // alert(data);
		
		$.ajax({
            
            url: "/api/v1/publishers/post",
            type: 'post',
            dataType: "json",
            data:{
                
                publisherName: data
                
            },
            success: function () {
                alert("success!");
                $('#myModal-publisher').modal('hide');
                Load_data_Pulisher();
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
            }
        });
	});

    

    $('a[data-type=update-publisher]').on('click', function(){


    	var id = $(this).attr("id");
    	var name = $(this).attr("name");
    	// alert(name);

    	$('#publisher-type').val(name);
    	$('#publisher-id').val(id);
    	$('#editModal-publisher').modal('show');
    });

    $('#edit-publisher').on('click', function () {
        var id=$('#publisher-id').val();
        var data = $('#publisher-type').val();
        alert(id + data);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
            url: '/api/v1/publishers/patch?id='+id,
            type: 'patch',
            dataType: "json",
            data: {publisherName: data, _method: "patch"},
            success: function () {
                alert('success!');
                $('#editModal-publisher').modal('hide');
                Load_data_Pulisher();
            },
            error: function(mess){
                alert("error! Please, try again.");
                // alert(mess);
                $('#editModal-publisher').modal('hide');
                Load_data_Pulisher();
            }
        });
    });

  //   $('.delete_publisher').on('click', function(){

  //   	var id = $(this).attr("id");

  //       $('#publisher-delete').val(id);
		// $('#deleteModal-publisher').modal('show');
		


  //   });

    $('a[data-type=delete-publisher]').on('click', function(){

        var id = $(this).attr("id");

        $('#publisher-delete').val(id);
        $('#deleteModal-publisher').modal('show');
    });

    $('#_delete-publisher').on('click', function(){

    	var id = $('#publisher-delete').val();
        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
            url: '/api/v1/publishers/delete/'+id,
            type: 'delete',
            data: {id: id, _method: "delete"},
            success: function () {
                alert('success!');
                $('#deleteModal-publisher').modal('hide');
                Load_data_Pulisher();
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
            }
        });
    	
		
	});
    function Load_data_Pulisher() {
        $.ajax({

            url: '/api/v1/publishers/'+'all',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                for(var i = 0; i < data.length; i++){

                    output +=   "<tr>"
                        +"<td class='text-center'>"+data[i].id+"</td>"
                        +"<td class='text-center'>"+data[i].publisherName+"</td>"

                        +"<td class='text-center'>"
                        +"<a href='#' class='text-blue' id_edit_publisher="+data[i].id+" data-type='update-publisher' name="+data[i].publisherName+">"
                        +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                        +"</a>"
                        +"</td>"
                        +"<td class='text-center'>"
                        +"<a href='#' class='text-red' id_delete_publisher="+data[i].id+" data-type='delete-publisher'>"
                        +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                        +"</a>"
                        +"</td>"

                        +"</tr>";

                }
                $('#body_list_publisher').html(output);

                $('a[data-type=update-publisher]').on('click', function(){


                    var id = $(this).attr("id_edit_publisher");
                    var name = $(this).attr("name");
                    $.ajax({

                        url: '/api/v1/publishers/get/'+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            name = data.publisherName;
                            $('#publisher-type').val(name);
                        },
                        error: function(mess){
                            alert("Loi gi nay");
                            console.log(mess);
                        }
                    });
                    $('#publisher-id').val(id);
                    $('#editModal-publisher').modal('show');
                });

                $('a[data-type=delete-publisher]').on('click', function(){

                    var id = $(this).attr("id_delete_publisher");

                    $('#publisher-delete').val(id);
                    $('#deleteModal-publisher').modal('show');
                });
                // alert('success');
            },
            error: function(err){
                alert(1);
            }
        });
    }
});