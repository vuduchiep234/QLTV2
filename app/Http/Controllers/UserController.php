<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;
Use App\Models\Product;
Use App\Models\Producer;
Use App\Models\Category;
// Use App\Models\Book;
// Use App\Models\BookGenre;
// Use App\Models\BookImage;
// Use App\Models\Image;
// Use App\Models\AuthorBook;


class UserController extends Controller
{
    //
    public function getHome(){
    	
        $data['list'] = DB::table('publishers')->join('books', 'publishers.id', '=', 'books.publisher_id')->join('book_images', 'book_images.book_id', '=', 'books.id')->join('images', 'book_images.image_id', '=', 'images.id')->select('books.*', 'images.imageURL', 'publishers.publisherName')->get();
    	return view('user.home', $data);
    	
    }

    public function getListBook($id){

        $data['list'] = DB::table('publishers')->join('books', 'publishers.id', '=', 'books.publisher_id')->join('book_images', 'book_images.book_id', '=', 'books.id')->join('images', 'book_images.image_id', '=', 'images.id')->select('books.*', 'images.imageURL', 'publishers.publisherName')->where('publishers.id', '=', $id)->get();
    	
    	return view('user.book', $data);
    	
    }

    public function getBookDetail($id){

        $data['list'] = DB::table('publishers')->join('books', 'publishers.id', '=', 'books.publisher_id')->join('book_images', 'book_images.book_id', '=', 'books.id')->join('images', 'book_images.image_id', '=', 'images.id')->select('books.*', 'images.imageURL', 'publishers.publisherName')->where('books.id', '=', $id)->get();

        $data['listA'] = DB::table('books')->join('author_book', 'books.id', '=', 'author_book.book_id')->join('authors', 'author_book.author_id', '=', 'authors.id')->where('books.id', '=', $id)->get();

        $data['listG'] = DB::table('books')->join('book_genre', 'books.id', '=', 'book_genre.book_id')->join('genres', 'book_genre.genre_id', '=', 'genres.id')->where('books.id', '=', $id)->get();
    	
    	return view('user.detailBook', $data);
    	
    }

    public function getListAuthorBook($id){

        $data['list'] = DB::table('authors')->join('author_book', 'authors.id', '=', 'author_book.author_id')->join('books', 'author_book.book_id', '=', 'books.id')->join('publishers', 'publishers.id', '=', 'books.publisher_id')->join('book_images', 'book_images.book_id', '=', 'books.id')->join('images', 'book_images.image_id', '=', 'images.id')->where('authors.id', '=', $id)->select('books.*', 'publishers.publisherName', 'images.imageURL')->get();

        
        return view('user.listAuthorBook', $data);
        
    }

    public function getListBookGenre($id){

        $data['list'] = DB::table('genres')->join('book_genre', 'genres.id', '=', 'book_genre.genre_id')->join('books', 'book_genre.book_id', '=', 'books.id')->join('publishers', 'publishers.id', '=', 'books.publisher_id')->join('book_images', 'book_images.book_id', '=', 'books.id')->join('images', 'book_images.image_id', '=', 'images.id')->where('genres.id', '=', $id)->select('books.*', 'publishers.publisherName', 'images.imageURL')->get();
        
        return view('user.listBookGenre', $data);
        
    }
}
