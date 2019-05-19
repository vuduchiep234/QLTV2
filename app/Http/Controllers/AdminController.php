<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Role;
use App\Models\Publisher;
use App\Models\Genre;
use App\Models\User;
use App\Models\Book;
use App\Models\BookHistory;
use DB;



class AdminController extends Controller
{
    //

    public function getHome(){
    	return view('admin.home');
    }

    public function getListRole(){

        $data['list'] = Role::paginate(10);
        return view('admin.listRole', $data);

    }

    public function getListUser(){

        $data['list'] = User::paginate(10);
        $data['listR'] = Role::all();
        return view('admin.listUser', $data);

    }

    public function getListBook(){

        $data['list'] = Book::with('authors','genres','Publisher','BookQuantity','images')->paginate(10);
        $data['listP'] = Publisher::all();
        $data['listA'] = Author::all();
        $data['listG'] = Genre::all();

        return view('admin.listBook', $data);

    }

    public function getListPublisher(){

        $data['list'] = Publisher::paginate(10);
        return view('admin.listPublisher', $data);

    }

    public function getListAuthor(){
        $data['list'] = Author::paginate(10);
        return view('admin.listAuthor', $data);
    }

    public function getListGenre(){

        $data['list'] = Genre::paginate(10);
        return view('admin.listGenre', $data);

    }


    public function getListBookHistory(){

        // $data['list'] = BookHistory::paginate(10);
        $data['list'] = DB::table('book_histories')->join('book_copies', 'book_copies.id', 'book_histories.book_copies_id')->join('users', 'users.id', 'book_histories.user_id')->join('books', 'books.id', 'book_copies.book_id')->select('book_histories.*', 'books.title', 'users.name', 'books.publishedYear', 'books.id as book_id')->where('book_histories.state', 0)->paginate(10);
        return view('admin.listBookHistory', $data);

    }

    public function getListRentBook(){

        $data['list'] = DB::table('book_histories')->join('book_copies', 'book_copies.id', 'book_histories.book_copies_id')->join('users', 'users.id', 'book_histories.user_id')->join('books', 'books.id', 'book_copies.book_id')->select('book_histories.*', 'books.title', 'users.name', 'books.publishedYear', 'books.id as book_id', 'book_copies.state_detail')->where('book_histories.state', 1)->where('book_copies.state_detail', 'borrowed')->paginate(10);
        return view('admin.listRentBook', $data);

        // return view('admin.listRentBook');

    }

    public function getListReturnBook(){

        $data['list'] = DB::table('book_histories')->join('book_copies', 'book_copies.id', 'book_histories.book_copies_id')->join('users', 'users.id', 'book_histories.user_id')->join('books', 'books.id', 'book_copies.book_id')->select('book_histories.*', 'books.title', 'users.name', 'books.publishedYear', 'books.id as book_id', 'book_copies.state_detail')->where('book_histories.state', 1)->where('book_copies.state_detail', 'rented')->paginate(10);
        return view('admin.listReturnBook', $data);

        // return view('admin.listReturnBook');

    }

    public function searchRole(Request $request){
        if($request->ajax()){

            $result="";

            $role = Role::where('roleType','LIKE','%'.$request->data_search.'%')->orWhere('id','LIKE','%'.$request->data_search.'%')->get();
            if($role){
                foreach ($role as  $key => $data) {
                    $result .= "<tr row_id_role='$data->id'>".
                                "<td class='text-center'>".$data->id."</td>".
                                "<td class='text-center'>".$data->roleType."</td>".
                                "<td class='text-center'>"
                                        ."<a href='#' class='text-blue' data-toggle='modal' id_edit_role=".$data->id." data-type='update-role' name=".$data->roleType.">"
                                            ."<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                                    ."<td class='text-center'>"
                                        ."<a href='#' class='text-red delete_role' id_delete_role=".$data->id." data-type='delete-role' data-toggle='modal'>"
                                            ."<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                            ."</tr>";
                }
                return Response($result);
            }
        }
    }

