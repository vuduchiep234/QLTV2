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
	                if(data[i].state == 0){

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
		                            // +"<td class='text-center'>"
		                            //     +"<a class='text-green' href='#' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='return-history' data-toggle='modal'>"
		                            //         +"<i class='ace-icon fa fa-hourglass-end bigger-130'></i>"
		                            //     +"</a>"

		                            // +"</td>"
		                            // +"<td class='text-center'>"+data[i].book_copy.state_detail+"</td>"
		                            +"<td class='text-center'>"
                                        +"<a href='#' class='text-red delete_role' id_delete_book_history="+data[i].id+" data-type='delete-book_history'>"
                                            +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
		                        +"</tr>";
                    }


	            }
	            $('#body_book_history').html(output);


	            $('a[data-type=rent-history]').on('click', function(){
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
								$('#rent_book_copy_id').text(dataa.id);
								$('#rent_book_id').text(dataa.book_id);
								$('#rent_book_title').text(dataa.book.title);
								$('#rent_book_state_detail').text(dataa.state_detail);

								$('#rent_user_id').val(user_id);
								$('#rent_bookCopy_id').val(id);
							// }
							
						},
						error: function(err){
							alert('fail');
						}
					});
					

					$('#rent-history').modal('show');
				});

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

				$('a[data-type=delete-book_history]').on('click', function(){
					var id = $(this).attr('id_delete_book_history');
					$('#id_book_history').val(id);
					$('#deleteModal-BookHistory').modal('show');
				});

	        },
	        error: function(err){
	            alert("Fail !");
	        }
	});


	$('a[data-type=active-book]').click(function(){
		var user_id = $(this).attr('user_id');

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }

	    });

		$.ajax({
			url: '/api/v1/histories/activeHistories?userId='+user_id,
			type: 'get',
			dataType: 'json',
			success: function(data){
				$.ajax({
					url: '/api/v1/copies/'+'all',
					type: 'get',
					dataType: 'json',
					success: function(){

					},
					error: function(){
						
					}
				});
			},
			error: function(err){
				alert('Acitive histories fail');
			}
		});

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
				$.ajax({

			        url: '/api/v1/histories/'+'all?relations[]=bookCopy&relations[]=user',
			        type: 'get',
			        dataType: 'json',
			        success: function(data) {

			        	// alert('Success !');

			            var output = "";
			            
			            for(var i in data){

			            	var book_title = "";
			                if(data[i].state == 0){

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
				                            // +"<td class='text-center'>"
				                            //     +"<a class='text-green' href='#' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='return-history' data-toggle='modal'>"
				                            //         +"<i class='ace-icon fa fa-hourglass-end bigger-130'></i>"
				                            //     +"</a>"

				                            // +"</td>"
				                            // +"<td class='text-center'>"+data[i].book_copy.state_detail+"</td>"
				                            +"<td class='text-center'>"
		                                        +"<a href='#' class='text-red delete_role' id_delete_book_history="+data[i].id+" data-type='delete-book_history'>"
		                                            +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
		                                        +"</a>"
		                                    +"</td>"
				                        +"</tr>";
		                    }


			            }
			            $('#body_book_history').html(output);


			            $('a[data-type=rent-history]').on('click', function(){
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
										$('#rent_book_copy_id').text(dataa.id);
										$('#rent_book_id').text(dataa.book_id);
										$('#rent_book_title').text(dataa.book.title);
										$('#rent_book_state_detail').text(dataa.state_detail);

										$('#rent_user_id').val(user_id);
										$('#rent_bookCopy_id').val(id);
									// }
									
								},
								error: function(err){
									alert('fail');
								}
							});
							

							$('#rent-history').modal('show');
						});

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

						$('a[data-type=delete-book_history]').on('click', function(){
							var id = $(this).attr('id_delete_book_history');
							$('#id_book_history').val(id);
							$('#deleteModal-BookHistory').modal('show');
						});

			        },
			        error: function(err){
			            alert("Fail !");
			        }
				});

			},
			error: function(err){
				alert('Fail !');
				console.log(err);
				$('#deleteModal-BookHistory').modal('hide');
			}
		});
	});

	// $('#rent_id').click(function(){
	// 	var user_id = $('#rent_user_id').val();
	// 	var book_copy_id = $('#rent_bookCopy_id').val();
	// 	alert(user_id);
	// 	alert(book_copy_id);

	// 	$.ajax({
	// 		url: '/api/v1/histories/rent',
	// 		type: 'patch',
	// 		dataType: 'json',
	// 		data: {
	// 			user_id: user_id,
	// 			bookCopies: {
	// 				book_copy_id
	// 			}
	// 		},
	// 		success: function(data) {

	//         	alert('Success !');
	//         	$('#active-history').modal('hide');

	//         	$.ajax({

	// 			        url: '/api/v1/histories/'+'all?relations[]=bookCopy&relations[]=user',
	// 			        type: 'get',
	// 			        dataType: 'json',
	// 			        success: function(data) {

	// 			        	// alert('Success !');

	// 			            var output = "";
				            
	// 			            for(var i = 0; i < data.length; i++){
				                
	// 			                output +=   "<tr>"
	// 			                            +"<td class='text-center'>"+data[i].id+"</td>"
	// 			                            +"<td class='text-center'>"+data[i].book_copies_id+"</td>"
	// 			                            +"<td class='text-center'>"+data[i].user_id+"</td>"
	// 			                            +"<td class='text-center'>"
	// 			                                +"<a href='#' class='text-yellow' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='active-history' data-toggle='modal'>"
	// 			                                    +"<i class='ace-icon fa fa-eye bigger-130'></i>"
	// 			                                +"</a>"
	// 			                            +"</td>"
				                            
	// 			                            // +"<td class='text-center'>"
	// 			                            //     +"<a class='text-blue' href='#' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='rent-history' data-toggle='modal'>"
	// 			                            //         +"<i class='ace-icon fa fa-hourglass-1 bigger-130'></i>"
	// 			                            //     +"</a>"

	// 			                            // +"</td>"
	// 			                            // +"<td class='text-center'>"
	// 			                            //     +"<a class='text-green' href='#' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='return-history' data-toggle='modal'>"
	// 			                            //         +"<i class='ace-icon fa fa-hourglass-end bigger-130'></i>"
	// 			                            //     +"</a>"

	// 			                            // +"</td>"
	// 			                             +"<td class='text-center'>"+data[i].state+"</td>"
	// 			                        +"</tr>";


	// 			            }
	// 			            $('#body_book_history').html(output);


	// 			            $('a[data-type=rent-history]').on('click', function(){
	// 							// alert(1);
	// 							var id = $(this).attr('book_copies_id');
	// 							var user_id = $(this).attr('user_id');
	// 							// alert(id);
								
	// 							$.ajax({
	// 								url:'/api/v1/bookCopies/get?id='+id+'&relations[]=book',
	// 								type: 'get',
	// 								dataType: 'json',
	// 								success: function(dataa){
	// 									// console.log(dataa);
	// 									// for(var i in dataa){
	// 										// alert(dataa.book.title);
	// 										$('#active_book_copy_id').text(dataa.id);
	// 										$('#active_book_id').text(dataa.book_id);
	// 										$('#active_book_title').text(dataa.book.title);
	// 										$('#active_book_state_detail').text(dataa.state_detail);

	// 										$('#rent_user_id').val(user_id);
	// 										$('#rent_bookCopy_id').val(id);
	// 									// }
										
	// 								},
	// 								error: function(err){
	// 									alert('fail');
	// 								}
	// 							});
								

	// 							$('#active-history').modal('show');
	// 						});

	// 						$('a[data-type=return-history]').on('click', function(){
	// 							// alert(1);
	// 							var id = $(this).attr('book_copies_id');
	// 							var user_id = $(this).attr('user_id');
	// 							// alert(id);
								
	// 							$.ajax({
	// 								url:'/api/v1/bookCopies/get?id='+id+'&relations[]=book',
	// 								type: 'get',
	// 								dataType: 'json',
	// 								success: function(dataa){
	// 									// console.log(dataa);
	// 									// for(var i in dataa){
	// 										// alert(dataa.book.title);
	// 										$('#active_book_copy_id').text(dataa.id);
	// 										$('#active_book_id').text(dataa.book_id);
	// 										$('#active_book_title').text(dataa.book.title);
	// 										$('#active_book_state_detail').text(dataa.state_detail);

	// 										$('#rent_user_id').val(user_id);
	// 										$('#rent_bookCopy_id').val(id);
	// 									// }
										
	// 								},
	// 								error: function(err){
	// 									alert('fail');
	// 								}
	// 							});
								

	// 							$('#active-history').modal('show');
	// 						});


	// 			        },
	// 			        error: function(err){
	// 			            alert("Fail !");
	// 			        }
	// 			});   
	//         },
	// 		error: function(err){
	// 			alert('Fail !');
	// 		}
	// 	});
	// });

	// $('#return_id').click(function(){
	// 	var user_id = $('#return_user_id').val();
	// 	var book_copy_id = $('#return_bookCopy_id').val();
	// 	alert(user_id);
	// 	alert(book_copy_id);

	// 	$.ajax({
	// 		url: '/api/v1/histories/return',
	// 		type: 'patch',
	// 		dataType: 'json',
	// 		data: {
	// 			user_id: user_id,
	// 			bookCopies: {
	// 				book_copy_id
	// 			}
	// 		},
	// 		success: function(data) {

	//         	alert('Success !');
	//         	$('#return-history').modal('hide');

	//         	$.ajax({

	// 			        url: '/api/v1/histories/'+'all?relations[]=bookCopy&relations[]=user',
	// 			        type: 'get',
	// 			        dataType: 'json',
	// 			        success: function(data) {

	// 			        	// alert('Success !');

	// 			            var output = "";
				            
	// 			            for(var i = 0; i < data.length; i++){
				                
	// 			                output +=   "<tr>"
	// 			                            +"<td class='text-center'>"+data[i].id+"</td>"
	// 			                            +"<td class='text-center'>"+data[i].book_copies_id+"</td>"
	// 			                            +"<td class='text-center'>"+data[i].user_id+"</td>"
	// 			                            +"<td class='text-center'>"
	// 			                                +"<a href='#' class='text-yellow' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='active-history' data-toggle='modal'>"
	// 			                                    +"<i class='ace-icon fa fa-eye bigger-130'></i>"
	// 			                                +"</a>"
	// 			                            +"</td>"
				                            
	// 			                            +"<td class='text-center'>"
	// 			                                +"<a class='text-blue' href='#' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='rent-history' data-toggle='modal'>"
	// 			                                    +"<i class='ace-icon fa fa-hourglass-1 bigger-130'></i>"
	// 			                                +"</a>"

	// 			                            +"</td>"
	// 			                            +"<td class='text-center'>"
	// 			                                +"<a class='text-green' href='#' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='return-history' data-toggle='modal'>"
	// 			                                    +"<i class='ace-icon fa fa-hourglass-end bigger-130'></i>"
	// 			                                +"</a>"

	// 			                            +"</td>"
	// 			                             +"<td class='text-center'>"+data[i].state+"</td>"
	// 			                        +"</tr>";


	// 			            }
	// 			            $('#body_book_history').html(output);


	// 			            $('a[data-type=rent-history]').on('click', function(){
	// 							// alert(1);
	// 							var id = $(this).attr('book_copies_id');
	// 							var user_id = $(this).attr('user_id');
	// 							// alert(id);
								
	// 							$.ajax({
	// 								url:'/api/v1/bookCopies/get?id='+id+'&relations[]=book',
	// 								type: 'get',
	// 								dataType: 'json',
	// 								success: function(dataa){
	// 									// console.log(dataa);
	// 									// for(var i in dataa){
	// 										// alert(dataa.book.title);
	// 										$('#rent_book_copy_id').text(dataa.id);
	// 										$('#rent_book_id').text(dataa.book_id);
	// 										$('#rent_book_title').text(dataa.book.title);
	// 										$('#rent_book_state_detail').text(dataa.state_detail);

	// 										$('#rent_user_id').val(user_id);
	// 										$('#rent_bookCopy_id').val(id);
	// 									// }
										
	// 								},
	// 								error: function(err){
	// 									alert('fail');
	// 								}
	// 							});
								

	// 							$('#rent-history').modal('show');
	// 						});

	// 						$('a[data-type=return-history]').on('click', function(){
	// 							// alert(1);
	// 							var id = $(this).attr('book_copies_id');
	// 							var user_id = $(this).attr('user_id');
	// 							// alert(id);
								
	// 							$.ajax({
	// 								url:'/api/v1/bookCopies/get?id='+id+'&relations[]=book',
	// 								type: 'get',
	// 								dataType: 'json',
	// 								success: function(dataa){
	// 									// console.log(dataa);
	// 									// for(var i in dataa){
	// 										// alert(dataa.book.title);
	// 										$('#return_book_copy_id').text(dataa.id);
	// 										$('#return_book_id').text(dataa.book_id);
	// 										$('#return_book_title').text(dataa.book.title);
	// 										$('#return_book_state_detail').text(dataa.state_detail);

	// 										$('#return_user_id').val(user_id);
	// 										$('#return_bookCopy_id').val(id);
	// 									// }
										
	// 								},
	// 								error: function(err){
	// 									alert('fail');
	// 								}
	// 							});
								

	// 							$('#return-history').modal('show');
	// 						});


	// 			        },
	// 			        error: function(err){
	// 			            alert("Fail !");
	// 			        }
	// 			});   
	//         },
	// 		error: function(err){
	// 			alert('Fail !');
	// 		}
	// 	});
	// });

});