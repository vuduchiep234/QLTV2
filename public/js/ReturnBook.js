jQuery(function($) {

	$('a[data-type=return-history]').on('click', function(){
		// alert(1);
		var id = $(this).attr('book_copies_id');
		var user_id = $(this).attr('user_id');
		var _id = $(this).attr('id');
		// alert(id);

		$.ajax({
			url:'/api/v1/bookCopies/get?id='+id+'&relations[]=book',
			type: 'get',
			dataType: 'json',
			success: function(dataa){
				console.log(dataa);
				// for(var i in dataa){
					// alert(dataa.book.title);
					$('#return_book_copy_id').text(dataa.id);
					$('#return_book_id').text(dataa.book_id);
					$('#return_book_title').text(dataa.book.title);
					$('#return_book_state_detail').text(dataa.state_detail);

					$('#return_user_id').val(user_id);
					$('#return_bookCopy_id').val(id);
					$('#return_id').val(_id);
				// }

			},
			error: function(err){
				alert('fail');
			}
		});


		$('#return-history').modal('show');
	});

	$('a[data-type=active-history]').on('click', function(){
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

	$('#return_id_').click(function(){
		var user_id = $('#return_user_id').val();
		var book_copy_id = $('#return_bookCopy_id').val();
		var id = $('#return_id').val();
		// alert(user_id);
		// alert(book_copy_id);

		$.ajax({
			url: '/api/v1/histories/return',
			type: 'patch',
			dataType: 'json',
			data: {
				user_id: user_id,
				bookCopies: {
					book_copy_id
				}
			},
			success: function(data) {

	        	alert('Success !');
	        	$('#return-history').modal('hide');
				$("tr[row_id_return="+id+"]").remove();
	        },
			error: function(err){
				alert('Fail !');
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
            url : '/searchReturnBook',
            data: {'data_search':value},
            success:function(data){
                // console.log(data);
                $('#body_return_book').html(data);

                $('a[data-type=return-history]').on('click', function(){
					// alert(1);
					var id = $(this).attr('book_copies_id');
					var user_id = $(this).attr('user_id');
					var _id = $(this).attr('id');
					// alert(id);

					$.ajax({
						url:'/api/v1/bookCopies/get?id='+id+'&relations[]=book',
						type: 'get',
						dataType: 'json',
						success: function(dataa){
							console.log(dataa);
							// for(var i in dataa){
								// alert(dataa.book.title);
								$('#return_book_copy_id').text(dataa.id);
								$('#return_book_id').text(dataa.book_id);
								$('#return_book_title').text(dataa.book.title);
								$('#return_book_state_detail').text(dataa.state_detail);

								$('#return_user_id').val(user_id);
								$('#return_bookCopy_id').val(id);
								$('#return_id').val(_id);
							// }

						},
						error: function(err){
							alert('fail');
						}
					});


					$('#return-history').modal('show');
				});

				$('a[data-type=active-history]').on('click', function(){
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

            },
            error: function(err){
                alert("fail");
                console.log(err);
            }
        });
    });
	}

});