    public function searchUser(Request $request){
        if($request->ajax()){

            $result="";

            $user = DB::table('users')->join('roles', 'roles.id', 'users.role_id')->select('users.*', 'roles.roleType')
            ->where('name','LIKE','%'.$request->data_search.'%')
            ->orWhere('users.id','LIKE','%'.$request->data_search.'%')
            ->orWhere('users.email','LIKE','%'.$request->data_search.'%')
            ->orWhere('roles.roletype','LIKE','%'.$request->data_search.'%')->get();
            if($user){
                foreach ($user as  $key => $data) {
                    $result .= 

                            "<tr row_id_user='$data->id'>"
                            ."<td class='text-center'>$data->id</td>"
                            ."<td class='text-center'>$data->name</td>"
                            ."<td class='text-center'>$data->email</td>"
                            ."<td class='text-center'>$data->roleType</td>"
                            ."<td class='text-center'>"
                                ."<a href='#'' class='text-blue' id_edit_user='$data->id' name='$data->name' email='$data->email' role_id='$data->role_id' role='$data->roleType' data-type='update-user' data-toggle='modal'>"
                                    ."<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                ."</a>"
                            ."</td>"
                            
                            ."<td class='text-center'>"
                                ."<a class='text-red' href='#'' id_delete_user='$data->id' data-type='delete-user' data-toggle='modal'>"
                                    ."<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                ."</a>"

                            ."</td>"
                        ."</tr>";
                }
                return Response($result);
            }
        }
    }

    public function searchAuthor(Request $request){
        if($request->ajax()){

            $result="";

            $author = Author::where('name','LIKE','%'.$request->data_search.'%')->orWhere('id','LIKE','%'.$request->data_search.'%')->get();
            if($author){
                foreach ($author as  $key => $data) {
                    $result .= "<tr row_id_author='$data->id'>".
                                "<td class='text-center'>".$data->id."</td>".
                                "<td class='text-center'>".$data->name."</td>".
                                "<td class='text-center'>"
                                        ."<a href='#' class='text-blue' data-toggle='modal' id_edit_author=".$data->id." data-type='update-author' name=".$data->name.">"
                                            ."<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                                    ."<td class='text-center'>"
                                        ."<a href='#' class='text-red delete_role' id_delete_author=".$data->id." data-type='delete-author' data-toggle='modal'>"
                                            ."<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                            ."</tr>";
                }
                return Response($result);
            }
        }
    }

    public function searchGenre(Request $request){
        if($request->ajax()){

            $result="";

            $genre = Genre::where('genreType','LIKE','%'.$request->data_search.'%')->orWhere('id','LIKE','%'.$request->data_search.'%')->get();
            if($genre){
                foreach ($genre as  $key => $data) {
                    $result .= "<tr row_id_genre='$data->id'>".
                                "<td class='text-center'>".$data->id."</td>".
                                "<td class='text-center'>".$data->genreType."</td>".
                                "<td class='text-center'>"
                                        ."<a href='#' class='text-blue' data-toggle='modal' id_edit_genre=".$data->id." data-type='update-genre' name=".$data->genreType.">"
                                            ."<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                                    ."<td class='text-center'>"
                                        ."<a href='#' class='text-red delete_role' id_delete_genre=".$data->id." data-type='delete-genre' data-toggle='modal'>"
                                            ."<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                            ."</tr>";
                }
                return Response($result);
            }
        }
    }

