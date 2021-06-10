<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users_Book;

class Book extends Model
{
    protected $table = 'books';

    public function getBookData(){
        return $this->hasMany(Users_Book::class, 'book_isbn', 'ISBN');
    }
}
