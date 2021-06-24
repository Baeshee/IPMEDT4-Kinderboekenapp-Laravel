<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;

class Users_Book extends Model
{
    protected $table = 'users_books';

    public function getUser(){
        return $this->belongsTo(User::class, 'user_email', 'email');
    }

    public function getBook(){
        return $this->belongsTo(Book::class, 'book_isbn', 'ISBN');
    }
}
