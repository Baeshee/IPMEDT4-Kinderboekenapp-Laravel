<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

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
}
