<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Users_Book;
use Auth;

class ApiController extends Controller
{
    public function getAllUsers(){
        $users = User::all()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function getAllBooks(){
        $books = Book::all()->toJson(JSON_PRETTY_PRINT);
        return response($books, 200);
    }

    public function getUser($id){
        if (User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
          } else {
            return response()->json([
              "message" => "User not found"
            ], 404);
          }
    }

    public function getBook($id){
        if (Book::where('id', $id)->exists()) {
            // $book = Product::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            $book = Book::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($book, 200);
          } else {
            return response()->json([
              "message" => "Product not found"
            ], 404);
          }
    }

    public function getUsersBooks($id){
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

  public function storeBookToUser($bookId, Users_Book $usersBooks){
    $user = Auth::user();
    // dd($user->email);
    if(Book::where('id', $bookId)->exists()){
      $book = Book::where('id', $bookId)->first();
      $usersBooks->user_email = $user->email;
      // dd($usersBooks);
      // dd($book);
      $usersBooks->book_isbn = $book->ISBN;
      // dd($usersBooks);
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

  // public function storeBookToUser(Request $request, Users_Book $usersBooks, $bookId) {
  //   dd($request);
  //   $usersBooks->user_email = $email = $request->user()['email'];
  //   $usersBooks->book_isbn = $ISBN = $request->book()['ISBN'];
  //   try{
  //       $usersBooks->save();
  //       return response()->json([
  //         "message" => "Book saved"
  //       ], 200);
  //     }catch(Exception $e){
  //       return response()->json([
  //         "message" => "Saving went wrong"
  //       ], 408);
  //     }
  // }
}
