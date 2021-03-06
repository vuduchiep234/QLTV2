
jQuery(function($) {
    var id_book_edit_click="";
    var id_publisher_edit_click="";
    var title_edit_click="";

    $('.select2').select2();

    $('.dropdown_publisher li').click(function(){
          $('#publisher_id').val($(this).text());
          $('#edit_publisher_id').val($(this).text());
          $('#_publisher_id').val($(this).attr('id'));
          $('#_edit_publisher_id').val($(this).attr('id'));

      });

    $('#addBook').click(function(){

       $('#title').val("");
       $('#author_select').val("");
       $('#genre_select').val("");
       $('#publisher_id').val("");
       $('#publishedYear').val("");
       $('#myModal-book').modal('show');

   });

   showModal();

    $('.select2').select2();
    onClick();


    $('#add-book').on('click', function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        var title = $('#title').val();

        var publisher_id = $('#_publisher_id').val();
        // var author_id = $('#_author_id').val();
        // var genre_id = $('#_genre_id').val();
        var publishedYear = $('#publishedYear').val();
        // alert(publisher_id);

        var author=[];
        var author_id_ = [];
        $('#author_select :selected').each(function(){
             author.push($(this).text());
             author_id_.push($(this).attr('id'));
        });
        // console.log(author);

        var genre=[];
        var genre_id_ = [];
        $('#genre_select :selected').each(function(){
             genre.push($(this).text());
             genre_id_.push($(this).attr('id'));
        });
        // console.log(genre_id_);
        // console.log(author_id_);
        // console.log(genre);
        // console.log(author);
        // console.log(publisher_id);
        // console.log(publishedYear);
        // console.log(title);
        var formData = new FormData();
        formData.append('title', title);
        for(var auth_id in author_id_){
            formData.append('authors[]',author_id_[auth_id]);
        }
        for (var ge_id in genre_id_){
            formData.append('genres[]',genre_id_[ge_id]);
        }

        formData.append('publisher_id', publisher_id);
        formData.append('publishedYear', publishedYear);
        formData.append('image', $('input[type=file]')[0].files[0]);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]);
        }
        $.ajax({

            url: "/api/v1/books/post",
            type: 'post',
            data: formData,
            // type: "POST", //ADDED THIS LINE
            // THIS MUST BE DONE FOR FILE UPLOADING
            contentType: false,
            processData: false,
            // dataType: "json",
            // data:{
            //
            //     title: title,
            //     authors: author_id_,
            //     genres: genre_id_,
            //     publisher_id: publisher_id,
            //     publishedYear: publishedYear
            //
            // },
            success: function () {
                alert("Success");
                $('#myModal-book').modal('hide');
                loadData();
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
            }
        });
    });

    $('#edit-book').on('click', function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        var id = $('#book-id').val();
        var title = $('#edit_title').val();

        console.log("title "+title);
        var author=[];
        var author_id_ = [];
        $('#select_author :selected').each(function(){
             author.push($(this).text());
             author_id_.push($(this).attr('id'));
        });
        // console.log(author);

        var genre=[];
        var genre_id_ = [];
        $('#select_genre :selected').each(function(){
             genre.push($(this).text());
             genre_id_.push($(this).attr('id'));
        });

        // var publisher_id = id_publisher_edit_click;
        var publisher_id = $('#_publisher_id').val();

        // var author_id = $('#_edit_author_id').val();
        // var genre_id = $('#_edit_genre_id').val();
        var publishedYear = $('#edit_published_year').val();

        // var data={
        //     title: title,
        //     authors: author_id_,
        //     genres: genre_id_,
        //     publisher_id: publisher_id,
        //     publishedYear: publishedYear
        // }
        // var json=JSON.stringify(data);
        // console.log("json "+json);

        var formData = new FormData();
        if (title!=title_edit_click){
            formData.append('title', title);
        }

        for(var auth_id in author_id_){
            formData.append('authors[]',author_id_[auth_id]);
        }
        for (var ge_id in genre_id_){
            formData.append('genres[]',genre_id_[ge_id]);
        }
        if (publisher_id!=null&&publisher_id!=''){
            console.log('publisher_id '+publisher_id);
            formData.append('publisher_id', publisher_id);
        }

        formData.append('publishedYear', publishedYear);
        var ins = document.getElementById('edit_image_book').files[0];
        console.log("image "+ins);
        if (ins!=null){
            formData.append('image',ins);
        }

        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]);
        }
        $.ajax({

            url: '/api/v1/books/patch?id='+parseInt(id),
            type: 'post',
            contentType: false,
            processData: false,
            data: formData,
            success: function () {
                alert('success!');
                $('#editModal-book').modal('hide');
                load_data(id);
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
                $('#editModal-book').modal('hide');

            }
        });
    });

    $('#_delete-book').on('click', function(){

        var id = $('#book-delete').val();
        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({

            url: '/api/v1/books/delete/'+id,
            type: 'delete',
            data: {id: id},
            success: function () {
                alert('success!');
                $('#deleteModal-book').modal('hide');
                $("tr[row_id_book="+id+"]").remove();
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
            }
        });


    });

    $('#import_book').click(function(){
        var quantity = $('#quantity_book').val();
        var book_id = $('#import_book_id').val();
        // alert(book_id);
        // alert(quantity);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
            url: '/api/v1/books/import?id='+book_id,
            type: 'patch',
            dataType: 'json',
            data:{
                quantity: quantity
            },
            success: function(data){
                alert('Success !');
                $('#importModal-book').modal('hide');
                load_data(book_id);
            },
            error: function(err){
                alert('Import fail');
            }
        });

    });

  function showModal(){
      $('a[data-type=update-book]').on('click', function(){

       $('#edit_title').val("");
       $('#select_author').val('');
       $('#select_genre').val('');
       $('#edit_published_year').val("");
       $('#editModal-book').modal('show');


       var id = $(this).attr("id_edit_book");

       $('#book-id').val(id);
       var edit_title = "";

       var edit_image_url=$(this).attr("image");

       $.ajax({

           url: '/api/v1/books/get/'+id+'?relations[]=authors&relations[]=genres&relations[]=publisher',
           type: 'get',
           dataType: 'json',
           success: function(data) {
              title = data.title;
              title_edit_click=title;
              $('#edit_title').val(title);

              // $("#select_author option:selected").each(function () {
              //     $(this).remove(); //or whatever else
              // });
              // $("#select_genre option:selected").each(function () {
              //     $(this).remove(); //or whatever else
              // });

              $("#select_author option:selected").prop("selected", false);
              $("#select_genre option:selected").prop("selected", false);
              var nameAuthor = [];
              var nameGenre = [];
              // alert(id);
              for(author_id in data.authors){
                $("#select_author option[id="+data.authors[author_id].id+"]").prop("selected", "selected");
                // nameAuthor.push(data.authors[author_id].name);
              }
              for(genre_id in data.genres){
                $("#select_genre option[id="+data.genres[genre_id].id+"]").prop("selected", "selected");
                // nameGenre.push(data.genres[genre_id].genreType);
              }

              // $("#select_author").val(nameAuthor);
              // $("#select_genre").val(nameGenre);
              $('#edit_published_year').val(data.publishedYear);
              $('#edit_publisher_id').val(data.publisher.publisherName);
              // alert(data.publisherName);


           },
           error: function(){
               alert("Error get data book");
           }
       });
       // console.log(title);
       // $.ajax({

       //     url: '/api/v1/publishers/get?id='+edit_publisher_id,
       //     type: 'get',
       //     dataType: 'json',
       //     success: function(data) {
       //         edit_publisher_id = data.publisherName;
       //         $('#edit_publisher_id').val(edit_publisher_id);
       //     },
       //     error: function(){
       //         alert("Error get data publisher");
       //     }
       // });

       // var nameAuthor = [];

       // for(var a = 0; a < author_array.length; a++){
       //     // alert(author_array[a]);
       //     $.ajax({

       //         url: '/api/v1/authors/get?id='+author_array[a],
       //         type: 'get',
       //         dataType: 'json',
       //         success: function(data) {
       //             nameAuthor.push(data.name);
       //             $('#select_author').val(nameAuthor);

       //         },
       //         error: function(){
       //             alert("Error get data author");
       //         }
       //     });
       // }
       // var genreType = [];

       // for(var g = 0; g < genre_array.length; g++){
       //     // alert(genre_array[g]);
       //     $.ajax({

       //         url: '/api/v1/genres/get?id='+genre_array[g],
       //         type: 'get',
       //         dataType: 'json',
       //         success: function(data) {
       //             genreType.push(data.genreType);
       //             $('#select_genre').val(genreType);

       //         },
       //         error: function(){
       //             alert("Error get data genre");
       //         }
       //     });
       // }




       // $('#edit_title').val(title);

       $('#edit_published_year').val(edit_published_year);
       $('#editModal-book').modal('show');
       // console.log(nameAuthor);
       // console.log(genreType);
      });

     $('a[data-type=delete-book]').on('click', function(){

         var id = $(this).attr("id_delete_book");

         $('#book-delete').val(id);
         $('#deleteModal-book').modal('show');

     });

     $('a[data-type=import-book]').click(function(){

         $('#quantity_book').val("");

         var id = $(this).attr("id_edit_book");

         $('#import_book_id').val(id);

         $('#importModal-book').modal('show');

     });



  }

   function loadData() {
       $.ajax({

           url: '/api/v1/books/'+'all?relations[]=authors&relations[]=genres&relations[]=publisher&relations[]=images',
           type: 'get',
           dataType: 'json',
           success: function(data) {
               // console.log(data);


               var output = "";
               var j, q,image = "";

               for(var i = 0; i < data.length; i++){
                   var k = [];
                   var p = [];
                   var img=[];
                   var au = [];
                   var ge = [];
                   for(j in data[i].book.authors){

                       k.push(data[i].book.authors[j].id);
                       au.push(data[i].book.authors[j].name);
                   }
                   for(q in data[i].book.genres){
                       p.push(data[i].book.genres[q].id);
                       ge.push(data[i].book.genres[q].genreType);
                   }
                   for (image in data[i].book.images) {
                       var image_url=data[i].book.images[image].imageURL;
                       // console.log("image_url "+image_url);

                       img.push(image_url);
                   }
                   output =   "<tr row_id_book="+data[i].book.id+">"
                       +"<td class='text-center'>"+data[i].book.id+"</td>"
                       +"<td class='text-center'>"+data[i].book.title+"</td>"
                       +"<td class='text-center'>"+au+"</td>"
                       +"<td class='text-center'>"+ge+"</td>"
                       +"<td class='text-center'>"+data[i].book.publisher.publisherName+"</td>"
                       +"<td class='text-center'>"+data[i].book.publishedYear+"</td>"
                       +"<td class='text-center'>"+data[i].availableQuantity+"</td>"
                       +"<td class='text-center'>"
                       +"<a href='#' class='text-yellow' data-toggle='modal' id_edit_book="+data[i].book.id+" data-type='import-book' title="+data[i].book.title+" publisher_id="+data[i].book.publisher_id+" author_id="+k+" genre_id="+p+" publishedYear="+data[i].book.publishedYear+">"
                       +"<i class='ace-icon fa fa-pencil-square-o bigger-130'></i>"
                       +"</a>"
                       +"</td>"
                       +"<td class='text-center'>"
                       +"<a href='#' class='text-blue'  data-toggle='modal' id_edit_book="+data[i].book.id+" data-type='update-book' title="+data[i].book.title+" publisher_id="+data[i].book.publisher_id+" author_id="+k+" genre_id="+p+" publishedYear="+data[i].book.publishedYear+" image="+img+">"
                       +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                       +"</a>"
                       +"</td>"
                       +"<td class='text-center'>"
                       +"<a href='#' class='text-red delete_book' id_delete_book="+data[i].book.id+" data-type='delete-book'>"
                       +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                       +"</a>"
                       +"</td>"

                       +"</tr>";

               }
               $("tr[row_id_book="+data[i-2].book.id+"]").after(output);
               $('#addBook').click(function(){


                   $('#title').val("");
                   $('#author_select').val("");
                   $('#genre_select').val("");
                   $('#publisher_id').val("");
                   $('#publishedYear').val("");
                   $('#myModal-book').modal('show');

               });
               showModal();


               // alert('success');
           },
           error: function(err){
               alert(1);
           }
       });
   }

   function load_data(id) {
       $.ajax({

           url: '/api/v1/books/get/'+id+'?relations[]=authors&relations[]=genres&relations[]=publisher&relations[]=images',
           type: 'get',
           dataType: 'json',
           success: function(data) {
               console.log(data);


               var output = "";
               var j, q,image = "";

               // for(var i = 0; i < data.length; i++){
                   var k = [];
                   var p = [];
                   var img=[];
                   var au = [];
                   var ge = [];
                   for(j in data.authors){

                       k.push(data.authors[j].id);
                       au.push(data.authors[j].name);
                   }
                   for(q in data.genres){
                       p.push(data.genres[q].id);
                       ge.push(data.genres[q].genreType);
                   }
                   for (image in data.images) {
                       var image_url=data.images[image].imageURL;
                       console.log("image_url "+image_url);

                       img.push(image_url);
                   }
                   output =
                       "<td class='text-center'>"+data.id+"</td>"
                       +"<td class='text-center'>"+data.title+"</td>"
                       +"<td class='text-center'>"+au+"</td>"
                       +"<td class='text-center'>"+ge+"</td>"
                       +"<td class='text-center'>"+data.publisher.publisherName+"</td>"
                       +"<td class='text-center'>"+data.publishedYear+"</td>"
                       +"<td class='text-center'>"+data.availableQuantity+"</td>"
                       +"<td class='text-center'>"
                       +"<a href='#' class='text-yellow' data-toggle='modal' id_edit_book="+data.id+" data-type='import-book' title="+data.title+" publisher_id="+data.publisher_id+" author_id="+k+" genre_id="+p+" publishedYear="+data.publishedYear+">"
                       +"<i class='ace-icon fa fa-pencil-square-o bigger-130'></i>"
                       +"</a>"
                       +"</td>"
                       +"<td class='text-center'>"
                       +"<a href='#' class='text-blue'  data-toggle='modal' id_edit_book="+data.id+" data-type='update-book' title="+data.title+" publisher_id="+data.publisher_id+" author_id="+k+" genre_id="+p+" publishedYear="+data.publishedYear+" image="+img+">"
                       +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                       +"</a>"
                       +"</td>"
                       +"<td class='text-center'>"
                       +"<a href='#' class='text-red delete_book' id_delete_book="+data.id+" data-type='delete-book'>"
                       +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                       +"</a>"
                       +"</td>"

                       ;

               // }
               $("tr[row_id_book="+data.id+"]").html(output);
               $('#addBook').click(function(){


                   $('#title').val("");
                   $('#author_select').val("");
                   $('#genre_select').val("");
                   $('#publisher_id').val("");
                   $('#publishedYear').val("");
                   $('#myModal-book').modal('show');

               });
               showModal();


               // alert('success');
           },
           error: function(err){
               alert(1);
           }
       });
   }


   function onClick() {
       $('a[data-type=update-book]').on('click', function(){

           $('#edit_title').val("");
           $('#select_author').val('');
           $('#select_genre').val('');
           $('#edit_published_year').val("");
           $('#editModal-book').modal('show');


           var id = $(this).attr("id_edit_book");
           id_book_edit_click=id;
           var edit_title = "";
           var edit_author_id = $(this).attr("author_id");
           var edit_image_url=$(this).attr("image");


           var edit_genre_id = $(this).attr("genre_id");
           var edit_publisher_id = $(this).attr("publisher_id");
           id_publisher_edit_click=edit_publisher_id;
           var edit_published_year = $(this).attr("publishedYear");

           // var author = $(this).attr("author");
           // var genre = $(this).attr("genre");
           var author_array = [];
           var genre_array = [];
           $('#edit_uploadPreview').attr("src",edit_image_url);

           author_array = edit_author_id.split(",");
           // author_array = author_array.split(",");
           console.log(" edit_author_id  "+  author_array);
           genre_array = edit_genre_id.split(",");
           // genre_array = genre_array.split(",");
           console.log(author_array);
           // console.log(genre_array);
           $.ajax({

               url: '/api/v1/books/get?id='+id,
               type: 'get',
               dataType: 'json',
               success: function(data) {
                   title = data.title;
                   title_edit_click=title;
                   $('#edit_title').val(title);
                   // alert(title);
               },
               error: function(){
                   alert("Error get data book");
               }
           });
           // console.log(title);
           $.ajax({

               url: '/api/v1/publishers/get?id='+edit_publisher_id,
               type: 'get',
               dataType: 'json',
               success: function(data) {
                   edit_publisher_id = data.publisherName;
                   console.log("namepublishers "+edit_publisher_id);
                   $('#edit_publisher_id').val(edit_publisher_id);
               },
               error: function(){
                   alert("Error get data publisher");
               }
           });

           var nameAuthor = [];

           for(var a = 0; a < author_array.length; a++){

               $.ajax({

                   url: '/api/v1/authors/get?id='+author_array[a],
                   type: 'get',
                   dataType: 'json',
                   success: function(data) {
                       nameAuthor.push(data.name);
                       console.log("nameAuthor "+nameAuthor);
                       $('#select_author').val(nameAuthor);

                   },
                   error: function(){
                       alert("Error get data author");
                   }
               });
           }





           var genreType = [];

           for(var g = 0; g < genre_array.length; g++){
               // alert(genre_array[g]);
               $.ajax({

                   url: '/api/v1/genres/get?id='+genre_array[g],
                   type: 'get',
                   dataType: 'json',
                   success: function(data) {
                       genreType.push(data.genreType);
                       $('#select_genre').val(genreType);

                   },
                   error: function(){
                       alert("Error get data genre");
                   }
               });
           }




           // $('#edit_title').val(title);

           $('#edit_published_year').val(edit_published_year);
           $('#editModal-book').modal('show');
           // console.log(nameAuthor);
           // console.log(genreType);
       });

       $('a[data-type=delete-book]').on('click', function(){

           var id = $(this).attr("id_delete_book");

           $('#book-delete').val(id);
           $('#deleteModal-book').modal('show');

       });

       $('a[data-type=import-book]').click(function(){

           $('#quantity_book').val("");

           var id = $(this).attr("id_edit_book");
           console.log("tuan "+id);

           $('#import_book_id').val(id);

           $('#importModal-book').modal('show');

       });
   }




   $('#search').on('click',function(){
          // alert(1);
          var value=$('#data_search').val();
          // alert(value);
          $.ajax({
              type : 'get',
              url : '/searchBook',
              data: {'data_search':value},
              success:function(data){
                  // console.log(data);
                  $('#body_list_book').html(data);
                  showModal();
              },
              error: function(err){
                  alert("fail");
                  console.log(err);
              }
          });
      });

});
