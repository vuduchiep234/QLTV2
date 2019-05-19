jQuery(function($) {

	$('a[data-type=rent-history]').on('click', function(){
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
				// console.log(dataa);
				// for(var i in dataa){
					// alert(dataa.book.title);
					$('#rent_book_copy_id').text(dataa.id);
					$('#rent_book_id').text(dataa.book_id);
					$('#rent_book_title').text(dataa.book.title);
					$('#rent_book_state_detail').text(dataa.state_detail);

					$('#rent_user_id').val(user_id);
					$('#rent_bookCopy_id').val(id);
					$('#rent_id').val(_id);
				// }

			},
			error: function(err){
				alert('fail');
			}
		});
		

		$('#rent-history').modal('show');
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

	$('#rent_id').click(function(){
		var user_id = $('#rent_user_id').val();
		var book_copy_id = $('#rent_bookCopy_id').val();
		var id = $('#rent_id');
		// alert(user_id);
		// alert(book_copy_id);

		$.ajax({
			url: '/api/v1/histories/rent',
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
	        	$('#rent-history').modal('hide');

	        	$("tr[row_id_rent="+id+"]").remove();   
	        },
			error: function(err){
				alert('Fail !');
			}
		});
	});

	if(window.location.pathname == "/listRentBook"){

		$('#search').on('click',function(){
	        // alert(1);
	        var value=$('#data_search').val();
	        // alert(value);
	        $.ajax({
	            type : 'get',
	            url : '/searchRentBook',
	            data: {'data_search':value},
	            success:function(data){
	                // console.log(data);
	                $('#body_rent_book').html(data);
	                
	                $('a[data-type=rent-history]').on('click', function(){
						// alert(1);
						var id = $(this).attr('book_copies_id');
						var user_id = $(this).attr('user_id');
						var _id = $(this).attr('id');
						$.ajax({
							url:'/api/v1/bookCopies/get?id='+id+'&relations[]=book',
							type: 'get',
							dataType: 'json',
							success: function(dataa){
								// console.log(dataa);
								// for(var i in dataa){
									// alert(dataa.book.title);
									$('#rent_book_copy_id').text(dataa.id);
									$('#rent_book_id').text(dataa.book_id);
									$('#rent_book_title').text(dataa.book.title);
									$('#rent_book_state_detail').text(dataa.state_detail);

									$('#rent_user_id').val(user_id);
									$('#rent_bookCopy_id').val(id);
									$('#rent_id').val(_id);
								// }

							},
							error: function(err){
								alert('fail');
							}
						});
						

						$('#rent-history').modal('show');
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