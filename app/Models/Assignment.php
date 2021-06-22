<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;

class Assignment extends Model
{
    protected $table = 'assignments';

    public function getBook(){
        return $this->belongsTo(Book::class, 'book_isbn', 'ISBN');
    }

    public function getUserAssignments(){
        return $this->hasMany(User::class, 'user_email', 'email');
    }
}
