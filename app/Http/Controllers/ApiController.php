<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Users_Book;
use App\Models\Assignment;
use App\Models\AssignmentTemplate;
use Carbon\Carbon;
use DB;
use Auth;

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

    public function getAllAssignments(){
      $assignments = Assignment::all()->toJson(JSON_PRETTY_PRINT);
      return response($assignments, 200);
  }

  public function getAssignments($isbn){
    $email = auth()->user()->email;

    if (Assignment::where('book_isbn', $isbn)->exists()) {
      $assignments = Assignment::all()->where('user_email', $email)->where('book_isbn', $isbn)->toJson(JSON_PRETTY_PRINT);
        return response($assignments, 200);
      } else {
        return response()->json([
          "message" => "Assignments not found"
        ], 404);
      }
  }

    public function updateAnswer(){
      $id = auth()->user()->id;
      if(User::where('id', $id)->exists()) {
      DB::table('assignments')->where('id',$id)->update([
          'answer_1' => request('answer_1'),
      ]);
      }
      else {
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

  public function storeBookToUser(Users_Book $usersBooks, Assignment $assignment){
    $bookId = request('id');
    $email = auth()->user()->email;
    if(Book::where('id', $bookId)->exists()){
      $book = Book::where('id', $bookId)->first();

      $book_isbn = $book->ISBN;

      $templates = Book::where('id', $bookId)->first()->getAssignmentsTemplates;
      // dd($assignment_template);

      $assignment_array = array();

      foreach($templates as $template){
        $assignment = array(
          'user_email' => $email,
          "book_isbn" => $book_isbn,
          "assignment" => $template->assignment,
          "kind_of_assignment" => $template->kind_of_assignment,
          "chapters" => $template->chapters,
          "status" => 'active',
          "answer_1" => '',
          "answer_2" => '',
          "answer_3" => '',
          "answer_4" => '',
          "updated_at" => Carbon::now(),
          "created_at" => Carbon::now(),
        );
        
        $assignment_array[] = $assignment;
      }

      $usersBooks->user_email = $email;
      $usersBooks->book_isbn = $book->ISBN;
      try{

        foreach ($assignment_array as $assignment){
          DB::table('assignments')->insert($assignment);
        }

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
