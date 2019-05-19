jQuery(function($) {

	$('a[data-type=detail_history]').on('click', function(){
		// alert(1);
		var id = $(this).attr('book_copies_id');
		var user_id = $(this).attr('user_id');
		// alert(id);
		
		$.ajax({
			url:'/api/v1/bookCopies/get?id='+id+'&relations[]=book',
			type: 'get',
			dataType: 'json',
			success: function(dataa){
				// console.log(dataa);
				// for(var i in dataa){
					// alert(dataa.book.title);
					$('#active_book_copy_id').text(dataa.id);
					$('#active_book_id').text(dataa.book_id);
					$('#active_book_title').text(dataa.book.title);
					$('#active_published_year').text(dataa.book.publishedYear);
					$('#active_book_state_detail').text(dataa.state_detail);

					$('#active_user_id').val(user_id);
					$('#active_bookCopy_id').val(id);
				// }
				
			},
			error: function(err){
				alert('fail');
			}
		});
		

		$('#active-history').modal('show');
	});

	$('a[data-type=delete-history]').on('click', function(){
		var id = $(this).attr('id_delete_history');
		$('#id_book_history').val(id);
		$('#deleteModal-BookHistory').modal('show');
	});

	$('#delete_book_history').click(function(){

		var id = $('#id_book_history').val();
		// alert(id);

		$.ajax({
			url: '/api/v1/histories/delete/'+id,
			type: 'delete',
			dataType: 'json',
			// data: {id: id},
			success: function(data){
				alert('Success !');
				console.log(data);
				$('#deleteModal-BookHistory').modal('hide');
				$("tr[row_book_history="+id+"]").remove();

			},
			error: function(err){
				alert('Error! Please, try again.');
				console.log(err);
				$('#deleteModal-BookHistory').modal('hide');
			}
		});
	});

	if(window.location.pathname == "/listReturnBook"){

		$('#search').on('click',function(){
	        // alert(1);
	        var value=$('#data_search').val();
	        // alert(value);
	        $.ajax({
	            type : 'get',
	            url : '/searchBookHistory',
	            data: {'data_search':value},
	            success:function(data){
	                // console.log(data);
	                $('#body_book_history').html(data);
	                
	                $('a[data-type=detail_history]').on('click', function(){
						// alert(1);
						var id = $(this).attr('book_copies_id');
						var user_id = $(this).attr('user_id');
						// alert(id);
						
						$.ajax({
							url:'/api/v1/bookCopies/get?id='+id+'&relations[]=book',
							type: 'get',
							dataType: 'json',
							success: function(dataa){
								// console.log(dataa);
								// for(var i in dataa){
									// alert(dataa.book.title);
									$('#active_book_copy_id').text(dataa.id);
									$('#active_book_id').text(dataa.book_id);
									$('#active_book_title').text(dataa.book.title);
									$('#active_published_year').text(dataa.book.publishedYear);
									$('#active_book_state_detail').text(dataa.state_detail);

									$('#active_user_id').val(user_id);
									$('#active_bookCopy_id').val(id);
								// }
								
							},
							error: function(err){
								alert('fail');
							}
						});
						

						$('#active-history').modal('show');
					});

					$('a[data-type=delete-history]').on('click', function(){
						var id = $(this).attr('id_delete_history');
						$('#id_book_history').val(id);
						$('#deleteModal-BookHistory').modal('show');
					});
	            },
	            error: function(err){
	                alert("fail");
	                console.log(err);
	            }
	        });
	    });
	}

	
});