    public function searchPublisher(Request $request){
        if($request->ajax()){

            $result="";

            $publisher = Publisher::where('publisherName','LIKE','%'.$request->data_search.'%')->orWhere('id','LIKE','%'.$request->data_search.'%')->get();
            if($publisher){
                foreach ($publisher as  $key => $data) {
                    $result .= "<tr row_id_publisher='$data->id'>".
                                "<td class='text-center'>".$data->id."</td>".
                                "<td class='text-center'>".$data->publisherName."</td>".
                                "<td class='text-center'>"
                                        ."<a href='#' class='text-blue' data-toggle='modal' id_edit_publisher=".$data->id." data-type='update-publisher' name=".$data->publisherName.">"
                                            ."<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                                    ."<td class='text-center'>"
                                        ."<a href='#' class='text-red delete_role' id_delete_publisher=".$data->id." data-type='delete-publisher' data-toggle='modal'>"
                                            ."<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        ."</a>"
                                    ."</td>"
                            ."</tr>";
                }
                return Response($result);
            }
        }
    }

    public function searchBookHistory(Request $request){
        if($request->ajax()){

            $result="";

            $history = DB::table('book_histories')->join('book_copies', 'book_copies.id', 'book_histories.book_copies_id')->join('users', 'users.id', 'book_histories.user_id')->join('books', 'books.id', 'book_copies.book_id')->select('book_histories.*', 'books.title', 'users.name', 'books.publishedYear', 'books.id as book_id')->where('book_histories.state', 0)
            ->where('users.name','LIKE','%'.$request->data_search.'%')
            ->orWhere('book_histories.user_id','LIKE','%'.$request->data_search.'%')
            ->orWhere('books.title','LIKE','%'.$request->data_search.'%')
            ->orWhere('book_histories.id','LIKE','%'.$request->data_search.'%')
            ->orWhere('book_histories.book_copies_id','LIKE','%'.$request->data_search.'%')->get();
            if($history){
                foreach ($history as  $key => $data) {
                    $result .= 

                            "<tr row_id_user='$data->id'>"
                            ."<td class='text-center'>$data->id</td>"
                            ."<td class='text-center'>$data->book_copies_id</td>"
                            ."<td class='text-center'>$data->user_id</td>"
                            ."<td class='text-center'>$data->name</td>"
                            ."<td class='text-center'>$data->book_id</td>"
                            ."<td class='text-center'>$data->title</td>"
                            ."<td class='text-center'>"
                                ."<a href='#' class='text-yellow' id_edit_history='$data->id' book_copies_id='$data->book_copies_id' user_id='$data->user_id' name='$data->name' book_id='$data->book_id' title='$data->title' data-type='detail_history' data-toggle='modal'>"
                                    ."<i class='ace-icon fa fa-eye bigger-130'></i>"
                                ."</a>"
                            ."</td>"
                            
                            ."<td class='text-center'>"
                                ."<a class='text-red' href='#'' id_delete_history='$data->id' data-type='delete-history' data-toggle='modal'>"
                                    ."<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                ."</a>"

                            ."</td>"
                        ."</tr>";
                }
                return Response($result);
            }
        }
    }

