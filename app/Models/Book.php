<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users_Book;
use App\Models\Assignment;

class Book extends Model
{
    protected $table = 'books';

    public function getAssignments(){
        return $this->hasMany(Assignment::class, 'book_isbn', 'ISBN');
    }
}
