jQuery(function($) {

	$.ajax({

	        url: '/api/v1/histories/'+'all?relations[]=bookCopy&relations[]=user',
	        type: 'get',
	        dataType: 'json',
	        success: function(data) {

	        	// alert('Success !');

	            var output = "";
	            
	            for(var i in data){
	            	var book_title = "";
	                if(data[i].book_copy.state_detail == "rented" && data[i].state == 1){

		                output +=   "<tr>"
		                            +"<td class='text-center'>"+data[i].id+"</td>"
		                            +"<td class='text-center'>"+data[i].book_copies_id+"</td>"
		                            // +"<td class='text-center' id='_book_title'></td>"
		                            +"<td class='text-center'>"+data[i].user_id+"</td>"
		                            +"<td class='text-center'>"+data[i].user.name+"</td>"
		                            +"<td class='text-center'>"
		                                +"<a href='#' class='text-yellow' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='active-history' data-toggle='modal'>"
		                                    +"<i class='ace-icon fa fa-eye bigger-130'></i>"
		                                +"</a>"
		                            +"</td>"
		                            
		                            // +"<td class='text-center'>"
		                            //     +"<a class='text-blue' href='#' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='rent-history' data-toggle='modal'>"
		                            //         +"<i class='ace-icon fa fa-hourglass-1 bigger-130'></i>"
		                            //     +"</a>"

		                            // +"</td>"
		                            +"<td class='text-center'>"
		                                +"<a class='text-green' href='#' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='return-history' data-toggle='modal'>"
		                                    +"<i class='ace-icon fa fa-hourglass-end bigger-130'></i>"
		                                +"</a>"

		                            +"</td>"
		                             +"<td class='text-center'>"+data[i].book_copy.state_detail+"</td>"
		                        +"</tr>";
	                }


	            }
	            $('#body_return_book').html(output);

				$('a[data-type=return-history]').on('click', function(){
					// alert(1);
					var id = $(this).attr('book_copies_id');
					var user_id = $(this).attr('user_id');
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
	            alert("Fail !");
	        }
	});

	$('#return_id').click(function(){
		var user_id = $('#return_user_id').val();
		var book_copy_id = $('#return_bookCopy_id').val();
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

	        	$.ajax({

				        url: '/api/v1/histories/'+'all?relations[]=bookCopy&relations[]=user',
				        type: 'get',
				        dataType: 'json',
				        success: function(data) {

				        	// alert('Success !');

				            var output = "";
				            
				            for(var i in data){

				            	var book_title = "";
				                if(data[i].book_copy.state_detail == "rented" && data[i].state == 1){

					                output +=   "<tr>"
					                            +"<td class='text-center'>"+data[i].id+"</td>"
					                            +"<td class='text-center'>"+data[i].book_copies_id+"</td>"
					                            // +"<td class='text-center' id='_book_title'></td>"
					                            +"<td class='text-center'>"+data[i].user_id+"</td>"
					                            +"<td class='text-center'>"+data[i].user.name+"</td>"
					                            +"<td class='text-center'>"
					                                +"<a href='#' class='text-yellow' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='active-history' data-toggle='modal'>"
					                                    +"<i class='ace-icon fa fa-eye bigger-130'></i>"
					                                +"</a>"
					                            +"</td>"
					                            
					                            // +"<td class='text-center'>"
					                            //     +"<a class='text-blue' href='#' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='rent-history' data-toggle='modal'>"
					                            //         +"<i class='ace-icon fa fa-hourglass-1 bigger-130'></i>"
					                            //     +"</a>"

					                            // +"</td>"
					                            +"<td class='text-center'>"
					                                +"<a class='text-green' href='#' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='return-history' data-toggle='modal'>"
					                                    +"<i class='ace-icon fa fa-hourglass-end bigger-130'></i>"
					                                +"</a>"

					                            +"</td>"
					                             +"<td class='text-center'>"+data[i].book_copy.state_detail+"</td>"
					                        +"</tr>";
				                }

				            }
				            $('#body_return_book').html(output);

							$('a[data-type=return-history]').on('click', function(){
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
											$('#return_book_copy_id').text(dataa.id);
											$('#return_book_id').text(dataa.book_id);
											$('#return_book_title').text(dataa.book.title);
											$('#return_book_state_detail').text(dataa.state_detail);

											$('#return_user_id').val(user_id);
											$('#return_bookCopy_id').val(id);
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
				            alert("Fail !");
				        }
				});   
	        },
			error: function(err){
				alert('Fail !');
			}
		});
	});
	function Alert_id_returnbook() {
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
	}
});