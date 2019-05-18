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

        $data['list'] = Role::paginate(2);
        return view('admin.listRole', $data);
    	
    }

    public function getListUser(){

        $data['list'] = User::paginate(2);
        $data['listR'] = Role::all();
        return view('admin.listUser', $data);
    	
    }

    public function getListBook(){

        $data['list'] = Book::paginate(10);
        $data['listP'] = Publisher::all();
        $data['listA'] = Author::all();
        $data['listG'] = Genre::all();
        return view('admin.listBook', $data);
        
    }

    public function getListBookQuantity(){
    	return view('admin.listBookQuantity');
    }

    public function getListAuthorBook(){
    	return view('admin.listAuthorBook');
    }

    public function getListBookGenre(){
    	return view('admin.listBookGenre');
    }

    public function getListPublisher(){
        
        $data['list'] = Publisher::paginate(2);
        return view('admin.listPublisher', $data);
    	
    }

    public function getListAuthor(){
        $data['list'] = Author::paginate(2);
        return view('admin.listAuthor', $data);
    }

    public function getListGenre(){

        $data['list'] = Genre::paginate(2);
        return view('admin.listGenre', $data);
    	
    }

    public function getListImage(){
    	return view('admin.listImage');
    }

    public function getListImageUser(){
    	return view('admin.listImageUser');
    }

    public function getListBookImage(){
    	return view('admin.listBookImage');
    }

    public function getListBookCopy(){
    	return view('admin.listBookCopy');
    }

    public function getListBookHistory(){

        $data['list'] = BookHistory::paginate(10);
        return view('admin.listBookHistory', $data);
    	
    }

    public function getListRentBook(){

        return view('admin.listRentBook');
        
    }

    public function getListReturnBook(){

        return view('admin.listReturnBook');
        
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

}
