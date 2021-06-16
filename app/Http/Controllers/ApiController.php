<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Users_Book;

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

    public function getUser($id){ #case of login needed, remove $id from the function
      # uncomment this when login is active # $id = auth()->user()->id;

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
}
