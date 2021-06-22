<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Users_Book;
use Auth;
use DB;


class ApiController extends Controller
{
  // public function __construct()
  // {
  //     $this->middleware('jwt.verify');
  //     $this->middleware('jwt.xauth');  
  // }

    public function getAllUsers(){
        $users = User::all()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function getAllBooks(){
        $books = Book::all()->toJson(JSON_PRETTY_PRINT);
        return response($books, 200);
    }

    public function getUser(){ #case of login needed, remove $id from the function
      $id = auth()->user()->id;

        if (User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
          } else {
            return response()->json([
              "message" => "User not found"
            ], 404);
          }
    }


    public function getBook($book_title){
        if (Book::where('book_title', $book_title)->exists()) {
            // $book = Product::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            $book = Book::where('book_title', $book_title)->get()->toJson(JSON_PRETTY_PRINT);
            return response($book, 200);
          } else {
            return response()->json([
              "message" => "Book not found"
            ], 404);
          }
    }

    public function getMascotteImg() {
      $id = auth()->user()->id;
      if(User::where('id', $id)->exists()) {
        $mascotte_img = User::where('id', $id)->get('mascotte_img')->toJson(JSON_PRETTY_PRINT);
        return response($mascotte_img, 200);
      }
      else {
      return response()->json([
        "message" => "Image not found"
      ], 404);
    }
  }

  public function updateMascotteImg(){
    $id = auth()->user()->id;
    if(User::where('id', $id)->exists()) {
      DB::table('users')->where('id', $id)->update([
        'mascotte_img' => request('img'),
      ]);
    }
    else {
    return response()->json([
      "message" => "User not found"
    ], 404);
    }
  }

    public function getUsersBooks(){
      $id = auth()->user()->id;
      if (User::where('id', $id)->exists()) {
          $books = User::where('id', $id)->first()->getUserAddedBooks;
          $books_data = array();
          foreach ($books as $book){
            $books_data[] = $book->getBook;
          }          
          return response($books_data, 200);
        } else {
          return response()->json([
            "message" => "User's books not found"
          ], 404);
        }
  }

  public function storeBookToUser(Users_Book $usersBooks){
    $bookId = request('id');
    $email = auth()->user()->email;
    if(Book::where('id', $bookId)->exists()){
      $book = Book::where('id', $bookId)->first();
      $usersBooks->user_email = $email;
      $usersBooks->book_isbn = $book->ISBN;
      try{
        $usersBooks->save();
        return response()->json([
          "message" => "Book saved"
        ], 200);
      }catch(Exception $e){
        return response()->json([
          "message" => "Saving went wrong"
        ], 408);
      }
    }else {
      return response()->json([
        "message" => "Book not found"
      ], 404);
    }
  }
}
