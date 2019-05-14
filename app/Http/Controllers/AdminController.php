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

}