    public function searchRentBook(Request $request){
        if($request->ajax()){

            $result="";

            $history = $data['list'] = DB::table('book_histories')->join('book_copies', 'book_copies.id', 'book_histories.book_copies_id')->join('users', 'users.id', 'book_histories.user_id')->join('books', 'books.id', 'book_copies.book_id')->select('book_histories.*', 'books.title', 'users.name', 'books.publishedYear', 'books.id as book_id', 'book_copies.state_detail')->where('book_histories.state', 1)->where('book_copies.state_detail', 'borrowed')
            ->where('users.name','LIKE','%'.$request->data_search.'%')
            ->orWhere('book_histories.user_id','LIKE','%'.$request->data_search.'%')
            ->orWhere('books.title','LIKE','%'.$request->data_search.'%')
            ->orWhere('book_histories.id','LIKE','%'.$request->data_search.'%')
            ->orWhere('book_histories.book_copies_id','LIKE','%'.$request->data_search.'%')->get();
            if($history){
                foreach ($history as  $key => $data) {
                    $result .= 

                            "<tr row_id_rent='$data->id'>"
                            ."<td class='text-center'>$data->id</td>"
                            ."<td class='text-center'>$data->book_copies_id</td>"
                            ."<td class='text-center'>$data->user_id</td>"
                            ."<td class='text-center'>$data->name</td>"
                            ."<td class='text-center'>$data->book_id</td>"
                            ."<td class='text-center'>$data->title</td>"
                            ."<td class='text-center'>"
                                ."<a href='#' class='text-yellow' id_active_history='<?php echo $data->id; ?>' book_copies_id='{{$data->book_copies_id}}' user_id='{{$data->user_id}}' name='{{$data->name}}' book_id='{{$data->book_id}}' title='{{$data->title}}' data-type='active-history' data-toggle='modal'>"
                                    ."<i class='ace-icon fa fa-eye bigger-130'></i>"
                                ."</a>"
                            ."</td>"
                            
                            ."<td class='text-center'>"
                                ."<a class='text-green' href='#' id='<?php echo $data->id; ?>' book_copies_id='{{$data->book_copies_id}}' user_id='{{$data->user_id}}' data-type='rent-history' data-toggle='modal'>"
                                    ."<i class='ace-icon fa fa-hourglass-start bigger-130'></i>"
                                ."</a>"

                            ."</td>"
                            ."<td class='text-center'>$data->state_detail</td>"
                        ."</tr>";
                }
                return Response($result);
            }
        }
    }

    public function searchReturnBook(Request $request){
        if($request->ajax()){

            $result="";

            $history = DB::table('book_histories')->join('book_copies', 'book_copies.id', 'book_histories.book_copies_id')->join('users', 'users.id', 'book_histories.user_id')->join('books', 'books.id', 'book_copies.book_id')->select('book_histories.*', 'books.title', 'users.name', 'books.publishedYear', 'books.id as book_id', 'book_copies.state_detail')->where('book_histories.state', 1)->where('book_copies.state_detail', 'rented')
            ->where('users.name','LIKE','%'.$request->data_search.'%')
            ->orWhere('book_histories.user_id','LIKE','%'.$request->data_search.'%')
            ->orWhere('books.id','LIKE','%'.$request->data_search.'%')
            ->orWhere('books.title','LIKE','%'.$request->data_search.'%')
            ->orWhere('book_histories.id','LIKE','%'.$request->data_search.'%')
            ->orWhere('book_histories.book_copies_id','LIKE','%'.$request->data_search.'%')->get();
            if($history){
                foreach ($history as  $key => $data) {
                    $result .= 

                            "<tr row_id_return='$data->id'>"
                            ."<td class='text-center'>$data->id</td>"
                            ."<td class='text-center'>$data->book_copies_id</td>"
                            ."<td class='text-center'>$data->user_id</td>"
                            ."<td class='text-center'>$data->name</td>"
                            ."<td class='text-center'>$data->book_id</td>"
                            ."<td class='text-center'>$data->title</td>"
                            ."<td class='text-center'>"
                                ."<a href='#' class='text-yellow' id_active_history='<?php echo $data->id; ?>' book_copies_id='{{$data->book_copies_id}}' user_id='{{$data->user_id}}' name='{{$data->name}}' book_id='{{$data->book_id}}' title='{{$data->title}}' data-type='active-history' data-toggle='modal'>"
                                    ."<i class='ace-icon fa fa-eye bigger-130'></i>"
                                ."</a>"
                            ."</td>"
                            
                            ."<td class='text-center'>"
                                ."<a class='text-blue' href='#' id='<?php echo $data->id; ?>' book_copies_id='{{$data->book_copies_id}}' user_id='{{$data->user_id}}' data-type='return-history' data-toggle='modal'>"
                                    ."<i class='ace-icon fa fa-hourglass-end bigger-130'></i>"
                                ."</a>"

                            ."</td>"
                            ."<td class='text-center'>$data->state_detail</td>"
                        ."</tr>";
                }
                return Response($result);
            }
        }
    }

}
